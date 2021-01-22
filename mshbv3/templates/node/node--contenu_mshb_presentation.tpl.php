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
                        <li><a href="#content-2"><?php echo $node->field_titre_bloc_2["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-3"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-4"><?php echo $node->field_titre_bloc_4["und"][0]["value"]; ?></a></li>
                        <li><a href="#content-5"><?php echo $node->field_titre_bloc_5["und"][0]["value"]; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bloc-timeline">
                <?php if(isset($node->field_description_courte["und"])) echo $node->field_description_courte["und"][0]["value"]; ?>
            </div>
        </div>
    </div>
</section>

<section>
  <div class="container container_titre">
      <h1 id="content-1"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc["und"][0]["value"]; ?></span></p>
  </div>
 <div class="container">
    <div class="row">
      <div class="col-md-6">
        <?php echo $node->field_col1_bloc["und"][0]["value"]; ?>
      </div>
      <div class="col-md-6">
        <?php echo $node->field_col2_bloc["und"][0]["value"]; ?>
      </div>
    </div>
  </div>
</section>

<section>
   <div class="container center">

    <?php
      if(isset($node->field_image_centre["und"][0]["uri"]) && $node->field_image_centre["und"][0]["uri"] != ''){
        $eee = explode("public://",$node->field_image_centre["und"][0]["uri"]);
        $image = '
               <h2 style="margin-bottom:30px;">'.$node->field_image_centre["und"][0]["title"].'</h2>
        <img src="/sites/default/files/'.$eee[1].'" alt="'.$node->field_image_centre["und"][0]["alt"].'" title="'.$node->field_image_centre["und"][0]["alt"].'" />';
      }else{$image = '';}
      echo $image;
    ?>
  </div>
</section>

<section style="margin-bottom:50px;">
 <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-offset-1 center">
        <?php echo $node->field_bloc_fondateurs["und"][0]["value"]; ?>
      </div>
      <div class="col-md-5 col-md-offset-1 center">
        <?php echo $node->field_bloc_associes["und"][0]["value"]; ?>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container container_titre">
      <h1 id="content-2"><?php echo $node->field_titre_bloc_2["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc_2["und"][0]["value"]; ?></span></p>
  </div>
 <div class="container">
    <div class="row">
      <div class="col-md-6">
        <?php echo $node->field_field_col1_bloc_2["und"][0]["value"]; ?>
      </div>
      <div class="col-md-6">
        <?php echo $node->field_col2_bloc_2["und"][0]["value"]; ?>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container container_titre">
      <h1 id="content-3"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc_3["und"][0]["value"]; ?></span></p>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-3">
          <?php
            $ins1 = $node->field_col1_bloc_3["und"][0]["value"];
            $exp1 = explode('<hr>',$ins1);
            // On affiche le début
            print '<div style="height:320px;">'.$exp1[0].'</div>';
          ?>
            <div style="text-align:right;">
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
                                <?php
                                if(isset($exp1[1])) print $exp1[1];
                                ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" data-dismiss="modal">Fermer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php
            $ins2 = $node->field_col2_bloc_3["und"][0]["value"];
            $exp2 = explode('<hr>',$ins2);
            // On affiche le début
            print '<div style="height:320px;">'.$exp2[0].'</div>';
            ?>
            <div style="text-align:right;">
                <a href="javascript:;" class="ensavoirplus" data-toggle="modal" data-target="#instance2">En savoir +</a>
            </div>
            <!-- Modal - Lire la suite -->
            <div id="instance2" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <?php
                                if(isset($exp2[1])) print $exp2[1];
                                ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" data-dismiss="modal">Fermer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php
            $ins3 = $node->field_col3_bloc_3["und"][0]["value"];
            $exp3 = explode('<hr>',$ins3);
            // On affiche le début
            print '<div style="height:320px;">'.$exp3[0].'</div>';
            ?>
            <div style="text-align:right;">
                <a href="javascript:;" class="ensavoirplus" data-toggle="modal" data-target="#instance3">En savoir +</a>
            </div>
            <!-- Modal - Lire la suite -->
            <div id="instance3" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <?php
                                if(isset($exp3[1])) print $exp3[1];
                                ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" data-dismiss="modal">Fermer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?php
            $ins4 = $node->field_col4_bloc_3["und"][0]["value"];
            $exp4 = explode('<hr>',$ins4);
            // On affiche le début
            print '<div style="height:320px;">'.$exp4[0].'</div>';
            ?>
            <div style="text-align:right;">
                <a href="javascript:;" class="ensavoirplus" data-toggle="modal" data-target="#instance4">En savoir +</a>
            </div>
            <!-- Modal - Lire la suite -->
            <div id="instance4" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <?php
                                if(isset($exp4[1])) print $exp4[1];
                                ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" data-dismiss="modal">Fermer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

<section>
  <div class="container container_titre">
      <h1 id="content-4"><?php echo $node->field_titre_bloc_4["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc_4["und"][0]["value"]; ?></span></p>
  </div>
  <div class="container container_equipe">
    <div class="row">
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
            if(isset($statut[0])) $mystatut = $statut[0];
            else $mystatut =  $statut;
            // URL
            $url = '/annuaires_mshb/chercheurs/'.format_url($nodeDir->title.' '.$nodeDir->field_prenom["und"][0]["value"]).'/'.$vd.'/';
            echo '<div class="col-md-4">
            <a href="'.$url.'">'.$image.'</a>
            <p class="text-center" style="font-family:campton_regular;font-weight:bold;"><a href="'.$url.'">'.$nodeDir->field_prenom["und"][0]["value"].' '.$nodeDir->title.'</a></p>
            <p class="text-center" style="font-family:campton_regular;">'.$mystatut.'</p>
          </div>';
        }
      }

    ?>
    </div>
  </div>
  <div class="container container_titre">
      <p><span>équipe administrative</span></p>
  </div>
<?php
  $nb = 0;
  $affE = '';
  if($node->field_liste_equipe_admin["und"][0]["value"] != ''){
    $expEquipe = explode(',',$node->field_liste_equipe_admin["und"][0]["value"]);
    foreach($expEquipe as $ke=>$ve){
      $nodeEquipe = node_load($ve);
      if($nb == 0) $affE .= '<div class="container container_equipe">
                                   <div class="row">';
      // Telephone
      if(isset($nodeEquipe->field_telephone["und"]) && $nodeEquipe->field_telephone["und"][0]["value"] != '') $tel = '<p class="text-center">'.$nodeEquipe->field_telephone["und"][0]["value"].'</p>';
      else $tel = '';
      // Image
      if(isset($nodeEquipe->field_image["und"][0]["uri"]) && $nodeEquipe->field_image["und"][0]["uri"] != ''){
	      $eee = explode("public://",$nodeEquipe->field_image["und"][0]["uri"]);
	      $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" class="img-responsive" alt="'.$nodeEquipe->field_image["und"][0]["alt"].'" title="'.$nodeEquipe->field_image["und"][0]["alt"].'" /></div>';
	    }else{
	    	$image = '<div class="cercle"><img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" class="img-responsive" /></div>';
			}
      // STATUT
        if(isset($nodeEquipe->field_statut_mshb["und"]) && $nodeEquipe->field_statut_mshb["und"][0]["value"] != ''){
            $statut = explode("\n",$nodeEquipe->field_statut_mshb["und"][0]["value"]);
        }else{
            $statut = '';
        }
        // EMAIL
        if(isset($nodeEquipe->field_mail["und"]) && $nodeEquipe->field_mail["und"][0]["value"] != ''){
            $email = '<a href="mailto:'.$nodeEquipe->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
        }else{
            $email = '';
        }
        if(isset($statut[0])) $mystatut = $statut[0];
        else $mystatut =  $statut;
        $affE .= '<div class="col-md-3">
        '.$image.'
        <p class="text-center" style="font-family:campton_regular;font-weight:bold;">'.$nodeEquipe->field_prenom["und"][0]["value"].' '.$nodeEquipe->title.'</p>
        <p class="text-center"  style="font-family:campton_regular;">'.$mystatut.'</p>
        <span   style="font-family:campton_regular;">'.$tel.'</span>
        <p class="text-center campton_maj">'.$email.'</p>
      </div>';
      if($nb == 3){
        $nb = 0;
        $affE .= '</div>
                </div>';
      }else{
        $nb++;
      }
    }
    echo $affE;
  }
  
?>
</section>

<section style="margin-top:15px;">
  <div class="container container_titre">
    <h1 id="content-5"><?php echo $node->field_titre_bloc_5["und"][0]["value"]; ?></h1>
    <p><span><?php echo $node->field_sstitre_bloc_5["und"][0]["value"]; ?></span></p>
  </div>
   <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if(isset($node->field_bloc_liens["und"][0]["value"]) && $node->field_bloc_liens["und"][0]["value"] != '') echo $node->field_bloc_liens["und"][0]["value"]; ?>
      </div>
    </div>
  </div>
</section>