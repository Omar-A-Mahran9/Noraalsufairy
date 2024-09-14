@extends('partials.dashboard.master')
@section('content')
    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.orders.index') }}"
                    class="text-muted text-hover-primary">{{ __("Test drive requests") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Test drive request data") }}
                    </li>
                    <!-- end   :: Item -->
                </ul>
                <!-- end   :: Breadcrumb -->

            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    <!--begin::Order details page-->
    <div class="d-flex flex-column gap-7 gap-lg-10">
        <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-lg-n2 me-auto">
                <!--begin:::Tab item-->
                {{-- <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_sales_order_summary">{{ __('Order Summary') }}</a>
                </li> --}}
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                {{-- <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_sales_order_history">{{ __('Order History') }}</a>
                </li> --}}
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->

            <span class="h3">{{ __('Order Status') }}</span>
            <div class="w-200px">
                <!--begin::Select2-->
                <select class="form-select" data-control="select2" data-hide-search="false" id="order-status-sp" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" data-placeholder="{{ __("Status") }}" >
                    @foreach( settings()->get('test_drive_statuses') as $status)
                        <option value="{{ $status['name_en'] }}" {{ $status['name_en'] == $testDriveRequest['status'] ? 'selected' : '' }} style="color: {{ $status['color'] }}">{{ $status['name_' . getLocale() ] }}</option>
                    @endforeach
                </select>
                <!--end::Select2-->
            </div>


        </div>
        <!--begin::Order summary-->
        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
            <!--begin::Order details-->
            <div class="card card-flush py-4 flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __('Order Details') }} ( #{{ $testDriveRequest['id'] }} )</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                            <!--begin::Date-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <span>
                                            <i class="fa fa-calendar mx-2"></i>
                                        </span> {{ __("Date") }}
                                    </div>
                                </td>
                                <td class="fw-bolder text-end">{{ date('Y-m-d', strtotime($testDriveRequest['created_at'])) }}</td>
                            </tr>
                            <!--end::Date-->
                            <!--begin::Time-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <span>
                                            <i class="fa fa-clock mx-2"></i>
                                        </span> {{ __("Time") }}
                                    </div>
                                </td>
                                <td class="fw-bolder text-end">{{ date('H:i a', strtotime($testDriveRequest['created_at'])) }}</td>
                            </tr>
                            <!--end::Time-->
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Order details-->
            <!--begin::Customer details-->
            <div class="card card-flush py-4 flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __("Customer Details") }}</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                            <!--begin::Customer name-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <span>
                                            <i class="fa fa-user"></i> {{ __("Customer") }}
                                        </span>
                                    </div>
                                </td>
                                <td class="fw-bolder text-end">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <!--begin::Name-->
                                        <a href="" class="text-gray-600 text-hover-primary">{{ $testDriveRequest['name'] }}</a>
                                        <!--end::Name-->
                                    </div>
                                </td>
                            </tr>
                            <!--end::Customer name-->
                            <!--begin::phone-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                        <span class="svg-icon svg-icon-2 me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z" fill="black" />
																			<path opacity="0.3" d="M19 4H5V20H19V4Z" fill="black" />
																		</svg>
																	</span>
                                        <!--end::Svg Icon-->{{ __("Phone") }}</div>
                                </td>
                                <td class="fw-bolder text-end">{{ $testDriveRequest['phone'] }}</td>
                            </tr>
                            <!--end::phone-->
                            <!--begin::email-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-at"></i>
                                        {{ __("email") }}</div>
                                </td>
                                <td class="fw-bolder text-end">{{ $testDriveRequest['email'] }}</td>
                            </tr>
                            <!--end::email-->
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Customer details-->
        </div>
        <!--end::Order summary-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                <!--begin::Orders-->
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <!--begin::Product List-->
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __("Order") }} #{{ $testDriveRequest['id'] . ' ' }} </h2>
                                    </div>
                                    <div class="card-title">
                                        <h2>{{ __("Order Type") . ' : ' }} {{ __('Test drive request') }} </h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                            <tr>
                                                <td class="text-start fw-boldest" colspan="4">{{ __('Car')}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-end align-items-center">

                                                        <!--begin::Thumbnail-->
                                                        <a href="/cars/{{ $testDriveRequest['car_id'] }}" class="symbol symbol-50px">
                                                            <span class="symbol-label" style="background-image:url({{ getImagePathFromDirectory( $testDriveRequest->car->main_image , 'Cars') }});"></span>
                                                        </a>
                                                        <!--end::Thumbnail-->
                                                        <!--begin::Title-->
                                                        <div class="ms-5">
                                                            <a href="/cars/{{ $testDriveRequest['car_id'] }}" target="_blank" class="fw-boldest text-gray-600 text-hover-primary">{{ $testDriveRequest['car_name'] }}</a>
                                                        </div>
                                                        <!--end::Title-->

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest">{{ __('Price') }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $testDriveRequest['car']['price_after_vat'] . ' ' . currency()}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Pickup date") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $testDriveRequest['date'] }}</td>
                                            </tr>
                                            </tbody>
                                            <!--end::Table head-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Product List-->
                        </div>
                <!--end::Orders-->
            </div>
            <!--end::Tab pane-->
            <!--begin::Tab pane-->
            {{-- <div class="tab-pane fade" id="kt_ecommerce_sales_order_history" role="tab-panel">
                <!--begin::Orders-->
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::Order history-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('Order History') }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle text-center table-row-dashed fs-6 gy-5 mb-0">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-70px">{{ __('Order Status') }}</th>
                                        <th class="min-w-175px">{{ __('Comment') }}</th>
                                        <th class="min-w-100px">{{ __('Employee') }}</th>
                                        <th class="min-w-100px">{{ __('Date') }}</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    @foreach( $order->statusHistory as $record)

                                    @php( $statusObj = getStatusObject( $record['status'] ))

                                        <tr>

                                            <td>
                                                <div class="badge" style="background-color:{{ $statusObj['color'] }}">{{ $statusObj['name_' . getLocale()] }}</div>
                                            </td>

                                            <td>{{ $record['comment'] }}</td>

                                            <td>{{ $record['employee']['name'] }}</td>

                                            <td>{{ date('Y-m-d', strtotime($record['created_at'])) . ' / ' . date('H:i a', strtotime($record['created_at'])) }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <!--end::Table head-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Order history-->
                </div>
                <!--end::Orders-->
            </div> --}}
            <!--end::Tab pane-->
        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Order details page-->

