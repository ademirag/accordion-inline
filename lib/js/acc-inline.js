(function($){

  $(document).on("click touchend",".accinlineTitle a",onPClick);

  function onPClick(e){
    e.preventDefault();
    var content = $(".accinlineContent",$(this).parent().parent());
    content.toggle();
  }

})(jQuery);
