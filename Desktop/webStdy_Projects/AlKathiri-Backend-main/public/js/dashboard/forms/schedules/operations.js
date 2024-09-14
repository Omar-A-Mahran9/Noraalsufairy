    var schedules = JSON.parse($("input[name='schedules']").val() || "[]");

    generateSchedulesIfNotExist();


    function generateSchedulesIfNotExist() {
        $(".schedules").prepend(`
            <div>
                <!--begin::Heading-->
                <div class="py-10">
                    <!--begin::Title-->
                    <h4 class="fw-bold text-dark">${ translate('Available schedules times') }</h4>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <div class="row justify-content-center">
                    ${buildDaysCards()}
                </div>
            </div>
        `);

        openCheckedDays();
        reinitializeTimepickerInputs();
    }

    function openCheckedDays() {
        let $checkedInputs = $("[id*='Checked']:checked");

        $.each($checkedInputs, function (key, input) {
            let collapseCardId = $(input).attr('data-bs-target');

            $(collapseCardId).addClass("show")
        });
    }

    function buildDaysCards() {
        let daysCards = '';
        let weekDays = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];

        $.each(weekDays, function(key, day) {
            daysCards += `
            <div class="col-lg-4 mb-5">
                <div class="card shadow-sm">
                    <div class="card-header collapsible cursor-pointer rotate mb-0" style="padding-left:15px !important; padding-right:15px !important">
                        <h3 class="card-title">${ translate(day) }</h3>
                        <div class="card-toolbar">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                    name="schedules[${day}][is_available]"
                                    data-day="${day}"
                                    type="checkbox"
                                    role="switch"
                                    ${getValue(day, 'is_available') == 1? 'checked': ''}
                                    id="${day}Checked"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#${day}">
                                <label class="form-check-label" for="${day}Checked">${ translate('available') }</label>
                            </div>
                        </div>
                    </div>
                    <div id="${day}" class="collapse">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="start_time_inp" class="form-label fs-6 fw-bold mb-3"><span class="required">${ translate('start time') }</span></label>
                                    <input type="start_time" name="schedules[${day}][start_time]" value="${getValue(day, 'start_time')}" class="form-control form-control-lg form-control-solid timepicker" id="schedules_${day}_start_time_inp" placeholder="${ translate('من') }" >
                                    <div class="fv-plugins-message-container invalid-feedback" id="schedules_${day}_start_time"></div>
                                </div>
                                <div class="col-6">
                                    <label for="end_time_inp" class="form-label fs-6 fw-bold mb-3"><span class="required">${ translate('end time') }</span></label>
                                <input type="end_time" name="schedules[${day}][end_time]" value="${getValue(day, 'end_time')}" class="form-control form-control-lg form-control-solid timepicker" id="schedules_${day}_end_time_inp" placeholder="${ translate('إلى') }" >
                                <div class="fv-plugins-message-container invalid-feedback" id="schedules_${day}_end_time"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
        });

        return daysCards;
    }

    function getValue(day, field) {
        let value = '';
        let daySchedules = Object.values(schedules).find(function(e) { return e.day_of_week == day; });

        if(daySchedules)
            return daySchedules[field] || '';

        return value;
    }

    function reinitializeTimepickerInputs() {
        $(".timepicker").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            locale: locale
        });
    }
