@extends('partials.dashboard.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/wizard' . ( isArabic() ? '.rtl' : '' ) . '.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .separator-dashed{ border-color:#e4e6ef !important; }
        .modal .modal-body {
            overflow-y: auto;
            max-height: 500px;
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

                                    <input type="hidden" name="is_duplicate" value="{{ request()->segment(4) === "duplicate" }}"/>

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
                                                        <option value="{{ $brand->id }}" {{ $car->brand_id == $brand->id ? 'selected' : '' }}> {{ $brand->name }} </option>
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
                                                        <option value="{{ $year }}" {{ $car->year == $year ? 'selected' : '' }}> {{ $year }} </option>
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
                                                            'checked' => $car['status'] == '1',
                                                        ],
                                                        [
                                                            'label' => 'No',
                                                            'value' => '0',
                                                            'id' => 'status_no',
                                                            'checked' => $car['status'] == '0',
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
                                        <!--begin::Form group-->
                                        <div class="form-group">
                                            <!-- begin :: Row -->
                                            <div class="form-group row mb-10">
                                                <div class="col-md-12 fv-row d-flex justify-content-evenly">

                                                    <div class="d-flex flex-column">
                                                        <!-- begin :: Upload image component -->
                                                        <label class="text-center fw-bold mb-4">{{ __("Main image") }}</label>
                                                        <x-dashboard.upload-image-inp name="main_image" :image="$car->main_image" directory="Cars" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                                                        <p class="invalid-feedback" id="main_image" ></p>
                                                        <!-- end   :: Upload image component -->
                                                    </div>

                                                    {{-- <div class="d-flex flex-column">
                                                        <!-- begin :: Upload image component -->
                                                        <label class="text-center fw-bold mb-4">{{ __("Cover image") }}</label>
                                                        <x-dashboard.upload-image-inp name="cover_image" :image="null" :directory="null" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                                                        <p class="invalid-feedback" id="cover_image" ></p>
                                                        <!-- end   :: Upload image component -->
                                                    </div> --}}

                                                    {{-- <div class="d-flex flex-column">
                                                        <!-- begin :: Upload image component -->
                                                        <label class="text-center fw-bold mb-4">{{ __("Share cover") }}</label>
                                                        <x-dashboard.upload-image-inp name="share_image" :image="null" :directory="null" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                                                        <p class="invalid-feedback" id="share_image" ></p>
                                                        <!-- end   :: Upload image component -->
                                                    </div> --}}

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
                                                        <input type="text" class="form-control" id="sub_model_ar_inp" value="{{ $car->sub_model_ar }}" name="sub_model_ar" placeholder="example" />
                                                        <label
                                                            for="sub_model_ar_inp">{{ __('Enter the sub model') }}</label>
                                                    </div>
                                                    <p class="invalid-feedback" id="sub_model_ar"></p>


                                                </div>
                                                <!-- end   :: Column -->

                                                <!-- begin :: Column -->
                                                <div class="col-md-3 fv-row">

                                                    <label
                                                        class="fs-5 fw-bold mb-2">{{ __('Sub model in english') }}</label>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="sub_model_en_inp" value="{{ $car->sub_model_en }}" name="sub_model_en"
                                                            placeholder="example" />
                                                        <label
                                                            for="sub_model_en_inp">{{ __('Enter the sub model') }}</label>
                                                    </div>
                                                    <p class="invalid-feedback" id="sub_model_en"></p>


                                                </div>
                                                <!-- end   :: Column -->

                                                <!-- begin :: Column -->
                                                <div class="col-md-3 fv-row">

                                                    <label
                                                        class="fs-5 fw-bold mb-2">{{ __('Price') }}</label>
                                                    <div class="form-floating">
                                                        <input type="number" min="1"
                                                            class="form-control" id="price_inp" value="{{ $car->price }}" name="price"
                                                            placeholder="example" />
                                                        <label
                                                            for="price_inp">{{ __('Enter the price') }}</label>
                                                    </div>
                                                    <p class="invalid-feedback" id="price"></p>


                                                </div>
                                                <!-- end   :: Column -->

                                                <!-- begin :: Column -->
                                                <div class="col-md-3 fv-row">

                                                    <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                                                        <label
                                                            class="fs-5 fw-bold">{{ __('Discount price') }}</label>
                                                        <input class="form-check-input mx-2"
                                                            style="height: 18px;width:36px;" type="checkbox"
                                                            name="have_discount" {{ $car['have_discount'] ? 'checked' : '' }} id="discount-price-switch" />
                                                        <label class="form-check-label"
                                                            for="flexSwitchChecked"></label>
                                                    </div>

                                                    <div class="form-floating">
                                                        <input type="number" min="1"
                                                            class="form-control" id="discount_price_inp"
                                                            name="discount_price" value="{{ $car['discount_price'] }}" {{ $car['have_discount'] ? '' : 'disabled' }}
                                                            placeholder="example" />
                                                        <label
                                                            for="discount_price_inp">{{ __('Enter the discount price') }}</label>
                                                    </div>
                                                    <p class="invalid-feedback" id="discount_price">
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
                                                            <span class="required">{{__('Price field on the website')}}</span>
                                                        </label>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!-- end   :: Heading -->

                                                    <div class="d-flex justify-content-between align-items-center">

                                                        <!-- begin :: Radio group -->
                                                        <div class="btn-group w-100 w-lg-50" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">

                                                            <!-- begin :: Radio -->
                                                            <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary {{ $car['price_field_status'] == 'show' ? 'active' : '' }}" data-kt-button="true">
                                                                <!-- begin :: Input -->
                                                                <input class="btn-check price-filed-radio" type="radio" name="price_field_status" value="show"  {{ $car['price_field_status'] == 'show' ? 'checked' : '' }} />
                                                                <!-- end   :: Input -->
                                                                <span>{{ __("show price") }}</span>
                                                            </label>
                                                            <!-- end   :: Radio -->

                                                            <!-- begin :: Radio -->
                                                            <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary {{ $car['price_field_status'] == 'competitive_price' ? 'active' : '' }}" data-kt-button="true">
                                                                <!-- begin :: Input -->
                                                                <input class="btn-check price-filed-radio" type="radio" name="price_field_status" value="competitive_price" {{ $car['price_field_status'] == 'competitive_price' ? 'checked' : '' }} />
                                                                <!-- end   :: Input -->
                                                                <span>{{ __("competitive price") }}</span>
                                                            </label>
                                                            <!-- end   :: Radio -->

                                                            <!-- begin :: Radio -->
                                                            <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary {{ $car['price_field_status'] == 'unavailable' ? 'active' : '' }}" data-kt-button="true">
                                                                <!-- begin :: Input -->
                                                                <input class="btn-check price-filed-radio" type="radio" name="price_field_status" value="unavailable" {{ $car['price_field_status'] == 'unavailable' ? 'checked' : '' }} />
                                                                <!-- end   :: Input -->
                                                                <span>{{ __("unavailable") }}</span>
                                                            </label>
                                                            <!-- end   :: Radio -->

                                                            <!-- begin :: Radio -->
                                                            <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary {{ $car['price_field_status'] == 'available_on_request' ? 'active' : '' }}" data-kt-button="true">
                                                                <!-- begin :: Input -->
                                                                <input class="btn-check price-filed-radio" type="radio" name="price_field_status" value="available_on_request" {{ $car['price_field_status'] == 'available_on_request' ? 'checked' : '' }} />
                                                                <!-- end   :: Input -->
                                                                <span>{{ __("available on request") }}</span>
                                                            </label>
                                                            <!-- end   :: Radio -->

                                                            <!-- begin :: Radio -->
                                                            <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary {{ $car['price_field_status'] == 'other' ? 'active' : '' }}" data-kt-button="true">
                                                                <!-- begin :: Input -->
                                                                <input class="btn-check price-filed-radio" type="radio" id="other-radio-btn" name="price_field_status" value="other" {{ $car['price_field_status'] == 'other' ? 'checked' : '' }} />
                                                                <!-- end   :: Input -->
                                                                <span>{{ __("other") }}</span>
                                                            </label>
                                                            <!-- end   :: Radio -->
                                                        </div>
                                                        <!-- end   :: Radio group -->
                                                        <div class="m-0 d-flex" id="price-field-val" > @if( $car['price_field_status'] == 'show')  {!! $car['price_field_value'] !!} @else {{ __($car['price_field_value'])}} @endif </div>
                                                    </div>

                                                    <p class="invalid-feedback" id="price_field_status" ></p>

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
                                                                    <input class="form-check-input" type="radio" value="front_wheel" name="traction_type" {{ $car['traction_type'] == 'front_wheel' ? 'checked' : '' }}  id="traction_type_radio_1" />
                                                                    <label class="form-check-label" for="traction_type_radio_1">
                                                                        {{ __("Front-wheel drive") }}
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-custom form-check-solid mx-4">
                                                                    <input class="form-check-input" type="radio" value="rear_wheel" name="traction_type" {{ $car['traction_type'] == 'rear_wheel' ? 'checked' : '' }}  id="traction_type_radio_2" />
                                                                    <label class="form-check-label" for="traction_type_radio_2">
                                                                        {{ __("Rear-wheel drive") }}
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-custom form-check-solid mx-4">
                                                                    <input class="form-check-input" type="radio" value="4_by_4" name="traction_type" {{ $car['traction_type'] == '4_by_4' ? 'checked' : '' }}  id="traction_type_radio_3" />
                                                                    <label class="form-check-label" for="traction_type_radio_3">
                                                                        {{ __("4x4") }}
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-custom form-check-solid mx-4">
                                                                    <input class="form-check-input" type="radio" value="continuous_4_by_4" name="traction_type" {{ $car['traction_type'] == 'continuous_4_by_4' ? 'checked' : '' }}  id="traction_type_radio_4" />
                                                                    <label class="form-check-label" for="traction_type_radio_4">
                                                                        {{ __("continuous 4x4") }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-danger invalid-feedback" id="traction_type"></p>


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
                                                                    <input class="form-check-input" type="radio" value="auto" name="Motion_vector" {{ $car['Motion_vector'] == 'auto' ? 'checked' : '' }} id="Motion_vector_radio_1" />
                                                                    <label class="form-check-label" for="Motion_vector_radio_1">
                                                                        {{ __("Auto") }}
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-custom form-check-solid mx-4">
                                                                    <input class="form-check-input" type="radio" value="manual" name="Motion_vector" {{ $car['Motion_vector'] == 'manual' ? 'checked' : '' }} id="Motion_vector_radio_2" />
                                                                    <label class="form-check-label" for="Motion_vector_radio_2">
                                                                        {{ __("Manual") }}
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-custom form-check-solid mx-4">
                                                                    <input class="form-check-input" type="radio" value="tiptronic" name="Motion_vector" {{ $car['Motion_vector'] == 'tiptronic' ? 'checked' : '' }} id="Motion_vector_radio_3" />
                                                                    <label class="form-check-label" for="Motion_vector_radio_3">
                                                                        {{ __("Tiptronic") }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-danger invalid-feedback" id="Motion_vector"></p>
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
                                                                    <input class="form-check-input" type="radio" value="velvet" name="upholstered_seats" {{ $car['upholstered_seats'] == 'velvet' ? 'checked' : '' }} id="upholstered_seats_1" />
                                                                    <label class="form-check-label" for="upholstered_seats_1">
                                                                        {{ __("velvet") }}
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-custom form-check-solid mx-4">
                                                                    <input class="form-check-input" type="radio" value="leather" name="upholstered_seats" {{ $car['upholstered_seats'] == 'leather' ? 'checked' : '' }} id="upholstered_seats_2" />
                                                                    <label class="form-check-label" for="upholstered_seats_2">
                                                                        {{ __("leather") }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-danger invalid-feedback" id="upholstered_seats"></p>
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
                                                                    <input class="form-check-input" type="radio" value="sedan" name="car_style" {{ $car['car_style'] == 'sedan' ? 'checked' : '' }} id="car_style_1" />
                                                                    <label class="form-check-label" for="car_style_1">
                                                                        {{ __("sedan") }}
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-custom form-check-solid mx-4">
                                                                    <input class="form-check-input" type="radio" value="commercial" name="car_style" {{ $car['car_style'] == 'commercial' ? 'checked' : '' }} id="car_style_2" />
                                                                    <label class="form-check-label" for="car_style_2">
                                                                        {{ __("commercial") }}
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-custom form-check-solid mx-4">
                                                                    <input class="form-check-input" type="radio" value="multi" name="car_style" {{ $car['car_style'] == 'multi' ? 'checked' : '' }} id="car_style_3" />
                                                                    <label class="form-check-label" for="car_style_3">
                                                                        {{ __("multi") }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-danger invalid-feedback" id="car_style"></p>
                                                </div>
                                                <!-- end   :: Column -->

                                            </div>
                                            <!-- end   :: Row -->

                                            <div class="separator separator-dashed my-4"></div>

                                            <!-- begin :: Row -->
                                            <div class="form-group row mb-10">

                                                <!-- begin :: Column -->
                                                <div class="col-md-6 fv-row">

                                                    <label
                                                        class="fs-5 fw-bold mb-2">{{ __('Engine type') }}</label>
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control"
                                                            id="engine_type_inp" value="{{ $car->engine_type }}" name="engine_type"
                                                            placeholder="example" />
                                                        <label
                                                            for="engine_type_inp">{{ __('Enter the type of engine') }}</label>
                                                    </div>
                                                    <p class="invalid-feedback" id="engine_type"></p>


                                                </div>
                                                <!-- end   :: Column -->

                                                <!-- begin :: Column -->
                                                <div class="col-md-6 fv-row">

                                                    <label
                                                        class="fs-5 fw-bold mb-2">{{ __('fuel consumption in liters') }}</label>
                                                    <div class="form-floating">
                                                        <input type="number" min="1"
                                                            class="form-control" id="fuel_consumption_inp" value="{{ $car->fuel_consumption }}" name="fuel_consumption" placeholder="example" />
                                                        <label
                                                            for="fuel_consumption_inp">{{ __('Enter the car fuel consumption in liters') }}</label>
                                                    </div>
                                                    <p class="invalid-feedback" id="fuel_consumption">
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
                                                            id="maximum_force_inp" value="{{ $car->maximum_force }}" name="maximum_force"
                                                            placeholder="example" />
                                                        <label
                                                            for="maximum_force_inp">{{ __('Enter the maximum force of the car') }}</label>
                                                    </div>

                                                    <p class="invalid-feedback" id="maximum_force"></p>

                                                </div>
                                                <!-- end   :: Column -->

                                                <!-- begin :: Column -->
                                                <div class="col-md-6 fv-row">

                                                    <label
                                                        class="fs-5 fw-bold mb-2">{{ __('Number of seats') }}</label>
                                                    <div class="form-floating">
                                                        <input type="number" min="1"
                                                            class="form-control" id="seats_number_inp" value="{{ $car->seats_number }}" name="seats_number" placeholder="example" />
                                                        <label
                                                            for="seats_number_inp">{{ __('Enter the number of car seats') }}</label>
                                                    </div>
                                                    <p class="invalid-feedback" id="seats_number"></p>


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
                                                    <textarea class="form-control" name="description_ar" rows="3">{{ $car->description_ar }}</textarea>
                                                    <p class="text-danger invalid-feedback"
                                                        id="description_ar"></p>


                                                </div>
                                                <!-- end   :: Column -->

                                                <!-- begin :: Column -->
                                                <div class="col-md-6 fv-row">

                                                    <label
                                                        class="fs-5 fw-bold mb-2">{{ __('Description in english') }}</label>
                                                    <textarea class="form-control" name="description_en" rows="3">{{ $car->description_en }}</textarea>
                                                    <p class="text-danger error-element"
                                                        id="description_en"></p>

                                                </div>
                                                <!-- end   :: Column -->

                                            </div>
                                            <!-- end   :: Row -->

                                            <!-- begin :: Row -->
                                            <div class="form-group row mb-10">
                                                <!-- begin :: Column -->
                                                <div class="col-md-12 fv-row">
                                                    <label
                                                        class="fs-5 fw-bold mb-2">{{ __('Colors') }}</label>

                                                    <select class="form-select" data-control="select2" id="colors-sp" multiple data-placeholder="{{ __("Choose the color") }}" data-background-color="#000" name="colors[]" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->id }}">
                                                                {{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="invalid-feedback" id="colors"></p>
                                                </div>
                                                <!-- end   :: Column -->
                                            </div>
                                            <!-- end   :: Row -->
                                        </div>
                                        <!--end::Form group-->

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
                                                                    <input type="text" class="form-control" id="other_text_ar_inp" name="other_text_ar" value="{{ $car->priceOtherText('ar') }}" placeholder="example"/>
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
                                                                    <input type="text" class="form-control" id="other_text_en_inp" name="other_text_en" value="{{ $car->priceOtherText('en') }}" placeholder="example"/>
                                                                    <label for="other_text_en">{{ __("Enter the price field text in english") }}</label>
                                                                </div>
                                                                <p class="invalid-feedback" id="other_text_en" ></p>


                                                            </div>
                                                            <!-- end   :: Column -->



                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __("Close") }}</button>
                                                        <button type="button" class="btn btn-primary" id="price-other-text-btn">{{ __("Save changes") }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end     :: Other price modal -->

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
    <script src="{{ asset('dashboard-assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
        let carId               = "{{ $car->id }}";
        let carColorsIds        = @json($car->colors->pluck('id'));
        let colors              = @json($colors);
        let brands              = @json($brands);
        let selectedModelId     = "{{ $car['model_id'] }}";
        let isDuplicating       = "{{ request()->segment(4) === "duplicate" }}"
    </script>
    <script src="{{asset('js/dashboard/forms/cars/edit.js')}}"></script>
    <script src="{{asset('js/dashboard/components/wizard.js')}}"></script>
    <script>

        $(document).ready( () => {

            brandsSp.trigger('change',selectedModelId); // trigger brand selectpicker

            initializeColorsSp(); // draw colors containers with their images
            initTinyMc({ editingInp : true });

        });

    </script>
@endpush
