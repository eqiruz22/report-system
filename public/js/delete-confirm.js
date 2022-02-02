$(".delete").on("click", function () {
    const dataId = $(this).data("id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/report/delete/" + dataId + "";
            Swal.fire(
                "Deleted!",
                "Your data report with id " + dataId + "",
                "success"
            );
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});

$(".delete-data-status").on("click", function () {
    const dataStatus = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/status-project/delete/" + dataStatus + "";
            Swal.fire(
                "Deleted!",
                "Your data report with id " + dataStatus + "",
                "success"
            );
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});

$(".delete-data-progres-project").on("click", function () {
    const dataProgres = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/progres-project/delete/" + dataProgres + "";
            Swal.fire(
                "Deleted!",
                "Your data report with id " + dataProgres + "",
                "success"
            );
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});

$(".delete-data-term").on("click", function () {
    const dataTerm = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "/term-of-payment/delete/" + dataTerm + "";
            Swal.fire(
                "Deleted!",
                "Your data report with id " + dataTerm + "",
                "success"
            );
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});

$(".delete-data-remark").on("click", function () {
    const dataRemark = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your data report with id " + dataRemark + "",
                type: "success",
                timer: 3000,
            }).then(function () {
                window.location = "/remark/delete/" + dataRemark + "";
            });
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});

$(".delete-data-user").on("click", function () {
    const dataUser = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your data report with id " + dataUser + "",
                type: "success",
                timer: 3000,
            }).then(function () {
                window.location = "/user/delete/" + dataUser + "";
            });
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});

$(".delete-data-stats").on("click", function () {
    const dataUser = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your data report with id " + dataUser + "",
                type: "success",
                timer: 3000,
            }).then(function () {
                window.location = "/status/delete/" + dataUser + "";
            });
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});

$(".delete-data-title").on("click", function () {
    const dataUser = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your data report with id " + dataUser + "",
                type: "success",
                timer: 3000,
            }).then(function () {
                window.location = "/title/delete/" + dataUser + "";
            });
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});

$(".delete-data-document").on("click", function () {
    const dataUser = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your Document with id " + dataUser + "",
                type: "success",
                timer: 3000,
            }).then(function () {
                window.location = "/document/delete/" + dataUser + "";
            });
        } else {
            Swal.fire({
                text: "Your Data is safe :)",
                icon: "info",
            });
        }
    });
});
