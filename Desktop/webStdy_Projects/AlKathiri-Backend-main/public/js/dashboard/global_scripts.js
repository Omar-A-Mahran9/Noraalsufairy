let removeValidationMessages = function() {
    let errorElements = $('.invalid-feedback');
    errorElements.html('').css('display','none');
    $('form .form-control').removeClass('is-invalid is-valid')
    // $('form .form-select').removeClass('is-invalid is-valid')
}

let displayValidationMessages = function(errors ,form) {
    form.find('.form-control').addClass('is-valid')
    // form.find('.form-select').addClass('is-valid')
    $.each(errors, (key, errorMessage) => getErrorElement(form,key).html(errorMessage).css('display','block'));
    scrollToFirstErrorElement(errors);
}

function getErrorElement(form,errorKey) {
    let inputId = errorKey.replaceAll('.','_');
    let errorInput   = form.find(`[id='${inputId}_inp']`);
    let errorElement = form.find(`[id='${inputId}']`);

    if (!errorElement.length){
        let inputName = getFormRepeaterInputName(errorKey);
        errorInput = form.find(`.form-control[name='${inputName}']`);
        console.log(errorInput);
        errorElement = errorInput.siblings('.invalid-feedback');
    }
    errorInput.removeClass('is-valid')
    errorInput.addClass('is-invalid')

    return errorElement
}

function getFormRepeaterInputName(errorKey){
    let repeaterInputNameParts = errorKey.split(".");
    let formRepeaterName = repeaterInputNameParts[0];
    let repeaterInputIndex = repeaterInputNameParts[1];
    let repeaterInputName = repeaterInputNameParts[2];

    return `${formRepeaterName}[${repeaterInputIndex}][${repeaterInputName}]`;
}

function scrollToFirstErrorElement(errors) {
    let firstErrorElementId = Object.keys(errors)[0].replaceAll('.','_');
    let firstErrorElement   = document.getElementById(firstErrorElementId);

    if (!firstErrorElement || firstErrorElement == undefined){
        let inputName = getFormRepeaterInputName(Object.keys(errors)[0]);
        firstErrorElement = document.getElementsByName(inputName)[0];
    }
    setTimeout(function () {
        firstErrorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }, 100);
}

function calculatePriceAfterVat(price, tax){
    return Number(parseFloat(price + (price * (tax / 100))).toFixed(2));
}

/** click on ... to show the text in DataTables **/

let showMoreInDT = function( element ) {
    $(element).next().hide();
    $(element).next().next().show();

}

let getStatusObject = function( statusNameEn ) {
    return ordersStatuses.find( ( status ) => status['name_en'] === statusNameEn  ) ?? { "name_ar" : statusNameEn , "name_en" : statusNameEn, "color" : "#219ed4" };
}

let showHidePass = function( fieldId , showPwIcon )
{
    let passField = $("#" + fieldId);

    if ( passField.attr("type") === "password")
    {
        passField.attr("type","text");
        showPwIcon.children().eq(0).removeClass("fa-eye").addClass("fa-eye-slash");
    }
    else
    {
        passField.attr("type","password");
        showPwIcon.children().eq(0).removeClass("fa-eye-slash").addClass("fa-eye");
    }

}

let blockUi = function(id) {
    /** block container ui **/
    KTApp.block(id, {
        overlayColor: '#000000',
        state: 'danger',
        message: translate('Please wait ...'),
    });
}

let unBlockUi = function(id, timer = 0) {
    /** unblock container ui **/
    setTimeout(function() {
        KTApp.unblock(id);
    }, timer);
}

/** Begin :: System Alerts  **/

let deleteAlert = function(elementName = translate("item") , ) {
    return Swal.fire({
        text: `${translate('Are you sure you want to delete this') + ' ' + elementName + ' ' + translate('?') + ' ' + translate('All data related to this') + ' ' + elementName + ' ' + translate('will be deleted') }`,
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: translate('Yes, Delete !'),
        cancelButtonText: translate('No, Cancel'),
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-active-light-primary"
        }
    })
}

