let modelImagesDiv     = $("#model-images");

$(document).ready( () => {
    modelImagesDiv.append
    (
        `<div class="rounded border border-3 p-5 mb-4">

            <!-- begin :: Row -->
            <div class="row text-center">

                <!-- begin :: Column -->
                <div class="col-md-12 fv-row">
                    <!-- begin :: Upload image component -->
                    <label class="text-center fw-bold mb-4 d-block">${ translate("Model images")}</label>
                    <input type="file" class="d-none" name="images[]" multiple id="images_inp">
                    <button class="btn btn-secondary m-auto" type="button" id="model_images_upload_btn" > <i class="bi bi-upload fs-8" ></i> 0 ${translate('File selected')} </button>
                    <p class="invalid-feedback w-100 text-center" id="images" ></p>
                    <!-- end   :: Upload image component -->
                </div>
                <!-- end   :: Column -->

            </div>
            <!-- end   :: Row -->

        </div>
        `
    );

    $(document).on('click',"[id*=images_upload_btn]", function () {

        $(this).prev().trigger('click');
    });

    $(document).on('change',"[id=images_inp]", function () {
        let filesNumber = $(this)[0].files.length;
        $(this).next().html(`<i class="bi bi-upload fs-8" ></i> ${ filesNumber } ${ filesNumber === 1 ? 'file' : 'files' } selected`);

    });
});
