(function ($){

    // Example ajax request
    $.ajax({
        url: "http://www.somedomain.com/zenplanner-registration.php",
        type: "post",
        data: {
            'FirstName': name,
            'PrimaryEmail': email,
            'PrimaryPhone': phone
        },
        success: function (response) {
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    });

})(jQuery);