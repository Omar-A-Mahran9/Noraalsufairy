@extends('partials.dashboard.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.branches.index') }}" class="text-muted text-hover-primary">{{ __("Branches") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Add new branch") }}
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
            <form action="{{ route('dashboard.branches.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.branches.index') }}">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Add new branch") }}</h3>
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
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Address in arabic") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address_ar_inp" name="address_ar" placeholder="example"/>
                                <label for="address_ar_inp">{{ __("Enter the address in arabic") }}</label>
                            </div>
                            <p class="invalid-feedback" id="address_ar" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Address in english") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address_en_inp" name="address_en" placeholder="example"/>
                                <label for="address_en_inp">{{ __("Enter the address in english") }}</label>
                            </div>
                            <p class="invalid-feedback" id="address_en" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Email") }}</label>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email_inp" name="email"  placeholder="example"/>
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
                                <input type="text" class="form-control" id="phone_inp" name="phone" placeholder="example"/>
                                <label for="phone_inp">{{ __("Enter the phone") }}</label>
                            </div>
                            <p class="invalid-feedback" id="phone" ></p>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Whatsapp") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="whatsapp_inp" name="whatsapp" placeholder="example"/>
                                <label for="whatsapp_inp">{{ __("Enter the whatsapp") }}</label>
                            </div>
                            <p class="invalid-feedback" id="whatsapp" ></p>


                        </div>
                        <!-- end   :: Column -->
                        
                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("IFrame") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="frame_inp" name="frame" placeholder="example"/>
                                <label for="frame_inp">{{ '<iframe src="" ></iframe>' }}</label>
                            </div>
                            <p class="invalid-feedback" id="frame" ></p>

                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("City") }}</label>
                            <select class="form-select" data-control="select2" name="city_id" id="city-sp" data-placeholder="{{ __("Choose the city") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected ></option>
                                @foreach( $cities as $city)
                                    <option value="{{ $city['id'] }}" > {{ $city['name'] }} </option>
                                @endforeach
                            </select>
                            <p class="invalid-feedback" id="city_id" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Status") }}</label>
                            <select class="form-select" data-control="select2" name="status" id="status-sp" data-placeholder="{{ __("Choose the status") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected ></option>
                                <option value="visible"> {{ __("visible") }}</option>
                                <option value="invisible"> {{ __("invisible") }}</option>
                            </select>
                            <p class="invalid-feedback" id="status" ></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Branch type") }}</label>
                            <select class="form-select" data-control="select2" name="type" data-placeholder="{{ __("Choose branch type") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected ></option>
                                <option value="show_room"> {{ __("Show room") }}</option>
                                <option value="maintenance_center"> {{ __("Maintenance center") }}</option>
                                <option value="3s_center"> {{ __("3s center") }}</option>
                            </select>
                            <p class="invalid-feedback" id="type" ></p>
                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <div class="row mb-8">
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Time of work arabic") }}</label>
                            <textarea  name="time_of_work_ar" class="tinymce"></textarea>
                            <p class="text-danger invalid-feedback" id="time_of_work_ar"></p>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Time of work English") }}</label>
                            <textarea  name="time_of_work_en" class="tinymce"></textarea>
                            <p class="text-danger invalid-feedback" id="time_of_work_en"></p>
                        </div>
                    </div>


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
        })
    </script>
@endpush
