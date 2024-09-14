let brandsSp           = $("#brand-sp");
let modelsSp           = $("#model-sp");
let priceFieldInp      = $("#price-field-val");
let priceInp           = $("#price_inp");
let discountInp        = $(".discount_price");
let carColorsDiv       = $("#car-colors");
let previouslySelected = [];


$(document).ready( () => {

    brandsSp.change( function () {

        let selectedBrandId = $(this).val();
        let selectedBrandName = (brands.find( (brand) => brand.id == selectedBrandId )).name;
        modelsSp.empty();
        modelsSp.attr('disabled','true');

        $.ajax({
            url:`/get-brand-parent-models/${selectedBrandName}` ,
            method:"GET",
            success: (response) => {

                modelsSp.removeAttr('disabled');

                modelsSp.append(`<option></option>`);

                response['models'].forEach( ( model ) => {
                    modelsSp.append(`<option value="${ model['id'] }" > ${ model['name'] } </option>`)
                });

            }
        });

    });


    $("#colors-sp").change(function () {


        let currentlySelected   = $(this).val(); // ids [1, 2, 3]
        let currentIndex        = currentlySelected.length - 1;
        let lastSelectedColorId = null;
        let isAdding            = currentlySelected.length > previouslySelected.length;

        if ( isAdding )
        {
            lastSelectedColorId = currentlySelected.find( ( element ) => ! previouslySelected.includes(element) )

            let selectedColor = colors.find( (color) => color['id'] == lastSelectedColorId );

            carColorsDiv.append
            (
                `<div class="rounded border border-3 p-5 mb-4" id="color-${lastSelectedColorId}">

                    <!-- begin :: Row -->
                    <div class="row text-center">

                        <!-- Begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <h4>${ selectedColor['name'] }</h4>
                            <div class="rounded-circle w-80px h-80px m-auto" style="border:1px solid lightslategrey;background:${ selectedColor['hex_code'] ?? `url(${getImagePathFromDirectory('Colors',selectedColor['image'])})` }"></div>
                            <input type="hidden" name="colors[${currentIndex}][id]" value=${ selectedColor['id'] } >
                        </div>
                        <!-- end   :: Column -->

                </div>`
            );
        }else
        {
            lastSelectedColorId = previouslySelected.find( ( element ) => ! currentlySelected.includes(element) )

            carColorsDiv.find(`[id=color-${lastSelectedColorId}]`).eq(0).remove();
        }

        previouslySelected = currentlySelected;

    });

    $("#discount-price-switch").change( function () {
        discountInp.prop('disabled' , ! $(this).prop('checked'))
    });

    $(".price-filed-radio:not(#other-radio-btn)").change( function () {
        changePriceField( $(this) )
    });

    $("#other-radio-btn").click(function () {
        $("#price-other-modal").modal('show')
    });

    $("#price-other-text-btn").click( function () {
        let priceFieldVal = $("#other_text_" + locale.trim() + "_inp").val();
        priceFieldInp.text( priceFieldVal );
        $("#price-other-modal").modal('hide')

    });

    priceInp.keyup(() => changePriceField() );

    discountInp.keyup( function () {

        if ( parseInt( $(this).val() ) >= parseInt( priceInp.val() ) )
        {
            $(this).val("");
            warningAlert(translate('Discount price must be smaller than the price'))
        }

        changePriceField()

    });


    $(document).on('click',"[id*=images_upload_btn]", function () {

        $(this).prev().trigger('click');

    });

    $(document).on('change',"[id*=_images_inp]", function () {

        let filesNumber = $(this)[0].files.length;
        $(this).next().html(`<i class="bi bi-upload fs-8" ></i> ${ filesNumber } ${ filesNumber === 1 ? 'file' : 'files' } selected`);

    });



});

function changePriceField( element = $('input[name="price_field_status"]:checked') ) {

    if ( element.val() === "show" )
    {

        if ( discountInp.val() && priceInp.val() )
        {
            priceFieldInp.html(`<span>${ discountInp.val() + currency }  <del> ${ priceInp.val() + currency } </del> </span>`)
        }
        else if ( priceInp.val() )
        {
            priceFieldInp.html(priceInp.val() + currency)
        }

    }else
    {
        let priceFieldVal = element.next().html();
        priceFieldInp.text( priceFieldVal );
    }

}

let validateStep = async (successCallback) => {

    nextBtn.attr('disabled',true).attr("data-kt-indicator", "on")

    //if( currentStep == 1 )
    //{
    //    await tinymce.get('.tinymce').execCommand('mceSave');
    //    await tinymce.get('.tinymce').execCommand('mceSave');
    //}

    let formData = new FormData( document.getElementById('submitted-form') );
    formData.append('step',currentStep );

    $.ajax({
        url:"/dashboard/car-validate",
        method:"POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:formData,
        contentType: false,
        processData: false,
        success: () => {

            removeValidationMessages();

            if ( currentStep !== totalSteps ) // not the last step
                successCallback();
            else
               successAlert().then( () =>  window.location.replace('/dashboard/cars') );

        },
        error: (response) => {

            removeValidationMessages();

            if (response.status === 422)
                displayValidationMessages(response.responseJSON.errors, $("#submitted-form"));
            else if (response.status === 403)
                unauthorizedAlert();
            else
                errorAlert({ time: 5000 })

            if (response.status === 422 && ( response.responseJSON.errors['other_text_ar'] || response.responseJSON.errors['other_text_en']))
                $("#price-other-modal").modal('show')

        },
        complete: () => {
            nextBtn.attr('disabled',false).removeAttr("data-kt-indicator")
        }
    });



}
