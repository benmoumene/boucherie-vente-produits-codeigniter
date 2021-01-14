<div class="row">

    <div class="col-sm-6 well">
        <h3 class="col-sm-12">Administrateur
            <strong class="text-capitalize">
                <?= $nom_ut; ?>
            </strong>
        </h3>
        <div class="col-sm-12">
            <div class="form-group">
                <h5 class="display-6">Vous êtes sur le panneau de contrôl...</h5>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <a href="<?= base_url('auth/deconnexion'); ?>" class="form-control-sm btn btn-primary btn-sm">Déconnexion</a>
            </div>
        </div>
        <div class="form-group text-center">
            <p>Entant qu'administrateur, vous avez la possibilité de créer des nouveaux utilisateurs,
                de supprimer les utilisateurs sous l'ordre de la hiérarchie</p>
        </div>
    </div>

    <div class="col-sm-6 well">
        <h3 class="col-sm-12"><strong>Modification de mes infos</strong></h3>
        <form action="<?= base_url('admin/admin'); ?>" method="post">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" name="nom_ut" class="form-control form-control-sm <?= form_error('nom_ut') ? 'is-invalid' : NULL; ?>" placeholder="Nom Utilisateur"
                           value="<?= set_value('nom_ut'); ?>" minlength="3" maxlength="30" required>
                </div>
                <div class="form-group">
                    <input type="password" name="anc_mot_pass" class="form-control form-control-sm <?= form_error('anc_mot_pass') ? 'is-invalid' : NULL; ?>" placeholder="Ancien Mot de passe"
                           minlength="6" maxlength="12" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="password" name="mot_pass" class="form-control form-control-sm <?= form_error('mot_pass') ? 'is-invalid' : NULL; ?>" placeholder="Nouveau Mot de passe"
                           minlength="6" maxlength="12" required>
                </div>
                <div class="form-group">
                    <input type="password" name="conf_mot_pass" class="form-control form-control-sm <?= form_error('conf_mot_pass') ? 'is-invalid' : NULL; ?>" placeholder="Confirmation Mot de passe"
                           minlength="6" maxlength="12" required>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Modifier vos info" class="form-control-sm btn-sm btn-primary ">
            </div>
        </form>
    </div>
</div>