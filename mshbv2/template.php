<?php

/**
 * @file
 * template.php
 */

/**
* override theme_aggregator_block_item
 */
function mshbv2_aggregator_block_item($variables) {
	$item = $variables['item'];
	$output  = '<div class="title-post"><a target="_blank" href="' . check_url($variables['item']->link) . '">' . check_plain($variables['item']->title) . "</a></div>\n";
	$output .= '<div class="title-resume">' . check_plain(substr($variables['item']->description,0,150)) . "</div>\n";
	$output .= "<div class='title-lien'><a href='".check_url($variables['item']->link)."'>+ Lire la suite</a></div>\n";

  return $output;
}


/**
* hook_form_FORM_ID_alter
*/
function mshbv2_form_search_block_form_alter(&$form, &$form_state, $form_id) {
    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('search');
    
} 

function mshbv2_preprocess_search_block_form(&$vars) {
//$vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
    $vars['search_form'] = str_replace('<i ', '<span ', $vars['search_form']);
    $vars['search_form'] = str_replace('</i>', '</span>', $vars['search_form']);
}

  // MODIFS FACETTES
  function mshbv2_facetapi_link_active($variables) {
  $mytxt = $variables["text"]; // On sauve le texte originale
  // Sanitizes the link text if necessary.
  $sanitize = empty($variables['options']['html']);
  $link_text = ($sanitize) ? check_plain($variables['text']) : $variables['text'];

  // Theme function variables fro accessible markup.
  // @see http://drupal.org/node/1316580
  $accessible_vars = array(
    'text' => $variables['text'],
    'active' => TRUE,
  );

  // Builds link, passes through t() which gives us the ability to change the
  // position of the widget on a per-language basis.
  $replacements = array(
    '!facetapi_deactivate_widget' => theme('facetapi_deactivate_widget', $variables),
    '!facetapi_accessible_markup' => theme('facetapi_accessible_markup', $accessible_vars),
  );
  $variables['text'] = t('!facetapi_deactivate_widget !facetapi_accessible_markup', $replacements);
  $variables['options']['html'] = TRUE;
  // On affiche en title le nom long du pôle
  $title = getNomLongPole($mytxt);
  return theme_link($variables) . '<a href="javascript:;" title="'.$title.'">' . $link_text . '</a>';
}
function mshbv2_facetapi_link_inactive($variables) {
  // Builds accessible markup.
  // @see http://drupal.org/node/1316580
  $accessible_vars = array(
    'text' => $variables['text'],
    'active' => FALSE,
  );
  $accessible_markup = theme('facetapi_accessible_markup', $accessible_vars);

  // Sanitizes the link text if necessary.
  $sanitize = empty($variables['options']['html']);
  $variables['text'] = ($sanitize) ? check_plain($variables['text']) : $variables['text'];

  // Adds count to link if one was passed.
  if (isset($variables['count'])) {
    $variables['text'] .= ' ' . theme('facetapi_count', $variables);
  }

  // Resets link text, sets to options to HTML since we already sanitized the
  // link text and are providing additional markup for accessibility.
  $variables['text'] .= $accessible_markup;
  $variables['options']['html'] = TRUE;
  // On affiche en title le nom long du pôle
  $title = getNomLongPole($variables["text"]);
  $variables['options']['attributes']['title'] = $title;

  return theme_link($variables);
}

function mshbv2_theme() {
  $items = array();
  // create custom user-login.tpl.php
  $items['user_login'] = array(
  'render element' => 'form',
  'path' => drupal_get_path('theme', 'mshbv2') . '/templates',
  'template' => 'user-login',
  'preprocess functions' => array(
  'mshbv2_preprocess_user_login'
  ),
 );
return $items;
}

/* AUTRES FONCTIONS */
function format_url($chaine) {

  	// en minuscule
      //$chaine=strtolower($chaine);

    // Supprimer les accents
    $chaine = remove_accent($chaine);

  	// supprime les caracteres speciaux
      $chaine = preg_replace('#[^A-Za-z0-9]#', '-', $chaine);

     // Remplace les tirets multiples par un tiret unique
     $chaine = str_replace( "+", '-', $chaine );

     // Supprime le dernier caractère si c'est un tiret
     $chaine = rtrim( $chaine, '-' );

      while (strpos($chaine,'--') !== false)
  		$chaine = str_replace('--', '-', $chaine);

   $chaine=strtolower($chaine);

      return $chaine;

  }
