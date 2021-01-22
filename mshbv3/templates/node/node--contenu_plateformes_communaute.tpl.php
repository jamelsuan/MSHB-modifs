<style>
    h1[id^="content"] {
        padding-top: 70px;
        position: relative;
        top: -70px;
        margin-bottom: -70px;
    }
</style>
<section>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <ul class="poles-menu">
                        <li><a href="#content-groupe-travail"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-seminaire"><?php echo $node->field_titre_bloc_2["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-comite"><?php echo $node->field_titre_bloc_7["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-collaborations"><?php echo $node->field_titre_bloc_4["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-acteurs"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- bloc groupe de travail -->
<section>
  <div class="container container_titre">
      <h1 id="content-groupe-travail"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc["und"][0]["value"]; ?></span></p>
  </div>

    <div class="container">
        <div class="row">
            <?php if(isset($node->field_liste_direction["und"]) && $node->field_liste_direction["und"][0]["value"] != ''){ ?>
            <div class="col-md-6">
            <?php }
            else { ?>
            <div class="col-md-9">
            <?php } ?>
                <?php echo $node->field_col1_bloc["und"][0]["value"]; ?>
            </div>
            <?php if(isset($node->field_liste_direction["und"]) && $node->field_liste_direction["und"][0]["value"] != ''){?>
            <div class="col-md-3">
                <h2 style="text-align: center;">référents</h2>
                <?php
                    // référents
                        $expR = explode(',',$node->field_liste_direction["und"][0]["value"]);
                        foreach($expR as $kd=>$vd){
                            $nodeDir = node_load($vd);
                            // Image
                            if(isset($nodeDir->field_image["und"][0]["uri"]) && $nodeDir->field_image["und"][0]["uri"] != ''){
                                $eee = explode("public://",$nodeDir->field_image["und"][0]["uri"]);
                                $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" style="padding-bottom:0;" class="img-responsive" alt="'.$nodeDir->field_image["und"][0]["alt"].'" title="'.$nodeDir->field_image["und"][0]["alt"].'" /></div>';
                            }else{
                                $image = '<img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" style="padding-bottom:0;" class="img-responsive" />';
                            }
                            // Infos
                            // Lien
                            if(isset($nodeDir->field_mail["und"][0]["value"]) && $nodeDir->field_mail["und"][0]["value"] != ''){
                                $lien = '<a href="mailto:'.$nodeDir->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
                            }else{
                                $lien = '';
                            }
                            // URL
                            $url = '/annuaires_mshb/chercheurs/'.format_url($nodeDir->title.' '.$nodeDir->field_prenom["und"][0]["value"]).'/'.$vd.'/';
                            // Infos
                            $infos = '';
                            if(isset($nodeDir->field_laboratoire_rattachemen["und"]) && $nodeDir->field_laboratoire_rattachemen["und"][0]["value"] != ''){
                                $infos .= $nodeDir->field_laboratoire_rattachemen["und"][0]["value"];
                            }
                            if(isset($nodeDir->field_etablissement["und"]) && $nodeDir->field_etablissement["und"][0]["value"] != ''){
                              if($infos != '') $infos .= '<br />';
                              $infos .= $nodeDir->field_etablissement["und"][0]["value"];
                            }
                            echo '<div class="col-md-12 pole-single-responsable">
                                    <a class="lien-resp" href="'.$url.'">'.$image.'</a>
									<div><a class="lien-resp" href="'.$url.'">'.$nodeDir->field_prenom["und"][0]["value"].' '.$nodeDir->title.'</a></div>
             						<div style="font-family:campton_regular">'.$infos.'</div>
                                    <div>'.$lien.'</div>
                                  </div>';
                        }?>
</div>
      <?php              } // fin if referent ?>
            <div class="col-md-3">
                <h2 style="text-align: center;">coordination</h2>
                <?php
                if(isset($node->field_liste_equipe_admin["und"]) && $node->field_liste_equipe_admin["und"][0]["value"] != ''){
                    $expR = explode(',',$node->field_liste_equipe_admin["und"][0]["value"]);
                    $nb = 1;
                    $coord = '';
                    $groupe = '';
                    foreach($expR as $kd=>$vd){
                        $nodeDir = node_load($vd);
                        // Image
                        if(isset($nodeDir->field_image["und"][0]["uri"]) && $nodeDir->field_image["und"][0]["uri"] != ''){
                            $eee = explode("public://",$nodeDir->field_image["und"][0]["uri"]);
                            $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" style="padding-bottom:0;" class="img-responsive" alt="'.$nodeDir->field_image["und"][0]["alt"].'" title="'.$nodeDir->field_image["und"][0]["alt"].'" /></div>';
                        }else{
                            $image = '<img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" style="padding-bottom:0;" class="img-responsive" />';
                        }
                        // Infos
                        // Lien
                        if(isset($nodeDir->field_mail["und"][0]["value"]) && $nodeDir->field_mail["und"][0]["value"] != ''){
                            $lien = '<a href="mailto:'.$nodeDir->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
                        }else{
                            $lien = '';
                        }
                        // URL
                        $url = '/annuaires_mshb/chercheurs/'.format_url($nodeDir->title.' '.$nodeDir->field_prenom["und"][0]["value"]).'/'.$vd.'/';
                        // Infos
                        $infos = '';
                        if(isset($nodeDir->field_laboratoire_rattachemen["und"]) && $nodeDir->field_laboratoire_rattachemen["und"][0]["value"] != ''){
                            $infos .= $nodeDir->field_laboratoire_rattachemen["und"][0]["value"];
                        }
                        if(isset($nodeDir->field_etablissement["und"]) && $nodeDir->field_etablissement["und"][0]["value"] != ''){
                          if($infos != '') $infos .= '<br />';
                          $infos .= $nodeDir->field_etablissement["und"][0]["value"];
                        }
                        $infos = '<div class="col-md-12 pole-single-responsable">
                                    <a class="lien-resp" href="'.$url.'">'.$image.'</a>
									                   <div><a class="lien-resp" href="'.$url.'">'.$nodeDir->field_prenom["und"][0]["value"].' '.$nodeDir->title.'</a></div>
             						             <div style="font-family:campton_regular">'.$infos.'</div>
                                    <div>'.$lien.'</div>
                                  </div>';
                        // On range
                        if($nb == 1){
                            $coord .= $infos;
                        }
                        $groupe .= str_replace('col-md-12','col-md-4',$infos);
                        $nb++;
                    }
                }
                echo $coord;
                echo '';
                ?>
                <!-- Modal - Lire la suite -->
                <div id="modal-groupe" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Liste des membres du groupe de travail</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <p><?php echo $groupe; ?></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" data-dismiss="modal">Fermer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 btn-link btn-plateforme">
                    <a href="javascript:;" class="btn-groupe-humanite" data-toggle="modal" data-target="#modal-groupe">Liste des membres</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--bloc séminaire -->
