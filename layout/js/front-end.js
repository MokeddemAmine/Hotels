$(document).ready(function(){
    // hide placeholder when focus and blur on a input form

    // take the right height and width for login form
    $('.parent-sign').width($('.sign-up').width());
    $('.parent-sign').height($('.sign-up').height())
    // toggle between sign in & sign up
    $('#go-to-sign-up').click(function(){
        $('.sign-in').css('transform','translate(-100%)');
        $('.sign-up').css('transform','translate(-100%)');
        $('.forgot-password').css('transform','translate(-100%)');
    })
    $('.go-to-sign-in').click(function(){
        $('.sign-in').css('transform','translate(0)');
        $('.sign-up').css('transform','translate(0)');
        $('.forgot-password').css('transform','translate(0)');
    })
    $('#forget-password').click(function(){
        $('.sign-in').css('transform','translate(100%)');
        $('.sign-up').css('transform','translate(100%)');
        $('.forgot-password').css('transform','translate(100%)');
    })
})