function remove_accent($str) {
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
  return str_replace($a, $b, $str);
}
function french_month($mois) {
  if($mois == '01') $mois = 'janvier';
  if($mois == '02') $mois = 'février';
  if($mois == '03') $mois = 'mars';
  if($mois == '04') $mois = 'avril';
  if($mois == '05') $mois = 'mai';
  if($mois == '06') $mois = 'juin';
  if($mois == '07') $mois = 'juillet';
  if($mois == '08') $mois = 'août';
  if($mois == '09') $mois = 'septembre';
  if($mois == '10') $mois = 'octobre';
  if($mois == '11') $mois = 'novembre';
  if($mois == '12') $mois = 'décembre';
  return $mois;
}

/* PARTAGE */
function getPartageLinks($infos='',$print=1){

  $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  // Variables
  $content = '<div class="bloc-social">';
    if($infos != '') $monUrl = "http://".$_SERVER['HTTP_HOST'].$infos;

  // Facebook
  $content .= '<span class="custom-fb">
    <button class="rs-facebook" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u='.$monUrl.'\', \'_blank\', \'width=400, height=300\')">Facebook</button>
  </span>';
  // Twitter
  $content .= '<span class="custom-tw">
    <button class="rs-twitter" onclick="window.open(\'https://twitter.com/intent/tweet?text='.$monUrl.'\', \'_blank\', \'width=400, height=300\')">Twitter</button>
  </span>';
  // G+
  $content .= '<span class="custom-google">
    <button class="rs-google" onclick="window.open(\'https://plus.google.com/share?url='.$monUrl.'\', \'_blank\', \'width=400, height=300\')">G+</button>
  </span>';
  // Impression
    if($print == 1){
        $content .= '<span class="custom-print">
                        <button class="rs-print" onclick="window.print()">Imprimer</button>
                      </span>';
    }


  $content .= '</div>';

  return $content;
}

/* AFFICHAGE BLOC DE CONTENU */
function getContactBloc($field){
    // Variables
    $content = array();
    if(isset($field["und"]) && $field["und"][0]["value"] != ''){
        $expDirection = explode(',',$field["und"][0]["value"]);
        $nb = 0;
        $content["infos"] = '';
        foreach($expDirection as $kd=>$vd){
            $nb++;
            $nodeDir = node_load($vd);
            // Image
            if(isset($nodeDir->field_image["und"][0]["uri"]) && $nodeDir->field_image["und"][0]["uri"] != ''){
                $eee = explode("public://",$nodeDir->field_image["und"][0]["uri"]);
                $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" style="display:inline-block;" class="img-responsive" alt="'.$nodeDir->field_image["und"][0]["alt"].'" title="'.$nodeDir->field_image["und"][0]["alt"].'" /></div>';
            }else{
                $image = '<img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" style="display:inline-block;" class="img-responsive" />';
            }
            // EMAIL
            if(isset($nodeDir->field_mail["und"]) && $nodeDir->field_mail["und"][0]["value"] != ''){
                $email = '<a href="mailto:'.$nodeDir->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
            }else{
                $email = '';
            }
            $url = '/annuaires_mshb/chercheurs/'.format_url($nodeDir->title.' '.$nodeDir->field_prenom["und"][0]["value"]).'/'.$nodeDir->nid.'/';
            $content["infos"] .= '<div class="col-md-3 col-centered">
                    <p class="text-center">'.$image.'</p>
                    <p class="text-center" style="font-family:campton_regular"><a href="'.$url.'">'.$nodeDir->field_prenom["und"][0]["value"].' '.$nodeDir->title.'</a></p>
                    <p class="text-center campton_maj">'.$email.'</p>
                  </div>';
        }
        if($nb > 1) $content["titre"] = 's';
        else $content["titre"] = '';
    }

    return $content;
}
// Affichage du nom d'un pole

function getNomPole($node){
if(isset($node->field_pole["und"][0]) ){
                    $infosTaxoPole = taxonomy_term_load($node->field_pole["und"][0]["tid"]);
                    //print_r($infosTaxoType);
                    $nodepole = $infosTaxoPole->field_pole_long["und"][0]["value"];
                }else{
                    $nodepole = '';
                }
return $nodepole;
}

