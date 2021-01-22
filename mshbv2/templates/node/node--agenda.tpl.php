<script>
	jQuery(document).ready(function(){
    <?php print $node->title; ?>
    <?php print render($content["field_sstitre_bloc"]); ?>
	});
</script>
<style>
    .container_header h1 {
        position:relative;
        line-height: 1;
    }
    .container_header p {
        margin-top:0;
    }
</style>
<section>
 <div class="container container-labo-single">
    <div class="row">
      <div class="col-md-12" style="text-align:center;">
        <h1>
          <?php print $node->title; ?>
        </h1>
        <div class="bloc-agenda-single-pole"><span><?php print render($content["field_pole"]); ?></span></div>
        <div class="bloc-agenda-single-type"><?php print render($content["field_type_evenement"]); ?></div>
      </div>
    </div>

     <div class="row">
         <div class="col-md-6 bloc-actus-single-texte">
             <?php print render($content["field_image_grand"]); ?>
         </div>
         <div class="col-md-6 bloc-actus-single-texte">
             <?php print render($content["body"]); ?>
         </div>
     </div>

     <div class="row" style="<?php if($content["field_modalites"] == '') print 'display:none;'; ?>">
         <div class="col-md-12">
             <?php print render($content["field_modalites"]); ?>
         </div>
     </div>

     <div class="row" style="<?php if($content["data"]["form"] == '') print 'display:none;'; ?>">
         <div class="col-md-12">
             <?php // print $content["data"]["form"]; ?>
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
        <div class="col-md-4 bloc-labo-list-pagi">
            <a href="/agenda_mshb?#test">Retour à l'agenda</a>
        </div>
    </div>
 </div>
</section>
