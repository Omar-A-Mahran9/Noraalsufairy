@extends('partials.dashboard.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .ranges{ font-family:Cairo,serif!important; }
    </style>
@endpush
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div  class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode        ="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Schedules") }}</h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Schedules control") }}
                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <!-- begin :: Datatable card -->
    <div class="card mb-2">
        <form action="{{ route('dashboard.schedules.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.schedules.index') }}">
        @csrf
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700" >
            <select class="form-select form-select-solid" data-control="select2" data-placeholder="{{ __('Choose the branch') }}" name="branch_id">
                <option value="" selected></option>
                @foreach ($branches as $branch)
                    <option 
                    data-start-rest="{{$branch->start_rest}}"
                    data-end-rest="{{$branch->end_rest}}"
                    data-maintenance-time="{{$branch->maintenance_time}}" 
                    data-capacity-of-cars-per-time="{{$branch->capacity_of_cars_per_time}}"
                    @if(request()->branch_id == $branch->id) selected  @endif 
                    value="{{$branch->id}}">{{$branch->name}}</option>
                @endforeach
            </select>
        </div>
            <!-- begin :: Card Body -->
            <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700 appointmentContainr @if(count($schedules) == 0) d-none @endif " >
                <input type="hidden" name="schedules" value='@json($schedules)'>
                <div class="row mb-8">
                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-bold mb-2">{{ __("Maintenance period which contorl schedules (in minutes)") }}</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="maintenance_time_inp" name="maintenance_time" value="" placeholder="example"/>
                            <label for="maintenance_time_inp">{{ __("Enter maintenance time") }}</label>
                        </div>
                        <p class="invalid-feedback" id="maintenance_time"></p>
                    </div>
                    <!-- end   :: Column -->
                    <!-- begin :: Column -->
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-bold mb-2">{{ __("The capacity of the number of cars at the same time") }}</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="capacity_of_cars_per_time_inp" name="capacity_of_cars_per_time" value="" placeholder="example"/>
                            <label for="capacity_of_cars_per_time_inp">{{ __("Enter maintenance time") }}</label>
                        </div>
                        <p class="invalid-feedback" id="capacity_of_cars_per_time"></p>
                    </div>
                    <!-- end   :: Column -->
                </div>
                <div class="row mb-8">
                    <!-- begin :: Column -->
                    <div class="col-md-12 fv-row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="start_time_inp" class="form-label fs-6 fw-bold mb-3"><span class="required">{{__('The beginning of rest') }}</span></label>
                                    <input type="start_time" name="start_rest" value="" class="form-control form-control-lg form-control-solid timepicker" id="start_rest_inp" placeholder="{{__('from') }}" >
                                    <div class="fv-plugins-message-container invalid-feedback" id="start_rest"></div>
                                </div>
                                <div class="col-6">
                                    <label for="end_time_inp" class="form-label fs-6 fw-bold mb-3"><span class="required">{{__('The end of rest') }}</span></label>
                                <input type="end_time" name="end_rest" value="" class="form-control form-control-lg form-control-solid timepicker" id="end_rest_inp" placeholder="{{__('to') }}" >
                                <div class="fv-plugins-message-container invalid-feedback" id="end_rest"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end   :: Column -->

                </div>


                <div class="schedules">

                </div>

            </div>
            <!-- end   :: Card Body -->
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
    </div>
    <!-- end   :: Datatable card -->

@endsection
@push('scripts')
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script>
    <script src="{{asset('js/dashboard/forms/schedules/operations.js')}}"></script>

    <script>
        $(`select[name="branch_id"]`).on('change',function(){
            console.log($(this).val());
            // location.href = `{{route('dashboard.schedules.index')}}?branch_id=${$(this).val()}`;
            let maintenance_time = $(`select[name="branch_id"] option:selected`).data('maintenance-time');
            let capacity_of_cars_per_time = $(`select[name="branch_id"] option:selected`).data('capacity-of-cars-per-time');
            let start_rest = $(`select[name="branch_id"] option:selected`).data('start-rest');
            let end_rest = $(`select[name="branch_id"] option:selected`).data('end-rest');
            console.log(maintenance_time);
            console.log(capacity_of_cars_per_time);
            $.ajax({
                method: 'get',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: `{{route('dashboard.schedules.index')}}?branch_id=${$(this).val()}`,
                success: (data) => {
                    console.log(data.schedules);
                    schedules = data.schedules;
                    $('.schedules').html('')
                    generateSchedulesIfNotExist();
                    $(`input[name="maintenance_time"]`).val(maintenance_time);
                    $(`input[name="capacity_of_cars_per_time"]`).val(capacity_of_cars_per_time);
                    $(`input[name="start_rest"]`).val(start_rest);
                    $(`input[name="end_rest"]`).val(end_rest);
                    $('.appointmentContainr').removeClass('d-none');
                },
                error: (err) => {

                    if (err.hasOwnProperty('responseJSON')) {
                        if (err.responseJSON.hasOwnProperty('message')) {
                            errorAlert(err.responseJSON.message);
                        }
                    }
                }
            });
        });


    </script>
@endpush