let errorAlert = function(message = translate("something went wrong"), time = 5000) {
    return Swal.fire({
        text: translate(message),
        icon: "error",
        buttonsStyling: false,
        showConfirmButton: false,
        timer: time,
        customClass: {
            confirmButton: "btn fw-bold btn-primary",
        }
    });
}

let successAlert = function(message = translate("Operation done successfully") , timer = 2000) {

    return Swal.fire({
        text: message,
        icon: "success",
        buttonsStyling: false,
        showConfirmButton: false,
        timer: timer
    });

}

let inputAlert = function() {

    return Swal.fire({
        icon:'warning',
        title: translate('write a comment'),
        html: '<input id="swal-input1" class="form-control">',
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonColor:'#1E1E2D',
        cancelButtonColor:'#c61919',
        confirmButtonText: `<span> ${ translate('change')} </span>`,
        cancelButtonText: `<span> ${translate('cancel')} </span>`,
        preConfirm: () => {
            return [
                document.getElementById('swal-input1').value,
            ]
        },
    });

}

let changeStatusAlert = function(type = "change") {

    if(type == 'date')
    {
        return Swal.fire({
            icon:'warning',
            title: translate('Pick new date'),
            html: '<input type="date" required id="swal-input1" class="form-control">',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonColor:'#1E1E2D',
            cancelButtonColor:'#c61919',
            confirmButtonText: `<span> ${ translate('change')} </span>`,
            cancelButtonText: `<span> ${translate('cancel')} </span>`,
            preConfirm: () => {
                return [
                    document.getElementById('swal-input1').value,
                ]
            },
        });
    }

    return Swal.fire({
        icon:'warning',
        title: translate('change order status'),
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonColor:'#1E1E2D',
        cancelButtonColor:'#c61919',
        confirmButtonText: `<span> ${ translate('change')} </span>`,
        cancelButtonText: `<span> ${translate('cancel')} </span>`,

    });

}


let warningAlert = function(title , message , time = 5000) {
    return swal.fire({
        title: translate(title),
        text: translate(message),
        icon: "warning",
        showConfirmButton: false,
        timer: time
    });
}

let unauthorizedAlert   = function() {
    return swal.fire({
        title: translate("Error !"),
        text: translate("This action is unauthorized."),
        icon: "error",
        showConfirmButton: false,
        timer: 5000,
    });
}

let loadingAlert  = function(message = translate("Loading...") ) {

    return  Swal.fire({
        text: message,
        icon: "info",
        buttonsStyling: false,
        showConfirmButton: false,
        timer: 2000
    });

}

let getImagePathFromDirectory = function(directory, imageName) {
    return imagesBasePath + '/' + directory + '/' + imageName;
}

/** End :: System Alerts  **/

let initTinyMc = function( editingInp = false, height = 400 ) {

    tinymce.init({
        height,
        selector: ".tinymce",
        menubar: false,
        toolbar: ["styleselect",
            "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify forecolor backcolor",
            "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview | table tabledelete | tableprops tablerowprops tablecellprops  | code"],
        plugins : "advlist autolink link lists charmap print preview code save table",
        save_onsavecallback: function () { }
    });

    if ( ! editingInp )
        $('.tinymce').val(null);

}

$.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
});


function ajaxSubmission({form, successCallback, errorCallback}) {
    let formData  = new FormData( form );
    let submitBtn = $(form).find("[type=submit]");
    submitBtn.attr('disabled', true);

    $.ajax({
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        method: $(form).attr('method'),
        url: $(form).attr('action'),
        data: formData,
        enctype: 'multipart/form-data',
        processData:false,
        contentType: false,
        cache: false,
        success: successCallback,
        error: errorCallback,
        complete: function(){
            submitBtn.attr('disabled', false);
        }
    });
}

