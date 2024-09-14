let modelImagesDiv        = $("#model-images");

$(document).ready( () => {

    let modelImagesCount = '( ' + modelImages.length + ' )';

    modelImagesDiv.append
    (
        `<div class="rounded border border-3 p-5 mt-5">

            <!-- begin :: Row -->
            <div class="row text-center">

                <!-- begin :: Column -->
                <div class="col-md-12 fv-row">
                    <!-- begin :: Upload image component -->
                    <label class="text-center fw-bold mb-4 d-block">${ translate("Model images")}</label>
                    <input type="file" class="d-none" name="images[]" multiple id="images_inp">
                    <button class="btn btn-secondary m-auto" type="button" id="images_upload_btn" > <i class="bi bi-upload fs-8" ></i> 0 ${ translate('File selected') } </button>
                    <p class="invalid-feedback" id="images" ></p>
                    <!-- end   :: Upload image component -->
                </div>
                <!-- end   :: Column -->

            </div>
            <!-- end   :: Row -->

        </div>`
    );

    $(document).on('click',"[id*=images_upload_btn]", function () {

        $(this).prev().trigger('click');

    });

    $(document).on('change',"[id=images_inp]", function () {

        let filesNumber = $(this)[0].files.length;
        $(this).next().html(`<i class="bi bi-upload fs-8" ></i> ${ filesNumber } ${ translate('File selected') }`);

    });

});

// let openImagesModal = () => {

//     $("#modal-title").text( translate('Model images') );

//     $("#images-container").empty();

//     if ( modelImages.length > 0)
//         $("#no-images-text").addClass('d-none');
//     else
//         $("#no-images-text").removeClass('d-none');

//     modelImages.forEach( ( image ) => {

//         let imageContainerId = cleanImageName( image ) + "-deleted-image";

//         $("#images-container").append(`

//                 <div class="col-md-3 col-12 my-4 text-center" id="${imageContainerId}">

//                 <div class="image-input image-input-outline" >

//                 <div class="image-input-wrapper w-100px h-100px" style="background-image: url('${ getImagePathFromDirectory('Cars',image)}'); background-size:contain;background-repeat:no-repeat;"></div>

//                     <!-- begin :: Delete button -->
//                     <label
//                         onclick="deleteColorImage('${selectedColorIndex}','${image}', '${type}')"
//                         class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
//                         data-kt-image-input-action="change"
//                         title="${ translate('Delete image') }">
//                         <i class="bi bi-trash-fill fs-7 text-danger"></i>
//                     </label>
//                     <!-- end   :: Delete button -->

//                 </div>
//                 <!--end::Image input-->

//                 </div>`
//         );

//     });

//     $("#edit-images-modal").modal('show');
// }

let cleanImageName = ( image ) => {
    return image.replaceAll("/", "").replaceAll(".", "").replaceAll(" ", "");
}

// let deleteColorImage = ( deletedColorIndex ,deletedImage , type) => {

//     let deletedColor = Object.create(carColors[deletedColorIndex]);

//     deletedColorsImages.push({  color_id : deletedColor['color_id'] , image:deletedImage , type}); // add the deleted image to deletedColorsImages array to use it in undo operation

//     let deletedImages               = deletedColorsImages.filter((color) => color['color_id'] == deletedColor['color_id'] ).map( obj => obj['image']);
//     let images                      = JSON.parse(deletedColor[ type + '_images']); // get the outer/inner images from the deleted color object and parse the json array
//     let filteredImages              = images.filter( ( image ) => ! deletedImages.includes(image) ); // return new outer/inner images array without the deletedImage
//     deletedColor[ type + '_images'] = JSON.stringify(filteredImages); // update the deletedColor outer/inner images array with the filtered one


//     type === "inner" ? delete deletedColor.outer_images : delete deletedColor.inner_images;

//     updatedColorsImages[ deletedColor['color_id'] ] =  { ...updatedColorsImages[ deletedColor['color_id'] ]  , ...deletedColor } // push the updated color to the updatedColorsImages array

//     $(`#${ cleanImageName( deletedImage ) }-deleted-image`).addClass('d-none'); // hide the deleted image

//     undoDeleteBtn.prop('disabled',false); // enable the undo button

//     let noElementsVisible= $(`[id*=-deleted-image]`).map(function() {  // check if all elements is invisible
//         return this.getAttribute('class');
//     }).get().every((element) => element.includes('d-none'));


//     if ( noElementsVisible ) // if all elements has d-none class so make the no images text visible
//         $("#no-images-text").removeClass('d-none');
//     else
//         $("#no-images-text").addClass('d-none');

//     if ( isDuplicating )
//     {
//         duplicatedImages[deletedColor['color_id']][type + '_images'] = duplicatedImages[deletedColor['color_id']][type + '_images'].filter( (image) => image !== deletedImage);
//     }



// }