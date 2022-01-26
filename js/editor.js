

'use strict';

var eventURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/renderEvents.php";
var memberURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/memberDataRequest.php";
var aboutURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/aboutDataRequest.php";
var emailURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/getEmailList.php";
var songRequestURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/getSongRequests.php";
var deleteURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/delete.php";

var members;
var events;
var about;
var emails;
var songRequests;

$(document).ready(function() {

    $('#addEvent').submit(function(e) {

        e.preventDefault();
        addEvent();
        // $('#addEvent')[0].reset();
        
    });

    $('#eventImageInput').focusout(function() {
        $('#eventImageContainer').html('<img src="' + $('#eventImageInput').val() + '" />');
    });

    $( "#eventSubmit" ).click(function() {
        addEvent();   
    });

    $('.deleteEmail').click(deleteEmail);
    $('.deleteSong').click(deleteSongRequest);
    $('.deleteEvent').click(deleteEvent);
});

function deleteEvent(e) {
    let id = e.target.id.replace('deleteEvent', '');
    $.get(deleteURL, {id: id, type: 'events'}, function(data) {
        if (data == 'success') {
            renderEvents();
            console.log('deleted');
        } else {
            alert(data);
        }   
    });
}


function deleteEmail(e) {
    let id = e.target.id.replace('deleteEmail', '');
    $.get(deleteURL, {id: id, type: 'email'}, function(data) {
        if (data == 'success') {
            $('#emailAddress'+id).remove();
        } else {
            alert(data);
        }   
    });
}


function deleteSongRequest(e) {
    let id = e.target.id.replace('deleteSong', '');
    $.get(deleteURL, {id: id, type: 'songRequest'}, function(data) {
        if (data == 'success') {
            $('#songRequest'+id).remove();
        } else {
            alert(data);
        }   
    });
}


var addEventURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/addEvent.php";

function addEvent(){
    let fd = new FormData($('#addEvent')[0]);

    let dateObj = new Date($( "#date" ).val() + " " + $( "#time" ).val());
    fd.append('UNIXtime', dateObj.getTime());

    $.ajax({
        url: addEventURL,
        type: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            if(data == 'success') {
                renderEvents();
            } else {
                alert(data);
            }
        }});
}

function renderEvents() {
    $('#eventContainer').empty();

    $.get(eventURL, function(data) {
        $('#eventContainer').html(data);
        $('.deleteEvent').click(deleteEvent);
    });
}