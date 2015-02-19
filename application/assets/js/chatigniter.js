/*
|-------------------------------------------------------------------------
| Copyright (c) 2013 
| This script may be used for non-commercial purposes only. For any
| commercial purposes, please contact the author at sammkaranja@gmail.com
|-------------------------------------------------------------------------
*/

/*
|-------------------------------------------------------------------------
| Funtion to trigger the refresh event
|-------------------------------------------------------------------------
*/
var refresh;

function beginRefresh()
{
	refresh = setInterval(function()
    {
        var timestring = new Date().getTime();
        $('#chatmessage').load(base+'chat/index/'+ timestring);
    }, 2000);
}
/*
|----------------------------------------------------------------------------
| function to Stop refreshing
|----------------------------------------------------------------------------
*/

function endrefresh()
{
    clearInterval(refresh);
}
/*
|-------------------------------------------------------------------------
| Displaying the online users popup by clicking the open chat button
|-------------------------------------------------------------------------
*/
jQuery(function( $ ){
 var chat_btn = $("#chat-btn");
 var chat_area = $("#chat-area");
 var users_online = $("#users");
 
 chat_btn.attr( "href", "javascript:void( 0 )" ).click(function()
 {
	chat_area.hide();
	users_online.toggle();
	$("#messagediv").html('');
	endrefresh();
	var timestring = new Date().getTime();
	$('#onlineusers').load(base+'users/index/'+ timestring);
	chat_btn.blur();
	return (false);
 });
	$(document).click(function(event){
	if (users_online.is( ":visible" ) && !$( event.target ).closest( "#users" ).size()){
            users_online.hide();
        }
	
	});
});

/*
|---------------------------------------------------------------------------
| Triggers to send new message and minimize users list
|---------------------------------------------------------------------------
*/
$(document).ready(function() {
    $("form#newmessageform").submit(function(){
        $.post(base+"chat/sendmessage",{
        message: $("#message").val()
        });
        $("#message").val("");
        return false;
    });
	$("#chat-btn").click(function(){
		$.post(base+"chat/close_buddy");
	});
});

/*
|------------------------------------------------------------------------------
| Timer code to get new chat requests
|------------------------------------------------------------------------------
*/

var newMessages = setInterval(function()
{
    var timestring = new Date().getTime();
    $('#newmessage').load(base+'chat/get_new_messages/'+ timestring);
}, 2000);

/*
|------------------------------------------------------------------------------
| Timer to get online users available for chatting
|------------------------------------------------------------------------------
*/

var onlineusers = setInterval(function()
{
    var timestring = new Date().getTime();
    $('#onlineusers').load(base+'users/index/'+ timestring);
}, 10000);

/*

/*
|----------------------------------------------------------------------------
| End of file
|----------------------------------------------------------------------------
*/

