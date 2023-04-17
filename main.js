
$(document).ready(function() {

var url = $("#url").val();

$("#yes").click(function(){

 var ajaxRequest = $.ajax({
        url: "private/php/votes.php",
        type: "post",
        data: {data:1,url:url},
        

    });


 ajaxRequest.done(function (response, textStatus, jqXHR){

       
         $("#yes").html("Yes " + response);
    });


});


$("#no").click(function(){

var ajaxRequest = $.ajax({
        url: "private/php/votes.php",
        type: "post",
        data:{data:0,url:url},
        

    });


 ajaxRequest.done(function (response, textStatus, jqXHR){

       
         $("#no").html("No " + response);
    });


});





$("#mutual").click(function(){

var ajaxRequest = $.ajax({
        url: "private/php/votes.php",
        type: "post",
        data:{data:2,url:url},
        

    });


 ajaxRequest.done(function (response, textStatus, jqXHR){

       
         $("#mutual").html("Dont Care " + response);
    });


});






});


