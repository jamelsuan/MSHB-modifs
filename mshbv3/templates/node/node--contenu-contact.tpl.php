<?php
// Bloc formulaire de contact
$block = module_invoke('webform', 'block_view', 'client-block-88');
$infos = render($block['content']);
?>
<script>
    jQuery(document).ready(function(){
        jQuery("#premier_plan").html("contacts et accès");
        jQuery("#sstitre").html("");
    });
</script>

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
                    <ul class="poles-menu contact-menu">
                        <li><a href="#content-1">Nous contacter</a></li>
                        <li><a href="#content-2">Nous rejoindre</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container container_titre">
        <h1 id="content-1">Nous contacter</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php echo $infos; ?>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container container_titre">
        <h1 id="content-2">Nous rejoindre</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="map"></div>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDveSaUbAW3btgrGI3TxMt6GcQamQSp0fY&callback=aestivo_initMap" async defer></script>
            </div>
            <div class="col-md-12">
                <style>
                    html, body {
                        height: 100%;
                        margin: 0;
                        padding: 0;
                    }
                    #map {
                        width:100%;
                        height: 450px;
                    }
                    #bloc-infos {
                        padding: 5px;
                        border: 1px solid #999;
                        text-align: center;
                        font-family: 'Roboto','sans-serif';
                        line-height: 30px;
                        padding-left: 10px;
                    }

                </style>
                <div id="bloc-infos">
                    <input id="address_start" type="text" value="" placeholder="Ajoutez votre adresse">
                    <input id="submit_showInfo" style="background-color:#c33932;color:#FFF;" type="button" value="Itinéraire">
                    <div id = "show_info"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php echo $node->body["und"][0]["safe_value"]; ?>
            </div>
            <div class="col-md-4">
                <?php echo $node->	field_col1_bloc["und"][0]["value"]; ?>
            </div>
        </div>
    </div>
</section>