$(document).ready(function() {
  $('.accordion a').click(function(){
    $(this).toggleClass('active');
    $(this).next('span').slideToggle(400);
   });
});