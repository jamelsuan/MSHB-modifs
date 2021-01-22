<style>
    canvas:first-child {display:none;}
</style>

<style>
    h1[id^="content"] {
        padding-top: 70px;
        position: relative;
        top: -70px;
        margin-bottom: -70px;
    }
</style>

<?php
$affBlocsServices = '';
$menuBlocsServices = '';
$cn = 1;
$listeType = taxonomy_get_tree(34,0,1,TRUE);
foreach($listeType as $k1=>$v1){
    $affBlocsServices .= '<section style="margin-bottom:30px;">';

    // Titre
    $affBlocsServices .= '<div class="container container_titre">
        <h1 id="content-'.$cn.'">'.$listeType[$k1]->name.'</h1>
    </div>';
    $menuBlocsServices .= '<li><a href="#content-'.$cn.'">'.$listeType[$k1]->name.'</a></li>';

    $affBlocsServices .= '<div class="container" style="padding:0;">';
    // Texte
    $affBlocsServices .= '<div class="row">';
    //print_r($listeType[$k1]);
    if (isset($listeType[$k1]->field_chapeau)&& @$listeType[$k1]->field_chapeau["und"][0]["value"] != ''){
      $affBlocsServices .= '<div class="col-md-12">'.$listeType[$k1]->field_chapeau["und"][0]["value"].'</div>' ;
    } ?>
    <?php if(isset($listeType[$k1]->field_col2_bloc) && @$listeType[$k1]->field_col2_bloc["und"][0]["value"] != ''){
        // On est sur deux colonnes
        $affBlocsServices .= '
            <div class="col-md-6">
                '.$listeType[$k1]->description.'
                  </div>';
        $affBlocsServices .= '
            <div class="col-md-6">
                '.$listeType[$k1]->field_col2_bloc["und"][0]["value"].'
                            </div>';
                  }else{
        // On est sur 1 colonne
        $affBlocsServices .= '
            <div class="col-md-12">
                '.$listeType[$k1]->description.'
            </div>';
                  }
    $affBlocsServices .= '</div>';
              
    // Contacts
    $contact3 = getContactBloc($listeType[$k1]->field_liste_direction);
    $affBlocsServices .= '<div class="row"><h3 style="text-align: center;">contact'.$contact3["titre"].'</h3></div>';

    $affBlocsServices .= '<div class="row row-centered">';
              $nb = 0;
              $affE = '';
              if($listeType[$k1]->field_liste_direction["und"][0]["value"] != ''){
                $expEquipe = explode(',',$listeType[$k1]->field_liste_direction["und"][0]["value"]);
                foreach($expEquipe as $ke=>$ve){
                  $nodeEquipe = node_load($ve);
                  if($nb == 0) $affE .= '<div class="container container_equipe" style="padding-top:0;">
                                               <div class="row">';
                  // Telephone
                  if(isset($nodeEquipe->field_telephone["und"]) && $nodeEquipe->field_telephone["und"][0]["value"] != '') $tel = '<p class="text-center" style="font-family:campton_regular;">'.$nodeEquipe->field_telephone["und"][0]["value"].'</p>';
                  else $tel = '';
                  // Image
                  if(isset($nodeEquipe->field_image["und"][0]["uri"]) && $nodeEquipe->field_image["und"][0]["uri"] != ''){
            	      $eee = explode("public://",$nodeEquipe->field_image["und"][0]["uri"]);
            	      $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" class="img-responsive" alt="'.$nodeEquipe->field_image["und"][0]["alt"].'" title="'.$nodeEquipe->field_image["und"][0]["alt"].'" /></div>';
            	    }else{
            	    	$image = '<div class="cercle"><img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" class="img-responsive" /></div>';
            			}
                  // EMAIL
                  if(isset($nodeEquipe->field_mail["und"]) && $nodeEquipe->field_mail["und"][0]["value"] != ''){
                      $email = '<a href="mailto:'.$nodeEquipe->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
                  }else{
                      $email = '';
                  }
                  // STATUT
                    if(isset($nodeEquipe->field_statut_mshb["und"]) && $nodeEquipe->field_statut_mshb["und"][0]["value"] != ''){
                        $statut = explode("\n",$nodeEquipe->field_statut_mshb["und"][0]["value"]);
                    }else{
                        $statut[0] = '';
                    }
                    $affE .= '<div class="col-md-3 col-centered">
                    '.$image.'
                    <p class="text-center" style="font-family:campton_regular;font-weight:bold;">'.$nodeEquipe->field_prenom["und"][0]["value"].' '.$nodeEquipe->title.'</p>
                    <p class="text-center"  style="font-family:campton_regular;">'.$statut[0].'</p>
                    <span   style="font-family:campton_regular;">'.$tel.'</a>
                    <p class="text-center campton_maj">'.$email.'</p>
                  </div>';
                  if($nb == 3){
                    $nb = 0;
                    $affE .= '</div>
                            </div>';
                  }else{
                    $nb++;
                  }
                }
                  $affBlocsServices .= $affE;
              }
              
    $affBlocsServices .= '</div></div></section>';
    $cn++;
}

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <ul class="poles-menu">
                        <li><a href="#content-0"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></a></li>
                        <?php print $menuBlocsServices; ?>
                    </ul>
            </div>
            </div>
        </div>
              
        </div>
