<?php
global $base_path;
// Couleur page
$node = menu_get_object();
$pathPage = arg(0);
if ($node && $node->nid && isset($node->field_couleur_page["und"][0]["tid"])) {
    // On retrouve la classe
    $tid = (int)$node->field_couleur_page["und"][0]["tid"];
    $taxonomy_term = taxonomy_term_load($tid);
    $classePage = $taxonomy_term->field_nom_classe["und"][0]["value"];
    $couleurLogo = $taxonomy_term->field_code["und"][0]["value"];
}elseif(variable_get($pathPage.'_id_taxo_couleur_page') != ''){
    $tid = (int)variable_get($pathPage.'_id_taxo_couleur_page');
    $taxonomy_term = taxonomy_term_load($tid);
    $classePage = $taxonomy_term->field_nom_classe["und"][0]["value"];
    $couleurLogo = $taxonomy_term->field_code["und"][0]["value"];
}elseif($pathPage == 'gestion_chercheurs' || $_SERVER["REQUEST_URI"] == '/intention-de-soumission'  || $_SERVER["REQUEST_URI"] == '/soumission' || $_SERVER["REQUEST_URI"] == '/ajoutermodifier-un-chercheur' || substr($_SERVER["REQUEST_URI"],0,9) == '/node/120' || substr($_SERVER["REQUEST_URI"],0,9) == '/node/122' || substr($_SERVER["REQUEST_URI"],0,9) == '/node/124' || substr($_SERVER["REQUEST_URI"],0,9) == '/node/126' || substr($_SERVER["REQUEST_URI"],0,9) == '/node/132' || substr($_SERVER["REQUEST_URI"],0,9) == '/node/194' || substr($_SERVER["REQUEST_URI"],0,19) == '/gestion_chercheurs' || substr($_SERVER["REQUEST_URI"],0,15) == '/renseignements' || substr($_SERVER["REQUEST_URI"],0,10) == '/expertise' || substr($_SERVER["REQUEST_URI"],0,27) == '/rapport-interm%C3%A9diaire' || substr($_SERVER["REQUEST_URI"],0,22) == '/rapport-intermédiaire' || substr($_SERVER["REQUEST_URI"],0,14) == '/rapport-final' || substr($_SERVER["REQUEST_URI"],0,24) == '/ajouter-une-publication' || substr($_SERVER["REQUEST_URI"],0,22) == '/envoyer_mail_decision' || substr($_SERVER["REQUEST_URI"],0,16) == '/vie_projet_mshb' || substr($_SERVER["REQUEST_URI"],0,20) == '/gestion_manif_publi' || substr($_SERVER["REQUEST_URI"],0,26) == '/ajouter-une-manifestation'){
    $classePage = 'color_recherche';
    $couleurLogo = 'bleu';
}else{
    $classePage = 'color_home';
    $couleurLogo = 'rouge';
}
//echo $pathPage;
//print_r($_SERVER);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php print $scripts; ?>
    <!-- zone logo CANVAS -->
    <script>
        var couleur_logo = "<?php print $couleurLogo; ?>";
    </script>
</head>



<body class="<?php print $classes; ?> <?php print $classePage; ?>" <?php print $attributes;?>>


  <div id="skip-link">

    <a href="#mycontenu" class="element-invisible element-focusable">Accéder au contenu</a>
    <a href="#mymenu" class="element-invisible element-focusable">Menu</a>
    <a href="/search" class="element-invisible element-focusable">Rechercher</a>
    <a href="/sitemap" class="element-invisible element-focusable">Plan du site</a>
  </div>
  <div id="logo-print" style="display:none;">
    <img src="/sites/all/themes/mshbv2/img/logos_mshb/logo_MSHB_min_color_home.jpg.png" />
  </div>
  <?php
  if(variable_get('facebook') != ''){
      $facebook = '<a href="'.variable_get('facebook').'" target="blank"><img src="'.$base_path.'sites/all/themes/mshbv2/img/facebook.svg" alt=""></a>';
  }else{$facebook = '';}
  if(variable_get('twitter') != ''){
      $twitter = '<a href="'.variable_get('twitter').'" target="blank"><img src="'.$base_path.'sites/all/themes/mshbv2/img/twitter.svg" alt=""></a>';
  }else{$twitter = '';}
  if(variable_get('instagram') != ''){
      $insta = '<a href="'.variable_get('instagram').'" target="blank"><img src="'.$base_path.'sites/all/themes/mshbv2/img/instagram.svg" alt=""></a>';
  }else{$insta = '';}
  if(variable_get('linkedin') != ''){
      $linkedin = '<a href="'.variable_get('linkedin').'" target="blank"><img src="'.$base_path.'sites/all/themes/mshbv2/img/linkedin.svg" alt=""></a>';
  }else{$linkedin = '';}
  ?>
  <div id="sidebar" class="sidebar">
      <?php print $facebook; ?>
      <?php print $twitter; ?>
      <?php print $insta; ?>
      <?php print $linkedin; ?>
      <a href="javascript:window.print();"><img src="<?php print $base_path; ?>sites/all/themes/mshbv2/img/pictos/picto-partage-print.png" alt=""></a>
  </div>
  <div id="bottomsidebar" class="bottomsidebar">
      <?php print $facebook; ?>
      <?php print $twitter; ?>
      <?php print $insta; ?>
      <?php print $linkedin; ?>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  
<!-- Js -->
  <script>
  var color = "<?php print $classePage; ?>";
  </script>
  <!--<script src="<?php print $base_path; ?>sites/all/themes/mshbv2/js/jquery.min.js"></script>-->
  <script src="<?php print $base_path; ?>sites/all/themes/mshbv2/js/bootstrap.min.js"></script>
  <script src="<?php print $base_path; ?>sites/all/themes/mshbv2/js/prefixfree.min.js"></script>
  <script src="<?php print $base_path; ?>sites/all/themes/mshbv2/js/mshb.js"></script>



  <script type="text/javascript" src="<?php print $base_path; ?>sites/all/themes/mshbv2/js/slick.min.js"></script>
  <script type="text/javascript">
      jQuery(document).ready(function () {
          jQuery('.slider').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
              arrows: false,
              autoplay: true,
              autoplaySpeed: 5000,
          });
          jQuery('.slider-projet').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: true,
              arrows: false,
              autoplay: true,
              autoplaySpeed: 5000,
          });
          // Add return on top button
          /*jQuery('body').append('');*/

          // On button click, let's scroll up to top
          jQuery('#returnOnTop').click( function() {
              jQuery('html,body').animate({scrollTop: 0}, 'slow');
          });
      });

      jQuery(window).scroll(function() {
          // If on top fade the bouton out, else fade it in
          if ( jQuery(window).scrollTop() == 0 )
              jQuery('#returnOnTop').fadeOut();
          else
              jQuery('#returnOnTop').fadeIn();

      });

  </script>
  <script>function loadScript(a){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src="https://tracker.metricool.com/resources/be.js",c.onreadystatechange=a,c.onload=a,b.appendChild(c)}loadScript(function(){beTracker.t({hash:"525199612a125499fa0c7266ee9b449e"})});</script>
</body>
</html>
