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
                        <li><a href="#content-1"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-2"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-3"><?php echo $node->field_titre_bloc_4["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-4"><?php echo $node->field_titre_bloc_5["und"][0]["value"]; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<section>

    <div class="container">
        <div class="row">
            <div class="col-md-12 bloc-2cols">
                <?php echo $node->body["und"][0]["safe_value"]; ?>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="container container_titre">
        <h1 id="content-1"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></h1>
        <p><span><?php echo nl2br($node->field_sstitre_bloc["und"][0]["value"]); ?></span></p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 bloc-aap-calendrier">
                <div><?php echo $node->field_col1_bloc["und"][0]["value"]; ?></div>
            </div>
            <div class="col-md-4 bloc-aap-calendrier">
                <div><?php echo $node->field_col2_bloc["und"][0]["value"]; ?></div>
            </div>
            <div class="col-md-4 bloc-aap-calendrier">
                <div><?php echo $node->field_col3_bloc_3["und"][0]["value"]; ?></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container container_titre">
        <p><span><?php echo nl2br($node->field_sstitre_bloc_2["und"][0]["value"]); ?></span></p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bloc-2cols">
                <?php echo $node->field_field_col1_bloc_2["und"][0]["value"]; ?>
            </div>
        </div>
    </div>
</section>

<section style="margin-bottom: 30px;">
    <div class="container container_titre">
        <h1 id="content-2"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bloc-2cols">
                <?php echo $node->field_col1_bloc_3["und"][0]["value"]; ?>

            </div>
            <div class="col-md-12" style="text-align: center;">
                <?php
                if(isset($node->field_col2_bloc_3["und"]) && $node->field_col2_bloc_3["und"][0]["value"] != ''){
                    // On affiche la suite en modalbox
                    echo '<div>
                                    <a href="javascript:;" class="ensavoirplus" data-toggle="modal" data-target="#instance1">En savoir +</a>
                                </div>
                                <!-- Modal - Lire la suite -->
                                <div id="instance1" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    '.nl2br($node->field_col2_bloc_3["und"][0]["value"]).'
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="javascript:;" data-dismiss="modal">Fermer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container container_titre">
        <h1 id="content-3"><?php echo $node->field_titre_bloc_4["und"][0]["value"]; ?></h1>
    </div>
    <div class="container">
        <div class="row row-centered">
                <?php
                if($node->field_liste_direction["und"][0]["value"] != ''){
                    $expDirection = explode(',',$node->field_liste_direction["und"][0]["value"]);
                    foreach($expDirection as $kd=>$vd){
                        $nodeDir = node_load($vd);
                        // Image
                        if(isset($nodeDir->field_image["und"][0]["uri"]) && $nodeDir->field_image["und"][0]["uri"] != ''){
                            $eee = explode("public://",$nodeDir->field_image["und"][0]["uri"]);
                            $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" class="img-responsive" alt="'.$nodeDir->field_image["und"][0]["alt"].'" title="'.$nodeDir->field_image["und"][0]["alt"].'" /></div>';
                        }else{
                            $image = '<div class="cercle"><img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" class="img-responsive" /></div>';
                        }
                        // STATUT
                        if(isset($nodeDir->field_statut_mshb["und"]) && $nodeDir->field_statut_mshb["und"][0]["value"] != ''){
                            $statut = explode("\n",$nodeDir->field_statut_mshb["und"][0]["value"]);
                        }else{
                            $statut = '';
                        }
                        // EMAIL
                        if(isset($nodeDir->field_mail["und"]) && $nodeDir->field_mail["und"][0]["value"] != ''){
                            $email = '<a href="mailto:'.$nodeDir->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
                        }else{
                            $email = '';
                        }
                        // Telephone
                        if(isset($nodeDir->field_telephone["und"]) && $nodeDir->field_telephone["und"][0]["value"] != '') $tel = '<p class="text-center" style="font-family:campton_regular;">'.$nodeDir->field_telephone["und"][0]["value"].'</p>';
                        else $tel = '';
                        if(isset($statut[0])) $mystatut = $statut[0];
                        else $mystatut =  $statut;

                        echo '<div class="col-md-3 col-centered">
                                '.$image.'
                                <p class="text-center" style="font-family:campton_regular;"><b>'.$nodeDir->field_prenom["und"][0]["value"].' '.$nodeDir->title.'</b></p>
                                <p class="text-center" style="font-family:campton_regular;">'.$mystatut.'</p>
                                '.$tel.'
                                <p class="text-center campton_maj">'.$email.'</p>
                              </div>';
                    }
                }

                ?>
        </div>
    </div>
</section>

<section style="margin-bottom:30px;">
    <div class="container container_titre">
        <p><span><?php echo nl2br($node->field_sstitre_bloc_4["und"][0]["value"]); ?></span></p>
    </div>
    <?php if (isset ($node->field_college_pairs["und"][0]["value"]) && $node->field_college_pairs["und"][0]["value"] != '')
{
    // si le champ collège des pairs est défini, on affiche la liste des personnes
    $college = explode(',',$node->field_college_pairs["und"][0]["value"]);
    foreach($college as $kd=>$vd){
        $nodeDir = node_load($vd);
        // Image
        if(isset($nodeDir->field_image["und"][0]["uri"]) && $nodeDir->field_image["und"][0]["uri"] != ''){
            $eee = explode("public://",$nodeDir->field_image["und"][0]["uri"]);
            $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" class="img-responsive" alt="'.$nodeDir->field_image["und"][0]["alt"].'" title="'.$nodeDir->field_image["und"][0]["alt"].'" /></div>';
        }else{
            $image = '<div class="cercle"><img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" class="img-responsive" /></div>';
        }
        // STATUT
        if(isset($nodeDir->field_statut_mshb["und"]) && $nodeDir->field_statut_mshb["und"][0]["value"] != ''){
            $statut = explode("\n",$nodeDir->field_statut_mshb["und"][0]["value"]);
        }else{
            $statut = '';
        }
        // EMAIL
        if(isset($nodeDir->field_mail["und"]) && $nodeDir->field_mail["und"][0]["value"] != ''){
            $email = '<a href="mailto:'.$nodeDir->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
        }else{
            $email = '';
        }
        // Telephone
        if(isset($nodeDir->field_telephone["und"]) && $nodeDir->field_telephone["und"][0]["value"] != '') $tel = '<p class="text-center" style="font-family:campton_regular;">'.$nodeDir->field_telephone["und"][0]["value"].'</p>';
        else $tel = '';
        if(isset($statut[0])) $mystatut = $statut[0];
        else $mystatut =  $statut;

        echo '<div class="col-md-3 col-centered">
                '.$image.'
                <p class="text-center" style="font-family:campton_regular;"><b>'.$nodeDir->field_prenom["und"][0]["value"].' '.$nodeDir->title.'</b></p>
                <p class="text-center" style="font-family:campton_regular;">'.$mystatut.'</p>
                '.$tel.'
                <p class="text-center campton_maj">'.$email.'</p>
              </div>';
    }


    ?>



<?php }
else
 { // sinon on affiche les responsables par pôle
     ?>    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-1">&nbsp;</div>
                <?php
                $liste = taxonomy_get_tree(1,0,NULL,TRUE);
                //print_r($_SERVER);
                $listeP = '';
                foreach($liste as $k => $v){
                  //
                    // On affiche le nom
                    //$content["out"] .= '<div id="pole-'.$liste[$k]->tid.'"> - '.$liste[$k]->name.' / '.$liste[$k]->field_pole_long["und"][0]["safe_value"].'</div>';
                    if($liste[$k]->field_type_pole["und"][0]["value"] == 1  && (!isset($liste[$k]->field_hors_menus["und"]) || $liste[$k]->field_hors_menus["und"][0]["value"] == 0)){
                        $listeP .= '<div class="col-md-2">
                                                <div class="bloc-pole-aap">'.$liste[$k]->field_pole_long["und"][0]["safe_value"].'</div>
                                                '.getRespPole($liste[$k]->tid,'aap').'
                                            </div>';
                    }
                }
                echo $listeP;
                ?>
            </div>
        </div>
    </div>
    <?php } ?>
</section>

<section>
    <div class="container container_titre">
        <h1 id="content-4"><?php echo $node->field_titre_bloc_5["und"][0]["value"]; ?></h1>
    </div>
    <div class="container">
        <div class="row bloc-app-docs">
            <div class="col-md-3 col-md-offset-3">
                <?php echo $node->field_col1_bloc_5["und"][0]["value"]; ?>
            </div>
            <div class="col-md-3">
                <?php echo $node->field_col2_bloc_5["und"][0]["value"]; ?>
            </div>
        </div>
    </div>
</section>
