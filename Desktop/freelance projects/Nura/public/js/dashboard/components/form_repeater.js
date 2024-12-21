$("#form_repeater").repeater({
    initEmpty: false,
    isFirstItemUndeletable: true,
    show: function () {
        $(this).slideDown();
        $(this).find("input").prop("readonly", false);
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});

$("#answer_repeater").repeater({
    initEmpty: false,
    isFirstItemUndeletable: true,
    show: function () {
        // Check if the current number of items exceeds the max limit
        const maxItems = 5; // Set the max limit
        const repeaterList = $(this).closest('#answer_repeater').find('[data-repeater-item]');

        if (repeaterList.length >= maxItems) {
            alert('You can only add up to 5 answers.');
            return; // Prevent adding a new item
        }

        $(this).slideDown();
        $(this).find("input").prop("readonly", false);
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});


$("#form_repeater_video").repeater({
    initEmpty: false,
    isFirstItemUndeletable: true,
    show: function () {
        $(this).slideDown();
        $(this).find("input").prop("readonly", false);
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});

$("#form_file_list").repeater({
    initEmpty: false,
    isFirstItemUndeletable: true,
    show: function () {
        $(this).slideDown();
        $(this).find("input").prop("readonly", false);
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});

$("#form_outcome_repeater").repeater({
    initEmpty: false,
    isFirstItemUndeletable: true,
    show: function () {
        $(this).slideDown();
        $(this).find("input").prop("readonly", false);
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});

$("#form_repeater_video_material").repeater({
    initEmpty: false,
    isFirstItemUndeletable: true,
    show: function () {
        $(this).slideDown();
        $(this).find("input").prop("readonly", false);
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});

$("#form_repeater_attachment_material").repeater({
    initEmpty: false,
    isFirstItemUndeletable: true,
    show: function () {
        $(this).slideDown();
        $(this).find("input").prop("readonly", false);
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
});
