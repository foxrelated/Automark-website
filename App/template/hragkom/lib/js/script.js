$(document).ready(function() {

  $('#boat').siblings().hide();
  $('.boat').on('click',function(){
    $(this).addClass('active').siblings().removeClass('active');
    $('#boat').fadeIn().siblings().fadeOut();
  });
  $('.motor').on('click',function(){
    $(this).addClass('active').siblings().removeClass('active');
    $('#motor').fadeIn().siblings().fadeOut();
  });
  $('.heavy').on('click',function(){
    $(this).addClass('active').siblings().removeClass('active');
    $('#heavy').fadeIn().siblings().fadeOut();
  });

  /*$('#vertical').lightSlider({
    gallery:true,
    item:1,
    autoWidth: true,
    vertical:true,
    verticalHeight:618,
    vThumbWidth:225,
    thumbItem:4,
    thumbMargin:4,
    slideMargin:0
  });*/

  $(".lSGallery").niceScroll({
    cursorcolor:"#db2d2e",
    cursorwidth:"12px",
    background:"rgba(20,20,20,0.3)",
    cursorborder:"1px solid #db2d2e",
    cursorborderradius:0
  });

  $('.car-type-input').on('keyup',function(){
    $('.car-type').text($(this).val());
  });
  $('.price-input').on('keyup',function(){
    $('.price').text($(this).val());
  });
  $('.detail-make-input').on('keyup',function(){
    $('.detail-make').text($(this).val());
  });
  $('.detail-km-input').on('keyup',function(){
    $('.detail-km').text($(this).val());
  });
  $('.detail-phone-input').on('keyup',function(){
    $('.detail-phone').text($(this).val());
  });
  $('.detail-plate-input').on('keyup',function(){
    $('.detail-plate').text($(this).val());
  });
  $('.detail-place-input').on('keyup',function(){
    $('.detail-place').text($(this).val());
  });

  //  $('.clicko').on('click',function(){
  //    $("<li data-thumb=img/???.png><img class=img-responsive src=img/???.png></li>").appendTo('#vertical');
  //  });
});
