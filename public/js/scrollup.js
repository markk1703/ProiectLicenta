$(document).ready(function(){
    
    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    
    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    
});

$(function() {
    $('#scrollToTop').hover(function() {
      $('#scrollup-arrow').css('color', 'white');
    }, function() {
      // on mouseout, reset the background colour
      $('#scrollup-arrow').css('color', '#444');
    });
  });