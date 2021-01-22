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
//print_r();
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
      echo '<a href="/'.drupal_get_path_alias('node/'.$row->entity).'?retour='.arg(0).'" />'.$nn->title.'</a><br />';
      //print $fields['title']->content;
      ?>
  </div>
  <div class="bloc-agenda-liste-head-eve">
    <?php print $fields['field_type_evenement']->content; ?>
  </div>
</div>
<div class="bloc-agenda-liste-content">
  <div>
    <div class="bloc-agenda-liste-content-image" style=""><?php print $fields["field_image"]->content; ?></div>
    <div>
      <ul class="bloc-agenda-liste-infos">
        <li class="bloc-agenda-liste-infos-resume">
          <?php print $fields["body_summary"]->content; ?>
        </li>
      </ul>
      <br />
      <?php
      // Lieu
      if(strip_tags($fields["field_lieu"]->content) != '') {
        print('<div class="bloc-agenda-liste-content-lieu">'.$fields["field_lieu"]->content.'</div>');
      }
      // Horaires
      if(strip_tags($fields["field_horaires"]->content) != '') {
        print('<div class="bloc-agenda-liste-content-horaires">'.$fields["field_horaires"]->content.'</div>');
      }

      // Pole
      if(strip_tags($fields["field_pole"]->content) != '') {
        $tid = $row->_entity_properties["field_pole"];
        $term = taxonomy_term_load($tid);
        print('<div class="bloc-agenda-liste-content-pole">'.$term->field_pole_long["und"][0]["safe_value"].'</div>');
      }

  ?>
    </div>
    
  </div>
  <br style="clear:both;" />

  



  <div style="text-align:right;margin-top: -20px;"><?php print '<a href="/'.drupal_get_path_alias('node/'.$row->entity).'?retour='.arg(0).'" />'; ?><img src="/sites/all/themes/mshb/img/agenda-liste-plus.png" /></a></div>
</div>