<section>
    <div class="container container_titre">
        <h1 id="content-seminaire"><?php echo $node->field_titre_bloc_2["und"][0]["value"]; ?></h1>
        <p><span><?php echo $node->field_sstitre_bloc_2["und"][0]["value"]; ?></span></p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php echo $node->field_field_col1_bloc_2["und"][0]["value"]; ?>
            </div>
            <div class="col-md-2">
                &nbsp;
            </div>
            <div class="col-md-4">
                <?php
                    // Infos sur les séminaires
                    $expM = explode('|',$node->field_section["und"][0]["value"]);
                    // Affichage du bloc Média
                    $nodeMedia = node_load($expM[0]);
                    if(isset($nodeMedia->field_medias_embarques["und"]) && $nodeMedia->field_medias_embarques["und"][0]["value"] != ''){
                        $media = $nodeMedia->field_medias_embarques["und"][0]["value"];
                    }else{
                        $media = '';
                    }
                    // Url
                    $urlTitre = '<a href="/medias_mshb/'.format_url($expM[1]).'/'.$expM[0].'/">'.$nodeMedia->title.'</a>';
                    //print_r($nodeMedia);
                ?>
                <h2 style="text-align: center;"><?php print $expM[1]; ?></h2>
                <div class="col-md-12 bloc-com-embed"><?php print $media; ?></div>
                <div class="bloc-com-titre"><?php print $urlTitre; ?></div>
                <div class="bloc-com-titre"><?php print $nodeMedia->body["und"][0]["safe_summary"]; ?></div>
                <div class="btn-link btn-plateforme">
                    <a href="/medias_mshb/?filtre=222" class="btn-groupe-humanite">Voir tous les séminaires</a>
                </div>
                <br />
                <?php
                    // Affichage bloc infos
                //print_r($node);
                    if(isset($node->field_bloc_liens["und"]) && $node->field_bloc_liens["und"][0]["safe_value"] != ''){
                        echo '<div class="col-md-12 bloc-plateforme-liens">
                                <h3 style="text-align:center;"><img src="/sites/all/themes/mshbv2/img/pictos/picto-liens.png" style="vertical-align: initial;" width="22" height="22"> liens</h3>
                                '.$node->field_bloc_liens["und"][0]["safe_value"].'
                             </div>';
                    }
                ?>
            </div>
        </div>
    </div>

