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
?>
<?php
  $nn = node_load($row->entity);
  // Lien
  $lien = drupal_get_path_alias('node/'.$row->entity).'?retour='.arg(0);
  //Gestion de l'image
  if(isset($nn->field_image_menu_blocs["und"][0]["uri"]) && $nn->field_image_menu_blocs["und"][0]["uri"] != ''){
    $eee = explode("public://",$nn->field_image_menu_blocs["und"][0]["uri"]);
    $image = '<a href="/'.$lien.'" /><img src="/sites/default/files/'.$eee[1].'" alt="'.$nn->field_image_menu_blocs["und"][0]["alt"].'" title="'.$nn->field_image_menu_blocs["und"][0]["title"].'" style="width:100%;" border="0" /></a>';
  }else{$image = '';}
  
?>
<div class="col-xs-12 col-lg-4">
  <div class="bloc-plateforme-sommaire ">
    <span class="bloc-plateforme-sommaire-titre acronyme"><a href="/<?php print $lien; ?>" style="color:#FFF;" /><?php print $nn->field_acronyme["und"][0]["value"]; ?></a></span>
    <p><?php print $image; ?></p>
    <div class="texte"><?php print substr(strip_tags($nn->field_description_courte["und"][0]["safe_value"]),0,60); ?></div>
    <div>
    <?php
      echo '<a href="/'.$lien.'" />En savoir plus</a><br />';
      ?>
    </div>
  </div>
  <br />
</div>