// Affichage du nom long d'un pole
function getNomLongPole($txt){
  // Variables
  $content = '';
  // Suppression du nombre
  $exp = explode("(",$txt);
  $term = trim($exp[0]);
  // On cherche dans la base
  $query = "SELECT *
            FROM dp_taxonomy_term_data
            WHERE
            name LIKE '%$term%'
            ";

    // Requete finale
    $result = db_query($query);

    // Affichage des résultats
    if($result->rowCount() == 0){
      $content .= '';
    }else{
      $row = $result->fetchAssoc();
      $taxo = taxonomy_term_load($row["tid"]);
      if(isset($taxo->field_pole_long["und"][0]["value"]) && $taxo->field_pole_long["und"][0]["value"] != ''){
        $content .= $taxo->field_pole_long["und"][0]["value"];
      }

    }

  return $content;
}

function mshbv2_checkbox($variables) {
  $element = $variables['element'];
  $returnValue = $element['#return_value'];
 //error_log("mshbv2_checkbox ".print_r($returnValue,tnue));
  //si return value contient tid => c'est un terme de taxonomie
  if (strpos($returnValue, 'tid') !== false) {
  
	$termId = str_replace('tid_','',$returnValue);
	 $term = taxonomy_term_load($termId); 
// error_log("mshbv2_checkbox term ".print_r($term,true));
  if (isset($term->field_choix_invisible) && !empty($term->field_choix_invisible)){
    $invisible = $term->field_choix_invisible['und'][0]['value'];
//   error_log("mshbv2_checkbox invisible ".print_r($invisible,true));
    if ($invisible){
    $element['#attributes']['class'][] = 'invisible'; 
    $element['#prefix']='<div class="invisible">';  
    $element['#suffix']='</div">';  
//error_log("mshbv2_checkbox ".print_r($variables,tnue));
  
   } 
  }
}
  $element['#attributes']['type'] = 'checkbox';
  element_set_attributes($element, array(
    'id',
    'name',
    '#return_value' => 'value',
  ));

  // Unchecked checkbox has #value of integer 0.
  if (!empty($element['#checked'])) {
    $element['#attributes']['checked'] = 'checked';
  }
  _form_set_class($element, array(
    'form-checkbox',
  ));
  return '<input' . drupal_attributes($element['#attributes']) . ' />';
}

function mshbv2_select($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array(
    'id',
    'name',
    'size',
  ));
  _form_set_class($element, array(
    'form-select',
  ));
  return '<select' . drupal_attributes($element['#attributes']) . '>' .mshbv2_form_select_options($element) . '</select>';
}

/**
 *
 * @param type $element
 * @param type $choices
 * @return string 
 */
function mshbv2_form_select_options($element, $choices = NULL) {
//    error_log("mshbv2_form_select_options element=".print_r($element,true));
  $taxo = false;
  if (isset($element['#value_key']) && $element['#value_key'] == 'tid'){
    $taxo = true;
  }
  if (!isset($choices)) {
    $choices = $element['#options'];
  }
  // array_key_exists() accommodates the rare event where $element['#value'] is NULL.
  // isset() fails in this situation.
  $value_valid = isset($element['#value']) || array_key_exists('#value', $element);
  $value_is_array = $value_valid && is_array($element['#value']);
  $options = '';
  foreach ($choices as $key => $choice) {
    $choiceClass ='';
   if (isset($key) && ! empty($key)){
       if (strpos($key, 'tid') !== false || $taxo) {
        $termId = str_replace('tid_','',$key);
        $term = taxonomy_term_load($termId);
        // error_log("mshbv2_checkbox term ".print_r($term,true));
        if (isset($term->field_choix_invisible) && !empty($term->field_choix_invisible)){
        $invisible = $term->field_choix_invisible['und'][0]['value'];
        //   error_log("mshbv2_checkbox invisible ".print_r($invisible,true));
          if ($invisible){
            $choiceClass = 'invisible';
          }
        }
    }
  } 

  if (is_array($choice)) {
      $options .= '<optgroup label="' . $key . '">';
      $options .= mshbv2_form_select_options($element, $choice);
      $options .= '</optgroup>';
    }
    elseif (is_object($choice)) {
  
    $options .= mshbv2_form_select_options($element, $choice->option);
    }
    else {
      $key = (string) $key;
      if ($value_valid && (!$value_is_array && (string) $element['#value'] === $key || ($value_is_array && in_array($key, $element['#value'])))) {
        $selected = ' selected="selected"';
      }
      else {
        $selected = '';
      }
      $options .= '<option class="' . drupal_clean_css_identifier($key) .' '.$choiceClass.'"  value="' . check_plain($key) . '"' . $selected . '>' . check_plain($choice) . '</option>';
    }
  }
  return $options;
}
function myBlockMonth($m){

    switch($m){
      case '01' : return 'janv';
      break;
      case '02' : return 'fév';
      break;
      case '03' : return 'mars';
      break;
      case '04' : return 'avr';
      break;
      case '05' : return 'mai';
      break;
      case '06' : return 'juin';
      break;
      case '07' : return 'juil';
      break;
      case '08' : return 'aout';
      break;
      case '09' : return 'sept';
      break;
      case '10' : return 'oct';
      break;
      case '11' : return 'nov';
      break;
      case '12' : return 'déc';
      break;
    }

  }
  function myBlockMonthFull($m){

    switch($m){
      case '01' : return 'janvier';
      break;
      case '02' : return 'février';
      break;
      case '03' : return 'mars';
      break;
      case '04' : return 'avril';
      break;
      case '05' : return 'mai';
      break;
      case '06' : return 'juin';
      break;
      case '07' : return 'juillet';
      break;
      case '08' : return 'août';
      break;
      case '09' : return 'septembre';
      break;
      case '10' : return 'octobre';
      break;
      case '11' : return 'novembre';
      break;
      case '12' : return 'décembre';
      break;
    }

  }
