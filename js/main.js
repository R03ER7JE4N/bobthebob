// Add class on scroll
$(window).scroll(function(){
  
  var scroll = $(window).scrollTop();

  if ( scroll >= 50 ) {
    $('header').addClass('header_bg_white');
  }else{
    $('header').removeClass('header_bg_white');
  }

});

// Bouton search trigger
$('.btn_search_trigger').click(function(){
  $('form#searchform').toggleClass('show-search-bar');
});
