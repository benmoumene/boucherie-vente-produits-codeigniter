<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <title>Vente | Authentification</title>
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
                        href="<?= site_url('auth/vue_enreg');?>" title="Se connecter par ici !">
                        Créer compte client <i class="fa fa-user text-danger"></i></a>&nbsp;</li>
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
                <form action="<?= base_url('auth/connexion') ?>" method="post" class="" id="formlogin">
                    <h2 class="panel-heading text-center" id="formheader">
                        Formulaire de connexion
                    </h2><br>
                    <?php include_once 'application/views/auth/systeme_alert.php'; ?>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label sr-only" for="nom_ut">Nom utilisateur :</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" name="nom_ut" id="nom_ut" minlength="3" maxlength="30" class="form-control" autofocus required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label sr-only" for="nom_ut">Mot de passe :</label>
                            <div class="input-group" id="inputgroup">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="password" name="mot_pass" id="mot_pass" minlength="6" maxlength="12" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm formsubmit">&emsp;<i class="fa fa-lock"></i>&emsp;&emsp; Se connecter&emsp;</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="<?= base_url('auth/vue_enreg') ?>">Créez votre compte...!</a>
                        </div>
                        <div class="form-group text-center">
                            <a class="text-primary" href="<?= base_url('auth') ?>"style="font-size: 18px;">
                                <i class="fa fa-arrow-circle-left"></i> Revenir à l'accueil</a>
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