@endsection
@push('scripts')
    <script>
        $('#order-status-sp').change( function () {

            let newStatus = $(this).val();
            let newDate   = '';

            if(newStatus == 'test postponed')
            {
                changeStatusAlert('date').then((result) => {

                    newDate = result.value[0];

                    if ( result.isConfirmed )
                    {
                        console.log("confirmed");
                        $.ajax({
                            url:"/dashboard/test-drive-requests/" + "{{ $testDriveRequest['id'] }}",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            method:'PUT',
                            data:{ status : newStatus , newDate },
                            success: ( response ) => {
                                successAlert('{{ __('status has been changed successfully') }}').then( () => window.location.reload() )
                            },
                            error: ( error ) => {
                                if(!newDate)
                                    errorAlert('{{ __('The New date field is required') }}');
                                else
                                {
                                    today = new Date().toISOString().slice(0, 10);
                                    if(newDate < today)
                                        errorAlert('{{ __('The new date must be today or later') }}');
                                }
                            },

                        });
                    }

                });
            }
            else
            {
                changeStatusAlert().then((result) => {

                    if ( result.isConfirmed )
                    {
                        $.ajax({
                            url:"/dashboard/test-drive-requests/" + "{{ $testDriveRequest['id'] }}",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            method:'PUT',
                            data:{ status : newStatus },
                            success: ( response ) => {
                                successAlert('{{ __('status has been changed successfully') }}').then( () => window.location.reload() )
                            },
                            error: ( error ) => {
                                console.log(error)
                            },

                        });
                    }

                });
            }

        });
    </script>
@endpush
