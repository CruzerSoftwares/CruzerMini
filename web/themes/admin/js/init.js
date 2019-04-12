//menu js
!function(a){"use strict";function b(b,d){this.$el=a(b),this.opt=a.extend(!0,{},c,d),this.init(this)}var c={};b.prototype={init:function(b){a(document).on("click",function(c){var d=a(c.target);d.closest(b.$el.data("menu-toggle"))[0]?(d=d.closest(b.$el.data("menu-toggle")),b.$el.css(b.calcPosition(d)).toggleClass("show"),c.preventDefault()):d.closest(b.$el)[0]||b.$el.removeClass("show")})},calcPosition:function(b){var c,d,e;return c=a(window).width(),d=b.offset(),e={top:d.top+b.outerHeight()/2},d.left>c/2?(this.$el.addClass("menu--right").removeClass("menu--left"),e.right=c-d.left-b.outerWidth()/2,e.left="auto"):(this.$el.addClass("menu--left").removeClass("menu--right"),e.left=d.left+b.outerWidth()/2,e.right="auto"),e}},a.fn.menu=function(c){return this.each(function(){a.data(this,"menu")||a.data(this,"menu",new b(this,c))})}}(window.jQuery);

(function($){
  $(function(){
    // $('.slider').slider();
    // $('.parallax').parallax();
    $('[data-menu]').menu();
    $('.collapsible').collapsible();
    $('.button-collapse').sideNav();
    $('.materialboxed').materialbox();
    // $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('select').material_select();
    
    $('.modal').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '4%', // Starting top style attribute
      endingTop: '10%', // Ending top style attribute
    });

    $(document).on('click', '.flashClose', function(){
      $(this).parents('.flashContainer').fadeOut(500);
    })
  });
})(jQuery);