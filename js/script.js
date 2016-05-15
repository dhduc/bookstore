$(document).ready(function(){
$( "#log-in" ).dialog({ autoOpen: false });
$( "#sign-up" ).dialog({ autoOpen: false });
$( "#forgot_pass" ).dialog({ autoOpen: false });
$( "#cart" ).dialog({ autoOpen: false });
$( "#alert" ).dialog({ autoOpen: false });

$( "#login" ).click(function() {
  $( "#log-in" ).dialog( "open" );
});

$( "#signup" ).click(function() {
  $( "#sign-up" ).dialog( "open" );
});

$( "#forgot" ).click(function() {
  $( "#forgot_pass" ).dialog( "open" );
});



$( "#btn-cart" ).click(function() {
  $( "#cart" ).dialog( "open" );
});
$( "#add" ).click(function() {
  $( "#alert" ).dialog( "open" );
});

$( ".ui-button-icon-primary" ).addClass( "icon-remove");

});