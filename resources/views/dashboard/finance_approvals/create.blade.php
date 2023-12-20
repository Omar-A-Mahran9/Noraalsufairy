@extends('partials.dashboard.master')
@section('content')

<!-- begin :: Subheader -->
<div class="toolbar">

    <div class="container-fluid d-flex flex-stack">

        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

            <!-- begin :: Title -->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.finance-approvals.index') }}" class="text-muted text-hover-primary">{{ __("Finance approvals") }}</a></h1>
            <!-- end   :: Title -->

            <!-- begin :: Separator -->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!-- end   :: Separator -->

            <!-- begin :: Breadcrumb -->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!-- begin :: Item -->
                <li class="breadcrumb-item text-muted">
                    {{ __("Add new finance approval") }}
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

        <!-- begin :: Card header -->
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="card-title">
                <h3 class="fw-bolder text-dark">{{ __("Add new finance approval") }}</h3>
            </div>
            <div class="card-title" style="display:none" id="other_order_id">

                <div class="form-check form-check-custom form-check-solid mx-4">
                    <!-- begin :: Submit btn -->
                    <button onclick="order_again()" class="btn btn-primary">
                        <span class="indicator-label">{{ __("Enter order number") }}</span>
                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!-- end   :: Indicator -->

                    </button>
                </div>

            </div>
        </div>
        <!-- end   :: Card header -->

        <!-- begin :: Inputs wrapper -->
        <div class="inputs-wrapper">

            <!-- begin :: Row -->
            <div class="row mb-10" id="order-id">

                <!-- begin :: Column -->
                <div class="col-md-5 fv-row" style="margin: auto;">

                    <label class="fs-5 fw-bold mb-2">{{ __("Order number") }}</label>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="order_id" name="order_id" placeholder="example" require>
                        <label for="name_en_inp">{{ __("Enter the order number") }}</label>
                    </div>
                    <p class="invalid-feedback" id="order_id"></p>
                    <div style="margin-top: 10px;text-align: center;">
                        <!-- begin :: Submit btn -->
                        <button type="submit" onclick="order()" class="btn btn-primary" id="submit-btn">
                            <span class="indicator-label">{{ __("Search") }}</span>
                            <!-- begin :: Indicator -->
                            <span class="indicator-progress">{{ __("Please wait ...") }}
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            <!-- end   :: Indicator -->

                        </button>
                        <!-- end   :: Submit btn -->
                    </div>
                </div>
                <!-- end   :: Column -->
            </div>
            <!-- end   :: Row -->
            <form action="{{ route('dashboard.finance-approvals.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.finance-approvals.index') }}">
                @csrf
                <div class="order-detail" onkeyup="calculate()" style="display:none">
                    <input type="hidden" name="order_id" id="order_id_inp">
                    <!-- begin :: Row -->
                    <div class="row mb-10">

                        <!-- begin :: Column -->
                        <div class="col-md-2 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Client name") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="client_name_inp" name="" placeholder="example" disabled readonly />
                            </div>

                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-2 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="phone" name="" placeholder="example" disabled readonly>
                            </div>
                            <p class="invalid-feedback" id="name_en"></p>

                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-2 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("City") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="city" name="" placeholder="example" disabled readonly>
                            </div>

                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-2 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Financing entity") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="financing_entity" name="" placeholder="example" disabled readonly>
                            </div>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-2 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Car name") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="car_name" name="" placeholder="example" disabled readonly>
                            </div>

                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-2 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Car color") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="car_color" name="" placeholder="example" disabled readonly>
                            </div>

                        </div>
                        <!-- end   :: Column -->
                    </div>
                    <!-- end   :: Row -->
                    <!-- begin :: Row -->
                    <div class="row mb-10">
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Approval date") }}</label>
                            <div class="form-floating">
                                <div class="form-floating">
                                    <input class="form-control form-control-solid  datepicker border-gray-300 border-1 filter-datatable-inp me-4" name="approval_date" readonly placeholder="{{ __('Enter the approval date') }}" data-filter-index="4" />
                                </div>
                            </div>
                            <p class="invalid-feedback" id="approval_date"></p>

                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Approval amount") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="approval_amount_inp" name="approval_amount" value="" placeholder="" readonly />
                                <label for="approval_date_inp">{{ __("Enter the approval amount") }}</label>
                            </div>
                            <p class="invalid-feedback" id="approval_amount"></p>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Plate no cost") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control plate_no_cost" id="plate_no_cost_inp" name="plate_no_cost" placeholder="example" />
                                <label for="plate_no_cost_inp">{{ __("Enter the plate no cost") }}</label>
                            </div>
                            <p class="invalid-feedback" id="plate_no_cost"></p>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Tax discount") }} {{settings()->get('tax')}} %</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="tax_discount_inp" name="tax_discount" placeholder="" readonly />
                                <!-- <label for="name_en_inp">{{ __("Enter the tax discount") }}</label> -->
                            </div>
                            <p class="invalid-feedback" id="tax_discount"></p>

                        </div>
                        <!-- end   :: Column -->


                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-10">

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Discount percent") }} %</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="discount_percent_inp" name="discount_percent" placeholder="example" />
                                <label for="discount_percent_inp">{{ __("Enter the discount percent") }}</label>
                            </div>
                            <p class="invalid-feedback" id="discount_percent"></p>


                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Discount amount") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="discount_amount_inp" name="discount_amount" placeholder="" readonly />
                                <!-- <label for="discount_amount_inp">{{ __("Enter the discount amount") }}</label> -->
                            </div>
                            <p class="invalid-feedback" id="discount_amount"></p>

                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Cashback percent") }} %</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="cashback_percent_inp" name="cashback_percent" placeholder="example" />
                                <label for="cashback_percent_inp">{{ __("Enter the cashback percent") }}</label>
                            </div>
                            <p class="invalid-feedback" id="cashback_percent"></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Cashback amount") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="cashback_amount_inp" name="cashback_amount" placeholder="" readonly />
                                <!-- <label for="cashback_amount_inp">{{ __("Enter the cashback amount") }}</label> -->
                            </div>
                            <p class="invalid-feedback" id="cashback_amount"></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-10 ">

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Insurance cost") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control calculate-profit" id="insurance_cost_inp" name="insurance_cost" placeholder="example" />
                                <label for="insurance_cost_inp">{{ __("Enter the insurance cost") }}</label>
                            </div>
                            <p class="invalid-feedback" id="insurance_cost"></p>


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Cost") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control calculate-profit" id="cost_inp" name="cost" placeholder="example" />
                                <label for="cost_inp">{{ __("Enter the cost") }}</label>
                            </div>
                            <p class="invalid-feedback" id="cost"></p>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Delivery cost") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control calculate-profit" id="delivery_cost_inp" name="delivery_cost" placeholder="example" />
                                <label for="delivery_cost_inp">{{ __("Enter the delivery cost") }}</label>
                            </div>
                            <p class="invalid-feedback" id="delivery_cost"></p>

                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Commission") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control calculate-profit" id="commission_inp" name="commission" placeholder="example" />
                                <label for="commission_inp">{{ __("Enter the commission") }}</label>
                            </div>
                            <p class="invalid-feedback" id="commission"></p>


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->
                    <!-- begin :: Row -->
                    <div class="row mb-10 ">
                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Delegate") }}</label>
                            <select class="form-select" data-control="select2" name="delegate_id" id="delegate_id_sp" data-placeholder="{{ __("Choose the delegate") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option selected> {{ __("Choose the delegate") }} </option>

                                @foreach( $delegates as $delegate)
                                <option value="{{ $delegate->id }}"> {{ $delegate->name }} </option>
                                @endforeach
                            </select>

                            <p class="invalid-feedback" id="delegate_id"></p>

                        </div>
                        <!-- end   :: Column -->


                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Extra details") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control calculate-profit" id="extra_details_inp" name="extra_details" placeholder="example" />
                                <label for="extra_details_inp">{{ __("Enter the extra details") }}</label>
                            </div>
                            <p class="invalid-feedback" id="extra_details"></p>
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Profit") }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-solid" id="profit_inp" name="profit" placeholder="" readonly />
                            </div>
                            <p class="invalid-feedback" id="profit"></p>
                        </div>
                        <!-- end   :: Column -->
                    </div>
                    <!-- end   :: Row -->
                </div>
        </div>
        <!-- end   :: Inputs wrapper -->

        <!-- begin :: Form footer -->
        <div class="form-footer" id="footer-submit" style="display:none">

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
<!-- <script src="{{ asset('js/dashboard/forms/finance_approvals/create.js') }}"></script> -->
<script>
    function order() {
        let orderId = document.getElementById("order_id");
        if (orderId.value.trim() === '') {
            errorAlert('{{ __("The order field is required")}}')
        } else {
            $.ajax({
                type: 'GET',
                url: '/dashboard/finance-approvals/create',
                data: {
                    '_token ': ' <?php echo csrf_token() ?>',
                    'order_id': orderId.value
                },
                success: function(data) {
                    if (Object.keys(data).length > 0) {
                        $(".order-detail").show();
                        $("#footer-submit").show();
                        $("#other_order_id").show();
                        $("#order-id").hide();
                        document.getElementById("order_id_inp").value = data.id;
                        document.getElementById("client_name_inp").value = data.name
                        document.getElementById("car_name").value = data.car.name
                        document.getElementById("city").value = data.city.name
                        document.getElementById("phone").value = data.phone
                        document.getElementById("car_color").value = data.car.color.name
                        document.getElementById("financing_entity").value = data.bank.name
                        document.getElementById("approval_amount_inp").value = data.price
                    } else {
                        errorAlert('{{ __("There is no order")}}')
                        // errorAlert('{{ __("Enter order number")}}')
                    }
                }
            });
        }
    }

    function order_again() {
        $(".order-detail").hide();
        $("#footer-submit").hide();
        $("#other_order_id").hide();
        $("#order-id").show();
    }
    let totalRemainingPrice = 0;
    let discountAmount = 0;
    let totalAbstractAmountPlate = 0;
    let totalRemainingPriceDiscountAmount = 0;
    let totalRemainingPriceCashbackAmount = 0;

    function calculate() {
        let amount = parseFloat(document.getElementById("approval_amount_inp").value) || 0;
        let plateNumberAmount = parseFloat(document.getElementById("plate_no_cost_inp").value) || 0;
        let discountPercent = parseFloat(document.getElementById("discount_percent_inp").value) || 0;
        let cashbackPercent = parseFloat(document.getElementById("cashback_percent_inp").value) || 0;
        let insuranceCost = parseFloat(document.getElementById("insurance_cost_inp").value) || 0;
        let cost = parseFloat(document.getElementById("cost_inp").value) || 0;
        let deliveryCost = parseFloat(document.getElementById("delivery_cost_inp").value) || 0;
        let commission = parseFloat(document.getElementById("commission_inp").value) || 0;
        let profitValues = [insuranceCost, cost, deliveryCost, commission];
        console.log(profitValues);
        // calculate amount tax
        let tax = "{{settings()->get('tax')}}";
        totalAbstractAmountPlate = amount - plateNumberAmount;
        totalTax = (totalAbstractAmountPlate * tax) / 100;
        totalRemainingPrice = totalAbstractAmountPlate - totalTax;
        document.getElementById("tax_discount_inp").value = totalTax;

        // calculate discount amount
        discountAmount = (totalRemainingPrice * discountPercent) / 100;
        totalRemainingPriceDiscountAmount = totalRemainingPrice - discountAmount;
        document.getElementById("discount_amount_inp").value = discountAmount

        // calculate cashback amount
        cashbackAmount = (totalRemainingPriceDiscountAmount * cashbackPercent) / 100;
        totalRemainingPriceCashbackAmount = totalRemainingPriceDiscountAmount - cashbackAmount
        document.getElementById("cashback_amount_inp").value = cashbackAmount;

        // calculate profit
        let sum = profitValues.reduce((total, value) => total + value, 0);
        document.getElementById("profit_inp").value = Math.max(totalRemainingPriceCashbackAmount - sum, 0).toFixed(2);
    }
</script>
@endpush
