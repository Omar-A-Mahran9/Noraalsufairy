@extends('partials.dashboard.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/wizard' . ( isArabic() ? '.rtl' : '' ) . '.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .separator-dashed{ border-color:#e4e6ef !important; }
    </style>
@endpush
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.cars.index') }}"
                    class="text-muted text-hover-primary">{{ __("Cars") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Add new car") }}

                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <!-- begin :: Card -->
    <div class="card">

        <div class="card-body p-0">
            <!-- begin :: Wizard -->
            <div class="wizard wizard-4" >

                <!-- begin :: Wizard Nav -->
                <div class="wizard-nav">
                    <div class="wizard-steps">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current" data-index="0">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">1</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">{{ __("Basic information") }}</div>
                                    <div class="wizard-desc">{{ __("Add car basic information") }}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-index="1" >
                            <div class="wizard-wrapper">
                                <div class="wizard-number">2</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">{{ __("Images & Colors") }}</div>
                                    <div class="wizard-desc">{{ __("Add car images and colors") }}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-index="2" >
                            <div class="wizard-wrapper">
                                <div class="wizard-number">3</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">{{ __("Description & seo") }}</div>
                                    <div class="wizard-desc">{{ __("Add car description & seo") }}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 3 Nav-->
                        <!--begin::Wizard Step 4 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-index="3" >
                            <div class="wizard-wrapper">
                                <div class="wizard-number">4</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">{{ __("Features") }}</div>
                                    <div class="wizard-desc">{{ __("Add car features") }}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 4 Nav-->
                    </div>
                </div>
                <!-- end   :: Wizard Nav -->

                <!-- begin :: Wizard Body -->
                <div class="card card-custom card-shadowless rounded-top-0">

                    <div class="card-body p-0">

                        <div class="row justify-content-center pt-8">
                            <div class="col-xl-12">

                                <!-- begin :: Wizard Form -->
                                <form class="form mt-0 mt-lg-10" id="submitted-form" >

                                    <!-- begin :: Wizard Step 1 -->
                                    <div class="p-8 wizard-step" data-wizard-type="step-content" >

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-3 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Brand") }}</label>
                                                <select class="form-select" data-control="select2" name="brand_id" id="brand-sp" data-placeholder="{{ __("Choose the brand") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option value="" selected ></option>
                                                    @foreach( $brands as $brand)
                                                        <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                                    @endforeach
                                                </select>
                                                <p class="invalid-feedback" id="brand_id" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-3 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Main model") }}</label>
                                                <select disabled class="form-select" data-control="select2" name="model_id" id="model-sp" data-placeholder="{{ __("Choose the main model") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option value="" selected ></option>

                                                </select>
                                                <p class="invalid-feedback" id="model_id" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-3 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Sub model") }}</label>
                                                <select disabled class="form-select" data-control="select2" name="sub_model_id" id="sub-model-sp" data-placeholder="{{ __("Choose the sub model") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option value="" selected ></option>

                                                </select>
                                                <p class="invalid-feedback" id="sub_model_id" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-3 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Tags") }}</label>
                                                <select class="form-select" data-control="select2" name="tags[]" multiple id="tags-sp" data-placeholder="{{ __("Choose the tags") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag['id'] }}"> {{ $tag['name'] }} </option>
                                                    @endforeach

                                                </select>

                                                <p class="invalid-feedback" id="tags" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Short description in arabic") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="card_description_ar_inp" name="card_description_ar" placeholder="example"/>
                                                    <label for="card_description_ar_inp">{{ __("Enter the short description in arabic") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="card_description_ar" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Short description in english") }}</label>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="card_description_en_inp" name="card_description_en" placeholder="example"/>
                                                    <label for="card_description_en_inp">{{ __("Enter the short description in english") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="card_description_en" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Year") }}</label>

                                                <select class="form-select" data-control="select2" name="year" data-placeholder="{{ __("Choose the year") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option value="" selected ></option>
                                                    @for( $year = Date('Y')+1 ; $year >= 1800 ; $year--)
                                                        <option value="{{ $year }}"> {{ $year }} </option>
                                                    @endfor
                                                </select>
                                                <p class="invalid-feedback" id="year" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Video url") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="video_url_inp" name="video_url" placeholder="example"/>
                                                    <label for="video_url_inp">{{ __("Enter the video url") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="video_url" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Price") }}</label>
                                                <div class="form-floating">
                                                    <input type="number" min="1" class="form-control" id="price_inp" name="price" placeholder="example"/>
                                                    <label for="price_inp">{{ __("Enter the price") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="price" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                                                    <label class="fs-5 fw-bold">{{ __("Discount price") }}</label>
                                                    <input class="form-check-input mx-2" style="height: 18px;width:36px;" type="checkbox" name="have_discount" id="discount-price-switch"  />
                                                    <label class="form-check-label" for="flexSwitchChecked"></label>
                                                </div>

                                                <div class="form-floating">
                                                    <input type="number" min="1" class="form-control" id="discount_price_inp" name="discount_price" disabled placeholder="example"/>
                                                    <label for="discount_price_inp">{{ __("Enter the discount price") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="discount_price" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <!-- begin :: Heading -->
                                                <div class="mb-3">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-5 fw-bold">
                                                        <span class="required">{{__('Price field on the website')}}</span>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!-- end   :: Heading -->

                                                <div class="d-flex justify-content-between align-items-center">

                                                    <!-- begin :: Radio group -->
                                                    <div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">

                                                        <!-- begin :: Radio -->
                                                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary active" data-kt-button="true">
                                                            <!-- begin :: Input -->
                                                            <input class="btn-check price-filed-radio" type="radio" name="price_field_status" value="show"  checked="checked" />
                                                            <!-- end   :: Input -->
                                                            <span>{{ __("show price") }}</span>
                                                        </label>
                                                        <!-- end   :: Radio -->

                                                        <!-- begin :: Radio -->
                                                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary" data-kt-button="true">
                                                            <!-- begin :: Input -->
                                                            <input class="btn-check price-filed-radio" type="radio" name="price_field_status" value="competitive_price" />
                                                            <!-- end   :: Input -->
                                                            <span>{{ __("competitive price") }}</span>
                                                        </label>
                                                        <!-- end   :: Radio -->

                                                        <!-- begin :: Radio -->
                                                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary" data-kt-button="true">
                                                            <!-- begin :: Input -->
                                                            <input class="btn-check price-filed-radio" type="radio" name="price_field_status" value="unavailable" />
                                                            <!-- end   :: Input -->
                                                            <span>{{ __("unavailable") }}</span>
                                                        </label>
                                                        <!-- end   :: Radio -->

                                                        <!-- begin :: Radio -->
                                                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary" data-kt-button="true">
                                                            <!-- begin :: Input -->
                                                            <input class="btn-check price-filed-radio" type="radio" name="price_field_status" value="available_on_request" />
                                                            <!-- end   :: Input -->
                                                            <span>{{ __("available on request") }}</span>
                                                        </label>
                                                        <!-- end   :: Radio -->

                                                        <!-- begin :: Radio -->
                                                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary" data-kt-button="true">
                                                            <!-- begin :: Input -->
                                                            <input class="btn-check price-filed-radio" type="radio" id="other-radio-btn" name="price_field_status" value="other" />
                                                            <!-- end   :: Input -->
                                                            <span>{{ __("other") }}</span>
                                                        </label>
                                                        <!-- end   :: Radio -->
                                                    </div>
                                                    <!-- end   :: Radio group -->

                                                    <h5 class="m-0" id="price-field-val" ></h5>
                                                </div>

                                                <p class="invalid-feedback" id="price_field_status" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-6 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Description in arabic") }}</label>
                                                <textarea id="tinymce_description_ar" name="description_ar" class="tinymce"></textarea>
                                                <p class="text-danger invalid-feedback" id="description_ar"></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-6 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Description in english") }}</label>
                                                <textarea id="tinymce_description_en" name="description_en" class="tinymce"></textarea>
                                                <p class="text-danger error-element" id="description_en"></p>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Tax on exhibition"
                                                    name="tax_on_exhibition"
                                                    :radio-btns="[
                                                         [ 'label' => 'Yes'  , 'value' => '1'   , 'id' => 'tax_on_exhibition_yes' , 'checked' => false],
                                                         [ 'label' => 'No'   , 'value' => '0'   , 'id' => 'tax_on_exhibition_no'  , 'checked' => false],
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Tax"
                                                    name="tax"
                                                    :radio-btns="[
                                                         [ 'label' => 'Yes'  , 'value' => '1'   , 'id' => 'tax_yes' , 'checked' => false],
                                                         [ 'label' => 'No'   , 'value' => '0'   , 'id' => 'tax_no'  , 'checked' => false],
                                                     ]"/>


                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Discounted car"
                                                    name="low_price"
                                                    :radio-btns="[
                                                         [ 'label' => 'Yes'  , 'value' => '1'   , 'id' => 'low_price_yes' , 'checked' => false],
                                                         [ 'label' => 'No'   , 'value' => '0'   , 'id' => 'low_price_no'  , 'checked' => false],
                                                     ]"/>


                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Supplier"
                                                    name="supplier"
                                                    :radio-btns="[
                                                         [ 'label' => 'Gulf'  , 'value' => 'gulf'   , 'id' => 'supplier_gulf'   , 'checked' => false ],
                                                         [ 'label' => 'Saudi' , 'value' => 'saudi'   , 'id' => 'supplier_saudi' , 'checked' => false ],
                                                     ]"/>


                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Publish car"
                                                    name="status"
                                                    :radio-btns="[
                                                         [ 'label' => 'Yes'  , 'value' => '1'   , 'id' => 'status_yes' , 'checked' => false ],
                                                         [ 'label' => 'No'   , 'value' => '0'   , 'id' => 'status_no'  , 'checked' => false ],
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Car condition"
                                                    name="is_new"
                                                    :radio-btns="[
                                                         [ 'label' => 'New'    , 'value' => '1'   , 'id' => 'is_new_used_radio_1'  , 'checked' => false],
                                                         [ 'label' => 'Used'   , 'value' => '0'   , 'id' => 'is_new_used_radio_2'  , 'checked' => false],
                                                     ]"/>


                                            </div>
                                            <div class="row d-flex align-items-center" style="display: none !important" id="kilometers-container">
                                                <div class="col-4">
                                                    <label class="col-form-label fs-5 fw-bold"><i class="bi bi-dash-lg fs-8 mx-3"></i>{{ __('Number of kilometers') }}</label>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="number" min="1" id="kilometers_inp" name="kilometers" placeholder="example">
                                                        <label for="kilometers_inp">{{ __("Enter the kilometers") }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-danger m-0 invalid-feedback" id="kilometers"></p>
                                                </div>
                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Show in home page"
                                                    name="show_in_home_page"
                                                    :radio-btns="[
                                                         [ 'label' => 'Yes'  , 'value' => '1'   , 'id' => 'show_in_home_page_yes' , 'checked' => false ],
                                                         [ 'label' => 'No'   , 'value' => '0'   , 'id' => 'show_in_home_page_no'  , 'checked' => false ],
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Available for test drive"
                                                    name="available_for_test_drive"
                                                    :radio-btns="[
                                                         [ 'label' => 'Yes'  , 'value' => '1'   , 'id' => 'available_for_test_drive_yes' , 'checked' => false ],
                                                         [ 'label' => 'No'   , 'value' => '0'   , 'id' => 'available_for_test_drive_no'  , 'checked' => false ],
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->


                                        <!-- Begin   :: Other price modal -->
                                        <div class="modal fade" tabindex="-1" id="price-other-modal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ __("Custom price field text") }}</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <span class="svg-icon svg-icon-2x"></span>
                                                        </div>
                                                        <!--end::Close-->

                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row mb-10">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-12 fv-row">

                                                                <label class="fs-5 fw-bold mb-2">{{ __("Text in arabic") }}</label>

                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="other_text_ar_inp" name="other_text_ar" placeholder="example"/>
                                                                    <label for="other_text_ar_inp">{{ __("Enter the price field text in arabic") }}</label>
                                                                </div>

                                                                <p class="invalid-feedback" id="other_text_ar" ></p>

                                                            </div>
                                                            <!-- end   :: Column -->



                                                        </div>

                                                        <div class="row mb-10">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-12 fv-row">

                                                                <label class="fs-5 fw-bold mb-2">{{ __("Text in english") }}</label>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="other_text_en_inp" name="other_text_en" placeholder="example"/>
                                                                    <label for="other_text_en">{{ __("Enter the price field text in english") }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="other_text_en" ></p>


                                                            </div>
                                                            <!-- end   :: Column -->



                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('Close')}}</button>
                                                        <button type="button" class="btn btn-primary" id="price-other-text-btn">{{__('Save changes')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end     :: Other price modal -->

                                    </div>
                                    <!-- end   :: Wizard Step 1 -->

                                    <!-- begin :: Wizard Step 2 -->
                                    <div class="p-8 wizard-step d-none" data-wizard-type="step-content" data-wizard-state="current">


                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row d-flex justify-content-evenly">

                                                <div class="d-flex flex-column">
                                                    <!-- begin :: Upload image component -->
                                                    <label class="text-center fw-bold mb-4">{{ __("Main image") }}</label>
                                                    <x-dashboard.upload-image-inp name="main_image" :image="null" :directory="null" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                                                    <p class="invalid-feedback" id="main_image" ></p>
                                                    <!-- end   :: Upload image component -->
                                                </div>

                                                <div class="d-flex flex-column">
                                                    <!-- begin :: Upload image component -->
                                                    <label class="text-center fw-bold mb-4">{{ __("Cover image") }}</label>
                                                    <x-dashboard.upload-image-inp name="cover_image" :image="null" :directory="null" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                                                    <p class="invalid-feedback" id="cover_image" ></p>
                                                    <!-- end   :: Upload image component -->
                                                </div>

                                                <div class="d-flex flex-column">
                                                    <!-- begin :: Upload image component -->
                                                    <label class="text-center fw-bold mb-4">{{ __("Share cover") }}</label>
                                                    <x-dashboard.upload-image-inp name="share_image" :image="null" :directory="null" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                                                    <p class="invalid-feedback" id="share_image" ></p>
                                                    <!-- end   :: Upload image component -->
                                                </div>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Colors") }}</label>

                                                <select class="form-select" data-control="select2" id="colors-sp" multiple data-placeholder="{{ __("Choose the color") }}" data-background-color="#000" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">

                                                    @foreach( $colors as $color)
                                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                    @endforeach

                                                </select>
                                                <p class="invalid-feedback" id="colors" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: car color component -->
                                        <div id="car-colors">

                                        </div>
                                        <!-- end   :: car color component -->


                                    </div>
                                    <!-- end   :: Wizard Step 2 -->

                                    <!-- begin :: Wizard Step 3 -->
                                    <div class="p-8 wizard-step d-none" data-wizard-type="step-content">


                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Meta tag keywords in arabic") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="meta_keywords_ar_inp" name="meta_keywords_ar" placeholder="example"/>
                                                    <label for="meta_keywords_ar_inp">{{ __("Enter the meta tag keywords in arabic") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="meta_keywords_ar" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Meta tag keywords in english") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="meta_keywords_en_inp" name="meta_keywords_en" placeholder="example"/>
                                                    <label for="meta_keywords_en_inp">{{ __("Enter the meta tag keywords in english") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="meta_keywords_en" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Meta tag description in arabic") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="meta_desc_ar_inp" name="meta_desc_ar" placeholder="example"/>
                                                    <label for="meta_desc_ar_inp">{{ __("Enter the meta tag description in arabic") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="meta_desc_ar" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Meta tag description in english") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="meta_desc_en_inp" name="meta_desc_en" placeholder="example"/>
                                                    <label for="meta_desc_en_inp">{{ __("Enter the meta tag description in english") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="meta_desc_en" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("maximum force") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="maximum_force_inp" name="maximum_force" placeholder="example"/>
                                                    <label for="maximum_force_inp">{{ __("Enter the maximum force of the car") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="maximum_force" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("determination") }}</label>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="determination_inp" name="determination" placeholder="example"/>
                                                    <label for="determination_inp">{{ __("Enter the determination") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="determination" ></p>


                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Engine Measurement") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="engine_measurement_inp" name="engine_measurement" placeholder="example"/>
                                                    <label for="engine_measurement_inp">{{ __("Enter the measurement of engine") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="engine_measurement" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Engine type") }}</label>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="engine_type_inp" name="engine_type" placeholder="example"/>
                                                    <label for="engine_type_inp">{{ __("Enter the type of engine") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="engine_type" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("valves") }}</label>
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="valves_inp" name="valves" placeholder="example"/>
                                                    <label for="valves_inp">{{ __("Enter the valves description") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="valves" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                             <!-- begin :: Column -->
                                             <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("fuel consumption in liters") }}</label>
                                                <div class="form-floating">
                                                    <input type="number" min="1" class="form-control" id="fuel_consumption_inp" name="fuel_consumption" placeholder="example"/>
                                                    <label for="fuel_consumption_inp">{{ __("Enter the car fuel consumption in liters") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="fuel_consumption" ></p>


                                            </div>
                                            <!-- end   :: Column -->


                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("wheels") }}</label>

                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="wheels_inp" name="wheels" placeholder="example"/>
                                                    <label for="wheels_inp">{{ __("Enter the wheels description") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="wheels" ></p>

                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("Number of seats") }}</label>
                                                <div class="form-floating">
                                                    <input type="number" min="1" class="form-control" id="seats_number_inp" name="seats_number" placeholder="example"/>
                                                    <label for="seats_number_inp">{{ __("Enter the number of car seats") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="seats_number" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("fuel tank capacity") }}</label>
                                                <div class="form-floating">
                                                    <input type="number" min="30" class="form-control" id="fuel_tank_capacity_inp" name="fuel_tank_capacity" placeholder="example"/>
                                                    <label for="fuel_tank_capacity_inp">{{ __("Enter the fuel tank capactiy in liters") }}</label>
                                                </div>
                                                <p class="invalid-feedback" id="fuel_tank_capacity" ></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("number of speakers") }}</label>

                                                <div class="form-floating">
                                                    <input type="number" min="1" class="form-control" id="speakers_number_inp" name="speakers_number" placeholder="example"/>
                                                    <label for="speakers_number_inp">{{ __("Enter the number of speakers") }}</label>
                                                </div>

                                                <p class="invalid-feedback" id="speakers_number" ></p>

                                            </div>
                                            <!-- end   :: Column -->


                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __("driving mode") }}</label>
                                                <select class="form-select" data-control="select2" name="driving_mode[]"  multiple data-placeholder="{{ __("Choose the driving mode") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option></option>
                                                    <option value="normal">{{ __("normal") }}</option>
                                                    <option value="sports">{{ __("sports") }}</option>
                                                    <option value="sand">{{ __("sand") }}</option>
                                                    <option value="snow">{{ __("snow") }}</option>
                                                    <option value="mud">{{ __("mud") }}</option>
                                                </select>
                                                <p class="invalid-feedback" id="driving_mode" ></p>


                                            </div>
                                            <!-- end   :: Column -->


                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="car style"
                                                    name="car_style"
                                                    :radio-btns="[
                                                         [ 'label' => 'hatchback'         , 'value' => 'hatchback'    , 'id' => 'car_style_1' , 'checked' => false],
                                                         [ 'label' => 'sedan'             , 'value' => 'sedan'        , 'id' => 'car_style_2' , 'checked' => false],
                                                         [ 'label' => '4x4'               , 'value' => '4_by_4'       , 'id' => 'car_style_3' , 'checked' => false],
                                                         [ 'label' => 'family'            , 'value' => 'family'       , 'id' => 'car_style_4' , 'checked' => false],
                                                         [ 'label' => 'commercial'        , 'value' => 'commercial'   , 'id' => 'car_style_5' , 'checked' => false],
                                                     ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->


                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="traction type"
                                                    name="traction_type"
                                                    :radio-btns="[
                                                         [ 'label' => 'Front-wheel drive' , 'value' => 'front_wheel'       , 'id' => 'traction_type_radio_1' , 'checked' => false],
                                                         [ 'label' => 'Rear-wheel drive'  , 'value' => 'rear_wheel'        , 'id' => 'traction_type_radio_2' , 'checked' => false],
                                                         [ 'label' => '4x4'               , 'value' => '4_by_4'            , 'id' => 'traction_type_radio_3' , 'checked' => false],
                                                         [ 'label' => 'continuous 4x4'    , 'value' => 'continuous_4_by_4' , 'id' => 'traction_type_radio_4' , 'checked' => false]
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Motion vector"
                                                    name="Motion_vector"
                                                    :radio-btns="[
                                                         [ 'label' => 'Auto'                    , 'value' => 'auto'          , 'id' => 'Motion_vector_radio_1' , 'checked' => false],
                                                         [ 'label' => 'Manual'                  , 'value' => 'manual'        , 'id' => 'Motion_vector_radio_2' , 'checked' => false],
                                                         [ 'label' => 'Tiptronic'               , 'value' => 'tiptronic'     , 'id' => 'Motion_vector_radio_3' , 'checked' => false],
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="turbo"
                                                    name="turbo"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'      , 'value' => 'available'     , 'id' => 'turbo_radio_1' , 'checked' => false],
                                                         [ 'label' => 'Twin-turbo'     , 'value' => 'twin_turbo'    , 'id' => 'turbo_radio_2' , 'checked' => false],
                                                         [ 'label' => 'unavailable'    , 'value' => 'unavailable'   , 'id' => 'turbo_radio_3' , 'checked' => true],
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Engine system"
                                                    name="engine_system"
                                                    :radio-btns="[
                                                         [ 'label' => 'gas'      , 'value' => 'gas'     , 'id' => 'engine_system_radio_1' , 'checked' => false],
                                                         [ 'label' => 'diesel'   , 'value' => 'diesel'  , 'id' => 'engine_system_radio_2' , 'checked' => false],
                                                         [ 'label' => 'hybrid'   , 'value' => 'hybrid'  , 'id' => 'engine_system_radio_3' , 'checked' => false],
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="steering wheel"
                                                    name="steering_wheel"
                                                    :radio-btns="[
                                                         [ 'label' => 'Electrical adjustment'     , 'value' => 'electrical_adjustment'   , 'id' => 'steering_wheel_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'               , 'value' => 'unavailable'             , 'id' => 'steering_wheel_radio_2' , 'checked' => true],
                                                     ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="EcoBoost"
                                                    name="eco_boost"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => 'available'     , 'id' => 'eco_boost_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => 'unavailable'   , 'id' => 'eco_boost_radio_2' , 'checked' => true],
                                                     ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->


                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Shifters on the steering wheel"
                                                    name="wheel_shifters"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => 'available'     , 'id' => 'wheel_shifters_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => 'unavailable'   , 'id' => 'wheel_shifters_radio_2' , 'checked' => true],
                                                     ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->


                                    </div>
                                    <!-- end   :: Wizard Step 3 -->

                                    <!-- begin :: Wizard Step 4 -->
                                    <div class="p-8 wizard-step d-none" data-wizard-type="step-content">

                                        <!-- begin :: External equipment radio btns -->

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <!-- begin :: Heading -->
                                                <div class="mb-3">
                                                    <!--begin::Label-->
                                                    <h2>{{ __("External Equipment") }}</h2>
                                                    <!--end::Label-->
                                                </div>
                                                <!-- end   :: Heading -->

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                              <x-dashboard.radio-btn
                                                    title="Bright lights during the day"
                                                    name="bright_lights_during_the_day"
                                                    :radio-btns="[
                                                         [ 'label' => 'LED'         , 'value' => 'led'         , 'id' => 'bright_lights_radio_1' , 'checked' => false],
                                                         [ 'label' => 'available'   , 'value' => 'available'   , 'id' => 'bright_lights_radio_2' , 'checked' => false],
                                                         [ 'label' => 'unavailable' , 'value' => 'unavailable' , 'id' => 'bright_lights_radio_3' , 'checked' => true],
                                               ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="fog lights"
                                                    name="fog_lights"
                                                    :radio-btns="[
                                                         [ 'label' => 'LED'         , 'value' => 'led'         , 'id' => 'fog_lights_radio_1' , 'checked' => false],
                                                         [ 'label' => 'available'   , 'value' => 'available'   , 'id' => 'fog_lights_radio_2' , 'checked' => false],
                                                         [ 'label' => 'unavailable' , 'value' => 'unavailable' , 'id' => 'fog_lights_radio_3' , 'checked' => true],
                                               ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="headlights"
                                                    name="headlights"
                                                    :radio-btns="[
                                                         [ 'label' => 'LED'       , 'value' => 'led'       , 'id' => 'headlights_radio_1'  , 'checked' => false],
                                                         [ 'label' => 'halogen'   , 'value' => 'halogen'   , 'id' => 'headlights_radio_2'  , 'checked' => false],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Smart Entry System"
                                                    name="smart_entry_system"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'smart_entry_system_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'smart_entry_system_radio_2'  , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Chrome door handles"
                                                    name="chrome_door_handles"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'chrome_door_handles_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'chrome_door_handles_radio_2'  , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Rear parking sensors"
                                                    name="rear_parking_sensors"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'rear_parking_sensors_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'rear_parking_sensors_radio_2'  , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Front parking sensors"
                                                    name="front_parking_sensors"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'front_parking_sensors_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'front_parking_sensors_2'  , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="One-touch electric sunroof"
                                                    name="one_touch_electric_sunroof"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'one_touch_electric_sunroof_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'one_touch_electric_sunroof_radio_2'  , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Electric side mirrors"
                                                    name="electrical_side_mirrors"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'electrical_side_mirrors_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'electrical_side_mirrors_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Chrome side mirrors"
                                                    name="chrome_side_mirrors"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'chrome_side_mirrors_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'chrome_side_mirrors_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="automatic trunk door"
                                                    name="automatic_trunk_door"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'automatic_trunk_door_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'automatic_trunk_door_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="LED tail lights"
                                                    name="led_backlight_lights"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'led_backlight_lights_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'led_backlight_lights_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="rear spoiler"
                                                    name="rear_suite"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'rear_suite_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'rear_suite_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="panoramic roof"
                                                    name="panorama_roof"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'panorama_roof_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'panorama_roof_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->


                                        <!-- end   :: External equipment radio btns -->


                                        <!-- begin :: Ease & comfort radio btns -->

                                        <!-- begin :: Row -->
                                        <div class="row my-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <!-- begin :: Heading -->
                                                <div class="mb-3">
                                                    <!--begin::Label-->
                                                    <h2>{{ __("Ease and comfort") }}</h2>
                                                    <!--end::Label-->
                                                </div>
                                                <!-- end   :: Heading -->

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Remote engine start"
                                                    name="remote_engine_start"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'remote_engine_start_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'remote_engine_start_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Electric hand brake"
                                                    name="electric_hand_brakes"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'electric_hand_brakes_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'electric_hand_brakes_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Air conditioning vents in the back"
                                                    name="ac_in_second_row_seats"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'ac_in_second_row_seats_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'ac_in_second_row_seats_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Engine start button"
                                                    name="engine_start_button"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'engine_start_button_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'engine_start_button_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="cruise control"
                                                    name="cruise_control"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'cruise_control_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'cruise_control_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Leather steering wheel"
                                                    name="leather_steering_wheel"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'leather_steering_wheel_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'leather_steering_wheel_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- end   :: Ease & comfort radio btns -->


                                        <!-- begin :: Seats radio btns -->

                                        <!-- begin :: Row -->
                                        <div class="row my-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <!-- begin :: Heading -->
                                                <div class="mb-3">
                                                    <!--begin::Label-->
                                                    <h2>{{ __("Seats") }}</h2>
                                                    <!--end::Label-->
                                                </div>
                                                <!-- end   :: Heading -->

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Seat upholstery"
                                                    name="upholstered_seats"
                                                    :radio-btns="[
                                                         [ 'label' => 'velvet'     , 'value' => 'velvet'   , 'id' => 'upholstered_seats_1' , 'checked' => false],
                                                         [ 'label' => 'leather'    , 'value' => 'leather'  , 'id' => 'upholstered_seats_2' , 'checked' => false],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Driver seat adjustment"
                                                    name="driver_seat_adjustment"
                                                    :radio-btns="[
                                                         [ 'label' => 'electrical'  , 'value' => 'electrical'   , 'id' => 'driver_seat_adjustment_1' , 'checked' => false],
                                                         [ 'label' => 'Manual'      , 'value' => 'manual'   , 'id' => 'driver_seat_adjustment_2' , 'checked' => false],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Front passenger seat movement adjustment"
                                                    name="passenger_seat_movement"
                                                    :radio-btns="[
                                                         [ 'label' => 'electrical'  , 'value' => 'electrical' , 'id' => 'passenger_seat_movement_radio_1' , 'checked' => false],
                                                         [ 'label' => 'Manual'      , 'value' => 'manual'     , 'id' => 'passenger_seat_movement_radio_2' , 'checked' => false],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="heated seats"
                                                    name="heated_seats"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'heated_seats_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'heated_seats_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="airy seats"
                                                    name="airy_seats"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'airy_seats_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'airy_seats_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->


                                        <!-- end   :: Seats radio btns -->


                                        <!-- begin :: sound and communication system radio btns -->

                                        <!-- begin :: Row -->
                                        <div class="row my-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <!-- begin :: Heading -->
                                                <div class="mb-3">
                                                    <!--begin::Label-->
                                                    <h2>{{ __("Sound and communication system") }}</h2>
                                                    <!--end::Label-->
                                                </div>
                                                <!-- end   :: Heading -->

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="navigation system"
                                                    name="navigation_system"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'navigation_system_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'navigation_system_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="info screen"
                                                    name="info_screen"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'info_screen_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'info_screen_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Entertainment screen"
                                                    name="back_screen"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'back_screen_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'back_screen_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="CDs"
                                                    name="cd"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'cd_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'cd_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="bluetooth"
                                                    name="bluetooth"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'bluetooth_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'bluetooth_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="MP3/Additional input"
                                                    name="mp3"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'mp3_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'mp3_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="USB graphic interface audio system"
                                                    name="usb_audio_system"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'usb_audio_system_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'usb_audio_system_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Apple CarPlay and Android Auto"
                                                    name="apple_carplay_android_auto"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'apple_carplay_android_auto_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'apple_carplay_android_auto_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="HDMI interface"
                                                    name="hdmi"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'hdmi_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'hdmi_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Wireless charger for cell phone"
                                                    name="wireless_charger"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'wireless_charger_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'wireless_charger_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- end   :: sound and communication system radio btns -->

                                        <!-- begin :: safety radio btns -->

                                        <!-- begin :: Row -->
                                        <div class="row my-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <!-- begin :: Heading -->
                                                <div class="mb-3">
                                                    <!--begin::Label-->
                                                    <h2>{{ __("Safety") }}</h2>
                                                    <!--end::Label-->
                                                </div>
                                                <!-- end   :: Heading -->

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->


                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="front airbags (SRS)"
                                                    name="front_airbags"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'front_airbags_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'front_airbags_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="side airbags"
                                                    name="side_airbags"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'side_airbags_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'side_airbags_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Driver and front passenger knee airbags"
                                                    name="knee_airbags"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'knee_airbags_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'knee_airbags_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Side curtains"
                                                    name="side_curtains"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'side_curtains_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'side_curtains_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="vision camera (multi-angle)"
                                                    name="rear_camera"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'rear_camera_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'rear_camera_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Vehicle Stability Assist (VSA)"
                                                    name="vsa"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'vsa_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'vsa_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Anti-lock Braking System (ABS)"
                                                    name="abs"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'abs_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'abs_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Electronic Brake-force Distribution (EBD)"
                                                    name="ebd"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'ebd_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'ebd_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Emergency stop signal (ESS)"
                                                    name="ess"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'ess_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'ess_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Electronic Brake-force Assist (EBB)"
                                                    name="ebb"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'ebb_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'ebb_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Tire pressure monitoring system (TPMS)"
                                                    name="tpms"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'tpms_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'tpms_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Hill Start Assist (HSA)"
                                                    name="hsa"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'hsa_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'hsa_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Compatibility Engineering (ACE™) Chassis Architecture"
                                                    name="ace"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'ace_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'ace_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="lane control system"
                                                    name="track_control_system"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'track_control_system_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'track_control_system_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->



                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Display information on the windshield"
                                                    name="display_info_on_windshield"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'display_info_on_windshield_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'display_info_on_windshield_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->


                                        <!-- end   :: safety radio btns -->


                                        <!-- begin :: sensors radio btns -->

                                        <!-- begin :: Row -->
                                        <div class="row my-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <!-- begin :: Heading -->
                                                <div class="mb-3">
                                                    <!--begin::Label-->
                                                    <h2>{{ __("Sensors") }}</h2>
                                                    <!--end::Label-->
                                                </div>
                                                <!-- end   :: Heading -->

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Adaptive Cruise Control (ACC)"
                                                    name="acc"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'acc_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'acc_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Road Departure Mitigation System (RDM)"
                                                    name="rdm"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'rdm_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'rdm_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Forward Collision Warning (FCW)"
                                                    name="fcw"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'fcw_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'fcw_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Information about invisible points (blind spots)"
                                                    name="blind_spots"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'blind_spots_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'blind_spots_radio_2' , 'checked' => true],
                                                 ]"/>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Low Speed Relay System (LSF)"
                                                    name="lsf"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'lsf_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'lsf_radio_2' , 'checked' => true],
                                                 ]"></x-dashboard.radio-btn>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <div class="separator separator-dashed my-4"></div>

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn
                                                    title="Rear traffic alert"
                                                    name="back_traffic_alert"
                                                    :radio-btns="[
                                                         [ 'label' => 'available'     , 'value' => '1'   , 'id' => 'back_traffic_alert_radio_1' , 'checked' => false],
                                                         [ 'label' => 'unavailable'   , 'value' => '0'   , 'id' => 'back_traffic_alert_radio_2' , 'checked' => true],
                                                 ]"/>

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- end   :: sensors radio btns -->

                                    </div>
                                    <!-- end   :: Wizard Step 4 -->

                                    <!-- begin :: Wizard Actions -->
                                    <div class="d-flex justify-content-between border-top py-10 px-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4 step-btn d-none" id="prev-btn" data-btn-type="prev" >{{ __('Previous') }}</button>
                                        </div>
                                    <div>

                                    <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4 step-btn" id="next-btn" data-btn-type="next" >

                                        <span class="indicator-label">{{ __("Next") }}</span>

                                        <!-- begin :: Indicator -->
                                        <span class="indicator-progress">{{ __("Please wait ...") }}
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                        <!-- end   :: Indicator -->

                                    </button>

                                        </div>
                                    </div>
                                    <!-- end   :: Wizard Actions -->
                                </form>
                                <!-- end   :: Wizard Form -->

                            </div>
                        </div>

                    </div>

                </div>
                <!-- end   :: Wizard Body -->

            </div>
            <!-- end   :: Wizard -->
        </div>

    </div>
    <!-- end   :: Card -->



@endsection
@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>

        let colors = @json($colors);
        let brands = @json($brands);

        $(document).ready( () => {

            initTinyMc();

            $('#is_new_used_radio_1,#is_new_used_radio_2').change(function(){

                if($(this).val() == 1)
                {
                    $('#kilometers-container').attr("style", "display:none !important");
                    $('#kilometers_inp').val("");
                }
                else
                    $('#kilometers-container').css("display", "block");
            })

        })
    </script>
    <script src="{{asset('js/dashboard/forms/cars/create.js')}}"></script>
    <script src="{{asset('js/dashboard/components/wizard.js')}}"></script>
@endpush
