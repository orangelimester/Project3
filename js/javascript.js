$(document).ready(function(){

var $window = $(window); //You forgot this line in the above example

$('body[data-type="background"]').each(function(){
var $bgobj = $(this); // assigning the object
$(window).scroll(function() {
var yPos = -($window.scrollTop() / $bgobj.data('speed'));
// Put together our final background position
var coords = '100% '+ yPos + 'px';
// Move the background
$bgobj.css({ backgroundPosition: coords });
});
});
});