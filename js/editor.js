

'use strict';

<<<<<<< HEAD
var eventURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/eventDataRequest.php";
var memberURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/memberDataRequest.php";
var aboutURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/aboutDataRequest.php";
var emailURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/getEmailList.php";
var songRequestURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/getSongRequests.php";
var deleteURL = "https://cs325.colby.edu/ebwrig23/bluelights/requestHandlers/delete.php";
=======
var eventURL = "https://cs325.colby.edu/ebwrig23/bluelights/eventDataRequest.php";
var memberURL = "https://cs325.colby.edu/ebwrig23/bluelights/memberDataRequest.php";
var aboutURL = "https://cs325.colby.edu/ebwrig23/bluelights/aboutDataRequest.php";
>>>>>>> 4bab7519a10ec154d3b0492c00d46f9e125ab754

var members;
var events;
var about;
<<<<<<< HEAD
var emails;
var songRequests;
=======
>>>>>>> 4bab7519a10ec154d3b0492c00d46f9e125ab754

$(document).ready(function() {

    getData();

    $('#addEvent').submit(function(e) {

        e.preventDefault();
        addEvent();
        // $('#addEvent')[0].reset();
        
    });

    $( "#eventSubmit" ).click(function() {
<<<<<<< HEAD
        addEvent();   
    });
=======
        console.log("button clicked");
        addEvent();   
    });

>>>>>>> 4bab7519a10ec154d3b0492c00d46f9e125ab754
});

function getData(){
    
        $.get(memberURL, function(data) {
            
            members=JSON.parse(data)['members'];
            
            for (let i=0; i<members.length; i++) {
                
                renderMember(i);
    
            }
    
        });
    
        $.get(eventURL, function(data) {
            
            events=JSON.parse(data)['events'];
            
            for (let i=0; i<events.length; i++) {
                
                renderEvent(i);
    
            }
    
        });
    
        $.get(aboutURL, function(data) {
            
            about=JSON.parse(data);
            renderAbout();
    
        });

        $.get(emailURL, function(data) {
            emails = JSON.parse(data);
            renderEmails();
        });

        $.get(songRequestURL, function(data) {
            songRequests = JSON.parse(data);
            renderSongRequests();
        });

}


function renderEvent(index) {
    let eventObj=events[index];

    let eventHTML= "<div class='event' id='event" +index+"'>";
    eventHTML += "<img src='" +eventObj['image']+ "'>";
    eventHTML += "<h3>" +eventObj['title']+ "</h3>";
    eventHTML += "<p>" +eventObj['location']+ "</p>";
    let date = new Date(parseInt(eventObj['date']));
    eventHTML += "<time datetime="+date.toISOString()+">" +date.toString()+ "</time>";
    eventHTML += "<p>" +eventObj['contentSmall']+ "</p>";
    eventHTML += "<p>" +eventObj['contentLarge']+ "</p>";
    eventHTML += "</div>";



    $('#eventContainer').append(eventHTML);

}


function renderMember(index) {
    let member = members[index];

    let memberHTML = "<div class='member' id='member" +index+"'>";
    memberHTML += "<img src='" +member['image']+ "'>";
    memberHTML += "<h3>" +member['firstName']+ "</h3>";
    memberHTML += "<h3>" +member['lastName']+ "</h3>";
    memberHTML += "<p>" +member['classYear']+ "</p>";
    memberHTML += "<p>" +member['bio']+ "</p>";
    memberHTML += "</div>";

    $('#memberContainer').append(memberHTML);
}

function renderAbout() {
    $('#aboutContainer').empty();

    let aboutHTML = "<div class='about' id='about'>";
    aboutHTML += "<img src='" +about['image']+ "'>";
    aboutHTML += "<p>" +about['content1']+ "</p>";
    aboutHTML += "<p>" +about['content2']+ "</p>";
    aboutHTML += "<p>" +about['content3']+ "</p>";
    aboutHTML += "</div>";

    $('#aboutDetails').append(aboutHTML);
}

function renderEvents() {
    $('#eventContainer').empty();

    for (let i=0; i<events.length; i++) {
        renderEvent(i);
    }
}

function renderMembers() {
    $('#memberContainer').empty();

    for (let i=0; i<members.length; i++) {
        renderMember(i);
    }
}

function renderEmails() {
    $('#emailContainer').empty();

    for (let i=0; i<emails.length; i++) {
        let email = emails[i];
        let id = email['id'];
        let emailHTML = "<li id='emailAddress"+ id +"'>" +email['email'];
        emailHTML += "<button class='deleteEmail' id='deleteEmail"+ id +"'>Delete</button>";
        emailHTML += "</li>";

        $('#emailListContainer').append(emailHTML);
    }
    $('.deleteEmail').click(deleteEmail);
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


function renderSongRequests() {
    $('#songRequestContainer').empty();
    for (let i=0; i<songRequests.length; i++) {
        let songRequest = songRequests[i];
        let id = songRequest['id'];
        let songHTML = "<li id='song"+ id + "'>" +songRequest['song']+ " by " +songRequest['artist'];
        songHTML += "<button class='deleteSong' id='deleteSong"+ id +"'>Delete</button>";
        songHTML += "</li>";
        $('#songRequestContainer').append(songHTML);
    }

    $('.deleteSong').click(deleteSongRequest);
}


function deleteSongRequest(e) {
    let id = e.target.id.replace('deleteSong', '');
    $.get(deleteURL, {id: id, type: 'songRequest'}, function(data) {
        if (data == 'success') {
            $('#song'+id).remove();
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
            console.log(data);
        }});
}