</section>

<!-- bloc comite -->
<section>
    <div class="container container_titre">
        <h1 id="content-comite"><?php echo $node->field_titre_bloc_7["und"][0]["value"]; ?></h1>
        <p><span><?php echo $node->field_sstitre_bloc_7["und"][0]["value"]; ?></span></p>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-6">
                <?php echo $node->field_col1_bloc_7["und"][0]["value"]; ?>
            </div>
            <div class="col-md-6">
                <?php echo $node->field_col2_bloc_7["und"][0]["value"]; ?>
            </div>
            <div class="col-md-12 ">
                <?php
                if(isset($node->field_liste_equipe_bloc_7["und"]) && $node->field_liste_equipe_bloc_7["und"][0]["value"] != ''){
                    $expR7 = explode(',',$node->field_liste_equipe_bloc_7["und"][0]["value"]);
                    $nbC = 1;
                    $coordComite = '';
                    $groupeComite = '';
                    foreach($expR7 as $kd=>$vd){
                        $nodeDir = node_load($vd);
                        // Image
                        if(isset($nodeDir->field_image["und"][0]["uri"]) && $nodeDir->field_image["und"][0]["uri"] != ''){
                            $eee = explode("public://",$nodeDir->field_image["und"][0]["uri"]);
                            $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" style="padding-bottom:0;" class="img-responsive" alt="'.$nodeDir->field_image["und"][0]["alt"].'" title="'.$nodeDir->field_image["und"][0]["alt"].'" /></div>';
                        }else{
                            $image = '<img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" style="padding-bottom:0;" class="img-responsive" />';
                        }
                        // Infos
                        // Lien
                        if(isset($nodeDir->field_mail["und"][0]["value"]) && $nodeDir->field_mail["und"][0]["value"] != ''){
                            $lien = '<a href="mailto:'.$nodeDir->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
                        }else{
                            $lien = '';
                        }
                        // URL
                        $url = '/annuaires_mshb/chercheurs/'.format_url($nodeDir->title.' '.$nodeDir->field_prenom["und"][0]["value"]).'/'.$vd.'/';
                        // Infos
                        $infos = '';
                        if(isset($nodeDir->field_laboratoire_rattachemen["und"]) && $nodeDir->field_laboratoire_rattachemen["und"][0]["value"] != ''){
                            $infos .= $nodeDir->field_laboratoire_rattachemen["und"][0]["value"];
                        }
                        if(isset($nodeDir->field_etablissement["und"]) && $nodeDir->field_etablissement["und"][0]["value"] != ''){
                          if($infos != '') $infos .= '<br />';
                          $infos .= $nodeDir->field_etablissement["und"][0]["value"];
                        }
                        $infos = '<div class="col-md-12 pole-single-responsable">
                                    <a class="lien-resp" href="'.$url.'">'.$image.'</a>
									                   <div><a class="lien-resp" href="'.$url.'">'.$nodeDir->field_prenom["und"][0]["value"].' '.$nodeDir->title.'</a></div>
             						             <div style="font-family:campton_regular">'.$infos.'</div>
                                    <div>'.$lien.'</div>
                                  </div>';
                        // On range
                        if($nbC == 1){
                            $coordComite .= $infos;
                        }
                        $groupeComite .= str_replace('col-md-12','col-md-4',$infos);
                        $nbC++;
                    }
                
                //echo $coordComite;
                //echo '';
                ?>
                <!-- Modal - Lire la suite -->
                <div id="modal-comite" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Comité</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <p><?php echo $groupeComite; ?></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" data-dismiss="modal">Fermer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 btn-link btn-plateforme col-md-offset-4">
                    <a href="javascript:;" class="btn-groupe-humanite" data-toggle="modal" data-target="#modal-comite">Comité</a>
                </div>
              <?php } //fin si personnes définies dans comité ?>
            </div>
        </div><!-- fin row -->
    </div><!-- fin container -->

