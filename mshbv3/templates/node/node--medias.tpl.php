<script>
	jQuery(document).ready(function(){
		jQuery("#premier_plan").html("<?php print $node->title; ?>");
    jQuery("#sstitre").html("<?php print $content["field_sstitre_bloc"]; ?>");
	});
</script>
<style>
    #sstitre {
        position:absolute;
        top:0;
        right:0;
        opacity: 1;
        padding:20px;
    }
    #sstitre img {opacity: 1 !important;}
</style>
<section>
 <div class="container container-chercheur-single">
    <div class="row">
      <div class="col-md-12" style="text-align:center;">
        <div class="bloc-medias-single-date"><span><?php print date("d", $node->created).' '.french_month(date("m", $node->created)).' '.date("Y", $node->created); ?></span></div>
        <b><?php print $content["field_resume_recherche"]; ?></b>
        <div class="bloc-medias-single-pole"><?php print render($content["field_pole"]); ?></div>
        <div class="bloc-medias-single-partage"><?php print render($content["data"]["partage"]); ?></div>
      </div>
    </div>

    <div class="row" style="<?php if($contenu == '') print 'display:none;'; ?>">
      <div class="col-md-12">
        <?php print render($contenu); ?>
      </div>
    </div>

     <div class="row" style="<?php if($content["field_modalites"] == '') print 'display:none;'; ?>">
         <div class="col-md-12">
             <?php print render($content["field_modalites"]); ?>
         </div>
     </div>

    <div class="row row-centered">
      <div class="col-md-4 col-centered bloc-labo-list-resp" style="<?php if($content["field_bloc_infos"] == '') echo 'display:none;' ?>">
        <h3><img src="/sites/all/themes/mshbv2/img/pictos/picto-inifos.png" style="vertical-align: initial;" width="22" height="22" /> infos</h3>
        <?php print render($content["field_bloc_infos"]); ?>
      </div>
      <div class="col-md-4 col-centered bloc-labo-list-adresse bloc-list-liens" style="<?php if($content["field_bloc_liens"] == '') echo 'display:none;' ?>">
        <h3><img src="/sites/all/themes/mshbv2/img/pictos/picto-liens.png" style="vertical-align: initial;" width="22" height="22" /> liens</h3>
        <?php print render($content["field_bloc_liens"]); ?>
      </div>
      <div class="col-md-4 col-centered bloc-labo-list-effectifs blocTelecharger" style="<?php if($content["field_bloc_telecharger"] == '') echo 'display:none;' ?>">
        <h3><img src="/sites/all/themes/mshbv2/img/pictos/picto-tel.png" style="vertical-align: initial;" width="22" height="22" /> télécharger</h3>
        <div style="text-align:center"><?php print render($content["field_bloc_telecharger"]); ?></div>
      </div>
  </div>

    <div class="row">
      <div class="col-md-4 bloc-labo-list-pagi">
        <a href="/medias_mshb?#formmedias">Retour à la recherche</a>
      </div>
    </div>

  </div>
</section>
