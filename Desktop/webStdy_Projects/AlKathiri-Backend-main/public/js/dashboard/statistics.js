"use strict";

let initCarsChart    = () => {

        let carsChart       = document.getElementById("cars_chart");
        let carsChartHeight = 150;

        if (carsChart) {
            let a = carsChart.getAttribute("data-kt-chart-color"), o = KTUtil.getCssVariableValue("--bs-gray-800"),
                s = KTUtil.getCssVariableValue("--bs-" + a), r = KTUtil.getCssVariableValue("--bs-light-" + a);
            new ApexCharts(carsChart, {
                series: [{name: translate("Cars number"), data: carsMonthlyRate['data'] }],
                chart: {
                    fontFamily: "inherit",
                    type: "area",
                    height: carsChartHeight,
                    toolbar: {show: !1},
                    zoom: {enabled: !1},
                    sparkline: {enabled: !0}
                },
                plotOptions: {},
                legend: {show: !1},
                dataLabels: {enabled: !1},
                fill: {type: "solid", opacity: .3},
                stroke: {curve: "smooth", show: !0, width: 3, colors: [s]},
                xaxis: {
                    categories: [ translate('January'),  translate('February'),  translate('March'),  translate('April'),  translate('May'),  translate('June'),  translate('July'),  translate('August'),  translate('September'),  translate('October'),  translate('November'),  translate('December')],
                    axisBorder: {show: !1},
                    axisTicks: {show: !1},
                    labels: {show: !1, style: {colors: o, fontSize: "12px"}},
                    crosshairs: {show: !1, position: "front", stroke: {color: "#E4E6EF", width: 1, dashArray: 3}},
                    tooltip: {enabled: !0, formatter: void 0, offsetY: 0, style: {fontSize: "12px"}}
                },
                yaxis: {min: carsMonthlyRate['min'], max: carsMonthlyRate['max'], labels: {show: !1, style: {colors: o, fontSize: "12px"}}},
                states: {
                    normal: {filter: {type: "none", value: 0}},
                    hover: {filter: {type: "none", value: 0}},
                    active: {allowMultipleDataPointsSelection: !1, filter: {type: "none", value: 0}}
                },
                tooltip: {
                    style: {fontSize: "12px"}, y: {
                        formatter: function (e) {
                            return  e +  " " + translate("car")
                        }
                    }
                },
                colors: [s],
                markers: {colors: [s], strokeColor: [r], strokeWidth: 3}
            }).render()
        }
}

let initOrdersChart  = () => {

    let ordersChart       = document.getElementById("orders_chart");
    let ordersChartHeight = 150;

    if (ordersChart) {
        let a = ordersChart.getAttribute("data-kt-chart-color"), o = KTUtil.getCssVariableValue("--bs-gray-800"),
            s = KTUtil.getCssVariableValue("--bs-" + a), r = KTUtil.getCssVariableValue("--bs-light-" + a);
        new ApexCharts(ordersChart, {
            series: [{name: translate("Orders number"), data: ordersMonthlyRate['data'] }],
            chart: {
                fontFamily: "inherit",
                type: "area",
                height: ordersChartHeight,
                toolbar: {show: !1},
                zoom: {enabled: !1},
                sparkline: {enabled: !0}
            },
            plotOptions: {},
            legend: {show: !1},
            dataLabels: {enabled: !1},
            fill: {type: "solid", opacity: .3},
            stroke: {curve: "smooth", show: !0, width: 3, colors: [s]},
            xaxis: {
                categories: [ translate('January'),  translate('February'),  translate('March'),  translate('April'),  translate('May'),  translate('June'),  translate('July'),  translate('August'),  translate('September'),  translate('October'),  translate('November'),  translate('December')],
                axisBorder: {show: !1},
                axisTicks: {show: !1},
                labels: {show: !1, style: {colors: o, fontSize: "12px"}},
                crosshairs: {
                    show: !1,
                    position: "front",
                    stroke: {color: "#E4E6EF", width: 1, dashArray: 3}
                },
                tooltip: {enabled: !0, formatter: void 0, offsetY: 0, style: {fontSize: "12px"}}
            },
            yaxis: {min: ordersMonthlyRate['min'], max: ordersMonthlyRate['max'], labels: {show: !1, style: {colors: o, fontSize: "12px"}}},
            states: {
                normal: {filter: {type: "none", value: 0}},
                hover: {filter: {type: "none", value: 0}},
                active: {allowMultipleDataPointsSelection: !1, filter: {type: "none", value: 0}}
            },
            tooltip: {
                style: {fontSize: "12px"}, y: {
                    formatter: function (e) {
                        return  e +  " " + translate("order")
                    }
                }
            },
            colors: [s],
            markers: {colors: [s], strokeColor: [r], strokeWidth: 3}
        }).render()
    }

}

