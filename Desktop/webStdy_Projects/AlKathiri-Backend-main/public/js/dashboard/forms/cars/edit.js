let brandsSp            = $("#brand-sp");
let modelsSp            = $("#model-sp");
let colorsSp            = $("#colors-sp");
let priceFieldInp       = $("#price-field-val");
let priceInp            = $("#price_inp");
let discountInp         = $("#discount_price_inp");

$(document).ready( () => {

    brandsSp.change( function (event , modelId = null ) {

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

                if ( modelId )
                    modelsSp.val(modelId);
            }
        });

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

});

let changePriceField = ( element = $('input[name="price_field_status"]:checked') ) => {

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

    let form = $("#submitted-form");
    let formData = new FormData( document.getElementById('submitted-form') );
    formData.append('step',currentStep );
    
    $.ajax({
        url:"/dashboard/car-validate/" + carId,
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
                displayValidationMessages(response.responseJSON.errors, form);
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

let initializeColorsSp = () => {

    let tempArr = [];

    carColorsIds.forEach( ( id , index) => {
        tempArr.push(id);

        colorsSp.val(tempArr).trigger('change' , true);

    });
}
