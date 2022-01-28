/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

JS that handles sending email addresses and song request
to the server using AJAX for storage in the database
*/

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
    $("#emailSubmit").click(function() {
        //test is email is valid
        let email = $("#emailInput").val();
        let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!(emailReg.test(email)) || email == "") {
            $("#emailMessageContainer").html("<p class='emailMessage'>Please enter a valid email.</p>");
        } else {
            //Sanitize on the server side
            $.ajax({
                type: "POST",
                url: emailURL,
                data: {
                    email: email,
                },
                success: function(data) {
                    $("#emailMessageContainer").html(data);
                    $("#emailInput").val("");
                }
            });
        }
    });
});

