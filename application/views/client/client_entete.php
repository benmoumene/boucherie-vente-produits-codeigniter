<div class="row">
    <div class="container-fluid">
        <nav class="navbar navbar-default" style=" height:80px;!important;font-size:25px;">
                <a style="color: #ffffff; font-family: 'Century Gothic';" 
                href="<?= base_url($role_ut); ?>" class="navbar-brand text-uppercase">
                <img src="<?= base_url(); ?>assets/logo/weblabs.png" alt="" class="logo" height="50" width="100">
                </a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav" aria-expanded="false">
                    <span class="sr-only">Basculer la navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="main_nav">

                <ul class="nav navbar-nav navbar-right">
                    <li class="bg-danger"><a style="color: #000000 !important;" class="couleur-taille" href="<?= site_url('auth/deconnexion');?>" title="Se déconnecter par Ici !"><i class="fa fa-sign-out" style="color: #c31819;"></i> Déconnexion</a></li>
                </ul>
                <p class="navbar-text navbar-right">|</p>
                <p style="color: #000000 !important;" class="navbar-text navbar-right">Bienvenue <strong style="color: #000000 !important;"><a
                                href="<?= base_url('client/vue_edit_client') ?>"><?= $role_ut . " " . $nom_ut; ?></a></strong></p>

            </div>
        </nav>
    </div>
</div>

<div class="container">

<?php include_once ("application/views/auth/systeme_alert.php"); ?>