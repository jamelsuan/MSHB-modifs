<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
global $base_path,$user;


// gestion de l'icone de connexion
  if($user->uid) {
    echo '
      <style>
        .glyphicon-user {color:#c33932;}
        .btnMyAdmin ul.tabs li {float:left;list-style: none;} 
      </style>
    ';
  }

    // Contôle de l'accès aux pages - Uniquement pour les admins
    if(in_array('MSHB', $user->roles) || in_array('administrator', $user->roles)){
        // On est admin
        //echo 'admin connecté';
    }else{
        //echo "pas admin";
        if(arg(2) == 'webform-results' || $_SERVER["REQUEST_URI"] == '/node/120/webform-results' || $_SERVER["REQUEST_URI"] == '/node/122/webform-results' || $_SERVER["REQUEST_URI"] == '/node/120/webform-results'){
            $page['content'] = '<div class="alert alert-danger alert-dismissable">
                    <h4><i class="icon fa fa-ban"></i> Erreur</h4>
                    Vous n\'avez pas accès à cette page !
                  </div>';
        }

    }

?>
<!-- NAV -->
<section id='navbar' class="navbar_extended">
  <nav class="navbar navbar-default navbar-fixed-top" >
    <div class="container_navbar">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand" href="/">
              <?php include $base_path.'sites/all/themes/mshbv2/svg/logo_anime.php'; ?>
          </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <?php print cds_menuv2_mshb(); ?>
        <?php print cds_menuv2_haut_mshb(); ?>
      </div>
    </div>
  </nav>
</section>
<!-- /NAV -->


  <!-- HEADER -->
<section class="global_contour">
    <div class="bloc-autologin" style="background-color:#FFF;text-align:center;color:#000;font-weight:bold;opacity: 0.6;">
        <?php
        print render($page['auto']);
        ?>
    </div>
    <?php if(!$is_front) {
  ?>
  <section class="bloc_haut_page">
    <div class="container_header nodetpl">
      <?php
        // Variables
        $image = '';
        $titre = '';
        $sstitre = '';
      if(!isset($node)){
        $pathPage = arg(0);
        if(variable_get($pathPage.'_image_bandeau') != ''){
          $image = '<img src="'.$base_path.'sites/all/themes/mshbv2/img/bandeaux/'.variable_get($pathPage.'_image_bandeau').'" id="image_bandeau" alt="'.variable_get($pathPage.'_image_bandeau').'" title="'.variable_get($pathPage.'_image_bandeau').'" />';
        }
        if(variable_get($pathPage.'_titre_bandeau') != ''){
          $titre = variable_get($pathPage.'_titre_bandeau');
        }
        if(variable_get($pathPage.'_sstitre_bandeau') != ''){
          $sstitre = variable_get($pathPage.'_sstitre_bandeau');
        }

      }else{
        if(isset($node->field_image_bandeau["und"][0]["uri"]) && $node->field_image_bandeau["und"][0]["uri"] != ''){
          $eee = explode("public://",$node->field_image_bandeau["und"][0]["uri"]);
          $image = '<img src="'.$base_path.'sites/default/files/'.$eee[1].'" alt="'.$node->field_image_bandeau["und"][0]["alt"].'" id="image_bandeau" title="'.$node->field_image_bandeau["und"][0]["alt"].'" />';
        }else{$image = '';}
        
        if(isset($node->title)) $titre = $node->title;
        if(isset($node->field_sstitre_bandeau["und"][0])) $sstitre = $node->field_sstitre_bandeau["und"][0]["value"];
      }
      // Points aléatoires
      $rPoint = rand(1,12);
      if(strlen($rPoint) == 1) $rPoint = '0'.$rPoint;
      if($image != '') echo $image;
      else echo '<div class="header_bg header_points_'.$rPoint.'"></div>';
      ?>
      <?php
        // Ariane
        echo filArianeV2(0);
      ?>
      <h1 class="premier_plan" id="premier_plan"><?php print $titre; ?></h1>
      <p><span class="sstitre" id="sstitre"><?php print $sstitre; ?></span></p>
    </div>
  </section>
    <?php
  }
      ?>
  <!-- CONTOUR -->

  <!-- /CONTOUR -->
  <!-- /HEADER -->
  <?php
    if (!empty($tabs) && (in_array('MSHB', $user->roles) || in_array('administrator', $user->roles))):
//      print '<div style="position:fixed;bottom:0;background-color:#FFF;width:100%;z-index:10000;" class="btnMyAdmin">'.render($tabs).'</div>';
      print '<div class="btnMyAdmin">'.render($tabs).'</div>';
    endif;
  ?>

  <a id="main-content"></a>
  <?php
  print $messages;
  if(!empty($page['text_aide'])){
    print '<section style="margin-top:30px; margin-bottom:30px;"><div class="col-md-10  col-md-offset-1">'.render($page['text_aide']).'</div></section>';
  }
    print render($page['content']);
    if (!empty($page['help'])){
      render($page['help']);
    }
  ?>
  <div id="returnOnTop" title="Retour en haut">&nbsp;</div>
  </section>

<!-- /CONTOUR -->
<!-- /CONTOUR -->

<!-- FOOTER -->
<footer class="footer container-fluid ">
  <div class="container">
    <div class="row">
      <div class="col-md-5 ">
        <div class="zone_logo_mshb">
          <?php
            $blockLogo = block_block_view(9);
            print render($blockLogo['content']);
          ?>
        </div>
        <div class="zone_signature">
          <?php
          $blockAdresse = block_block_view(1);
          print render($blockAdresse['content']);
          ?>
        </div>

      </div>
      <div class="col-md-7 float_right">
        <div class="zone_logo">
          <?php
          $blockPartenaires = block_block_view(8);
          print render($blockPartenaires['content']);
          ?>
        </div>
        <div class="zone_menu">
          <?php echo cds_menuv2_bas_mshb(); ?>
        </div>
      </div>
    </div>
  </div>
</footer>

<script>
    jQuery(document).ready(function (){

        /* VERIF DES FORM MODIFIE */
        var somethingChanged=false;

        if(jQuery(".webform-client-form").length){
            somethingChanged=true;
            console.log(somethingChanged);
        }

        /*jQuery("").bind('change input paste keyupe', function(){
            somethingChanged = true;
        });*/
        //tt = CKEDITOR.instances.cke_edit-submitted-renseignements-administratifs-rapp-inter-resume-du-projet-value.checkDirty():

        jQuery("#webform-client-form-120 input, #webform-client-form-120 textarea,#webform-client-form-122 input, #webform-client-form-122 textarea,#webform-client-form-194 input, #webform-client-form-194 textarea,#webform-client-form-124 input, #webform-client-form-124 textarea,#webform-client-form-132 input, #webform-client-form-132 textarea,#webform-client-form-126 input, #webform-client-form-126 textarea,#webform-client-form-2256 input, #webform-client-form-2256 textarea,#webform-client-form-123 input, #webform-client-form-123 textarea").bind('change input paste keyupe', function(){
            somethingChanged = true;
        });

        /*if(jQuery("#edit-submitted-renseignements-administratifs-rapp-inter-resume-du-projet-value").val()) {
            console.log('je passe');
        }*/

        jQuery(window).bind('beforeunload', function(e){
            //return "ah";
            // CKEDITOR
            /*if(CKEDITOR.instances.cke_edit-submitted-renseignements-administratifs-rapp-inter-resume-du-projet-value.checkDirty()){
                console.log('coucou');
            }*/
            /*value = '';
            value2 = '';
            if(jQuery("#edit-submitted-renseignements-administratifs-rapp-inter-resume-du-projet-value").val()){
                // Mes données
                var myArray = [
                    'edit-submitted-renseignements-administratifs-rapp-inter-resume-du-projet-value',
                    'edit-submitted-renseignements-administratifs-rapp-inter-types-aide-value',
                    'edit-submitted-rapp-inter-label-rapport-etape-scientifique-rapp-inter-objectifs-value',
                    'edit-submitted-rapp-inter-label-rapport-etape-scientifique-rapport-dactivite-rapp-inter-methodologie-value',
                    'edit-submitted-rapp-inter-label-rapport-etape-scientifique-rapport-dactivite-rapp-inter-partenariat-value',
                    'edit-submitted-rapp-inter-label-rapport-etape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-rapp-inter-travaux-effectues-value',
                    'edit-submitted-rapp-inter-label-rapport-etape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-rapp-inter-resultats-obtenus-value',
                    'edit-submitted-rapp-inter-label-rapport-etape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-rapp-inter-difficultes-value',
                    'edit-submitted-rapp-inter-label-rapport-etape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-rapp-inter-reorientation-value',
                    'edit-submitted-rapp-inter-label-rapport-etape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-rapp-inter-perspectives-value'
                ];
                // On parcourt le tableau
                for (var i = 0; i < myArray.length; i++) {
                    var ahah = myArray[i];
                    if ( CKEDITOR.instances[ahah].checkDirty() ){
                        //console.log('kkchose a changé dans '+ahah);
                        somethingChanged = true;
                    }
                }
            }
            if(jQuery("#edit-submitted-renseignements-administratifs-rapp-final-resume-du-projet-value").val()){
                // Mes données
                var myArray = [
                    'edit-submitted-renseignements-administratifs-rapp-final-resume-du-projet-value',
                    'edit-submitted-renseignements-administratifs-rapp-final-types-aide-value',
                    'edit-submitted-rapport-final-label-detape-scientifique-rapp-final-objectifs-value',
                    'edit-submitted-rapport-final-label-detape-scientifique-rapport-dactivite-rapp-final-methodologie-value',
                    'edit-submitted-rapport-final-label-detape-scientifique-rapport-dactivite-rapp-final-partenariat-value',
                    'edit-submitted-rapport-final-label-detape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-rapp-final-apports-sur-les-savoirs-et-les-methodes-constitution-doutils-de-travail-value',
                    'edit-submitted-rapport-final-label-detape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-rapp-final-questionnements-value',
                    'edit-submitted-rapport-final-label-detape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-perspectives-rapp-final-valorisation-value',
                    'edit-submitted-rapport-final-label-detape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-perspectives-rapp-final-reponses-appels-projet-value',
                    'edit-submitted-rapport-final-label-detape-scientifique-rapport-dactivite-bilan-scientifique-du-projet-perspectives-rapp-final-autres-prolongements-a-projet-value'
                ];
                // On parcourt le tableau
                for (var i = 0; i < myArray.length; i++) {
                    var ahah = myArray[i];
                    if ( CKEDITOR.instances[ahah].checkDirty() ){
                        //console.log('kkchose a changé dans '+ahah);
                        somethingChanged = true;
                    }
                }
            }*/

            if(somethingChanged){  
                return "Des changements sont présents sur la page et ne sont pas sauvés !";
            }else{
                e=null; // i.e; if form state change show warning box, else don't show it.
            }
        });

        jQuery(".webform-client-form, #webform-client-form-120, #webform-client-form-122, #webform-client-form-194, #webform-client-form-124, #webform-client-form-132, #webform-client-form-126, #webform-client-form-2256, #webform-client-form-123").submit(function(){
            jQuery(window).unbind("beforeunload");
        });

        /* INTENTION */
        jQuery("#edit-submitted-webform-intention-presentation-value").attr('rows', '20');

        texte = jQuery("#edit-submitted-webform-intention-presentation-value").val();    
        jQuery.post( "/sites/all/modules/cdscript_webform/_test.php", { text: texte })
            .done(function( data ) {
                jQuery(".webform-component--test").html('Nombre de caractères : '+data+'<br /><br />');
            });
        /* On va appeler le calculateur*/
        jQuery("#edit-submitted-webform-intention-presentation-value").bind('change input paste keyupe', function(){
            texte = jQuery("#edit-submitted-webform-intention-presentation-value").val();
            jQuery.post( "/sites/all/modules/cdscript_webform/_test.php", { text: texte })
                .done(function( data ) {
                    jQuery(".webform-component--test").html('Nombre de caractères : '+data+'<br /><br />');
                });
        });

        /* SOUMISSION */
        jQuery("#edit-submitted-webform-soumission-resume-fr-value").attr('rows', '20');
        jQuery("#edit-submitted-webform-soumission-resume-angl-value").attr('rows', '20');

        texteFr = jQuery("#edit-submitted-webform-soumission-resume-fr-value").val();
        jQuery.post( "/sites/all/modules/cdscript_webform/_test.php", { text: texteFr })
            .done(function( data ) {
                jQuery(".webform-component--testfr").html('Nombre de caractères : '+data+'<br /><br />');
            });
        /* On va appeler le calculateur*/
        jQuery("#edit-submitted-webform-soumission-resume-fr-value").bind('change input paste keyupe', function(){
            texteFr = jQuery("#edit-submitted-webform-soumission-resume-fr-value").val();
            jQuery.post( "/sites/all/modules/cdscript_webform/_test.php", { text: texteFr })
                .done(function( data ) {
                    jQuery(".webform-component--testfr").html('Nombre de caractères : '+data+'<br /><br />');
                });
        });

        texteEn = jQuery("#edit-submitted-webform-soumission-resume-angl-value").val();
        jQuery.post( "/sites/all/modules/cdscript_webform/_test.php", { text: texteEn })
            .done(function( data ) {
                jQuery(".webform-component--testen").html('Nombre de caractères : '+data+'<br /><br />');
            });
        /* On va appeler le calculateur*/
        jQuery("#edit-submitted-webform-soumission-resume-angl-value").bind('change input paste keyupe', function(){
            texteEn = jQuery("#edit-submitted-webform-soumission-resume-angl-value").val();
            jQuery.post( "/sites/all/modules/cdscript_webform/_test.php", { text: texteEn })
                .done(function( data ) {
                    jQuery(".webform-component--testen").html('Nombre de caractères : '+data+'<br /><br />');
                });
        });
        
        jQuery(".form-number").bind('change input paste keyupe', function(){
            console.log(jQuery(".form-number").val());
            if(jQuery( this ).val() == '') jQuery( this ).val('0');
            else{
                newval = (jQuery( this ).val())*1;
                jQuery( this ).val(newval);
            }
        });



    });
</script>

<!-- /FOOTER -->
