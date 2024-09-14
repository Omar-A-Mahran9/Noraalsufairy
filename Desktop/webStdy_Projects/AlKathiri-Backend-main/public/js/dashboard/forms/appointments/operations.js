    $.each(daysOff, function(index, dayOff) {
        disabledDays.push(function(date) {
            return date.getDay() === daysOfWeek.indexOf(dayOff);
        });
    });

    $("#date_inp").flatpickr({
        locale: locale,
        disable: disabledDays,
        minDate: startDate,
        maxDate: endDate,
        onChange: function(selectedDates, dateStr, instance) {
            var date = dateStr; // Convert selected date to ISO format
            populateTimeSlots(date, branchId);
        }
    });

    function populateTimeSlots(date, branchId) {
        $('#time_inp').empty();

        $.ajax({
            type: "get",
            url: "/dashboard/schedules/time-slots",
            data: {
                date: date,
                branchId: branchId
            },
            success: function(timeSlots) {
                $.each(timeSlots, function(indexInArray, timeSlot) {
                    var isSelectedTime = appointmentTime == timeSlot.value;
                    var newOption = new Option(timeSlot.time, timeSlot.value, isSelectedTime, isSelectedTime);

                    $('#time_inp').append(newOption);
                });
                // Trigger change after appending all new options
                $('#time_inp').trigger('change');
            }
        });
    }

    // Initial call to populate time slots based on initial date value
    populateTimeSlots($("#date_inp").val(), branchId);

    $(document).on("daysOffUpdated", function(event, daysOff, branchId) {
        var disabledDays = [];

        $.each(daysOff, function(index, dayOff) {
            disabledDays.push(function(date) {
                return date.getDay() === daysOfWeek.indexOf(dayOff);
            });
        });

        $("#date_inp").flatpickr({
            locale: locale,
            disable: disabledDays,
            minDate: startDate,
            maxDate: endDate,
            onChange: function(selectedDates, dateStr, instance) {
                var date = dateStr; // Convert selected date to ISO format
                populateTimeSlots(date, branchId);
            }
        });

        function populateTimeSlots(date, branchId) {
            $('#time_inp').empty();

            $.ajax({
                type: "get",
                url: "/dashboard/schedules/time-slots",
                data: {
                    date: date,
                    branchId: branchId
                },
                success: function(timeSlots) {
                    $.each(timeSlots, function(indexInArray, timeSlot) {
                        var isSelectedTime = appointmentTime == timeSlot.value;
                        var newOption = new Option(timeSlot.time, timeSlot.value, isSelectedTime, isSelectedTime);

                        $('#time_inp').append(newOption);
                    });
                    // Trigger change after appending all new options
                    $('#time_inp').trigger('change');
                }
            });
        }

        // Initial call to populate time slots based on initial date value
        populateTimeSlots($("#date_inp").val(), branchId);
    });






    $("#city-sp").change(function (e) {
        e.preventDefault();
        let cityId = $(this).val();
        $('#branch-sp').empty();
        $('#time_inp').empty();
        disabledDays = [];

        $.ajax({
            type: "get",
            url: `/dashboard/cities/${cityId}/branches`,
            success: function (data) {
                $.each(data, function (indexInArray, item) {
                    var newOption = new Option(item.name, item.id);

                    $('#branch-sp').append(newOption).trigger('change');
                });
            }
        });

    });
