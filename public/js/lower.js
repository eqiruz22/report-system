$(document).ready(function () {
    $("#job_title").on("change keyup paste", function () {
        $(this).val($(this).val().toLowerCase());
    });
});
