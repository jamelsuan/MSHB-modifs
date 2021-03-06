<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
?>

<script>
    jQuery(document).ready(function(){
        jQuery("#premier_plan").html("votre compte");
    });
</script>
<style>
    .container_header {height:75px;}
    .header_bg, #premier_plan {display: none;}
</style>

<p style="text-align: center;"><br />
    Redirection vers la plateforme Appel à projets
</p>

<?php
    global $base_path,$user;
    //print_r($user);
    // On teste le group de l'utilisateur
    if(in_array('MSHB', $user->roles) || in_array('administrator', $user->roles)){
        $options = array('query' => array('role' => 'mshb'));
        drupal_goto('/accueil_projets',$options);
    }elseif(in_array('expert', $user->roles) || in_array('expert extérieur', $user->roles)){
        $options = array('query' => array('role' => 'expert'));
        drupal_goto('/accueil_projets',$options);
    }else{
        $options = array('query' => array('role' => 'membre_projet'));
        drupal_goto('/accueil_projets',$options);
    }
?>

<div class="container" style="display: none;">
    <div class="profile"<?php print $attributes; ?>>
        <?php print render($user_profile); ?>
    </div>
    <section style="margin-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Connexion au site</h2>
                <div class="bloc-labo-list-pagi" style="text-align: left;"><a href="/user/logout" style="margin-top: 0px; margin-bottom:10px;">Se déconnecter</a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Appel à projets</h2>
                <div class="bloc-labo-list-pagi" style="text-align: left;"><a class="" href="/accueil_projets" style="margin-top: 0px; margin-bottom:10px;">Accès plateforme</a></div>
                <div class="bloc-labo-list-pagi" style="text-align: left;"><a class="" href="/vie_projet_mshb" style="margin-top: 0px; margin-bottom:10px;">Vie des projets</a></div>
                <?php echo infosSignaturesLabos(); ?>
            </div>
        </div>
    </section>
</div>
