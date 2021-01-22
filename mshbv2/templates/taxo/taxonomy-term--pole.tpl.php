<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
 //print_r($term);
?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?> bloc-interne">
  <h1><?php print $term->field_pole_long["und"][0]["value"]; ?></h1>
  <?php if (!$page): ?>
    <h2><a href="<?php print $term_url; ?>"><?php print $term_name; ?></a></h2>
  <?php endif; ?>

  <div class="content">
    <?php print render($content); ?>
    <?php
      // Affichage des pièces jointes
      if(isset($term->field_docs_lies["und"][0]["filename"])){
        // On liste tous les fichiers
        print '<h2>À télécharger</h2><ul>';
        foreach($term->field_docs_lies["und"] as $pjk=>$pjv){
          if($term->field_docs_lies["und"][$pjk]["description"] != '') $titre = $term->field_docs_lies["und"][$pjk]["description"];
          else $titre = $term->field_docs_lies["und"][$pjk]["filename"];
          // Extension
          $expExt = explode('/',$term->field_docs_lies["und"][$pjk]["filemime"]);
          // Taille
          if($term->field_docs_lies["und"][$pjk]["filesize"] > 1000000) $taille = number_format(($term->field_docs_lies["und"][$pjk]["filesize"] / 1000000),2).' Mo';
          else $taille = number_format(($term->field_docs_lies["und"][$pjk]["filesize"] / 1000),2).' Ko';

          print '<li><a href="'.file_create_url($term->field_docs_lies["und"][$pjk]["uri"]).'" target="_blank">'.$titre.'</a> ('.$expExt[1].' - '.$taille.') </li>';
        }
        print '</ul><br />';
      }
    ?>
  </div>
  <section class="row">
    <div class="col-sm-12 col-lg-12">
      <h2>Projets en cours</h2>
      <?php
        echo getListProjetPole($term->tid,1);
      ?>
    </div>
  </section>
  <section class="row">
    <div class="col-sm-12 col-lg-12">
      <h2>Projets soutenus</h2>
      <?php
        echo getListProjetPole($term->tid,0);
      ?>
    </div>
  </section>
  <?php if(isset($term->field_mots_cles["und"][0]["value"])){
     $liste = '';
      $expMot = explode(",",$term->field_mots_cles["und"][0]["value"]);
      foreach($expMot as $k=>$v){
        $liste .= '<a href="search/node/'.$v.'">'.$v.'</a> ';
      }

      print '<section class="row">
        <div class="col-sm-12 col-lg-12">
          <h2>Mots clés</h2>
          <div>'.$liste.'</div>
        </div>
      </section>';
    }
  ?>
    
</div>