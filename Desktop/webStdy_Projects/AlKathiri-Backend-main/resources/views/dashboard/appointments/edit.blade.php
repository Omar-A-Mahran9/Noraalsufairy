@extends('partials.dashboard.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.appointments.index') }}" class="text-muted text-hover-primary">{{ __("Maintainance Appointments") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Update appointment") }}

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
            <form action="{{ route('dashboard.appointments.update', $appointment) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.appointments.index') }}">
                @csrf
                @method('put')
                <input type="hidden" name="terms_and_privacy" value="1">
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Update appointment") }}</h3>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">
                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Name") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_inp" name="name" value="{{ $appointment->name }}" placeholder="example"/>
                                <label for="name_inp">{{ __("Enter the name in arabic") }}</label>
                            </div>
                            <p class="invalid-feedback" id="name"></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Email") }}</label>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email_inp" name="email" value="{{ $appointment->email }}" placeholder="example"/>
                                <label for="email_inp">{{ __("Enter the email") }}</label>
                            </div>
                            <p class="invalid-feedback" id="email"></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="phone" value="{{ $appointment->phone }}" placeholder="example"/>
                                <label for="phone_inp">{{ __("Enter the phone") }}</label>
                            </div>
                            <p class="invalid-feedback" id="phone"></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Maintainance type") }}</label>
                            <select class="form-select" data-control="select2" name="maintenance_type" id="maintenance_type_inp" data-placeholder="{{ __("Choose the maintenance_type") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected ></option>
                                <option value="Periodic Maintenance" {{ $appointment->maintenance_type == 'Periodic Maintenance' ? 'selected' : '' }}> {{ __('Periodic Maintenance') }} </option>
                                <option value="Guarantee" {{ $appointment->maintenance_type == 'Guarantee' ? 'selected' : '' }}> {{ __('Guarantee') }} </option>
                                <option value="Plumbing And Painting" {{ $appointment->maintenance_type == 'Plumbing And Painting' ? 'selected' : '' }}> {{ __('Plumbing And Painting') }} </option>
                                <option value="Other" {{ $appointment->maintenance_type == 'Other' ? 'selected' : '' }}> {{ __('Other') }} </option>
                            </select>
                            <p class="invalid-feedback" id="maintenance_type" ></p>
                        </div>
                        <!-- end   :: Column -->
                    </div>
                    <!-- end   :: Row -->
                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Brand") }}</label>
                            <select class="form-select" data-control="select2" name="brand_id" id="brand_id_inp" data-placeholder="{{ __("Choose the brand") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected ></option>
                                @foreach( $brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $appointment->model && $brand->id == $appointment->model->brand->id ? 'selected' : '' }}> {{ $brand->name }} </option>
                                @endforeach
                                <option value="other" {{ $appointment->model_name ? 'selected' : '' }}> {{ __('other') }} </option>
                            </select>
                            <p class="invalid-feedback" id="brand_id" ></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row model" @if($appointment->model_name) style="display: none" @endif id="modelSelectBoxContainer">
                            <label class="fs-5 fw-bold mb-2">{{ __("Model") }}</label>
                            <select class="form-select" data-control="select2" name="model_id" id="model_id_inp" data-placeholder="{{ __("Choose the model") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected></option>
                                @foreach( $carModels as $model)
                                    <option value="{{ $model->id }}" {{ $model->id == $appointment->model_id ? 'selected' : '' }}> {{ $model->name }} </option>
                                @endforeach
                            </select>
                            <p class="invalid-feedback" id="model_id"></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row" @if(!$appointment->model_name) style="display: none" @endif id="modelNameContainer">
                            <label class="fs-5 fw-bold mb-2">{{ __("Model name") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{ $appointment->model_name }}" id="model_name_inp" name="model_name" placeholder="example"/>
                                <label for="model_name_inp">{{ __("Enter the model name") }}</label>
                            </div>
                            <p class="invalid-feedback" id="model_name" ></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("City") }}</label>
                            <select class="form-select" data-control="select2" name="city_id" id="city-sp" data-placeholder="{{ __("Choose the city") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            <option value="" selected ></option>
                            @foreach( $cities as $city)
                                <option value="{{ $city->id }}" @if($appointment->city_id == $city->id) selected @endif> {{ $city->name }} </option>
                            @endforeach
                            </select>
                            <p class="invalid-feedback" id="city_id" ></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Branch") }}</label>
                            <select class="form-select" data-control="select2" name="branch_id" id="branch-sp" data-placeholder="{{ __("Choose the branch") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected ></option>
                                    @foreach( $branches as $branch)
                                    <option value="{{ $branch->id }}" @if($appointment->branch_id == $branch->id) selected @endif> {{ $branch->name }} </option>
                                @endforeach
                            </select>
                            <p class="invalid-feedback" id="branch_id" ></p>
                        </div>
                        <!-- end   :: Column -->
                    </div>
                    <!-- end   :: Row -->
                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Model year") }}</label>
                            <input class="form-control" value="{{ $appointment->model_year }}" name="model_year" type="number" min="1900" placeholder="{{ __('Choose model year') }}" id="model_year_inp"/>
                            <p class="invalid-feedback" id="model_year" ></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Date") }}</label>
                            <input class="form-control" name="date" placeholder="{{ __('choose date') }}" value="{{ $appointment->date->format('Y-m-d') }}" id="date_inp"/>
                            <p class="invalid-feedback" id="date" ></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Time") }}</label>
                            <select class="form-select" data-control="select2" name="time" id="time_inp"  data-placeholder="{{ __("Choose the time") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            </select>
                            <p class="invalid-feedback" id="time" ></p>
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Extra information about the appointment") }}</label>
                            <textarea class="form-control" name="description" id="description_inp" placeholder="{{ __('Enter description') }}" data-kt-autosize="true">{{ $appointment->description }}</textarea>
                            <p class="invalid-feedback" id="description" ></p>
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
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script>
    <script>
        // Add this script to handle the dynamic update of the model select box
        $(document).ready(function() {
            $('#brand_id_inp').change(function() {
                var brandId = $(this).val();

                // Clear existing options in the model select box
                $('#model_id_inp').empty();

                if (brandId != 'other')
                {
                    // Fetch models based on the selected brand using Ajax
                    $.ajax({
                        url: '/models/' + brandId,
                        type: 'GET',
                        success: function(data) {
                            // Populate the model select box with fetched models
                            $.each(data, function(key, model) {
                                $('#model_id_inp').append('<option value="' + model.id + '">' + model.name + '</option>');
                            });
                            $('#modelNameContainer').hide();
                            $('#modelSelectBoxContainer').show();
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error('Error fetching models: ' + textStatus);
                            $('#modelSelectBoxContainer').hide();
                            $('#modelNameContainer').hide();
                        }
                    });
                }else{
                    $('#modelSelectBoxContainer').hide();
                    $('#modelNameContainer').show();
                }
            });
        });
    </script>
    <script>
        var daysOff = @json($daysOff);
        var branchId = @json($appointment->branch_id);
        // Add this script to handle the dynamic update of the model select box
        $(document).ready(function() {
            $('#branch-sp').change(function(e) {
                e.preventDefault();
                var branchId = $(this).val();

                // Fetch branche available days using Ajax
                $.ajax({
                    url: '/dashboard/branch-available-days/' + branchId,
                    type: 'GET',
                    success: function(data) {
                        $(document).trigger("daysOffUpdated", [data, branchId]);
                    }
                });
            });
        });
        const daysOfWeek = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        let disabledDays = []
        let appointmentTime = "{{ $appointment->time->format('h:i A') }}";
        let startDate = "{{ now()->format('Y-m-d') }}";
        let endDate = "{{ now()->addMonths(2)->format('Y-m-d') }}";
    </script>
    <script src="{{ asset('js/dashboard/forms/appointments/operations.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#date_inp").trigger('change');
        });
    </script>
@endpush
