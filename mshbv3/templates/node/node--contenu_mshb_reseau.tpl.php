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
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<section>
  <div class="container container_titre">
      <h1 id="content-1"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></h1>
      <p><span><?php echo $node->field_sstitre_bloc["und"][0]["value"]; ?></span></p>
  </div>
</section>

<section>
   <div class="container center">
    <?php
      if(isset($node->field_image_centre["und"][0]["uri"]) && $node->field_image_centre["und"][0]["uri"] != ''){
        $eee = explode("public://",$node->field_image_centre["und"][0]["uri"]);
        $image = '<img src="/sites/default/files/'.$eee[1].'" alt="'.$node->field_image_centre["und"][0]["alt"].'" title="'.$node->field_image_centre["und"][0]["alt"].'" />';
      }else{$image = '';}
      echo $image;
    ?>

    <?php
    if(isset($node->field_bloc_infos["und"][0]["value"]) && $node->field_bloc_infos["und"][0]["value"] != ''){
        echo $node->field_bloc_infos["und"][0]["value"];
    }
    ?>
  </div>
</section>

<section>
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
 <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php echo $node->field_bloc_liens["und"][0]["value"]; ?>
      </div>
    </div>
  </div>
</section>

<section>
 <div class="container container-liste">
    <div class="row">
      <h1 id="content-2" class="col-md-12"><?php echo $node->field_titre_bloc_2["und"][0]["value"]; ?></h1>
    </div>
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
<style>
  .container-liste li {width:100%;display:inline-block;}
  .container-liste li {text-align:center;}
</style>