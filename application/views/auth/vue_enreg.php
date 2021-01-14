<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <title>Vente | Création compte client</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.min.css" media="screen">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style_quin2050.css">
<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/logo/weblabs.png">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="">
            <nav style="border-radius: unset!important; height:80px;!important;font-size:25px;" class="navbar navbar-default fixed-top">
                <a style="color: #ffffff; font-family: 'Century Gothic';" 
                href="<?= site_url('auth/');?>" class="navbar-brand text-uppercase">
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
                    <ul class="nav navbar-nav">
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a style="color: #ede7f3 !important; font-family: 'Century Gothic';" class="" 
                        href="<?= site_url('auth/');?>"><i class="fa fa-home text-danger"></i> Accueil</a></li>
                        <li>
                        <a style="color: whitesmoke !important; font-family: 'Century Gothic';" 
                        href="<?= site_url('auth/login');?>" title="Se connecter par ici !">
                        Connexion <i class="fa fa-sign-in text-danger"></i></a>&nbsp;</li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center well">
            <h1 style="font-family: 'Century Gothic'; font-weight: bold;">
               Vente des produits alimentaires (Boucherie et charcuterie) 
               chez MANOAH INVESTISMENTS à la portée du grand public Lushois
            </h1>
        </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form action="<?= base_url('auth/enreg') ?>" method="post" class="" id="formlogin">
                <h2 class="panel-heading text-center" id="formheader">
                    Formulaire d'enrégistrement
                </h2><br>
                <?php include_once 'application/views/auth/systeme_alert.php'; ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback <?= (form_error('nom_client')) ? 'has-error' : NULL; ?>">
                                <label class="control-label" for="nom_client">Nom Complet du Client <span class="text-red">*</span> :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <input type="text" name="nom_client" id="nom_client" value="<?= set_value('nom_client') ?>" minlength="3" maxlength="30" class="form-control" autofocus required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="form-group has-feedback <?= (form_error('nom_ut')) ? 'has-error' : NULL; ?> ">
                                <label class="control-label" for="nom_ut">Nom utilisateur <span class="text-red">*</span> :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="nom_ut" id="nom_ut" value="<?= set_value('nom_ut') ?>" minlength="3" maxlength="30" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback <?= (form_error('telephone_client')) ? 'has-error' : NULL; ?>">
                                <label class="control-label" for="telephone_client">Téléphone :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <input type="text" name="telephone_client" id="telephone_client" value="<?= set_value('telephone_client')?>" minlength="3" maxlength="30" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback <?= (form_error('adresse_client')) ? 'has-error' : NULL; ?>">
                            <div class="col-sm-12">
                                <label class="control-label" for="adresse_client">Adresse du client :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                    <input type="text" name="adresse_client" id="adresse_client" value="<?= set_value('adresse_client') ?>" minlength="3" maxlength="30" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback <?= (form_error('mot_pass')) ? 'has-error' : NULL; ?>">
                                <label class="control-label" for="mot_pass">Mot de passe <span class="text-red">*</span> :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" name="mot_pass" id="mot_pass" value="<?= set_value('mot_pass') ?>" minlength="6" maxlength="12" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group has-feedback <?= (form_error('conf_mot_pass')) ? 'has-error' : NULL; ?>">
                                <label class="control-label" for="conf_mot_pass">Confirmez mot de passe <span class="text-red">*</span> :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" name="conf_mot_pass" id="conf_mot_pass" value="<?= set_value('conf_mot_pass') ?>" minlength="6" maxlength="12" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm formsubmit">&emsp;<i class="fa fa-lock"></i>&emsp;&emsp; S'enregistrer&emsp;</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="<?= base_url('auth/login') ?>">Connectez vous par ici...!</a>
                        </div>
                        <div class="form-group text-center">
                            <a class="text-primary" href="<?= base_url('auth') ?>" style="font-size: 18px;">
                                <i class="fa fa-arrow-circle-left"></i> Revenir à l'accueil
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js/jquery.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/systeme_alert.js"></script>
</div>
</body>
</html>