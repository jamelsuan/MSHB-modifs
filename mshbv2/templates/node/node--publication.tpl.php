<div class="node-publication">
  <?php print render($content); ?>
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
  ?><br>
  <div class="agenda-retour"><a href="/publications">Retour aux publications</a></div>
</div>