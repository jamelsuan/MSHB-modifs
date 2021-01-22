<?php
  //print_r($node);
?>
<div class="node-article">
  <div class="bloc-projet-liste-head bloc-projet-liste-head-single">
    <div class="bloc-projet-liste-head-titre" style="color:#FFF;">
      <?php
        print ('<b>'.$node->field_acronyme["und"][0]["value"].'</b> - ');
        print $node->title;
      ?>
    </div>
  </div>
  <?php
  //Gestion de l'image
    if(isset($node->field_image["und"][0]["uri"]) && $node->field_image["und"][0]["uri"] != ''){
      $eee = explode("public://",$node->field_image["und"][0]["uri"]);
      $image = '<img src="/sites/default/files/'.$eee[1].'" alt="'.$node->field_image["und"][0]["alt"].'" title="'.$node->field_image["und"][0]["title"].'" style="max-width:200px;" />';
    }else{$image = '';}
  ?>
  <section class="row" style="margin-left:0;margin-top:10px;">
    <div class="col-lg-7">
    <?php
      if(isset($node->field_porteur_projet["und"][0]["value"]) && $node->field_porteur_projet["und"][0]["value"] != ''){
        $porteur = $node->field_porteur_projet["und"][0]["value"];
      }
      if(isset($node->field_laboratoire_rattachemen["und"][0]["value"]) && $node->field_laboratoire_rattachemen["und"][0]["value"] != ''){
        $labo = $node->field_laboratoire_rattachemen["und"][0]["value"];
      }
      if(isset($node->field_contacts["und"][0]["value"]) && $node->field_contacts["und"][0]["value"] != ''){
        $contact = $node->field_contacts["und"][0]["value"];
      }
      if(isset($node->field_disciplines["und"][0]["value"]) && $node->field_disciplines["und"][0]["value"] != ''){
        $disciplines = '<div><b>Interdisciplines</b> : '.$node->field_disciplines["und"][0]["value"].'</div>';
      }
      
    ?>
    <div><b>Responsable scientifique</b> : <?php print $porteur; ?> / <?php print $labo; ?> / <a href="mailto:<?php print $contact; ?>">Contact email</a></div>
    <?php
      print $disciplines;
      if(isset($node->field_partenaires_regionaux["und"][0]["value"]) && $node->field_partenaires_regionaux["und"][0]["value"] != ''){
        print '<div><b>Partenaires régionaux</b> : '.$node->field_partenaires_regionaux["und"][0]["value"].'</div>';
      }
      if(isset($node->field_partenaires_nationaux["und"][0]["value"]) && $node->field_partenaires_nationaux["und"][0]["value"] != ''){
        print '<div><b>Partenaires nationaux</b> : '.$node->field_partenaires_nationaux["und"][0]["value"].'</div>';
      }
      if(isset($node->field_partenaires_internationaux["und"][0]["value"]) && $node->field_partenaires_internationaux["und"][0]["value"] != ''){
        print '<div><b>Partenaires internationaux</b> : '.$node->field_partenaires_internationaux["und"][0]["value"].'</div>';
      }
      // Pôle principal
      $tid = $node->field_pole["und"][0]["tid"];
      $term = taxonomy_term_load($tid);
      if($term->field_type_pole["und"][0]["value"] == 1) $po = '<b>Pôle</b> : ';
      else $po = '';
      print('<div class="">'.$po.''.$term->field_pole_long["und"][0]["safe_value"].'</div>');
      // Pôle second
      if(isset($node->field_pole_second["und"][0]["tid"]) && $node->field_pole_second["und"][0]["tid"] != $node->field_pole["und"][0]["tid"]){
        $tid = $node->field_pole_second["und"][0]["tid"];
        $term = taxonomy_term_load($tid);
        if($term->field_type_pole["und"][0]["value"] == 1) $po = '<b>Pôle</b> : ';
        else $po = '';
        print('<div class="">'.$po.''.$term->field_pole_long["und"][0]["safe_value"].'</div>');
      }

    ?>
    </div>
    <div class="col-lg-4">
      <?php
        print $image;
        if(isset($node->field_carnet_de_recherche["und"][0]["value"]) && $node->field_carnet_de_recherche["und"][0]["value"] != '' && $node->field_carnet_de_recherche["und"][0]["value"] != 'http://'){
          print '<a href="'.$node->field_carnet_de_recherche["und"][0]["value"].'" target="_blank">Site/Blog du projet</a>';
        }
      ?>

    </div>


  </section>
  <section class="row" style="margin-left:15px;margin-right:15px;">
    <div class="col-lg-12 agenda-single-contenu">
    <?php
      print '<div><b>'.$node->field_description_courte["und"][0]["safe_value"].'</b></div>';
      if(isset($node->field_abstract["und"][0]["value"])) print '<div><b>'.$node->field_abstract["und"][0]["value"].'</b></div>';
      print '<div>'.$node->body["und"][0]["safe_value"].'</div>';
    ?>
    </div>
    <div class="col-lg-12" style="margin-top:15px;">
    <?php
      // Affichage des pièces jointes
      //print_r($node);
      if(isset($node->field_docs_lies["und"][0]["filename"])){
        // On liste tous les fichiers
        print '<br /><b>À télécharger :</b><br /><ul>';
        foreach($node->field_docs_lies["und"] as $pjk=>$pjv){
          if($node->field_docs_lies["und"][$pjk]["description"] != '') $titre = $node->field_docs_lies["und"][$pjk]["description"];
          else $titre = $node->field_docs_lies["und"][$pjk]["filename"];
          // Extension
          $expExt = explode('/',$node->field_docs_lies["und"][$pjk]["filemime"]);
          // Taille
          if($node->field_docs_lies["und"][$pjk]["filesize"] > 1000000) $taille = number_format(($node->field_docs_lies["und"][$pjk]["filesize"] / 1000000),2).' Mo';
          else $taille = number_format(($node->field_docs_lies["und"][$pjk]["filesize"] / 1000),2).' Ko';

          print '<li><a href="'.file_create_url($node->field_docs_lies["und"][$pjk]["uri"]).'" target="_blank">'.$titre.'</a> ('.$expExt[1].' - '.$taille.') </li>';
        }
        print '</ul>';
      }
    ?>
    <?php
      if(isset($node->field_mots_cles["und"][0]["value"])){
        $liste = '';
        $expMot = explode(",",$node->field_mots_cles["und"][0]["value"]);
        foreach($expMot as $k=>$v){
          $liste .= '<a href="search/node/'.$v.'">'.$v.'</a> ';
        }
        print '<div><b>Mots clés :</b> '.$liste.'</div>';
      }
      if(isset($node->field_type_aide["und"][0]["tid"])){
        // Aide
        $tid = $node->field_type_aide["und"][0]["tid"];
        $term = taxonomy_term_load($tid);
        // Durée
        if(isset($node->field_projet_dates["und"][0]["value"])){
          $exp11 = explode('T',$node->field_projet_dates["und"][0]["value"]);
          $exp12 = explode('-',$exp11[0]);
          $debut = $exp12[2].'-'.$exp12[1].'-'.$exp12[0];
        }
        if(isset($node->field_projet_dates["und"][0]["value2"])){
          $exp21 = explode('T',$node->field_projet_dates["und"][0]["value2"]);
          $exp22 = explode('-',$exp21[0]);
          $fin = ' / '.$exp22[2].'-'.$exp22[1].'-'.$exp22[0];
        }
        // Affichage
        print('<div class=""><b>Type d\'aide</b> : '.$term->name.' / <b>Durée</b> : '.$debut.' '.$fin.'</div>');
      }
    ?>
    </div>
  </section>
  <br>
</div>
<?php
  if(isset($_GET["retour"])) $retour = $_GET["retour"];
  else $retour = 'projets';

?>
<div class="projet-retour"><a href="<?php print $retour; ?>">Retour aux projets</a></div>