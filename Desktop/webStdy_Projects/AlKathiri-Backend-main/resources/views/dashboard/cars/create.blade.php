@extends('partials.dashboard.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/wizard' . (isArabic() ? '.rtl' : '') . '.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        .separator-dashed {
            border-color: #e4e6ef !important;
        }
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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a
                        href="{{ route('dashboard.cars.index') }}"
                        class="text-muted text-hover-primary">{{ __('Cars') }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __('Add new car') }}

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
            <div class="wizard wizard-4">

                <!-- begin :: Wizard Nav -->
                <div class="wizard-nav">
                    <div class="wizard-steps">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current" data-index="0">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">1</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">{{ __('Basic information') }}</div>
                                    <div class="wizard-desc">{{ __('Add car basic information') }}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-index="1">
                            <div class="wizard-wrapper">
                                <div class="wizard-number">2</div>
                                <div class="wizard-label">
                                    <div class="wizard-title">{{ __('Variations') }}</div>
                                    <div class="wizard-desc">{{ __('Add car variations') }}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                    </div>
                </div>
                <!-- end   :: Wizard Nav -->

                <!-- begin :: Wizard Body -->
                <div class="card card-custom card-shadowless rounded-top-0">

                    <div class="card-body p-0">

                        <div class="row justify-content-center pt-8">
                            <div class="col-xl-12">

                                <!-- begin :: Wizard Form -->
                                <form class="form mt-0 mt-lg-10" id="submitted-form">

                                    <!-- begin :: Wizard Step 1 -->
                                    <div class="p-8 wizard-step" data-wizard-type="step-content">

                                        <!-- begin :: Row -->
                                        <div class="row mb-10">

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __('Brand') }}</label>
                                                <select class="form-select" data-control="select2" name="brand_id"
                                                    id="brand-sp" data-placeholder="{{ __('Choose the brand') }}"
                                                    data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option value="" selected></option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                                    @endforeach
                                                </select>
                                                <p class="invalid-feedback" id="brand_id"></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __('Main model') }}</label>
                                                <select disabled class="form-select" data-control="select2" name="model_id"
                                                    id="model-sp" data-placeholder="{{ __('Choose the main model') }}"
                                                    data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option value="" selected></option>

                                                </select>
                                                <p class="invalid-feedback" id="model_id"></p>


                                            </div>
                                            <!-- end   :: Column -->

                                            <!-- begin :: Column -->
                                            <div class="col-md-4 fv-row">

                                                <label class="fs-5 fw-bold mb-2">{{ __('Year') }}</label>

                                                <select class="form-select" data-control="select2" name="year"
                                                    data-placeholder="{{ __('Choose the year') }}"
                                                    data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option value="" selected></option>
                                                    @for ($year = Date('Y') + 1; $year >= 1800; $year--)
                                                        <option value="{{ $year }}"> {{ $year }} </option>
                                                    @endfor
                                                </select>
                                                <p class="invalid-feedback" id="year"></p>


                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                        <!-- begin :: Row -->
                                        <div class="row">

                                            <!-- begin :: Column -->
                                            <div class="col-md-12 fv-row">

                                                <x-dashboard.radio-btn title="Publish car" name="status"
                                                    :radio-btns="[
                                                        [
                                                            'label' => 'Yes',
                                                            'value' => '1',
                                                            'id' => 'status_yes',
                                                            'checked' => false,
                                                        ],
                                                        [
                                                            'label' => 'No',
                                                            'value' => '0',
                                                            'id' => 'status_no',
                                                            'checked' => false,
                                                        ],
                                                    ]" />

                                            </div>
                                            <!-- end   :: Column -->

                                        </div>
                                        <!-- end   :: Row -->

                                    </div>
                                    <!-- end   :: Wizard Step 1 -->

                                    <!-- begin :: Wizard Step 2 -->
                                    <div class="p-8 wizard-step d-none" data-wizard-type="step-content" data-wizard-state="current">

                                        <!--begin::Repeater-->
                                        <div id="kt_docs_repeater_advanced">
                                            <!--begin::Form group-->
                                            <div class="form-group">
                                                <div data-repeater-list="cars">
                                                    <div data-repeater-item>

                                                        <!-- begin :: Row -->
                                                        <div class="form-group row mb-10">
                                                            <div class="col-md-12 fv-row d-flex justify-content-evenly">
                                                                <div class="d-flex flex-column">
                                                                    <!-- begin :: Upload image component -->
                                                                    <label class="text-center fw-bold mb-4">{{ __("Main image") }}</label>
                                                                    <x-dashboard.upload-image-inp name="main_image" :image="null" :directory="null" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                                                                    <!-- end   :: Upload image component -->
                                                                    <p class="invalid-feedback" id="cars_0_main_image"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <!-- begin :: Row -->
                                                        <div class=" row mb-10">


                                                            <!-- begin :: Column -->
                                                            <div class="col-md-3 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Sub model in arabic') }}</label>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="cars_0_sub_model_ar_inp" name="sub_model_ar"
                                                                        placeholder="example" />
                                                                    <label
                                                                        for="cars_0_sub_model_ar_inp">{{ __('Enter the sub model') }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="cars_0_sub_model_ar"></p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-3 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Sub model in english') }}</label>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" id="cars_0_sub_model_en_inp" name="sub_model_en"
                                                                        placeholder="example" />
                                                                    <label
                                                                        for="cars_0_sub_model_en_inp">{{ __('Enter the sub model') }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="cars_0_sub_model_en"></p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-3 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Price') }}</label>
                                                                <div class="form-floating">
                                                                    <input type="number" min="1"
                                                                        class="form-control" id="cars_0_price_inp" name="price"
                                                                        placeholder="example" />
                                                                    <label
                                                                        for="cars_0_price_inp">{{ __('Enter the price') }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="cars_0_price"></p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-3 fv-row">

                                                                <div
                                                                    class="form-check form-switch form-check-custom form-check-solid mb-2">
                                                                    <label
                                                                        class="fs-5 fw-bold">{{ __('Discount price') }}</label>
                                                                    <input class="form-check-input mx-2 discount-price-switch"
                                                                        style="height: 18px;width:36px;" type="checkbox"
                                                                        name="have_discount" id="discount-price-switch" />
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchChecked"></label>
                                                                </div>

                                                                <div class="form-floating">
                                                                    <input type="number" min="1"
                                                                        class="form-control discount_price" id="cars_0_discount_price_inp"
                                                                        name="discount_price" disabled
                                                                        placeholder="example" />
                                                                    <label
                                                                        for="cars_0_discount_price_inp">{{ __('Enter the discount price') }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="cars_0_discount_price">
                                                                </p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <!-- begin :: Row -->
                                                        <div class="form-group row mb-10">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-12 fv-row">

                                                                <!-- begin :: Heading -->
                                                                <div class="mb-3">
                                                                    <!--begin::Label-->
                                                                    <label class="d-flex align-items-center fs-5 fw-bold">
                                                                        <span
                                                                            class="required">{{ __('Price field on the website') }}</span>
                                                                    </label>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!-- end   :: Heading -->


                                                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                                                    <!--begin::Radio group-->
                                                                    <div class="nav-group nav-group-fluid">
                                                                        <!--begin::Option-->
                                                                        <label>
                                                                            <input type="radio" class="btn-check show-price-radio-btn"
                                                                                checked name="price_field_status"
                                                                                value="show" />
                                                                            <span
                                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">{{ __('show price') }}</span>
                                                                        </label>
                                                                        <!--end::Option-->
                                                                        <!--begin::Option-->
                                                                        <label>
                                                                            <input type="radio" class="btn-check competitive-price-radio-btn"
                                                                                name="price_field_status"
                                                                                value="competitive_price" />
                                                                            <span
                                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">{{ __('competitive price') }}</span>
                                                                        </label>
                                                                        <!--end::Option-->
                                                                        <!--begin::Option-->
                                                                        <label>
                                                                            <input type="radio" class="btn-check unavailable-radio-btn"
                                                                                name="price_field_status"
                                                                                value="unavailable" />
                                                                            <span
                                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">{{ __('unavailable') }}</span>
                                                                        </label>
                                                                        <!--end::Option-->
                                                                        <!--begin::Option-->
                                                                        <label>
                                                                            <input type="radio" class="btn-check available-radio-btn"
                                                                                name="price_field_status"
                                                                                value="available_on_request" />
                                                                            <span
                                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">{{ __('available on request') }}</span>
                                                                        </label>
                                                                        <!--end::Option-->
                                                                        <!--begin::Option-->
                                                                        <label>
                                                                            <input type="radio"
                                                                                class="btn-check other-radio-btn"
                                                                                name="price_field_status"
                                                                                value="other" />
                                                                            <span
                                                                                class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">{{ __('other') }}</span>
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Radio group-->
                                                                </div>

                                                                <p class="invalid-feedback"
                                                                    id="cars_0_price_field_status"></p>

                                                                <!-- begin :: Row -->
                                                                <div class="form-group row mb-10 mt-10 other_text_container"
                                                                    style="display: none !important">

                                                                    <!-- begin :: Column -->
                                                                    <div class="col-md-6 fv-row">

                                                                        <label
                                                                            class="fs-5 fw-bold mb-2">{{ __('Text in arabic') }}</label>

                                                                        <div class="form-floating">
                                                                            <input type="text"
                                                                                class="form-control other_text_ar_inp"
                                                                                id="other_text_ar_inp"
                                                                                name="other_text_ar"
                                                                                placeholder="example" />
                                                                            <label
                                                                                for="other_text_ar_inp">{{ __('Enter the price field text in arabic') }}</label>
                                                                        </div>

                                                                        <p class="invalid-feedback" id="cars_0_other_text_ar">
                                                                        </p>

                                                                    </div>
                                                                    <!-- end   :: Column -->

                                                                    <!-- begin :: Column -->
                                                                    <div class="col-md-6 fv-row">

                                                                        <label
                                                                            class="fs-5 fw-bold mb-2">{{ __('Text in english') }}</label>
                                                                        <div class="form-floating">
                                                                            <input type="text"
                                                                                class="form-control other_text_en_inp"
                                                                                id="other_text_en_inp"
                                                                                name="other_text_en"
                                                                                placeholder="example" />
                                                                            <label
                                                                                for="other_text_en">{{ __('Enter the price field text in english') }}</label>
                                                                        </div>
                                                                        <p class="invalid-feedback" id="cars_0_other_text_en">
                                                                        </p>


                                                                    </div>
                                                                    <!-- end   :: Column -->

                                                                </div>
                                                                <!-- end   :: Row -->

                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <div class="separator separator-dashed my-4"></div>

                                                        <!-- begin :: Row -->
                                                        <div class="row">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-12 fv-row">

                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label fs-5 fw-bold"><i class="bi bi-dash-lg fs-8 mx-3"></i>{{ __("traction type") }}</label>
                                                                    <div class="col-8 col-form-label">
                                                                        <div class="radio-inline  d-flex justify-content-start">
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="front_wheel" name="traction_type" id="traction_type_radio_1" />
                                                                                <label class="form-check-label" for="traction_type_radio_1">
                                                                                    {{ __("Front-wheel drive") }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="rear_wheel" name="traction_type" id="traction_type_radio_2" />
                                                                                <label class="form-check-label" for="traction_type_radio_2">
                                                                                    {{ __("Rear-wheel drive") }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="4_by_4" name="traction_type" id="traction_type_radio_3" />
                                                                                <label class="form-check-label" for="traction_type_radio_3">
                                                                                    {{ __("4x4") }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="continuous_4_by_4" name="traction_type" id="traction_type_radio_4" />
                                                                                <label class="form-check-label" for="traction_type_radio_4">
                                                                                    {{ __("continuous 4x4") }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="text-danger invalid-feedback" id="cars_0_traction_type"></p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <div class="separator separator-dashed my-4"></div>

                                                        <!-- begin :: Row -->
                                                        <div class="row">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-12 fv-row">
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label fs-5 fw-bold"><i class="bi bi-dash-lg fs-8 mx-3"></i>{{ __("Motion vector") }}</label>
                                                                    <div class="col-8 col-form-label">
                                                                        <div class="radio-inline  d-flex justify-content-start">
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="auto" name="Motion_vector" id="Motion_vector_radio_1" />
                                                                                <label class="form-check-label" for="Motion_vector_radio_1">
                                                                                    {{ __("Auto") }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="manual" name="Motion_vector" id="Motion_vector_radio_2" />
                                                                                <label class="form-check-label" for="Motion_vector_radio_2">
                                                                                    {{ __("Manual") }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="tiptronic" name="Motion_vector" id="Motion_vector_radio_3" />
                                                                                <label class="form-check-label" for="Motion_vector_radio_3">
                                                                                    {{ __("Tiptronic") }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="text-danger invalid-feedback" id="cars_0_Motion_vector"></p>
                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <div class="separator separator-dashed my-4"></div>

                                                        <!-- begin :: Row -->
                                                        <div class="row">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-12 fv-row">
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label fs-5 fw-bold"><i class="bi bi-dash-lg fs-8 mx-3"></i>{{ __("Seat upholstery") }}</label>
                                                                    <div class="col-8 col-form-label">
                                                                        <div class="radio-inline  d-flex justify-content-start">
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="velvet" name="upholstered_seats" id="upholstered_seats_1" />
                                                                                <label class="form-check-label" for="upholstered_seats_1">
                                                                                    {{ __("velvet") }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="leather" name="upholstered_seats" id="upholstered_seats_2" />
                                                                                <label class="form-check-label" for="upholstered_seats_2">
                                                                                    {{ __("leather") }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="text-danger invalid-feedback" id="cars_0_upholstered_seats"></p>
                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <div class="separator separator-dashed my-4"></div>

                                                        <!-- begin :: Row -->
                                                        <div class="row">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-12 fv-row">
                                                                <div class="form-group row">
                                                                    <label class="col-4 col-form-label fs-5 fw-bold"><i class="bi bi-dash-lg fs-8 mx-3"></i>{{ __("car style") }}</label>
                                                                    <div class="col-8 col-form-label">
                                                                        <div class="radio-inline  d-flex justify-content-start">
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="sedan" name="car_style" id="car_style_1" />
                                                                                <label class="form-check-label" for="car_style_1">
                                                                                    {{ __("sedan") }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="commercial" name="car_style" id="car_style_2" />
                                                                                <label class="form-check-label" for="car_style_2">
                                                                                    {{ __("commercial") }}
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-custom form-check-solid mx-4">
                                                                                <input class="form-check-input" type="radio" value="multi" name="car_style" id="car_style_3" />
                                                                                <label class="form-check-label" for="car_style_3">
                                                                                    {{ __("multi") }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="text-danger invalid-feedback" id="cars_0_car_style"></p>
                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <div class="separator separator-dashed my-4"></div>

                                                        <!-- begin :: Row -->
                                                        <div class="form-group row mb-10">

                                                            <!-- begin :: Column -->
                                                            {{-- <div class="col-md-4 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Number of kilometers') }}</label>
                                                                <div class="form-floating">
                                                                    <input type="number" min="1"
                                                                        class="form-control" id="kilometers_inp"
                                                                        name="kilometers" placeholder="example" />
                                                                    <label
                                                                        for="kilometers_inp">{{ __('Enter the kilometers') }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="cars_0_kilometers"></p>


                                                            </div> --}}
                                                            <!-- end   :: Column -->

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-6 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Engine type') }}</label>
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        id="cars_0_engine_type_inp" name="engine_type"
                                                                        placeholder="example" />
                                                                    <label
                                                                        for="cars_0_engine_type_inp">{{ __('Enter the type of engine') }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="cars_0_engine_type"></p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-6 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('fuel consumption in liters') }}</label>
                                                                <div class="form-floating">
                                                                    <input type="number" min="1"
                                                                        class="form-control" id="cars_0_fuel_consumption_inp"
                                                                        name="fuel_consumption" placeholder="example" />
                                                                    <label
                                                                        for="cars_0_fuel_consumption_inp">{{ __('Enter the car fuel consumption in liters') }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="cars_0_fuel_consumption">
                                                                </p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <!-- begin :: Row -->
                                                        <div class="form-group row mb-10">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-6 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('maximum force') }}</label>

                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        id="cars_0_maximum_force_inp" name="maximum_force"
                                                                        placeholder="example" />
                                                                    <label
                                                                        for="cars_0_maximum_force_inp">{{ __('Enter the maximum force of the car') }}</label>
                                                                </div>

                                                                <p class="invalid-feedback" id="cars_0_maximum_force"></p>

                                                            </div>
                                                            <!-- end   :: Column -->

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-6 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Number of seats') }}</label>
                                                                <div class="form-floating">
                                                                    <input type="number" min="1"
                                                                        class="form-control" id="cars_0_seats_number_inp"
                                                                        name="seats_number" placeholder="example" />
                                                                    <label
                                                                        for="cars_0_seats_number_inp">{{ __('Enter the number of car seats') }}</label>
                                                                </div>
                                                                <p class="text-danger invalid-feedback"
                                                                    id="cars_0_seats_number"></p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <!-- begin :: Row -->
                                                        <div class="form-group row mb-10">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-6 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Description in arabic') }}</label>
                                                                <textarea class="form-control" name="description_ar" id="cars_0_description_ar_inp" rows="3"></textarea>
                                                                <p class="text-danger invalid-feedback"
                                                                    id="cars_0_description_ar"></p>


                                                            </div>
                                                            <!-- end   :: Column -->

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-6 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Description in english') }}</label>
                                                                <textarea class="form-control" name="description_en" id="cars_0_description_en_inp" rows="3"></textarea>
                                                                <p class="text-danger invalid-feedback"
                                                                    id="cars_0_description_en"></p>

                                                            </div>
                                                            <!-- end   :: Column -->

                                                        </div>
                                                        <!-- end   :: Row -->

                                                        <!-- begin :: Row -->
                                                        <div class="form-group row mb-10">

                                                            <!-- begin :: Column -->
                                                            <div class="col-md-8 fv-row">

                                                                <label
                                                                    class="fs-5 fw-bold mb-2">{{ __('Colors') }}</label>

                                                                <select class="form-select" data-kt-repeater="select2"
                                                                    multiple
                                                                    data-placeholder="{{ __('Choose the color') }}"
                                                                    data-background-color="#000"
                                                                    data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}"
                                                                    name="colors">
                                                                    @foreach ($colors as $color)
                                                                        <option value="{{ $color->id }}">
                                                                            {{ $color->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <p class="invalid-feedback" id="cars_0_colors"></p>

                                                            </div>
                                                            <!-- end   :: Column -->

                                                            <div class="col-md-4">
                                                                <a href="javascript:;" data-repeater-delete
                                                                    class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                    <i class="fa fa-trash fs-5"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span><span
                                                                            class="path4"></span><span
                                                                            class="path5"></span></i>
                                                                    {{ __('delete') }}
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <!-- end   :: Row -->

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Form group-->

                                            <!--begin::Form group-->
                                            <div class="form-group">
                                                <a href="javascript:;" data-repeater-create
                                                    class="btn btn-flex btn-light-primary">
                                                    <i class="fa fa-plus fs-3"></i>
                                                    {{ __('Add') }}
                                                </a>
                                            </div>
                                            <!--end::Form group-->

                                        </div>
                                        <!--end::Repeater-->
                                    </div>
                                    <!-- end   :: Wizard Step 2 -->

                                    <!-- begin :: Wizard Actions -->
                                    <div class="d-flex justify-content-between border-top py-10 px-10">
                                        <div class="mr-2">
                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4 step-btn d-none"
                                                id="prev-btn" data-btn-type="prev">{{ __('Previous') }}</button>
                                        </div>
                                        <div>

                                            <button type="button"
                                                class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4 step-btn"
                                                id="next-btn" data-btn-type="next">

                                                <span class="indicator-label">{{ __('Next') }}</span>

                                                <!-- begin :: Indicator -->
                                                <span class="indicator-progress">{{ __('Please wait ...') }}
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
    <script src="{{ asset('dashboard-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
        let colors = @json($colors);
        let brands = @json($brands);

        $(document).ready(() => {

            initTinyMc();
            fireRadioButtonsEvents();

            $('#kt_docs_repeater_advanced').repeater({
                initEmpty: false,
                isFirstItemUndeletable: true,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function() {
                    $(this).slideDown();

                    // Re-init select2
                    renameValidationElements()
                    $(this).find('[data-kt-repeater="select2"]').select2();

                    $('.show-price-radio-btn').prop('checked', true);

                    fireRadioButtonsEvents();

                    initTinyMc();

                    var item = $(this);
                    item.find('.image-input').each(function () {
                        initializeImageInput(this);
                    });

                    $('.discount-price-switch').on('click', function() {
                        enableDiscountEvent(this)
                    });
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    renameValidationElements()
                },

                ready: function() {
                    // Init select2
                    $('[data-kt-repeater="select2"]').select2();
                }


            });

        })

        function enableDiscountEvent(btn)
        {
            var isChecked = $(btn).prop('checked');
            var inputField = $(btn).closest('[data-repeater-item]').find('.discount_price');

            if (isChecked) {
                inputField.prop('disabled', false);
            } else {
                inputField.prop('disabled', true);
            }
        }

        // Initialize KTImageInput for each input element
        function initializeImageInput(input)
        {
            new KTImageInput(input);
        }

        function radioBtnClickEvent(btn)
        {
            var divToShow = $(btn).parents(".fv-plugins-icon-container").siblings(".other_text_container");

            if ($(btn).val() === 'other') {
                divToShow.fadeIn();
            } else {
                divToShow.fadeOut();
            }
        }

        function fireRadioButtonsEvents()
        {
            $('.show-price-radio-btn').on('click', function() {
                radioBtnClickEvent(this)
            });

            $('.available-radio-btn').on('click', function() {
                radioBtnClickEvent(this)
            });

            $('.unavailable-radio-btn').on('click', function() {
                radioBtnClickEvent(this)
            });

            $('.competitive-price-radio-btn').on('click', function() {
                radioBtnClickEvent(this)
            });

            $('.available-radio-btn').on('click', function() {
                radioBtnClickEvent(this)
            });

            $('.other-radio-btn').on('click', function() {
                radioBtnClickEvent(this)
            });
        }

        function renameValidationElements() {
            let validationElements = $("#kt_docs_repeater_advanced .invalid-feedback");

            for( let i = 0; i < validationElements.length/19 ; i++ )
            {
                for (let k = 19*i; k < validationElements.length * ( 19 * (i + 1) / validationElements.length ) ; k++ )
                {

                    let newInpName = `cars_${ i }` + validationElements.eq(k).attr('id').substring( getPosition(validationElements.eq(k).attr('id'), '_', 2) )
                    validationElements.eq(k).attr('id' , newInpName);

                }
            }

            let inputElements = $("input[id$=_inp]");
            for( let i = 0; i < inputElements.length/10 ; i++ )
            {
                for (let k = 10*i; k < inputElements.length * ( 10 * (i + 1) / inputElements.length ) ; k++ )
                {

                    let newInpName = `cars_${ i }` + inputElements.eq(k).attr('id').substring( getPosition(inputElements.eq(k).attr('id'), '_', 2) )
                    inputElements.eq(k).attr('id' , newInpName);

                }
            }

        }

        function getPosition(string, subString, index) {
            return string.split(subString, index).join(subString).length;
        }


    </script>
    <script src="{{ asset('js/dashboard/forms/cars/create.js') }}"></script>
    <script src="{{ asset('js/dashboard/components/wizard.js') }}"></script>
@endpush
