( function($) {

  $(document).ready( function(){
    var checkinvisibles = $('.webform-component-checkboxes .form-type-checkbox input.invisible');
    checkinvisibles.each(function(){
      $(this).parents('.form-type-checkbox').hide();
    });
    
   var optioninvisibles = $('.webform-component-select .form-select option.invisible');
    optioninvisibles.each(function(){
      $(this).hide();
    });
 var terminvisibles = $('.field-widget-options-select .form-select option.invisible');
    terminvisibles.each(function(){
      $(this).hide();
    });
  });
})(jQuery);
