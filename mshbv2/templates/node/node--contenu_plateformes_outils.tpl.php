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
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container container_titre">
        <h1 id="content-1"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></h1>
        <p><span><?php if(isset($node->field_sstitre_bloc["und"][0]["value"])) echo $node->field_sstitre_bloc["und"][0]["value"]; ?></span></p>
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
        <div class="row">
            <div class="col-md-12">
                <?php
                print getListeOutilsPlateforme($node->field_liste_direction);
                ?>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="container container_titre">
        <h1 id="content-2"><?php echo $node->field_titre_bloc_2["und"][0]["value"]; ?></h1>
        <p><span><?php  if(isset($node->field_sstitre_bloc_2["und"][0]["value"])) echo $node->field_sstitre_bloc_2["und"][0]["value"]; ?></span></p>
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
        <div class="row">
            <div class="col-md-12">
                <?php
                print getListeOutilsPlateforme($node->field_liste_equipe_admin);
                ?>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="container container_titre">
        <h1 id="content-3"><?php echo $node->field_titre_bloc_3["und"][0]["value"]; ?></h1>
        <p><span><?php if(isset($node->field_sstitre_bloc_3["und"][0]["value"])) echo $node->field_sstitre_bloc_3["und"][0]["value"]; ?></span></p>
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
        <div class="row">
            <div class="col-md-12">
                <?php
                print getListeOutilsPlateforme($node->field_media_audio_video);
                ?>
            </div>
        </div>
    </div>

</section>

<?php
function getListeOutilsPlateforme($champ){
    // Variables
    $liste = '';

    if(isset($champ["und"]) && $champ["und"][0]["value"] != ''){
        foreach($champ["und"] as $kligne=>$vligne){
            if(substr($champ["und"][$kligne]["value"],0,1) == '*'){
                $liste .= '<h3 style="text-align:center;">'.substr($champ["und"][$kligne]["value"],1).'</h3>';
            }else{
                $expR = explode(',',$champ["und"][$kligne]["value"]);
                $nb = 1;
                foreach($expR as $kd=>$vd){
                    $nodeInfos = node_load($vd);
                    if($nb == 1) $liste .= '<div class="row row-centered">';
                    // Image
                    if(isset($nodeInfos->field_image_bandeau["und"][0]["uri"]) && $nodeInfos->field_image_bandeau["und"][0]["uri"] != ''){
                        $eee = explode("public://",$nodeInfos->field_image_bandeau["und"][0]["uri"]);
                        $image = '<div class="entete_image" style="margin-bottom:15px;height:98px;"><img src="/sites/default/files/'.$eee[1].'" style="padding-bottom:0;" class="img-responsive" alt="'.$nodeInfos->field_image_bandeau["und"][0]["alt"].'" title="'.$nodeInfos->field_image_bandeau["und"][0]["alt"].'" /></div>';
                    }else{
                        $image = '';
                    }
                    // Bloc lien
                    $liens = '';
                    if(isset($nodeInfos->field_bloc_liens_outils["und"]) && $nodeInfos->field_bloc_liens_outils["und"][0]["value"] != ''){
                        $liens .= '<div><img src="/sites/all/themes/mshbv2/img/pictos/picto-liens.png" style="vertical-align: initial;" width="15" /> <b>liens</b></div>';
                        $expL = explode("\r\n",$nodeInfos->field_bloc_liens_outils["und"][0]["value"]);
                        foreach($expL as $v){
                            $expLigne = explode('|',$v);
                            if($expLigne[0] == 'T') $picto = '<img src="/sites/all/themes/mshbv2/img/pictos/picto-tel.png" width="15" />';
                            else $picto = '<img src="/sites/all/themes/mshbv2/img/pictos/picto-lien.png" width="15" />';
                            $liens .= '<div>'.$picto.' <a href="'.$expLigne[2].'" target="_blank">'.$expLigne[1].'</a></div>';
                        }
                    }
                    // Lien en savoir plus
                    $esp = '';
                    if(isset($nodeInfos->field_aff_esp_outils["und"][0]["value"]) && $nodeInfos->field_aff_esp_outils["und"][0]["value"] == 1){
                        $url = '/medias_mshb/'.format_url($nodeInfos->title).'/'.$nodeInfos->nid.'/';
                        $esp .= '<div class="btn-outils-medias" style="text-align:right;"><a href="'.$url.'">En savoir +</a></div>';
                    }else{
                        $esp .= '';
                    }
                    // Resume
                    if(isset($nodeInfos->field_resume_recherche["und"][0]["value"]) && $nodeInfos->field_resume_recherche["und"][0]["value"] != ''){
                        $myresume = '<div style="height:95px;">'.$nodeInfos->field_resume_recherche["und"][0]["value"].'</div>';
                    }else{
                        $myresume = '';
                    }
                    $liste .= '<div class="col-md-3 col-centered" style="margin-bottom:30px;">
                                    '.$image.'
                                    '.$myresume.'
                                    '.$esp.'
                                    '.$liens.'
                                  </div>';
                    // On range
                    if($nb == 4){
                        $nb = 1;
                        $liste .= '</div>';
                    }else{
                        $nb++;
                    }
                }
                if($nb > 1) $liste .= '</div>';
            }
        }

    }
    return $liste;
}
?>
