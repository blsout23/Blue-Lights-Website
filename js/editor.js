

'use strict';

var eventURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/renderEvents.php";
var addEventURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/addEvent.php";

var addMemberURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/addMember.php";
var memberURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/renderMembers.php";

var aboutURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/aboutDataRequest.php";
var updateAboutURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/updateAbout.php";

var emailURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/getEmailList.php";

var songRequestURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/getSongRequests.php";

var videoURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/renderVideos.php";
var addVideoURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/addVideo.php";

var deleteURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/delete.php";


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
    $('#addVideoSubmit').click(addVideo);
    $('.deleteVideo').click(deleteVideo);
    $('#memberSubmit').click(addMember);
    $('.deleteMember').click(deleteMember);

    $("#aboutSubmit").click(updateAbout);
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

function addMember(e) {
    e.preventDefault();
    $.ajax({
        url: addMemberURL,
        type: 'POST',
        data: {
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val(),
            bio: $('#bio').val(),
            image: $('#memberImage').val(),
            classYear: $('#classYear').val()
        },
        success: function(data) {
            console.log(data);
            if(data == 'success') {
                renderMembers();
                $('#addEvent')[0].reset();
            } else {
                alert(data);
            }
        }
    });
}

function renderMembers(){
    $('#memberContainer').empty();

    $.get(memberURL, function(data) {
        $('#memberContainer').html(data);
        $('.deleteMember').click(deleteMember);
    });
}

function deleteMember(e) {
    let id = e.target.id.replace('deleteMember', '');
    $.get(deleteURL, {id: id, type: 'members'}, function(data) {
        if (data == 'success') {
            renderMembers();
        } else {
            alert(data);
        }
    });
}


function addVideo(e) {
    e.preventDefault();
    let newLink = $('#video-link').val().replace('watch?v=', 'embed/');

    $.ajax({
        url: addVideoURL,
        type: 'POST',
        data: {
            title: $( "#video-title" ).val(),
            link: newLink
        },
        success: function(data) {
            if(data == 'success') {
                renderVideos();
            } else {
                alert(data);
            }
        }
    });

    $('#video-link').val('');
    $('#video-title').val('');
}

function renderVideos() {
    $('#videoContainer').empty();

    $.get(videoURL, function(data) {
        $('#videoContainer').html(data);
        $('.deleteVideo').click(deleteVideo);
    });
}

function deleteVideo(e) {
    let id = e.target.id.replace('deleteVideo', '');
    $.get(deleteURL, {id: id, type: 'videos'}, function(data) {
        if (data == 'success') {
            renderVideos();
            console.log('deleted');
        } else {
            alert(data);
        }   
    });
}


function updateAbout(e) {
    e.preventDefault();
    console.log($('#aboutImage').val());
    $.ajax({
        url: updateAboutURL,
        type: 'POST',
        data: {
            content1: $('#content1').val(),
            content2: $('#content2').val(),
            content3: $('#content3').val(),
            image: $('#aboutImage').val()
        },
        success: function(data) {
            $('#aboutMessageContainer').html('<p id="aboutMessage">' + data + '</p>');
            if(data=='success') {
                $('#aboutMessage').css('color', 'green');
                $('#aboutImagePreview').attr('src', $('#aboutImage').val());
            } else {
                $('#aboutMessage').css('color', 'red');
            }
        }
    });


}