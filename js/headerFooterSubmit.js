
var emailURL = "http://localhost:8000/requestHandlers/email.php";
var songURL = "http://localhost:8000/requestHandlers/song.php";

$(document).ready(function() {

    // Song submit
    $("#songSubmit").click(function() {
        let songData = {};
        songData.song = $("#songName").val();
        songData.artist = $("#artist").val();
        $.ajax({
            url: songURL,
            type: "POST",
            data: songData,
            success: function() {
                console.log("it worked");
                $("songName").val("");
                $("artist").val("");
                if ($("#songSuccess").length == 0) {
                    $(".dropdownContent").append("<p id='songSuccess'>Success</p>");
                }
            }
        });
    });

    // Footer submit
    $("#footerSubmit").click(function() {
        $("#footerForm").submit();
    });


});