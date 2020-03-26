(function($){
      $(function(){

          $('.button-collapse').sideNav();
          $('.parallax').parallax();

          var $doc = $('html, body');
          $('.suave').click(function() {
              $doc.animate({
                  scrollTop: $( $.attr(this, 'href') ).offset().top
              }, 500);
              return false;
          });

          $('.fixed-action-btn').openFAB();
          $('.fixed-action-btn').closeFAB();
          //$('.fixed-action-btn.toolbar').openToolbar();
          $('.fixed-action-btn.toolbar').closeToolbar();

      }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function() {
    $('select').material_select();
});