/** Start :: Submit any form in dashboard function  **/
let submitForm = (form) => {
    let submitBtn = $(form).find("[type=submit]");
    submitBtn.attr('disabled',true).attr("data-kt-indicator", "on");

    ajaxSubmission({
        form: form,
        successCallback: function (response) {
            removeValidationMessages();
            successAlert().then( () =>  window.location.replace($(form).data('redirection-url')));

            if ( $(form).data('callback-function') !== undefined )
                window[ $(form).data('callback-function') ](200 , response)

            submitBtn.attr('disabled',false).removeAttr("data-kt-indicator")
        },
        errorCallback: function (response) {
            removeValidationMessages();

            if (response.status === 422)
                displayValidationMessages(response.responseJSON.errors , $(form));
            else if (response.status === 403)
                unauthorizedAlert();
            else
                errorAlert(response.responseJSON.message , 5000 )

            if ( $(form).data('callback-function') !== undefined )
                window[ $(form).data('callback-function') ](response.status , response)
                submitBtn.attr('disabled',false)

            submitBtn.attr('disabled',false).removeAttr("data-kt-indicator")
        }
    })

}
/** End   :: Submit any form in dashboard function  **/

/** Start :: save tinymce editor function  **/
let saveTinyMceEditors = () =>
{
    return new Promise( async (resolve, reject) => {

        await  $('textarea[class="tinymce"]').each( (index,element) => tinymce.get( $(element).attr('id') ).execCommand('mceSave') )

        resolve()
    });
}
/** End   :: save tinymce editor function  **/