let initClientsChart = () => {

        let clientsChar = document.getElementById("clients_chart");

        let clientsChartHeight = 150;

        if (clientsChar) {
            let a = clientsChar.getAttribute("data-kt-chart-color"), o = KTUtil.getCssVariableValue("--bs-gray-800"),
                s = KTUtil.getCssVariableValue("--bs-" + a), r = KTUtil.getCssVariableValue("--bs-light-" + a);
            new ApexCharts(clientsChar, {
                series: [{name: translate("Clients number"), data: clientsMonthlyRate['data'] }],
                chart: {
                    fontFamily: "inherit",
                    type: "area",
                    height: clientsChartHeight,
                    toolbar: {show: !1},
                    zoom: {enabled: !1},
                    sparkline: {enabled: !0}
                },
                plotOptions: {},
                legend: {show: !1},
                dataLabels: {enabled: !1},
                fill: {type: "solid", opacity: .3},
                stroke: {curve: "smooth", show: !0, width: 3, colors: [s]},
                xaxis: {
                    categories: [ translate('January'),  translate('February'),  translate('March'),  translate('April'),  translate('May'),  translate('June'),  translate('July'),  translate('August'),  translate('September'),  translate('October'),  translate('November'),  translate('December')],
                    axisBorder: {show: !1},
                    axisTicks: {show: !1},
                    labels: {show: !1, style: {colors: o, fontSize: "12px"}},
                    crosshairs: {
                        show: !1,
                        position: "front",
                        stroke: {color: "#E4E6EF", width: 1, dashArray: 3}
                    },
                    tooltip: {enabled: !0, formatter: void 0, offsetY: 0, style: {fontSize: "12px"}}
                },
                yaxis: {min: clientsMonthlyRate['min'], max: clientsMonthlyRate['max'] , labels: {show: !1, style: {colors: o, fontSize: "12px"}}},
                states: {
                    normal: {filter: {type: "none", value: 0}},
                    hover: {filter: {type: "none", value: 0}},
                    active: {allowMultipleDataPointsSelection: !1, filter: {type: "none", value: 0}}
                },
                tooltip: {
                    style: {fontSize: "12px"}, y: {
                        formatter: function (e) {
                            return  e +  " " + translate("client")
                        }
                    }
                },
                colors: [s],
                markers: {colors: [s], strokeColor: [r], strokeWidth: 3}
            }).render()
        }
}

let initOrdersTypesPieChart = () => {

    let attributes;

    attributes = ordersTypesPercentage , $.plot($("#orders_types_pie_chart"), attributes , {series: {pie: {show: !0}}})

}


let initOrdersBrandsPieChart = () => {

    let attributes;

    attributes = carOrdersBrandsPercentage, $.plot($("#orders_brands_pie_char"), attributes , {series: {pie: {show: !0}}})

}


let initCarsBrandsPieChart = () => {

    let attributes;

    attributes = carBrandsPercentage, $.plot($("#cars_brands_pie_char"), attributes , {series: {pie: {show: !0}}})

}




"undefined" != typeof module && (module.exports = KTWidgets), KTUtil.onDOMContentLoaded((function () {

    initCarsChart();
    initOrdersChart();
    // initClientsChart();
    initOrdersTypesPieChart();
    initOrdersBrandsPieChart();
    initCarsBrandsPieChart();

}));
