<script>
	jQuery(document).ready(function(){
		jQuery("#premier_plan").html("<?php print $node->title; ?>");
    jQuery("#sstitre").html('<?php print render($content["field_sstitre_bloc"]); ?>');

	});
</script>
<section>
 <div class="container container-labo-single">
    <div class="row">
      <div class="col-md-12" style="text-align:center;">
        <div class="actus-liste-date"><span><?php print getDateAgenda($node->field_dates); ?></span></div>
        <?php print render($content["field_type_actualite"]); ?>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12 bloc-actus-single-texte">
            <b><?php print render($content["field_resume_recherche"]); ?></b>
        </div>
        <div class="col-md-12 bloc-actus-single-texte">
            <?php print render($content["field_image"]); ?>
            <?php print render($content["body"]); ?>
        </div>
        <div class="col-md-12 bloc-actus-single-mc">
            <?php print render($content["field_mots_cles"]); ?>
        </div>
    </div>
                                          
    <div class="row row-centered">
         <div class="col-md-4 col-centered bloc-labo-list-resp" style="<?php if($content["field_bloc_infos"] == '') echo 'display:none;' ?>">
             <h3><img src="/sites/all/themes/mshbv2/img/pictos/picto-inifos.png" style="vertical-align: initial;" width="22" height="22" /> infos</h3>
             <?php print render($content["field_bloc_infos"]); ?>
         </div>
         <div class="col-md-4 col-centered bloc-labo-list-adresse" style="<?php if($content["field_bloc_liens"] == '') echo 'display:none;' ?>">
             <h3><img src="/sites/all/themes/mshbv2/img/pictos/picto-liens.png" style="vertical-align: initial;" width="22" height="22" /> liens</h3>
             <?php print render($content["field_bloc_liens"]); ?>
         </div>
         <div class="col-md-4 col-centered bloc-labo-list-effectifs" style="<?php if($content["field_bloc_telecharger"] == '') echo 'display:none;' ?>">
             <h3><img src="/sites/all/themes/mshbv2/img/pictos/picto-tel.png" style="vertical-align: initial;" width="22" height="22" /> télécharger</h3>
             <?php print render($content["field_bloc_telecharger"]); ?>
         </div>
     </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 bloc-labo-list-pagi">
            <a href="/actualites_mshb?#formactus">Retour aux actualités</a>
        </div>
        <div class="col-md-4"></div>
    </div>
    </div>
</section>
