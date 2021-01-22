<style>
    h1[id^="bloc"] {
        padding-top: 100px;
        position: relative;
        top: -100px;
        margin-bottom: -100px;
    }
</style>
<section style="margin-bottom: 15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="poles-menu poles-menu-en">
                    <li><a href="#bloc1"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></a></li>
                    <li><a href="#bloc2"><?php echo $node->field_titre_bloc_2["und"][0]["value"]; ?></a></li>
                    <li><a href="#bloc3"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></a></li>
                    <li><a href="#bloc4"><?php echo $node->field_titre_bloc_4["und"][0]["value"]; ?></a></li>
                    <li><a href="#bloc5"><?php echo $node->field_titre_bloc_5["und"][0]["value"]; ?></a></li>
                    <li><a href="#bloc6">team</a></li>
                </ul>
            </div>
        </div>
    </div>

</section>

<section>
  <div class="container container_titre">
      <h1 id="bloc1"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc["und"][0]["value"]; ?></span></p>
  </div>
 <div class="container">
    <div class="row">
      <div class="col-md-6">
        <?php echo $node->field_col1_bloc["und"][0]["value"]; ?>
      </div>
      <div class="col-md-6">
        <?php echo nl2br($node->field_col2_bloc["und"][0]["value"]); ?>
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
            <div class="container container_titre">
               <h2>'.$node->field_image_centre["und"][0]["title"].'</h2>
           </div>
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
      <h1 id="bloc2"><?php echo $node->field_titre_bloc_2["und"][0]["value"]; ?></h1>
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
      <h1 id="bloc3"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc_3["und"][0]["value"]; ?></span></p>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php echo $node->field_col1_bloc_3["und"][0]["value"]; ?>
        </div>
        <div class="col-md-6">
          <?php echo $node->field_col2_bloc_3["und"][0]["value"]; ?>
        </div>
      </div>
    </div>
</section>

<section>
  <div class="container container_titre">
      <h1 id="bloc4"><?php echo $node->field_titre_bloc_4["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc_4["und"][0]["value"]; ?></span></p>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php echo $node->field_col3_bloc_3["und"][0]["value"]; ?>
        </div>
        <div class="col-md-6">
          <?php echo $node->field_col4_bloc_3["und"][0]["value"]; ?>
        </div>
      </div>
    </div>
</section>

<section>
  <div class="container container_titre">
      <h1 id="bloc5"><?php echo $node->field_titre_bloc_5["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc_5["und"][0]["value"]; ?></span></p>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php echo $node->field_col1_bloc_5["und"][0]["value"]; ?>
        </div>
        <div class="col-md-6">
          <?php echo $node->field_col2_bloc_5["und"][0]["value"]; ?>
        </div>
      </div>
    </div>
</section>

<section>
  <div class="container container_titre">
      <h1 id="bloc6">team</h1>
      <p><span>Management board</span></p>
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
            }// STATUT
          $statut = array();
          if(isset($nodeDir->field_statut_mshb_en["und"][0]["value"]) && $nodeDir->field_statut_mshb_en["und"][0]["value"] != '') $statut = explode("\n",$nodeDir->field_statut_mshb_en["und"][0]["value"]);
          else $statut[0] = '';
            echo '<div class="col-md-4">
            '.$image.'
            <p class="text-center">'.$nodeDir->field_prenom["und"][0]["value"].' '.$nodeDir->title.'</p>
            <p class="text-center campton_maj">'.$statut[0].'</p>
          </div>';
        }
      }

    ?>
    </div>
  </div>
  <div class="container container_titre">
      <p><span>Administrative team</span></p>
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
      $statut = array();
      if(isset($nodeEquipe->field_statut_mshb_en["und"][0]["value"]) && $nodeEquipe->field_statut_mshb_en["und"][0]["value"] != '') $statut = explode("\n",$nodeEquipe->field_statut_mshb_en["und"][0]["value"]);
      else $statut[0] = '';
        $affE .= '<div class="col-md-3">
        '.$image.'
        <p class="text-center">'.$nodeEquipe->field_prenom["und"][0]["value"].' '.$nodeEquipe->title.'</p>
        <p class="text-center campton_maj">'.$statut[0].'</p>
        '.$tel.'
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