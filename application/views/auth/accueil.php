<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <title>Vente | Page démarrage</title>
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
                href="" class="navbar-brand text-uppercase">
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
                        href="#about_manoah"><i class="fa fa-info-circle text-danger"></i> A propos de nous</a></li>
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
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img5.jpg" alt="">
            <p class="text-center">
                <b>Saucisse de poulet</b>
                <br>
                <b>Prix/kg : $5</b>
                <br>
                <a class="btn btn-lg btn-success" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img4.jpg" alt="">
            <p class="text-center">
                <b>Cuisse de poulet</b>
                <br>
                <b>Prix/kg : $10</b>
                <br>
                <a class="btn btn-lg btn-success" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img2.jpg" alt="">
            <p class="text-center">
                <b>Viande de porc</b>
                <br>
                <b>Prix/kg : $10</b>
                <br>
                <a class="btn btn-lg btn-success" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img1.jpg" alt="">
            <p class="text-center">
                <b>Poulet wilki</b>
                <br>
                <b>Prix/kg : $4</b>
                <br>
                <a class="btn btn-lg btn-success" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="text-center">
                    <hr>
                <h2>Besoin de commander un produit ?
                <a class="btn btn-lg btn-danger" href="<?= base_url('client/')?>">Passer votre commande</a>
                </h2>
                    <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-justify" style="font-size: large; font-family: 'Trebuchet MS'; font-style:oblique; ">
            <p>
                Nous proposons des produits de premières nécessité pour toute la famille.
                Bouchérie, charcutérie, et plus ...
                MANOAH INVESTISMENTS est là pour vous apportez de meilleures aliments pour nourire toute la famille, avec nos idées inspirantes
                et des conseils pratiques, offrant des conseils et des conseils d'experts sur la préparation, les restaurants, les machines, la plomberie, l'électricité et beaucoup plus
                tout ce que vous devez faire est de demander ! Découvrez notre vaste bibliothèque d'articles pour en savoir plus.
        </p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img1.jpg" alt="">
            <p class="text-center">
                <b>Poulet wilki</b>
                <br>
                <b>Prix/kg : $4</b>
                <br>
                <a class="btn btn-lg btn-primary" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img2.jpg" alt="">
            <p class="text-center">
                <b>Viande de porc</b>
                <br>
                <b>Prix/kg : $10</b>
                <br>
                <a class="btn btn-lg btn-primary" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img3.jpg" alt="">
            <p class="text-center">
                <b>Saucisse Salami</b>
                <br>
                <b>Prix/kg : $6</b>
                <br>
                <a class="btn btn-lg btn-primary" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img4.jpg" alt="">
            <p class="text-center">
                <b>Cuisse de Poulet</b>
                <br>
                <b>Prix/kg : $5</b>
                <br>
                <a class="btn btn-lg btn-primary" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img9.jpg" alt="">
            <p class="text-center">
                <b>Viande hachée</b>
                <br>
                <b>Prix/kg : $5</b>
                <br>
                <a class="btn btn-lg btn-info" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img11.jpg" alt="">
            <p class="text-center">
                <b>Chasseur</b>
                <br>
                <b>Prix/kg : $3</b>
                <br>
                <a class="btn btn-lg btn-info" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img7.jpg" alt="">
            <p class="text-center">
                <b>Saucisse freche</b>
                <br>
                <b>Prix/kg : $4</b>
                <br>
                <a class="btn btn-lg btn-info" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
        <div class="col-sm-3">
            <img class="well" height="300" width="100%" src="<?= base_url() ?>/assets/boucherie/img8.jpg" alt="">
            <p class="text-center">
                <b>Viande locale</b>
                <br>
                <b>Prix/kg : $7</b>
                <br>
                <a class="btn btn-lg btn-info" href="<?= base_url('client/')?>">Commander</a>
            </p>
        </div>
    </div>
    <hr>
        <div class="row">
        <div class="col-sm-12" style="font-family: 'Comic Sans MS';">
            <h2 class="text-center">Nos préferences et qualités par catégorie :</h2>
            <hr>
        </div>
        <div class="col-sm-4">
            <ul>
                <li>BOUCHERIE</li>
                <ul>
                    <li>Béquilles de porte
                    <li>Boutons de fenêtre
                    <li>Poignée de fenêtre
                    <li>Crémone en applique
                    <li>Paumelle pour le bois
                    <li>Ferrure coulissante
                    <li>Fiche à visser
                </ul>
            </ul>
        </div>
        <div class="col-sm-4">
            <ul>
                <li>CHARCUTERIE</li>
                <ul>
                    <li>Palier de broche,</li>
                    <li>Pièce de traction,</li>
                    <li>Pièce estampée,</li>
                    <li>Pion de centrage,</li>
                    <li>Plot,</li>
                    <li>Soupape,</li>
                    <li>Noix de fixation</li>
                </ul>
            </ul>
        </div>
        <div class="col-sm-4">
            <ul>
                <li>DIVERS</li>
                <ul>
                    <li>Bride</li>
                    <li>Broche d'unité de perçage</li>
                    <li>Ensemble</li>
                    <li>Fusée de roue</li>
                    <li>Manchon</li>
                    <li>Mécanisme spécifique</li>
                    <li>Moyeu</li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="jumbotron" id="about_manoah" width="100%">
        <div class="row well">
        <h1 class="text-center">APPROPOS DE MANOAH</h1>
        <h3 class="text-justify">
             Manoah Investments S.A.R.L est une jeune entreprise crée par la volonté de deux associées Mr STONE KUMBI TSHIBANDA et Mme NYANGI KUMBI le 13 mai 2000 à Lubumbashi, dans la province du Katanga en République Démocratique du Congo
