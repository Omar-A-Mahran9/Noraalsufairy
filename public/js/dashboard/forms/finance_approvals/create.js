function order() {
    let orderId = document.getElementById("order_id");
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
            }
        }
    });
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
