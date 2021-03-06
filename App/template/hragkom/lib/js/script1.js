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
    vertical:true,
    verticalHeight:650,
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
  $('.price-input').on('focusout',function(){
      var price = $(this).val();
      if(price < 0){
          price = 1; // min price ...
          $(this).val(price);
      }
    $('.price').text(price);
  });
  $('.years-input').on('keyup',function(){
    $('.detail-make').text($(this).val());
  });
  $('.detail-km-input').on('focusout',function(){
      var km = $(this).val();
      if(km < 1000){
          km = 1000; // min KM..
          $(this).val(km);
      }
    $('.detail-km').text(km);
  });
  $('.detail-phone-input').on('keyup',function(){
    $('.detail-phone').text($(this).val());
  });
  $('.Country-input').on('keyup',function(){
    $('.detail-place').text($(this).val());
  });
   $('.clicko').on('click',function(){
     $("<li data-thumb=<?php echo $path['template'];?>img/Rectangle47.png><img class=img-responsive src=<?php echo $path['template'];?>img/Rectangle47.png></li>").appendTo('#vertical');
   });

});
