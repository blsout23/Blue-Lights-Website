
var emailURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/email.php";
var songURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/song.php";

$(document).ready(function() {

    // Song submit
    $("#songSubmit").click(function() {
        if ($("#songName").val() == "" || $("#artist").val() == "") {
            $("#songSubmitMessageContainer").html("<p class='songSubmitMessage'>Please enter a song name and artist.</p>");
        } else {
            //Sanitize on the server side
            $.ajax({
                type: "POST",
                url: songURL,
                data: {
                    song: $("#songName").val(),
                    artist: $("#artist").val()
                },
                success: function(data) {
                    $("#songSubmitMessageContainer").html(data);
                    $("#songName").val("");
                    $("#artist").val("");
                }
            });
        }
    });

    // Footer submit
    $("#footerSubmit").click(function() {
        $("#footerForm").submit();
    });
});

