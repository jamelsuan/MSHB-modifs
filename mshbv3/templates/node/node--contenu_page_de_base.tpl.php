<section>
  <div class="container container_titre">
      <h1><?php if(isset($node->field_titre_bloc["und"])) echo $node->field_titre_bloc["und"][0]["value"]; ?></h1>
      <p><span><?php if(isset($node->field_sstitre_bloc["und"])) echo $node->field_sstitre_bloc["und"][0]["value"]; ?></span></p>
  </div>

 <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php echo $node->body["und"][0]["safe_value"]; ?>
      </div>
    </div>
  </div>

</section>