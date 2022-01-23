

'use strict';

var eventURL = "http://localhost:8000/eventDataRequest.php";
var memberURL = "http://localhost:8000/memberDataRequest.php";
var aboutURL = "http://localhost:8000/aboutDataRequest.php";

var members;
var events;
var about;

$(document).ready(function() {

    getData();

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
    
}


function renderEvent(index) {
    let eventObj=events[index];

    let eventHTML= "<div class='event' id='event" +index+"'>";
    eventHTML += "<img src='" +eventObj['image']+ "'>";
    eventHTML += "<h3>" +eventObj['title']+ "</h3>";
    eventHTML += "<p>" +eventObj['location']+ "</p>";
    console.log(parseInt(eventObj['date']));
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
    let aboutHTML = "<div class='about' id='about'>";
    aboutHTML += "<img src='" +about['image']+ "'>";
    aboutHTML += "<p>" +about['content1']+ "</p>";
    aboutHTML += "<p>" +about['content2']+ "</p>";
    aboutHTML += "<p>" +about['content3']+ "</p>";
    aboutHTML += "</div>";

    $('#aboutDetails').append(aboutHTML);
}