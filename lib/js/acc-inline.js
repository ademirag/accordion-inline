(function($){

  $(document).on("click touchend",".accinline-title a",onPClick);

  function onPClick(e){
    e.preventDefault();
    var div = $(this).parent().parent();
    if(div.hasClass("accinline-close")){
      div.removeClass("accinline-close");
      div.addClass("accinline-open");
    }else{
      div.addClass("accinline-close");
      div.removeClass("accinline-open");
    }
  }

})(jQuery);
