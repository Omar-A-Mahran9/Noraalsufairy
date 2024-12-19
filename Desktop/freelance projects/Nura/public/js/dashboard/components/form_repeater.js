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
