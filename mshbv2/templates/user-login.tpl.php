<script>
	jQuery(document).ready(function(){
		jQuery("#premier_plan").html("connexion");
    jQuery("#sstitre").html("");
    jQuery("#blocForm").click(function(){
      jQuery("#formConnex").toggle();
    });
	});
</script>
<style>
  ul.tabs--primary, #shib_login_url {display:none;}    
    .container_header {height:75px;}
    .header_bg, #premier_plan {display: none;}
    .bloc-page-connex a.bloc-connex {
        padding: 10px 15px;
        border:1px solid #BF2228;
        margin-top: 20px;
        max-width: 200px;
        display: inline-block;
        text-align: center;
    }
</style>

<section>
 <div class="container">
    <div class="row bloc-page-connex">

        <div class="col-md-12" style="text-align: center;font-weight:bold;margin-bottom:20px;"><h2>Pour accéder à l’espace dédié aux chercheurs</h2></div>

        <div class="col-md-6" style="padding-right:50px;border-right: 1px gray solid;">
      <?php
          $blockLogo = block_block_view(34);
          print render($blockLogo['content']);
      ?>
        </div>
        <div class="col-md-6" style="padding-left:50px;">
            <?php
            $blockLogo = block_block_view(44);
            print render($blockLogo['content']);
            ?>
            <div style="display:none;" id="formConnex"><?php print drupal_render_children($form) ?></div>
        </div>


      <!--<div class="col-md-12 formConnexion">

        <h3>Connexion interne</h3>
        <a href="javascript:;" id="blocForm">Cliquez ici pour accéder au formulaireXX</a>
        <div style="display:none;" id="formConnex"><?php print drupal_render_children($form) ?></div>
      </div>-->
    </div>
  </div>
</section>