</section>

<section>
    <div class="container container_titre">
        <h1 id="content-0"><?php echo $node->field_titre_bloc["und"][0]["value"]; ?></h1>
    </div>
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

<section style="margin-bottom:30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 center">
                <?php echo $node->field_col1_bloc["und"][0]["safe_value"]; ?>
            </div>
            <div class="col-md-4">
                <?php echo $node->field_col2_bloc["und"][0]["safe_value"]; ?>
            </div>
        </div>
        <?php $contact1 = getContactBloc($node->field_contacts_ag); ?>
        <div class="row"><h3 style="text-align: center;">contact<?php print $contact1["titre"]; ?></h3></div>
        <div class="row row-centered">
            <?php
              $nb = 0;
              $affE = '';
              if($node->field_contacts_ag["und"][0]["value"] != ''){
                $expEquipe = explode(',',$node->field_contacts_ag["und"][0]["value"]);
                foreach($expEquipe as $ke=>$ve){
                  $nodeEquipe = node_load($ve);
                  if($nb == 0) $affE .= '<div class="container container_equipe" style="padding-top:0;">
                                               <div class="row">';
                  // Telephone
                  if(isset($nodeEquipe->field_telephone["und"]) && $nodeEquipe->field_telephone["und"][0]["value"] != '') $tel = '<p class="text-center"style="font-family:campton_regular;">'.$nodeEquipe->field_telephone["und"][0]["value"].'</p>';
                  else $tel = '';
                  // Image
                  if(isset($nodeEquipe->field_image["und"][0]["uri"]) && $nodeEquipe->field_image["und"][0]["uri"] != ''){
            	      $eee = explode("public://",$nodeEquipe->field_image["und"][0]["uri"]);
            	      $image = '<div class="cercle"><img src="/sites/default/files/'.$eee[1].'" class="img-responsive" alt="'.$nodeEquipe->field_image["und"][0]["alt"].'" title="'.$nodeEquipe->field_image["und"][0]["alt"].'" /></div>';
            	    }else{
            	    	$image = '<div class="cercle"><img src="/sites/all/themes/mshbv2/img/annuaire-perso.png" class="img-responsive" /></div>';
            			}
                  // EMAIL
                  if(isset($nodeEquipe->field_mail["und"]) && $nodeEquipe->field_mail["und"][0]["value"] != ''){
                      $email = '<a href="mailto:'.$nodeEquipe->field_mail["und"][0]["value"].'"><span class="demo-icon icon-mail"></span></a>';
                  }else{
                      $email = '';
                  }
                  // STATUT
                    if(isset($nodeEquipe->field_statut_mshb["und"]) && $nodeEquipe->field_statut_mshb["und"][0]["value"] != ''){
                        $statut = explode("\n",$nodeEquipe->field_statut_mshb["und"][0]["value"]);
                    }else{
                        $statut[0] = '';
                    }
                    $affE .= '<div class="col-md-3 col-centered">
                    '.$image.'
                    <p class="text-center" style="font-family:campton_regular;font-weight:bold;">'.$nodeEquipe->field_prenom["und"][0]["value"].' '.$nodeEquipe->title.'</p>
                    <p class="text-center"  style="font-family:campton_regular;">'.$statut[0].'</p>
                    <span   >'.$tel.'</span>
                    <p class="text-center campton_maj">'.$email.'</p>
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
        </div>
    </div>
</section>

<?php
    print $affBlocsServices;
?>

<script src="https://threejs.org/build/three.js"></script>
<script src="https://threejs.org/examples/js/loaders/ColladaLoader.js"></script>
<script src="https://threejs.org/examples/js/Detector.js"></script>
<script>
    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
    var container, stats;


    var windowHalfX = 1200 / 2;
    var windowHalfY = 500 / 2;

    var camera, scene, renderer, objects;
    var particleLight;


    var mouseX = 0;
    var mouseY = 0;

    var dae;
    var loader = new THREE.ColladaLoader();
    loader.options.convertUpAxis = true;
    loader.load( 'mshb.dae', function ( collada ) {
        dae = collada.scene;
        dae.traverse( function ( child ) {
            if ( child instanceof THREE.SkinnedMesh ) {
                var animation = new THREE.Animation( child, child.geometry.animation );
                animation.play();
            }
        } );
        dae.position.x = dae.position.y = dae.position.z = 0;
        dae.rotation.y = 45;
        dae.scale.x = dae.scale.y = dae.scale.z = 1;



        dae.updateMatrix();
        init();
        animate();
    } );
    function init() {

        camera = new THREE.PerspectiveCamera( 25, 2, 1, 30000 );
        camera.position.set( 2800, 2800, 0 );
        scene = new THREE.Scene();

        // Add the COLLADA


        dae.receiveShadow = true;

        dae.traverse(function(child) {
            child.castShadow = true;
            child.receiveShadow = true;
        });
        scene.add(dae);




        // Spheres
        geometry = new THREE.SphereGeometry( 100, 16, 8 );
        material = new THREE.MeshPhongMaterial( { color: 0xffffff, shading: THREE.FlatShading, overdraw: 0.5, shininess: 0 } );
        for ( var i = 0; i < 30; i ++ ) {
            mesh = new THREE.Mesh( geometry, material );
            mesh.position.x = 500 * ( Math.random() - 0.5 );
            mesh.position.y = 500 * ( Math.random() - 0.5 );
            mesh.position.z = 500 * ( Math.random() - 0.5 );
            mesh.scale.x = mesh.scale.y = mesh.scale.z = 0.25 * ( Math.random() + 0.5 );
            //  scene.add( mesh );
        }




// ambient Lights
        var ambient = new THREE.AmbientLight( 0x101010 );
        scene.add( ambient );

// directional Light
        directionalLight = new THREE.DirectionalLight( 0xffffff );
        directionalLight.position.set( 0, 100, 0 ).normalize();
        scene.add( directionalLight );


// point Light
        pointLight = new THREE.PointLight( 0xcccccc, 0.26);
        pointLight.position.set( 100, 500, 200 ).normalize();
        scene.add( pointLight );



// point Light
        pointLight2 = new THREE.PointLight( 0xcccccc, .3);
        pointLight2.position.set( 500, 100, 200 ).normalize();
        scene.add( pointLight2 );


// renderer
        webglRenderer = new THREE.WebGLRenderer({
            alpha: true,
            antialias: true
        });
        webglRenderer.setClearColor( 0xffffff );

        webglRenderer.shadowMap.enabled = true;
        webglRenderer.setPixelRatio( window.devicePixelRatio );
        webglRenderer.setSize( 1200, 500 );



        document.getElementById("container_map").appendChild( webglRenderer.domElement );


        window.addEventListener( 'resize', onWindowResize, false );


        document.addEventListener( 'mousemove', onDocumentMouseMove, false );






    }

    function onDocumentMouseMove( event ) {
        mouseX = ( event.clientX - windowHalfX );
        mouseY = ( event.clientY - windowHalfY );

    }

    function onWindowResize() {
        camera.aspect = document.getElementById("container_map").innerWidth / document.getElementById("container_map").innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize( document.getElementById("container_map").innerWidth, document.getElementById("container_map").innerHeight );
    }
    //
    function animate() {
        requestAnimationFrame( animate );
        render();
    }
    var clock = new THREE.Clock();
    function render() {


        camera.position.z += ( mouseX - camera.position.z ) * 0.05;
//camera.position.x += ( - mouseY - camera.position.x ) * 0.002;

        camera.lookAt( scene.position );


        camera.lookAt( scene.position );
        webglRenderer.render( scene, camera );




    }
</script>
