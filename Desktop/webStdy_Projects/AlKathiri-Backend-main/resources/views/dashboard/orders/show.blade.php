@extends('partials.dashboard.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.orders.index') }}"
                    class="text-muted text-hover-primary">{{ __("Orders") }}</a></h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->

                <!-- begin :: Breadcrumb -->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!-- begin :: Item -->
                    <li class="breadcrumb-item text-muted">
                        {{ __("Order data") }}
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
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_sales_order_summary">{{ __('Order Summary') }}</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_sales_order_history">{{ __('Order History') }}</a>
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->


            <div class="w-200px">
                <!--begin::Select2-->
                <select class="form-select" data-control="select2" data-hide-search="false" id="order-status-sp" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}" data-placeholder="{{ __("Status") }}" >
                    @foreach( $statuses as $status)
                        <option value="{{ $status['id'] }}" {{ $status['id'] == $order['status_id'] ? 'selected' : '' }}>{{ $status['name'] }}</option>
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
                        <h2>{{ __('Order Details') }} ( #{{ $order['id'] }} )</h2>
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
                                <td class="fw-bolder text-end">{{ date('Y-m-d', strtotime($order['created_at'])) }}</td>
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
                                <td class="fw-bolder text-end">{{ date('H:i a', strtotime($order['created_at'])) }}</td>
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
                                            <i class="fa fa-user"></i> {{ $order['name'] ? __("Customer") : __('Dedicated Employee') }}
                                        </span>
                                    </div>
                                </td>
                                <td class="fw-bolder text-end">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <!--begin::Name-->
                                        <a href="" class="text-gray-600 text-hover-primary">{{ $order['name'] ?? $order['organization_ceo'] }}</a>
                                        <!--end::Name-->
                                    </div>
                                </td>
                            </tr>
                            <!--end::Customer name-->
                            <!--begin::Date-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon-->
                                        <span class="svg-icon svg-icon-2 me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z" fill="black" />
                                                <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        {{ __("Phone") }}
                                    </div>
                                </td>
                                <td class="fw-bolder text-end">{{ $order['phone'] }}</td>
                            </tr>
                            <!--end::Date-->
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
                @if($order['type'] == "individual")
                    <div class="d-flex flex-column gap-7 gap-lg-10">

                        <!--begin::Product List-->
                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __("Order") }} #{{ $order['id'] . ' ' }} </h2>
                                </div>
                                <div class="card-title">
                                    <h2>{{ __("Order Type") . ' : ' }} {{ __( ucfirst( $order['type'] )) . ' ' }} </h2>
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
                                                <td class="fw-boldest" >{{ __("The selected vehicle") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order->car->name  }}</td>
                                            </tr>
                                        <tr>
                                            <td class="fw-boldest">{{ __('Order Type') }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ __( str_replace( '_', ' ', $order['type'] )) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest">{{ __('Payment Type') }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ __( ucfirst( $order['payment_type'] )) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest">{{ __('Price field status') }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ __($order->car->price_field_status) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest">{{ __('Price') }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order['price'] . ' ' . currency()}}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest">{{ __('Ordered Services') }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order->services->pluck('name')->join(', ') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest" >{{ __("City") }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order->city->name  }}</td>
                                        </tr>
                                        @if ( $order['payment_type'] == "finance" )
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Age") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['age'] . ' ' . __('Years') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Work") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['work'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Salary") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['salary'] . ' ' . currency() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Bank") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['bank']['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Commitments") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['commitments'] . ' ' . currency() }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Is there a mortgage loan") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['having_loan'] ? __('Yes') : __('No') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Is there a personal loan") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['having_personal_loan'] ? __('Yes') : __('No') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Finance duration") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['finance_duration'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Financing community") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order->fundingOrganization ? $order->fundingOrganization->name : ($order->fundingBank ? $order->fundingBank->name : __('No Results Found')) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Sector") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ __($order['sector']) }}</td>
                                            </tr>

                                            @if ($order->id_and_driving_license)
                                                <tr>
                                                    <td class="fw-boldest" >{{ __("id and driving license") }}</td>
                                                    <td colspan="3"></td>
                                                    <td class="text-end fw-boldest">
                                                        <a class="d-block overlay" style="height:56px;" data-fslightbox="lightbox-basic" href="{{ getImagePathFromDirectory($order->id_and_driving_license, 'Orders') }}">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded" style="height:56px;border-radius:4px;margin:auto;background-image:url('{{ getImagePathFromDirectory($order->id_and_driving_license, 'Orders') }}');background-size:contain;">
                                                            </div>
                                                            <!--end::Image-->

                                                            <!--begin::Action-->
                                                            <div style="width:56px;margin: auto;" class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                            </div>
                                                            <!--end::Action-->
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($order->salary_identification)
                                                <tr>
                                                    <td class="fw-boldest" >{{ __("salary identification") }}</td>
                                                    <td colspan="3"></td>
                                                    <td class="text-end fw-boldest">
                                                        <a class="d-block overlay" style="height:56px;" data-fslightbox="lightbox-basic" href="{{ getImagePathFromDirectory($order->salary_identification, 'Orders') }}">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded" style="height:56px;border-radius:4px;margin:auto;background-image:url('{{ getImagePathFromDirectory($order->salary_identification, 'Orders') }}');background-size:contain;">
                                                            </div>
                                                            <!--end::Image-->

                                                            <!--begin::Action-->
                                                            <div style="width:56px;margin: auto;" class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                            </div>
                                                            <!--end::Action-->
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($order->insurance_print)
                                                <tr>
                                                    <td class="fw-boldest" >{{ __("insurance print") }}</td>
                                                    <td colspan="3"></td>
                                                    <td class="text-end fw-boldest">
                                                        <a class="d-block overlay" style="height:56px;" data-fslightbox="lightbox-basic" href="{{ getImagePathFromDirectory($order->insurance_print, 'Orders') }}">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded" style="height:56px;border-radius:4px;margin:auto;background-image:url('{{ getImagePathFromDirectory($order->insurance_print, 'Orders') }}');background-size:contain;">
                                                            </div>
                                                            <!--end::Image-->

                                                            <!--begin::Action-->
                                                            <div style="width:56px;margin: auto;" class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                            </div>
                                                            <!--end::Action-->
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($order->account_statement)
                                                <tr>
                                                    <td class="fw-boldest" >{{ __("account statement") }}</td>
                                                    <td colspan="3"></td>
                                                    <td class="text-end fw-boldest">
                                                        <a class="d-block overlay" style="height:56px;" data-fslightbox="lightbox-basic" href="{{ getImagePathFromDirectory($order->account_statement, 'Orders') }}">
                                                            <!--begin::Image-->
                                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded" style="height:56px;border-radius:4px;margin:auto;background-image:url('{{ getImagePathFromDirectory($order->account_statement, 'Orders') }}');background-size:contain;">
                                                            </div>
                                                            <!--end::Image-->

                                                            <!--begin::Action-->
                                                            <div style="width:56px;margin: auto;" class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                            </div>
                                                            <!--end::Action-->
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
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
                @elseif($order['type'] == "unavailable_car")
                    <div class="d-flex flex-column gap-7 gap-lg-10">

                        <!--begin::Product List-->
                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __("Order") }} #{{ $order['id'] }}</h2>
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
                                            {{-- <tr>
                                                <td class="fw-boldest" >{{ __("Name") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("Phone") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order['phone']  }}</td>
                                            </tr> --}}
                                            <tr>
                                                <td class="fw-boldest">{{ __('Order Type') }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ __( str_replace( '_', ' ', $order['type'] )) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("The selected vehicle") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order->car_name  }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-boldest" >{{ __("City") }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $order->city_name  }}</td>
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
                @else
                    <div class="d-flex flex-column gap-7 gap-lg-10">

                        <!--begin::Product List-->
                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __("Order") }} #{{ $order['id'] }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                        <!--begin::Cars-->
                                        @foreach( $order->cars as $car)
                                            <tr>
                                                <td class="text-start fw-boldest">{{ array_key_exists('car_id', $car) ? \App\Models\Car::find($car['car_id'])->name : $car['car_name'] }}</td>
                                                <td class="text-end fw-boldest" colspan="4">{{ $car['count'] . ' ' . __('car')}}</td>
                                            </tr>
                                        @endforeach
                                        <!--end::Cars-->
                                        <tr>
                                            <td class="fw-boldest">{{ __('Order Type') }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ __( str_replace( '_', ' ', $order['type'] )) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest">{{ __('Payment Type') }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ __( ucfirst( $order['payment_type'] )) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest">{{ __('Ordered Services') }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order->services->pluck('name')->join(', ') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest" >{{ __("Organization Name") }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order['organization_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest" >{{ __("Organization Email") }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order['organization_email']  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest" >{{ __("The company's headquarter") }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order['organization_location']  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest" >{{ __("City") }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order->city->name  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest" >{{ __("Organization Activity") }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order['organization_activity']  }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-boldest" >{{ __("Organization Age") }}</td>
                                            <td class="text-end fw-boldest" colspan="4">{{ $order['organization_age'] . ' ' . __('Years') }}</td>
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
                @endif
                <!--end::Orders-->
            </div>
            <!--end::Tab pane-->
            <!--begin::Tab pane-->
            <div class="tab-pane fade" id="kt_ecommerce_sales_order_history" role="tab-panel">
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
                                    @foreach( $order->orderHistories as $record)
                                        <tr>
                                            <td>
                                                <div class="badge" style="background-color:{{ $record->status['color'] }}">{{ $record->status['name'] }}</div>
                                            </td>
                                            <td>{{ $record['comment'] ?? '-' }}</td>
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
            </div>
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
            let comment   = '';

            inputAlert().then((result) => {

                comment = result.value[0] || '';

                if ( result.isConfirmed )
                {
                    $.ajax({
                        url:"/dashboard/change-status/" + "{{ $order['id'] }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        method:'POST',
                        data:{ status_id : newStatus , comment },
                        success: ( response ) => {
                            successAlert('{{ __('status has been changed successfully') }}').then(  )
                        },
                        error: ( error ) => {
                            console.log(error)
                        },

                    });
                }

            });


        });
    </script>
    <script src="{{ asset('dashboard-assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@endpush
