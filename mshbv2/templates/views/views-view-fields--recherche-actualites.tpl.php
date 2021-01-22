<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
//print_r($row);
$lien = drupal_get_path_alias('node/'.$row->entity).'?retour='.arg(0);
?>

<div class="bloc-agenda-liste-head">
  <div class="bloc-agenda-liste-head-dates">
    <?php
      $dateExp = explode(' ',strip_tags($fields['field_dates_value']->content));
      print '<span class="agenda-dates-jour">'.$dateExp[0].'</span><span class="agenda-dates-mois">'.myBlockMonth($dateExp[1]).'</span> - <span class="agenda-dates-annee">'.$dateExp[2].'</span>';
    ?>
  </div>
  <div class="bloc-agenda-liste-head-titre">
    <?php
      $nn = node_load($row->entity);
      echo '<a href="/'.$lien.'" />'.$nn->title.'</a><br />';
      //print $fields['title']->content;
      ?>
  </div>
  <div class="bloc-agenda-liste-head-eve">
    <?php print $fields['field_type_actualite']->content; ?>
  </div>
</div>
<div class="bloc-agenda-liste-content">
  <div>
    <div class="bloc-agenda-liste-content-image"><a href="/<?php print $lien; ?>"><?php print $fields["field_image"]->content; ?></a></div>
    <?php print $nn->body["und"][0]["summary"]; ?>
  </div>
  <br style="clear:both;" />

<?php
    if(strip_tags($fields["field_pole"]->content) != '') {
      $tid = $row->_entity_properties["field_pole"];
      $term = taxonomy_term_load($tid);
      if($term->field_type_pole["und"][0]["value"] == 1) $po = '<b>Pôle</b> : ';
      else $po = '';
      print('<div class="bloc-agenda-liste-content-pole">'.$po.''.$term->field_pole_long["und"][0]["safe_value"].'</div>');
    }
  ?>

  <?php
    if(strip_tags($fields["field_plateforme"]->content) != '') {
      $tid = $row->_entity_properties["field_plateforme"];
      $termp = taxonomy_term_load($tid);
      print('<div class="bloc-agenda-liste-content-pole"><b>Plateforme</b> : '.$termp->name.'</div>');
    }
  ?>

  <div style="text-align:right;"><?php print '<a href="/'.$lien.'" />'; ?><img src="/sites/all/themes/mshb/img/agenda-liste-plus.png" /></a></div>
</div>