let toastConfig     = function(timer) {
    return Swal.mixin({
        toast: true,
        position: document.querySelector('html').getAttribute('direction') === 'ltr' ?  'top-end' : 'top-start',
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
}

let successToast    = function(message, timer = 3000) {

    const Toast = toastConfig(timer);

    return Toast.fire({
        icon: 'success',
        title: message,
    });
}

let warningToast    = function(message, timer = 1500) {

    const Toast = toastConfig(timer);

    return Toast.fire({
        icon: 'warning',
        title: message,
    });
}



$(document).ready(function () {

    /** Start :: change "price word" and "SAR WORD" translations from car components  **/
    jQuery('.currency-value').html( ' ' + translate(currency) );
    jQuery('.price-word').html( translate('Price') + ' ' );
    /** End   :: change "price word" and "SAR WORD" translations from car components  **/

    /** Start :: ajax request form  **/
    $('#submitted-form,.submitted-form,#role_form_update,#role_form_add,.ajax-form').submit( function (event) {

        event.preventDefault();

        // save tinymce editors then submit the form in resolve
        saveTinyMceEditors().then( () => submitForm( this ) );

    })
    /** End   :: ajax request form  **/

    /** Start :: handle search */
    // $("#search-inp").focus(function (e) {
    //     e.preventDefault();

    // });
    $("#search-inp").keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
            $(this).next().click();
    });
    /** End :: handle search */

    /** Start :: add || remove favorites */
        jQuery(document).on('click','.fav-btn', function (e){

            e.preventDefault();
            if(loggedIn == 1)
            {
                let favorableId            = jQuery(this).data('id');
                let favorableType          = jQuery(this).data('type');

                $.ajax({
                    url:'/add-remove-favorites',
                    method:'GET',
                    data : { favorableId, favorableType  },
                    success: (res) => {
                        let message = translate('Added to wishlist successfully !');
                        if(res.type == 'add')
                            $(this).children().eq(0).removeClass('fa fa-heart-o').addClass('fas fa-heart');
                        else
                        {
                            message = translate('Deleted from wishlist successfully !');
                            $(this).children().eq(0).removeClass('fas fa-heart').addClass('fa fa-heart-o');
                        }

                        successToast(message);

                    }
                });
            }
            else
                loginAlert();
        });
    /** End :: add || remove favorites */

    /** initialize datepicker inputs */
    // $(".datepicker").daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     minYear: 2000,
    //     locale: {
    //         format: 'YYYY-MM-DD',
    //         cancelLabel: translate('Clear'),
    //         applyLabel: translate('Apply'),
    //     },
    //     maxYear: parseInt(moment().format("YYYY"),10)
    // }).val('').on('cancel.daterangepicker', function(ev, picker) {
    //     $(this).val('').trigger('change');
    // });

    /** customizing select2 message */

    if( $('select[data-control="select2"]').length )
    {
        $('select[data-control="select2"]').select2({
            dir: locale == "ar" ? "rtl" : "ltr" ,
            // allowClear: true,
            "language": {
            "noResults": function(){ return translate("No results found"); }
            }
        })

    }


    // var ua = window.navigator.userAgent;
    // var IS_IPAD = ua.match(/iPad/i) != null,
    // IS_IPHONE = !IS_IPAD && ((ua.match(/iPhone/i) != null) || (ua.match(/iPod/i) != null)),
    // IS_IOS = IS_IPAD || IS_IPHONE,
    // IS_ANDROID = !IS_IOS && ua.match(/android/i) != null,
    // IS_MOBILE = IS_IOS || IS_ANDROID;
    // if(IS_IPAD || IS_IPHONE || IS_IOS || IS_ANDROID || IS_MOBILE){
    //     $(`.a_facebook`).on('click',function(e){
    //         e.preventDefault();
    //         try{
    //             window.location.href = $(this).attr('href');
    //             // window.location.href = `facebook://profile/100063830442436`;
    //         }catch(error){
    //             window.location.href = $(this).attr('href');
    //         }
    //     })

    //     $(`.a_whatsapp`).on('click',function(e){
    //         e.preventDefault();
    //         try{
    //             let whatsapp =  removeTrailingSlash(String($(`.a_whatsapp`).attr('href')));
    //             whatsapp = whatsapp.substring(whatsapp.lastIndexOf("/") + 1);
    //             window.location.href = `whatsapp://send?phone=${whatsapp}`
    //         }catch(error){
    //             window.location.href = $(this).attr('href');
    //         }
    //     })

    //     $(`.a_instagram`).on('click',function(e){
    //         e.preventDefault();
    //         try{
    //             let instagram =  removeTrailingSlash(String($(`.a_instagram`).attr('href')));
    //             instagram = instagram.substring(instagram.lastIndexOf("/") + 1);
    //             window.location.href = `instagram://user?username=${instagram}`
    //         }catch(error){
    //             window.location.href = $(this).attr('href');
    //         }
    //     })

    //     $(`.a_linkedin`).on('click',function(e){
    //         e.preventDefault();
    //         try{
    //             let linkedin =  removeTrailingSlash(String($(`.a_linkedin`).attr('href')));
    //             linkedin = linkedin.substring(linkedin.lastIndexOf("/") + 1);
    //             window.location.href = `linkedin://profile/company/${linkedin}`
    //         }catch(error){
    //             window.location.href = $(this).attr('href');
    //         }
    //     })

    //     $(`.a_snapchat`).on('click',function(e){
    //         e.preventDefault();
    //         try{
    //             let snapchat =  removeTrailingSlash(String($(`.a_snapchat`).attr('href')));
    //             snapchat = snapchat.substring(snapchat.lastIndexOf("/") + 1);
    //             window.location.href = `snapchat://add/${snapchat}`;
    //         }catch(error){
    //             window.location.href = $(this).attr('href');
    //         }
    //     })

    //     $(`.a_twitter`).on('click',function(e){
    //         e.preventDefault();
    //         try{
    //             let twitter =  removeTrailingSlash(String($(`.a_twitter`).attr('href')));
    //             twitter = twitter.substring(instagram.lastIndexOf("/") + 1);
    //             window.location.href = `twitter://${twitter}`;
    //         }catch(error){
    //             window.location.href = $(this).attr('href');
    //         }
    //     })
    // }

    function removeTrailingSlash(str) {
        return str.replace(/\/+$/, '');
    }

    // Lazyload For Background
    function onScrollDiv() {
        var backgrounds = document.querySelectorAll('.background-lazyload');
        for (var i=0, nb=backgrounds.length ; i <nb ; i++) {

            var background = backgrounds[i]
            var src = background.dataset.src;
            var rect = background.getBoundingClientRect();
            var isVisible = ((rect.top - window.innerHeight) < 500 && (rect.bottom) > -50 ) ? true : false ;
            if (isVisible) {
                background.style.backgroundImage =  'url("'+src+'")';
            }
        }

    }

    window.addEventListener("scroll", function() { onScrollDiv() });
    window.addEventListener("DOMContentLoaded", function() { onScrollDiv() });

    $("input[type='number']").attr('style', locale == 'ar' ? 'direction:rtl' : 'direction:ltr');

    $(".timepicker").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        locale: locale
    });

})