</section>
<!-- bloc collaborations -->
<section>
    <div class="container container_titre">
        <h1 id="content-collaborations"><?php echo $node->field_titre_bloc_4["und"][0]["value"]; ?></h1>
        <p><span><?php echo $node->field_sstitre_bloc_4["und"][0]["value"]; ?></span></p>
    </div>
    <div class="container">
        <div class="row">
            <?php if (isset($node->field_col2_bloc_5["und"]) && $node->field_col2_bloc_5["und"][0]["value"] != ''){ ?>
            <div class="col-md-6">
            <?php }
              else { ?>
            <div class="col-md-12">
            <?php } 
               echo $node->field_col1_bloc_5["und"][0]["value"]; ?>
            </div>
             <?php if (isset($node->field_col2_bloc_5["und"]) && $node->field_col2_bloc_5["und"][0]["value"] != ''){ ?>
            <div class="col-md-6">
                <?php echo $node->field_col2_bloc_5["und"][0]["value"]; ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                // On parcourt tous les partenaires
                $listeA = taxonomy_get_tree(27,0,1,TRUE);
                //$nbA = 1;
                $listPart = array();
                foreach($listeA as $kk => $vv){
                    // Type partenairiats
                    if(isset($listeA[$kk]->field_type_partenariats["und"]) && $listeA[$kk]->field_type_partenariats["und"][0]["tid"] > 0 ){
                        $type = (int)$listeA[$kk]->field_type_partenariats["und"][0]["tid"];
                    }else{
                        $type = 0;
                    }
                    // Image
                    if(isset($listeA[$kk]->field_image["und"][0]["uri"]) && $listeA[$kk]->field_image["und"][0]["uri"] != ''){
                        $eee = explode("public://",$listeA[$kk]->field_image["und"][0]["uri"]);
                        $image = '<img src="/sites/default/files/'.$eee[1].'" alt="'.$listeA[$kk]->field_image["und"][0]["alt"].'" id="image_bandeau" title="'.$listeA[$kk]->field_image["und"][0]["alt"].'" />';
                    }else{
                       $image = '';
                    }
                    // Liens
                    if(isset($listeA[$kk]->field_bloc_liens["und"]) && $listeA[$kk]->field_bloc_liens["und"][0]["value"] != ''){
                        $liens = '<div><img src="/sites/all/themes/mshbv2/img/pictos/picto-liens.png" style="vertical-align: initial;" width="12" height="12"> <b style="font-family:campton_regular">liens</b><br />'.$listeA[$kk]->field_bloc_liens["und"][0]["value"].'</div>';
                    }else{
                        $liens = '';
                    }
                    // Fichiers
                    if(isset($listeA[$kk]->field_docs_lies["und"]) && $listeA[$kk]->field_docs_lies["und"][0]["description"] != ''){
                        $fichiers = '';
                        foreach($listeA[$kk]->field_docs_lies["und"] as $kkk=>$vvv){
                            $fichiers .= '<div><img src="/sites/all/themes/mshbv2/img/pictos/picto-tel.png" style="vertical-align: initial;" width="12" height="12"> <a href="/sites/default/files/'.$listeA[$kk]->field_docs_lies["und"][$kkk]["filename"].'" target="_blank">'.$listeA[$kk]->field_docs_lies["und"][$kkk]["description"].'</a></div>';
                        }
                    }else{
                        $fichiers = '';
                    }
                    /*if($nbA == 1) echo '<div class="row" style="margin-bottom:30px;">';
                    else $ssel = '';*/
                    $listPart[$type][] = '<div class="col-md-3 col-centered">
                            <div>'.$image.'</div>
                            <div>'.$listeA[$kk]->description.'</div>
                            '.$liens.'
                            '.$fichiers.'
                           </div>';
                    /*if($nbA == 4){
                        echo '</div>';
                        $nbA = 1;
                    }else{
                        $nbA++;
                    }*/
                }
                //print_r($listActeurs);
                //if($nbA > 1) echo '</div>';
                // On affiche tous les types
                $listeType = taxonomy_get_tree(28,0,1,TRUE);
                foreach($listeType as $k1=>$v1){
                    echo '<h3 style="text-align: center;">'.$listeType[$k1]->name.'</h3>';
                    // On affiche la liste des acteurs
                    $nbA = 1;
                    foreach($listPart[$listeType[$k1]->tid] as $kkk=>$vvv) {
                        // Début de ligne
                        if($nbA == 1) echo '<div class="row row-centered" style="margin-bottom:30px;">';
                        else $ssel = '';
                        echo $vvv;
                        // Fin de ligne
                        if($nbA == 4){
                            echo '</div>';
                            $nbA = 1;
                        }else{
                            $nbA++;
                        }
                    }
                    if($nbA > 1) echo '</div>';
                }
                // On affiche les non rattachés
                if(isset($listPart[0])){
                    $nbA = 1;
                    foreach($listPart[0] as $kkk=>$vvv){
                        // Début de ligne
                        if($nbA == 1) echo '<div class="row row-centered" style="margin-bottom:30px;">';
                        else $ssel = '';
                        echo $vvv;
                        // Fin de ligne
                        if($nbA == 4){
                            echo '</div>';
                            $nbA = 1;
                        }else{
                            $nbA++;
                        }
                    }
                    if($nbA > 1) echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

</section>
<!-- bloc acteurs -->
<section>
    <div class="container container_titre">
        <h1 id="content-acteurs"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></h1>
        <p><span><?php echo $node->field_sstitre_bloc_3["und"][0]["value"]; ?></span></p>
    </div>
    <div class="container">
        <div class="row">
             <?php if (isset($node->field_col2_bloc_3["und"]) && $node->field_col2_bloc_3["und"][0]["value"] != ''){ ?>
            <div class="col-md-6">
            <?php }
              else { ?>
            <div class="col-md-12">
            <?php }
               echo $node->field_col1_bloc_3["und"][0]["value"]; ?>
            </div>
             <?php if (isset($node->field_col2_bloc_3["und"]) && $node->field_col2_bloc_3["und"][0]["value"] != ''){ ?>
            <div class="col-md-6">
                <?php echo $node->field_col2_bloc_3["und"][0]["value"]; ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                // On parcours tous les acteurs
                $listeA = taxonomy_get_tree(23,0,1,TRUE);
                //$nbA = 1;
                $listActeurs = array();
                foreach($listeA as $kk => $vv){
                    // Type acteur
                    if(isset($listeA[$kk]->field_type_acteurs["und"]) && $listeA[$kk]->field_type_acteurs["und"][0]["tid"] > 0 ){
                        $type = (int)$listeA[$kk]->field_type_acteurs["und"][0]["tid"];
                    }else{
                        $type = 0;
                    }
                    // Image
                    if(isset($listeA[$kk]->field_image["und"][0]["uri"]) && $listeA[$kk]->field_image["und"][0]["uri"] != ''){
                        $eee = explode("public://",$listeA[$kk]->field_image["und"][0]["uri"]);
                        $image = '<img src="/sites/default/files/'.$eee[1].'" alt="'.$listeA[$kk]->field_image["und"][0]["alt"].'" id="image_bandeau" title="'.$listeA[$kk]->field_image["und"][0]["alt"].'" />';
                    }else{
                        $image = '<img class="acteur-default-image" src="/sites/all/themes/mshbv2/img/bandeaux/bandeau_acteur.jpg" title="'.$listeA[$kk]->name.'"/><div class="acteur-title">'.strtoupper($listeA[$kk]->name).'</div>';
                    }
                    // Liens
                    if(isset($listeA[$kk]->field_bloc_liens["und"]) && $listeA[$kk]->field_bloc_liens["und"][0]["value"] != ''){
                        $liens = '<div><img src="/sites/all/themes/mshbv2/img/pictos/picto-liens.png" style="vertical-align: initial;" width="12" height="12"> <b style="font-family:campton_regular">liens</b><br />'.$listeA[$kk]->field_bloc_liens["und"][0]["value"].'</div>';
                    }else{
                        $liens = '';
                    }
                    // Fichiers
                    if(isset($listeA[$kk]->field_docs_lies["und"]) && $listeA[$kk]->field_docs_lies["und"][0]["description"] != ''){
                        $fichiers = '';
                        foreach($listeA[$kk]->field_docs_lies["und"] as $kkk=>$vvv){
                            $fichiers .= '<div><img src="/sites/all/themes/mshbv2/img/pictos/picto-tel.png" style="vertical-align: initial;" width="12" height="12"> <a href="/sites/default/files/'.$listeA[$kk]->field_docs_lies["und"][$kkk]["filename"].'" target="_blank">'.$listeA[$kk]->field_docs_lies["und"][$kkk]["description"].'</a></div>';
                        }
                    }else{
                        $fichiers = '';
                    }
                    /*if($nbA == 1) echo '<div class="row" style="margin-bottom:30px;">';
                    else $ssel = '';*/
                    $listActeurs[$type][] = '<div class="col-md-3 col-centered">
                            <div class="acteur-image-container">'.$image.'</div>
                            <div class="acteur-description">'.$listeA[$kk]->description.'</div>
                            '.$liens.'
                            '.$fichiers.'
                           </div>';
                    /*if($nbA == 4){
                        echo '</div>';
                        $nbA = 1;
                    }else{
                        $nbA++;
                    }*/
                }
                //print_r($listActeurs);
                //if($nbA > 1) echo '</div>';
                // On affiche tous les types
                $listeType = taxonomy_get_tree(25,0,1,TRUE);
                foreach($listeType as $k1=>$v1){
                    echo '<h3 style="text-align: center;">'.$listeType[$k1]->name.'</h3>';
                    // On affiche la liste des acteurs
                    $nbA = 1;
                    foreach($listActeurs[$listeType[$k1]->tid] as $kkk=>$vvv){
                        // Début de ligne
                        if($nbA == 1) echo '<div class="row row-centered" style="margin-bottom:30px;">';
                        else $ssel = '';
                        echo $vvv;
                        // Fin de ligne
                        if($nbA == 4){
                            echo '</div>';
                            $nbA = 1;
                        }else{
                            $nbA++;
                        }
                    }
                    if($nbA > 1) echo '</div>';
                }
                // On affiche les non rattachés
                if(isset($listActeurs[0])){
                    $nbA = 1;
                    foreach($listActeurs[0] as $kkk=>$vvv){
                        // Début de ligne
                        if($nbA == 1) echo '<div class="row row-centered" style="margin-bottom:30px;">';
                        else $ssel = '';
                        echo $vvv;
                        // Fin de ligne
                        if($nbA == 4){
                            echo '</div>';
                            $nbA = 1;
                        }else{
                            $nbA++;
                        }
                    }
                    if($nbA > 1) echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

</section>
