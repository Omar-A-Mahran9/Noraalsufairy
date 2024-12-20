"use strict";

// Class definition
let KTDatatable = (function () {
    // Shared variables
    let table;
    let datatable;
    let filter;

    // Private functions
    let initDatatable = function () {
        datatable = $("#kt_datatable").DataTable({
            orderable: false,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [], // display records number and ordering type
            stateSave: false,
            select: {
                style: "os",
                selector: "td:first-child",
                className: "row-selected",
            },
            ajax: {
                data: function () {
                    let datatable = $("#kt_datatable");
                    let info = datatable.DataTable().page.info();
                    datatable
                        .DataTable()
                        .ajax.url(
                            `/dashboard/courses?page=${
                                info.page + 1
                            }&per_page=${info.length}`
                        );
                },
            },
            columns: [
                { data: "id" },
                { data: "images" },
                { data: "name_" + locale },
                { data: "price" },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 3,
                    render: function (data, type, row) {
                        if (/^</.test(data))
                            return (
                                __("Price") + " " + data + " " + __(currency)
                            );
                        else return __(data);
                    },
                },
                {
                    targets: 1,
                    render: function (data, type, row) {
                        return `<img style="height:50px;width:50px;border-radius:4px" src="${getImagePathFromDirectory(
                            data,
                            "courses"
                        )}" class="me-3" >`;
                    },
                },
                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {
                        return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                ${__("Actions")}
                                <span class="svg-icon svg-icon-5 m-0">
                                    <i class="fa fa-angle-down mx-1"></i>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="/dashboard/courses/${
                                        row.id
                                    }/edit" class="menu-link px-3 d-flex justify-content-between edit-row" >
                                       <span> ${__("Edit")} </span>
                                       <span>  <i class="fa fa-edit text-primary"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->

           

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="/courses/${
                                        row.id
                                    }" class="menu-link px-3 d-flex justify-content-between" target='_blank' >
                                       <span> ${__("Show")} </span>
                                       <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 d-flex justify-content-between delete-row" data-row-id="${
                                        row.id
                                    }" data-type="${__("course")}">
                                       <span> ${__("Delete")} </span>
                                       <span>  <i class="fa fa-trash text-danger"></i> </span>
                                    </a>
                                </div>
                                <!--end::Menu item-->

                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
            ],
        });

        table = datatable.$;

        datatable.on("draw", function () {
            handleDeleteRows();
            handleFilterDatatable();
            KTMenu.createInstances();
            $("body").append(`<script src='${lightboxPath}' ></script>`);
        });
    };

    // general search in datatable
    let handleSearchDatatable = () => {
        $("#general-search-inp").keyup(function () {
            datatable.search($(this).val()).draw();
        });
    };

    // Filter Datatable
    let handleFilterDatatable = () => {
        $(".filter-datatable-inp").each((index, element) => {
            $(element).change(function () {
                let columnIndex = $(this).data("filter-index"); // index of the searching column

                datatable.column(columnIndex).search($(this).val()).draw();
            });
        });
    };

    // Delete record
    let handleDeleteRows = () => {
        $(".delete-row").click(function () {
            let rowId = $(this).data("row-id");
            let type = $(this).data("type");

            deleteAlert(type).then(function (result) {
                if (result.value) {
                    loadingAlert(__("deleting now ..."));

                    $.ajax({
                        method: "delete",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: "/dashboard/courses/" + rowId,
                        success: () => {
                            setTimeout(() => {
                                successAlert(
                                    `${
                                        __("You have deleted the") +
                                        " " +
                                        type +
                                        " " +
                                        __("successfully !")
                                    } `
                                ).then(function () {
                                    datatable.draw();
                                });
                            }, 1000);
                        },
                        error: (err) => {
                            if (err.hasOwnProperty("responseJSON")) {
                                if (
                                    err.responseJSON.hasOwnProperty("message")
                                ) {
                                    errorAlert(err.responseJSON.message);
                                }
                            }
                        },
                    });
                } else if (result.dismiss === "cancel") {
                    errorAlert(__("was not deleted !"));
                }
            });
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            // handleFilterDatatable();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});