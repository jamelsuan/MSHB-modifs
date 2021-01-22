jQuery(document).ready(function($) {
    
//    if($('#edit-submitted-laboratoire-partenaire-0-webform-intention-type-unite-de-recherche').val() == 'tid_66') $('.webform-component--laboratoire-partenaire--0--webform-intention-unite-de-recherche-preciser').show();
//    else  $('.webform-component--laboratoire-partenaire--0--webform-intention-unite-de-recherche-preciser').hide();
//    
//    
//    //$('.webform-component--laboratoire-partenaire--0--webform-intention-unite-de-recherche-preciser').hide();
//    $( "#edit-submitted-laboratoire-partenaire-0-webform-intention-type-unite-de-recherche" ).click(function() {
//        //console.log($('#edit-submitted-laboratoire-partenaire-0-webform-intention-type-unite-de-recherche option:selected').text());
//      if($(this).val() != '') $('#edit-submitted-laboratoire-partenaire-0-webform-intention-laboratoire-de-rattachement').val($('#edit-submitted-laboratoire-partenaire-0-webform-intention-type-unite-de-recherche option:selected').text());
//      if($(this).val() == 'tid_66') $('.webform-component--laboratoire-partenaire--0--webform-intention-unite-de-recherche-preciser').show();
//      else  $('.webform-component--laboratoire-partenaire--0--webform-intention-unite-de-recherche-preciser').hide();
//    });
      var components = $('form#webform-results-download-form fieldset#edit-components');
        components.removeClass('collapsed');
});