Le développement rapide de l’entreprise est le fruit de l’esprit entrepreneurial de très jeunes cadres dynamiques actifs et très agressives sur le marché traditionnel et leur distribution, en deux ans, Manoah Investements est passée à Lubumbashi.
Les activités de Manoah Investments ont débuté réellement en 1999 avec le retour au pays de Mr STONE KUMBI TSHIBANDA de la Zambie voisine ou pendant 4 ans soit 1996-1999 Mr STONE KUMBI a travaillé activement dans une boucherie dénommée Best Bouchery de Ndola ; une boucherie avec une capacité de 90 kg de viande traitée par jour et c’est le point de départ de l’actuel Manoah. En raison de la meilleure qualité (formule propre composée à l’entreprise) des produits conjugués aux prix très concurrentiels et à la portée de la grande masse de la population, le volume de la production s’est accru au prix des très longues heures de travail faisant ainsi passer Manoah comme leader de marché lushois.
La découverte des sources importantes et sures d’approvisionnement avaient en fin déterminée Mr STONE KUMBI de constituer la société Manoah Investments S.A.R.L pouvant produire de la charcuterie. A ce jour, l’entreprise s’oriente vers l’importation des denrées alimentaires d’origine animal et intrants industriels nécessaire à la transformation.
De produits ainsi que des viandes importées sont mise en vente.
En raison de son expérience dans le domaine agro-alimentaire et commercialisation des viandes en Afrique australe notamment en Zambie, la gestion quotidienne distractive et technique était confiée à Mr STONE KUMBI TSHIBANDA associé majoritaire.

        </h3>
    </div>
    <div class="row well" id="localisation" width="100%">
        <h1 class="text-center">MISSION ET LOCALISATION</h1>
        <h3 class="text-justify" height="600">
            L’objectif social de Manoah tel qu’il est inscrit au greffe du tribunal et le commerce général de l’import et export, la représentation et les services étant une entreprise agro-alimentaire, Manoah Investments contribues également à plusieurs facteurs sociaux tels que :
•	La lutte contre la pauvreté ;
•	La réduction du taux de chômage ;
•	Les ravitaillements aux populations pauvres ou vivantes en incapacité ;
•	Offre à la population des produits de qualité et à un prix convenable.
II.2.3 SITUATION GEOGRAPHIQUE
Manoah Investments est basé à Lubumbashi en République Démocratique du Congo. Son siège social principal est situé au n° 2003 du boulevard M’siri à l’entrée de la ville, au quartier Gambela 1 à Lubumbashi, dans la province du haut-katanga.
En plus, le siège d’exploitation est constitué d’une usine de production et de conditionnement de viandes et autres produits située sur l’avenue Kiwele au quartier bel air, dans la commune de Kampemba et 18 points de vente à travers la ville de Lubumbashi.

        </h3>
    </div>
    </div>
</div>