/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 */
function mshbv2_preprocess_node(&$vars) {

 $node = $vars['node'];
$emb = '';
$diapo='';
$texte='';
        if(isset($node->field_medias_embarques["und"])){
            foreach($node->field_medias_embarques["und"] as $kk=>$vv){
                $emb .= $node->field_medias_embarques["und"][$kk]["value"];
            }
        }
        if(isset($node->body["und"][0]["value"]) && $node->body["und"][0]["value"] != ''){
            $texte = nl2br($node->body["und"][0]["value"]);
        }else{
            $texte = '';
        }
        // Diaporama
        if(isset($node->field_image["und"])){
            $diapo = '<div class="slider">';
            foreach($node->field_image["und"] as $kk=>$vv){
                $eev = explode("public://",$node->field_image["und"][$kk]["uri"]);
                $diapo .= '<div><img src="/sites/default/files/'.$eev[1].'" width="800" height="600" /></div>';
            }
            $diapo .= '</div>';
        }else{
            $diapo = '';
        }
        $contenu = '<div class="row">
        <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-10">
                                '.$emb.'
                                '.$diapo.'
                                <div class="" style="margin-top:30px;">'.$texte.'</div>
                            </div>
        <div class="col-md-1">&nbsp;</div>

                        </div>';
$vars['contenu']=$contenu;
}

//modification du fil rss
function mshbv2_preprocess_views_view_row_rss(&$vars) {
  $view = $vars['view'];
  $item = $vars['row'];

//error_log("mshbv2_preprocess_views_view_row_rss row=".print_r($item,true));
//error_log("mshbv2_preprocess_views_view_row_rss description=".print_r($vars['description'],true));

  // Retrieve $node data:
  $id = $item->nid;
  $node = node_load($id);
  $typeNode = node_type_get_type($node);

  $description = '';
  if ($typeNode->type == 'actualites' ) {
    $sousTitre = field_get_items('node', $node, 'field_sstitre_bloc');

    if (! empty($sousTitre ) && ! empty($sousTitre[0] ) && ! empty($sousTitre[0]['safe_value'])){
      $sousTitre = strip_tags($sousTitre[0]['safe_value']);
      //ajout du sous titre dans le sujet de l'actu
      $vars['title'] = check_plain($item->title).' '.$sousTitre;

    }

  //ajout du titre et du sous titre dans le contenu
    $description =$vars['description'];
    $description = check_plain('<h2>').$vars['title'].check_plain('</h2>').$description;
    $vars['description'] = $description;

  }
  else if ( $typeNode->type == 'article') {
  //ajout du titre dans le contenu
   $description =$vars['description'];
    $description = check_plain('<h2>').$vars['title'].check_plain('</h2>').$description;
    $vars['description'] = $description;
  }
}
