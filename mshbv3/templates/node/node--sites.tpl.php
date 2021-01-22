<div class="node-site">
  <section class="row" style="margin-left:0;margin-top:10px;">
    <div class="col-lg-8 site-single-bloc-texte">
      <?php
        echo $node->body["und"][0]["value"];
      ?>
      <div>
        <a class="picto-ext" href="<?php echo $node->field_web["und"][0]["value"]; ?>" target="_blank"> Voir le site</a>
      </div>
    </div>
    <div class="col-lg-4 site-single-bloc-image">
      <?php
        //Gestion de l'image
        if(isset($node->field_image["und"][0]["uri"]) && $node->field_image["und"][0]["uri"] != ''){
          $eee = explode("public://",$node->field_image["und"][0]["uri"]);
          $image = '<img src="/sites/default/files/'.$eee[1].'" alt="'.$node->field_image["und"][0]["alt"].'" title="'.$node->field_image["und"][0]["title"].'" style="max-width:200px;" />';
        }else{$image = '';}
        echo $image;
      ?>
    </div>
  </section>
</div>
<?php
  if(isset($_GET["retour"]) && $_GET["retour"] != ''){
    $retour = $_GET["retour"];
  }else{
    $retour = 'menu_outils';
  }
?>
<div class="site-retour"><a href="/<?php print $retour; ?>">< Retour</a></div>