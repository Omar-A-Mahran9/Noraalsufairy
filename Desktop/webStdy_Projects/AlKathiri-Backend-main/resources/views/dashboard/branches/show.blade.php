@extends('partials.dashboard.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.branches.index') }}"
                    class="text-muted text-hover-primary">{{ __("Branches") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Branch data") }}
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
            <form  class="form" >
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Branch") . " : " . $branch->name  }}</h3>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">


                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Name in arabic") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_ar_inp" name="name_ar" value="{{ $branch['name_ar'] }}" readonly placeholder="example"/>
                                <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
                            </div>
                            <p class="invalid-feedback" id="name_ar" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Name in english") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_en_inp" name="name_en" value="{{ $branch['name_en'] }}" readonly placeholder="example"/>
                                <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
                            </div>
                            <p class="invalid-feedback" id="name_en" ></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Address in arabic") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address_ar_inp" name="address_ar" value="{{ $branch['address_ar'] }}" readonly placeholder="example"/>
                                <label for="address_ar_inp">{{ __("Enter the address in arabic") }}</label>
                            </div>
                            <p class="invalid-feedback" id="address_ar" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Address in english") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address_en_inp" name="address_en" value="{{ $branch['address_en'] }}" readonly placeholder="example"/>
                                <label for="address_en_inp">{{ __("Enter the address in english") }}</label>
                            </div>
                            <p class="invalid-feedback" id="address_en" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Email") }}</label>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email_inp" name="email" value="{{ $branch['email'] }}" readonly placeholder="example"/>
                                <label for="email_inp">{{ __("Enter the email") }}</label>
                            </div>
                            <p class="invalid-feedback" id="email"></p>
                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("phone") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="phone" value="{{ $branch['phone'] }}" readonly placeholder="example"/>
                                <label for="phone_inp">{{ __("Enter the phone") }}</label>
                            </div>
                            <p class="invalid-feedback" id="phone" ></p>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Whatsapp") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="whatsapp_inp" name="whatsapp" value="{{ $branch['whatsapp'] }}" readonly placeholder="example"/>
                                <label for="whatsapp_inp">{{ __("Enter the whatsapp") }}</label>
                            </div>
                            <p class="invalid-feedback" id="whatsapp" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("IFrame") }}</label>
                            <input type="text" class="form-control"  value="{{ $branch['frame'] }}" readonly placeholder="example"/>
                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("City") }}</label>
                            <input type="text" class="form-control" id="whatsapp_inp" name="whatsapp" value="{{ $branch['city']['name'] }}" readonly placeholder="example"/>
                            <p class="invalid-feedback" id="city_id" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Status") }}</label>
                            <input type="text" class="form-control" id="whatsapp_inp" name="whatsapp" value="{{ __($branch['status']) }}" readonly placeholder="example"/>
                            <p class="invalid-feedback" id="status" ></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Branch type") }}</label>
                            <input type="text" class="form-control" value="{{ __(ucfirst(str_replace('_', ' ', $branch['type']))) }}" readonly placeholder="example"/>
                            <p class="invalid-feedback" id="type" ></p>
                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <div class="row mb-8">
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Time of work arabic") }}</label>
                            <textarea  name="time_of_work_ar" class="tinymce">{{ $branch->time_of_work_ar }}</textarea>
                            <p class="text-danger invalid-feedback" id="time_of_work_ar"></p>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Time of work English") }}</label>
                            <textarea  name="time_of_work_en" class="tinymce">{{ $branch->time_of_work_en }}</textarea>
                            <p class="text-danger invalid-feedback" id="time_of_work_en"></p>
                        </div>
                    </div>

                </div>
                <!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer">

                    <!-- begin :: Submit btn -->
                    <a href="{{ route('dashboard.branches.index') }}" class="btn btn-primary" >
                        <span class="indicator-label">{{ __("Back") }}</span>
                    </a>
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
            tinymce.init({
                selector: ".tinymce",
                menubar: false,
                toolbar: ["styleselect save",
                    "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify forecolor backcolor",
                    "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
                plugins : "advlist autolink link lists charmap print preview code save",
                save_onsavecallback: function () { },
                readonly : 1
            });
        })
    </script>
@endpush
