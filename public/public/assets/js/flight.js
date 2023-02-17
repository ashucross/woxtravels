$(document).ready(function () { 
    $("body #flight-round-trip").validate({
        rules: {
            sourceName:"required",
            destinationName: "required",
            dates: "required",
        },

        messages: {
            sourceName: "Please choose from location",
            destinationName: "Please choose to location",
            dates: "Please choose travel date",
        },
        submitHandler: function (form) {
            /*Ajax Request Header setup*/
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                beforeSend: function (msg) {
                    $(this).html(
                        '<i class="fa fa-spinner fa-spin"></i> wait..'
                    );
                    $(this).prop("disabled", true);
                },
                success: function (response) {
                    $(this).prop("disabled", false);
                    console.log(response);
                    if (response.status == 200) {
                        $("#save-account-information").hide();
                        $("#edit-account-information").attr("tab", "edit");
                        $("#edit-account-information").html(
                            '<span class="material-icons-outlined">edit</span>'
                        );
                        $("body .edit-account-information").slideUp(50);

                        $.each(response.data, function (index, element) {
                            $("#view-account-information-" + index).html(
                                element
                            );
                        });

                        $("body .view-account-information").show().fadeIn(200);
                        toastr["success"](
                            "Success!",
                            "Account Information has been updated!"
                        );
                    }
                },
            });
        },
    });
});
