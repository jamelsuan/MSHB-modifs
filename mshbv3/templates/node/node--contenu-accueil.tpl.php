<!-- HEADER -->
<?php
global $base_path;
?>
<section >
    <div class="container_header_home">
        <?php
        // Diaporama
        if(isset($node->field_image_diaporama["und"])){
            $diapo = '<div class="slider">';
            foreach($node->field_image_diaporama["und"] as $kk=>$vv){
                $eev = explode("public://",$node->field_image_diaporama["und"][$kk]["uri"]);
                $diapo .= '<div><img src="'.$base_path.'sites/default/files/'.$eev[1].'" width="1200" height="480" /></div>';
            }
            $diapo .= '</div>';

        }else{
            $diapo = '';
        }
        ?>
        <?php print $diapo; ?>
        <p><span class="sstitre"><?php print nl2br($node->field_sstitre_bandeau["und"][0]["value"]); ?></span></p>
    </div>
</section>
<!-- /HEADER -->

<!-- HOME -->
<section>
    <div class="container container-bloc-home">
        <div class="row">
            <div class="col-md-12">
                <h1><?php if(isset($node->field_titre_bloc_2["und"])) print $node->field_titre_bloc_2["und"][0]["value"]; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p style="-moz-column-count:2;
	-moz-colum-width:50%;
	-moz-column-gap:20px;
	-webkit-column-count:2;
	-webkit-colum-width:30%;
	-webkit-column-gap:20px;
	column-count: 2;
	colum-width:50%;
	column-gap:20px;"><?php if(isset($node->field_col1_bloc["und"])) print nl2br($node->field_col1_bloc["und"][0]["value"]); ?></p>
            </div>
            <div class="col-md-12">
                <?php if(isset($node->field_lien_liste["und"])) print $node->field_lien_liste["und"][0]["safe_value"]; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 bloc-home-actus">
                <?php
                // Affichage des dernières actualités
                if($node->field_accueil_actus_liste["und"][0]["value"] == ''){
                    // On affiche la dernière actualité
                    $ladate = date("Y-m-d 23:59:59");
                    $query = db_select('node', 'n');
                    $query->leftJoin('field_data_field_dates', 'date', 'n.nid = date.entity_id');
                    $query->groupBy('n.nid');
                    $query->fields('n',array('nid','title','created'))//SELECT the fields from node
                    ->condition('n.type', 'actualites','=')
                        ->condition('date.field_dates_value', $ladate,'<=')
                        ->orderBy('date.field_dates_value', 'desc')
                        ->range(0,1);

                    $record = $query->execute()->fetchAssoc();
                    $myIdA = $record['nid'];
                }else{
                    // On affiche l'une des actualités de la liste
                    $expA = explode(',',$node->field_accueil_actus_liste["und"][0]["value"]);
                    $idA = rand(0,count($expA) - 1);
                    $myIdA = $expA[$idA];
                }
                // Affichage des informations
                $nodeA = node_load($myIdA);

                $url = '/actualites_mshb/'.format_url($nodeA->title).'/'.$myIdA.'/';
                $titreA = '<a href="'.$url.'">'.$nodeA->title.'</a>';
                // Résumé
                //$mybody = strip_tags($nodeA->body["und"][0]["safe_value"]);
                //$mybody = substr($mybody,0,75);
                if(isset($nodeA->field_resume_recherche["und"][0]) && $nodeA->field_resume_recherche["und"][0]["value"] != ''){
                    $mybody = $nodeA->field_resume_recherche["und"][0]["value"];
                }else{
                    $mybody = '';
                }

                // Lire la suite
                $suite = '';
                $externe = '';
                if(isset($nodeA->field_acces_detail["und"][0]) && $nodeA->field_acces_detail["und"][0]["value"] == 1){
                    $suite = '<a href="'.$url.'" class="ensavoirplus">Lire la suite</a>';
                }else{
                    if(isset($nodeA->field_lien_liste["und"][0]) && $nodeA->field_lien_liste["und"][0]["value"] != ''){
                        $expLien = explode('|',$nodeA->field_lien_liste["und"][0]["value"]);
                        $suite = '<a href="'.$expLien[1].'" target="_blank" class="ensavoirplus">'.$expLien[0].'</a>';
                    }
                }
                // Image
                if(isset($nodeA->field_image["und"][0]["uri"]) && $nodeA->field_image["und"][0]["uri"] != ''){
                    $eee = explode("public://",$nodeA->field_image["und"][0]["uri"]);
                    $image = '<img src="'.$base_path.'sites/default/files/'.$eee[1].'" alt="'.$nodeA->field_image["und"][0]["alt"].'" id="image_bandeau" class="image_bandeau_type-1" title="'.$nodeA->field_image["und"][0]["alt"].'" />';
                }else{
                    $image = '';
                }
                ?>
                <h3><a href="/actualites_mshb/">actualités</a></h3>
                <div class="projet_item">
                    <div style="max-height:139px;overflow:hidden;"><?php print $image; ?></div>
                    <div class="bloc-home-actus-titre"><?php print str_replace('<br />',' ',$titreA); ?></div>
                    <p><?php print $mybody.' '.$suite; ?></p>
                </div>

            </div>
            <div class="col-md-4 bloc-home-agenda">
                <?php
                // Affichage des dernières evenements
                if($node->field_accueil_agenda_liste["und"][0]["value"] == ''){
                    // On affiche la dernière evenements
                    $ladate = date("Y-m-d 23:59:59");
                    $query = db_select('node', 'n');
                    $query->leftJoin('field_data_field_dates', 'date', 'n.nid = date.entity_id');
                    $query->groupBy('n.nid');
                    $query->fields('n',array('nid','title','created'))//SELECT the fields from node
                    ->condition('n.type', 'agenda','=')
                        ->condition('date.field_dates_value', $ladate,'>=')
                        ->orderBy('date.field_dates_value', 'asc')
                        ->range(0,1);

                    $record = $query->execute()->fetchAssoc();
                    $myIdE = $record['nid'];
                }else{
                    // On affiche l'une des evenements de la liste
                    $expE = explode(',',$node->field_accueil_agenda_liste["und"][0]["value"]);
                    $idE = rand(0,count($expE) - 1);
                    $myIdE = $expE[$idE];
                }
                // Affichage des informations
                $nodeE = node_load($myIdE);

                $url = '/agenda_mshb/'.format_url($nodeE->title).'/'.$myIdE.'/';
                $titreE = '<a href="'.$url.'">'.$nodeE->title.'</a>';

                // Résumé
                if(isset($nodeE->field_resume_recherche["und"][0]) && $nodeE->field_resume_recherche["und"][0]["value"] != ''){
                    $mybody = $nodeE->field_resume_recherche["und"][0]["value"];
                }else{
                    $mybody = '';
                }
                // Date
                if(isset($nodeE->field_dates["und"][0]) ){
                    $expDate = explode(' ',$nodeE->field_dates["und"][0]["value"]);
                    $expDate2 = explode('-',$expDate[0]);
                    $nodeDate = '<span class="bloc-agenda-liste-jour">'.$expDate2[2].'</span><span class="bloc-agenda-liste-mois">'.french_month($expDate2[1]).' '.$expDate2[0].'</span>';
                }else{
                    $nodeDate = '-';
                }
                // Lieu
                $lieu = '';
                if(isset($nodeE->field_lieu["und"][0]) ){
                    $lieu = $nodeE->field_lieu["und"][0]["value"];
                }else{
                    $lieu = '';
                }
                // Lire la suite
                $suite = '<a href="'.$url.'" class="ensavoirplus">Lire la suite</a>';
                ?>

                <h3><a href="/agenda_mshb/">agenda</a></h3>
                <div class="projet_item">
                    <div class="bloc-home-agenda-date"><?php print $nodeDate.'<div class="bloc-home-agenda-date-lieu">'.$lieu.'</div>'; ?></div>
                    <div class="bloc-home-agenda-titre"><?php print $titreE; ?></div>
                    <p><?php print $mybody.' '.$suite; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <h3><a href="/salles/">service</a></h3>
                <div class="projet_item">
                    <div class="bloc-home-service-img">
                        <div class="projet_header" style="padding-top:50px;">
                            <span style="padding:8px 7px 5px 7px;"><?php print $node->field_infos_services_resa["und"][0]["value"]; ?></span>
                        </div>
                    </div>
                    <?php print $node->field_infos_services["und"][0]["value"]; ?>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h3><a href="<?php echo url('node/2174'); ?>">recherche</a></h3>
                <div class="projet_item">
                    <div class="bloc-home-recherche-img">
                        <div class="projet_header" style="padding-top:50px;">
                            <span style="padding:8px 7px 5px 7px;font-weight: bold;"><a href="<?php echo url('node/2174'); ?>">Appel à projets</a></span>
                        </div>
                    </div>
                    <?php print $node->field_infos_recherche["und"][0]["value"]; ?>
                </div>

            </div>
            <div class="col-md-4">
                <?php
                // Affichage des dernières evenements
                //print_r($node);
                $listeProjet = array();
                if(isset($node->field_accueil_projets_liste["und"]) && $node->field_accueil_projets_liste["und"][0]["value"] != ''){
                    // On affiche l'une des evenements de la liste
                    $listeProjet = explode(',',$node->field_accueil_projets_liste["und"][0]["value"]);
                }else{
                    // On affiche les peojets en cours
                    $query = db_select('node', 'n');
                    $query->leftJoin('field_data_field_decision', 'decision', 'n.nid = decision.entity_id');
                    $query->leftJoin('field_data_field_termine', 'termine', 'n.nid = termine.entity_id');
                    $query->groupBy('n.nid');
                    $query->fields('n',array('nid','title','created'));//SELECT the fields from node
                    $query->fields('decision',array('field_decision_value'))//SELECT the fields from node
                    ->condition('n.type', 'projets','=')
                        ->condition('decision.field_decision_value', 1, '=')
                        ->condition('termine.field_termine_value', 1, '!=')
                        ->orderBy('n.created', 'ASC')//ORDER BY created
                        ->range(0,200);//LIMIT to 2 records

                    $result = $query->execute();
                    $allResult = $query->execute()->fetchAll();
                    $countResult = count($allResult);

                    if($countResult > 0){
                        $listeIdProjet = '';
                        while($record = $result->fetchAssoc()) {
                            if($listeIdProjet != '') $listeIdProjet .= ',';
                            $listeIdProjet .= $record['nid'];
                            $listeProjet = explode(',',$listeIdProjet);
                        }
                    }
                }
                $mypole = '';
                $typePole = '1';
                $acro = '';
                $suiteP = '';
                $titre = '';
                if(!empty($listeProjet)){
                    $idE = rand(0,count($listeProjet) - 1);
                    $myIdE = trim($listeProjet[$idE]);
                    // Affichage des informations
                    $nodeE = node_load($myIdE);

                    // Pole
                    if(isset($nodeE->field_poles["und"]) && $nodeE->field_poles["und"][0]["tid"] > 0){
                        $polee = taxonomy_term_load($nodeE->field_poles["und"][0]["tid"]);
                        // Nom du pole
                        if(isset($polee->field_pole_lie["und"])){
                            $poleOk = taxonomy_term_load($polee->field_pole_lie["und"][0]["tid"]);
                            $mypole = $poleOk->field_pole_court["und"][0]["value"];
                            // Type pole
                            if(isset($poleOk->field_code_couleur["und"]) && $poleOk->field_code_couleur["und"][0]["value"] != ''){
                                $typePole = $poleOk->field_code_couleur["und"][0]["value"];
                            } else{
                                $typePole = '1';
                            }
                        }else{
                            $mypole = '--';
                        }

                    } else{
                        $mypole = '-';
                        $typePole = '1';
                    }
                    // Acronyme
                    if(isset($nodeE->field_acronyme["und"]) && $nodeE->field_acronyme["und"][0]["value"] != ''){
                        $acro = $nodeE->field_acronyme["und"][0]["value"];
                    } else{
                        $acro = '-';
                    }
                    // Url
                    $url = '/projets_mshb/'.format_url($acro).'/'.$myIdE.'/';
                    // Lire la suite
                    $suiteP = '<a href="'.$url.'" class="ensavoirplus">Lire la suite</a>';
                    // Titre
                    $titre = $nodeE->title;
                }

                ?>
                <h3><a href="/projets_mshb">projets</a></h3>
                <div class="projet_item pole_<?php print $typePole; ?>">
                    <div class="projet_header" style="height:139px;padding: 40px 30px;">
                        <h3 style="display:inline-block;"><?php print_r($mypole); ?></h3><br />
                        <h2><?php print_r($acro); ?></h2>
                    </div>
                    <p>
                        <?php print $titre; ?><br />
                        <?php print $suiteP; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                // Affichage des dernières medias
                if($node->field_accueil_medias_liste["und"][0]["value"] == ''){
                    // On affiche la dernière medias
                    $ladate = date("Y-m-d 23:59:59");
                    $query = db_select('node', 'n');
                    $query->leftJoin('field_data_field_dates', 'date', 'n.nid = date.entity_id');
                    $query->groupBy('n.nid');
                    $query->fields('n',array('nid','title','created'))//SELECT the fields from node
                    ->condition('n.type', 'medias','=')
                        ->condition('date.field_dates_value', $ladate,'<=')
                        ->orderBy('date.field_dates_value', 'desc')
                        ->range(0,1);

                    $record = $query->execute()->fetchAssoc();
                    $myIdM = $record['nid'];
                }else{
                    // On affiche l'une des medias de la liste
                    $expM = explode(',',$node->field_accueil_medias_liste["und"][0]["value"]);
                    $idM = rand(0,count($expM) - 1);
                    $myIdM = $expM[$idM];
                }
                // Affichage des informations
                $nodeM = node_load($myIdM);

                $url = '/medias_mshb/'.format_url($nodeM->title).'/'.$myIdM.'/';
                $titreM = '<a href="'.$url.'">'.$nodeM->title.'</a>';

                // Résumé
                if(isset($nodeM->field_resume_recherche["und"][0]) && $nodeM->field_resume_recherche["und"][0]["value"] != ''){
                    $mybody = $nodeM->field_resume_recherche["und"][0]["value"];
                }else{
                    $mybody = '';
                }

                // Lire la suite
                $suite = '';
                $externe = '';
                //if(isset($nodeM->field_acces_detail["und"][0]) && $nodeM->field_acces_detail["und"][0]["value"] == 1){
                    $suite = '<a href="'.$url.'" class="ensavoirplus">Lire la suite</a>';
                //}else{
                //    if(isset($nodeM->field_lien_liste["und"][0]) && $nodeM->field_lien_liste["und"][0]["value"] != ''){
                //        $expLien = explode('|',$nodeM->field_lien_liste["und"][0]["value"]);
                //        $suite = '<a href="'.$expLien[1].'" target="_blank" class="bloc-actus-liste-lien">'.$expLien[0].'</a>';
               //     }
                //}
                // Image
                if(isset($nodeM->field_image_bandeau["und"][0]["uri"]) && $nodeM->field_image_bandeau["und"][0]["uri"] != ''){
                    $eee = explode("public://",$nodeM->field_image_bandeau["und"][0]["uri"]);
                    $image = '<img src="'.$base_path.'sites/default/files/'.$eee[1].'" alt="'.$nodeM->field_image_bandeau["und"][0]["alt"].'" id="image_bandeau" class="image_bandeau_type-1" title="'.$nodeM->field_image_bandeau["und"][0]["alt"].'" />';
                }else{
                    $image = '';
                }
                ?>

                <h3><a href="/medias_mshb/">medias</a></h3>
                <div class="projet_item">
                    <div style="max-height:139px;overflow:hidden;"><?php print $image; ?></div>
                    <div class="projet_item">
                        <div class="bloc-home-recherche-titre"><?php print $titreM; ?></div>
                        <p>
                            <?php print $mybody.' '.$suite; ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom: 0px;">
            <div class="col-md-12">
                <div class="row" style="margin-bottom: 0px;">
                    <div class="col-md-4 bloc-home-news">
                        <h3><img src="/sites/all/themes/mshbv2/img/pictos/accueil-newsletter.png" /><a href="/newsletters_mshb">newsletter</a></h3>
                        <div class="projet_item">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://app.mailjet.com/widget/iframe/1QEu/27q" style="width:100%;height:250px !important;min-height:250px !important;"></iframe>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3><img src="/sites/all/themes/mshbv2/img/pictos/accueil-twitter.png" /><a href="https://twitter.com/MshBretagne" target="_blank">twitter</a></h3>
                        <div class="projet_item projet_item_twitter">
                            <p>
                                <a class="twitter-timeline" data-height="250" href="https://twitter.com/MshBretagne?ref_src=twsrc%5Etfw">Tweets by MshBretagne</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <h3><img src="/sites/all/themes/mshbv2/img/pictos/accueil-annuaire.png" /><a href="/annuaires_mshb/">annuaire</a></h3>
                        <div class="projet_item">
                            <p>Retrouvez dans l’annuaire des laboratoires et des chercheurs les contacts que vous recherchez.</p>
                            <p><a href="/annuaires_mshb/">En savoir +</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /HOME -->