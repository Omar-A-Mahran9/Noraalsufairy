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
                        {{ __("Edit funding organization") }}
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
            <form action="{{ route('dashboard.funding-organizations.update',$fundingOrganization->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.funding-organizations.index') }}">
            @csrf
            @method("PUT")

            <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <div class="card-title">
                        <h3 class="fw-bolder text-dark">{{ __("Edit funding organization") . ' : ' . $fundingOrganization->name }}</h3>
                    </div>
                    <div class="card-title">

                        <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                            <label class="fs-5 fw-bold mx-4">{{ __("status") }}</label>
                            <input class="form-check-input mx-2" style="height: 18px;width:36px;" type="checkbox" name="status" @if( $fundingOrganization['status'] ) checked @endif   />
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
                                <x-dashboard.upload-image-inp name="image" :image="$fundingOrganization->image" directory="FundingOrganizations" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
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

                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_ar_inp" name="name_ar" value="{{ $fundingOrganization['name_ar'] }}" placeholder="example"/>
                                <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
                            </div>

                            <p class="invalid-feedback" id="name_ar" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Name in english") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_en_inp" name="name_en" value="{{ $fundingOrganization['name_en'] }}" placeholder="example"/>
                                <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
                            </div>

                            <p class="invalid-feedback" id="name_en" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->


                    <!-- begin :: Row -->
                    <div class="row mb-10">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Offer in arabic") }}</label>
                            <textarea id="tinymce_offer_ar" name="offer_ar" class="tinymce">{!! $fundingOrganization['offer_ar'] !!}</textarea>
                            <p class="invalid-feedback" id="offer_ar"></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Offer in english") }}</label>
                            <textarea id="tinymce_offer_en" name="offer_en" class="tinymce">{!! $fundingOrganization['offer_en'] !!}</textarea>
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

            initTinyMc(true); 

        });

    </script>
@endpush

