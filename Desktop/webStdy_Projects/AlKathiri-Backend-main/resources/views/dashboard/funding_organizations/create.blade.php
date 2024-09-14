@extends('partials.dashboard.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.funding-organizations.index') }}"
                    class="text-muted text-hover-primary">{{ __("Funding Organizations") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Add new funding organization") }}
                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <div class="card">
        <!-- begin :: Card body -->
        <div class="card-body p-0">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.funding-organizations.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.funding-organizations.index') }}" data-success-message="{{ __('funding organization has been added successfully') }}">
            @csrf
            <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title">
                        <h3 class="fw-bolder text-dark">{{ __("Add new funding organization") }}</h3>
                    </div>
                    <div class="card-title">

                        <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                            <label class="fs-5 fw-bold mx-4">{{ __("status") }}</label>
                            <input class="form-check-input mx-2" style="height: 18px;width:36px;" name="status" type="checkbox" checked  />
                            <label class="form-check-label" for="flexSwitchChecked"></label>
                        </div>

                    </div>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">

                    <!-- begin :: Row -->
                    <div class="row mb-10">

                        <!-- begin :: Column -->
                        <div class="col-md-12 fv-row d-flex justify-content-center">

                            <div class="d-flex flex-column">
                                <!-- begin :: Upload image component -->
                                <label class="text-center fw-bold mb-4">{{ __("Image") }}</label>
                                <x-dashboard.upload-image-inp name="image" :image="null" :directory="null" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                                <p class="invalid-feedback" id="image" ></p>
                                <!-- end   :: Upload image component -->
                            </div>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-10">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Name in arabic") }}</label>
                            {{-- name_ar	name_en	offer_ar	offer_en	status --}}

                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_ar_inp" name="name_ar" placeholder="example"/>
                                <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
                            </div>

                            <p class="invalid-feedback" id="name_ar" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Name in english") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_en_inp" name="name_en" placeholder="example"/>
                                <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
                            </div>

                            <p class="invalid-feedback" id="name_en" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->


                    <!-- begin :: Row -->
                    {{-- <div class="row mb-10">

                        <!-- begin :: Column -->
                        <div class="col-md-12 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Cars") }}</label>

                            <select class="form-select"  name="cars[]" multiple id="cars-sp" data-placeholder="{{ __("Choose the car") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}"  >
                                @foreach( $cars as $car)
                                    <option value="{{ $car['id'] }}" data-main-image="{{ getImagePathFromDirectory( $car['main_image'] , 'Cars') }}"> {{ $car['name'] }} </option>
                                @endforeach
                            </select>

                            <p class="invalid-feedback" id="cars" ></p>


                        </div>
                        <!-- end   :: Column -->


                    </div> --}}
                    <!-- end   :: Row -->


                    <!-- begin :: Row -->
                    <div class="row mb-10">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Offer in arabic") }}</label>
                            <textarea id="tinymce_offer_ar" name="offer_ar" class="tinymce"></textarea>
                            <p class="invalid-feedback" id="offer_ar"></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Offer in english") }}</label>
                            <textarea id="tinymce_offer_en" name="offer_en" class="tinymce"></textarea>
                            <p class="invalid-feedback" id="offer_en"></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->


                </div>
                <!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer">

                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary" id="submit-btn">

                        <span class="indicator-label">{{ __("Save") }}</span>

                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!-- end   :: Indicator -->

                    </button>
                    <!-- end   :: Submit btn -->

                </div>
                <!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection
@push('scripts')

    <script src="{{ asset('dashboard-assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>

    <script>

        $(document).ready( () => {

            initTinyMc();

        });

    </script>
@endpush