let loginAlert = function(){
    jQuery('#login-alert').removeClass('d-none');
    jQuery('#login-modal').modal('show');
}

let dashboardAlert = function(id){
    $(`#${id} .modal-body`).prepend(`
        <div class="alert alert-warning d-flex align-items-center w-100" role="alert" id="login-alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            ${translate("you must logout form dashboard first")}
        </div>
    `);
}

let deleteItemFromCart = function () {
    $(".delete-btn").click(function () {

        $(".delete-btn").attr('disabled',true);
        let item_id = $(this).data('id');
        let table = $(this).data('table');
        Swal.fire({
            text: `${translate('Are you sure you want to remove this item from your cart ?')}`,
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: translate('Yes, Delete !'),
            cancelButtonText: translate('No, Cancel'),
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then(function (result) {
            if (result.value) {

                $.ajax({
                    type: "POST",
                    url: "/remove-from-cart",
                    data: {
                        item_id,
                        table
                    },
                    success: function (response) {
                        successToast(translate("Item removed from cart successfully !"));
                        $(".cart-btn").children().eq(0).html(parseInt($(".cart-btn").children().eq(0).html()) - 1);
                        window.location.reload();
                        // $(".cart-btn").trigger('click');

                    }
                });


            } else if (result.dismiss === 'cancel') {
                warningToast( translate('was not deleted !') )
            }
            $(".delete-btn").attr('disabled',false);
        });
    });
}

// Lazyload For Background
window.addEventListener("scroll", function() { onScrollDiv() });
window.addEventListener("DOMContentLoaded", function() { onScrollDiv() });

function onScrollDiv() {
    var backgrounds = document.querySelectorAll('.background-lazyload');
    for (var i=0, nb=backgrounds.length ; i <nb ; i++) {

        var background = backgrounds[i]
        var src = background.dataset.src;
        var rect = background.getBoundingClientRect();
        var isVisible = ((rect.top - window.innerHeight) < 500 && (rect.bottom) > -50 ) ? true : false ;

        if (isVisible) {
            background.setAttribute('style', `background-image: url("${src}") !important;background-size:contain;background-repeat:no-repeat;`);
        }
    }

}

function toEnglishNumber(x) {
    return x.replace(/[\u0660-\u0669\u06f0-\u06f9]/g, c => c.charCodeAt(0) & 0xf);
}

$(`input[type="tel"]`).on('input',function(){
    $(this).val(toEnglishNumber($(this).val()));
})
$(`input[type="number"]`).on('input',function(){
    $(this).val(toEnglishNumber($(this).val()));
})


function playNotificationSound() {
    if (notificationSoundOn)
        playSound($("#notification-sound"))
}

// function playSuccessSound() {
//     playSound($("#success-sound"))
// }

// function playErrorSound() {
//     playSound($("#error-sound"))
// }

function playSound(soundElement) {

    if(soundStatus != 'stop'){
        try {
            soundElement.trigger('play');
        } catch (error) {
            console.log(error);
        }
    }

}
