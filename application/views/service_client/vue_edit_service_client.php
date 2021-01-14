<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="well">
                    
                <div class="form-group text-center">
                    <h3 class="col-sm-6 col-sm-offset-3">
                        <strong>Modification de mes infos</strong>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <form action="<?= base_url('service_client/edit_service_client'); ?>" method="post">
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
            </div>
        </div>
    </div>
    <div class="row">


        <?php foreach ($comm_list as $row => $it): ?>

            <div class="col-sm-12">

                <?php foreach ($it as $itecli_cm) :
                    $nom_cli_cmd = $itecli_cm->nom_client;
                    $cmd_id_ = $itecli_cm->cmd_id;
                endforeach;

                ?>

                <h3 class="text-uppercase">Bon de commande appartenant à <?= $nom_cli_cmd; ?></h3>

                <div class="table-responsive-sm">

                    <table class="table table-sm table-striped table-hover table-bordered">

                        <thead class="thead-light">

                        <tr>
                            <th class="text-center">#</th>
                            <th>Pièce commandée</th>
                            <th width="15%">Quantité commandée</th>
                            <th width="15%">Date de commande</th>
                            <th width="15%">Total de la ligne</th>

                        </tr>

                        </thead>

                        <tbody>
                        <?php
                        $subtotal = 0;
                        ?>
                        <?php
                        $count = 1; foreach ($it as $ite) :

                            if ($row == $ite->cmd_id) :

                                ?>
                                <tr>
                                    <td class="text-center"><?= $count++;?></td>
                                    <td class="text-uppercase"><?= $ite->name;?></td>
                                    <td class="text-right"><?= $ite->qty;?> Pièces</td>
                                    <td class="text-center"><?= date_format(new DateTime($ite->date_cmd), 'd/m/Y');?></td>
                                    <td class="text-right">$<?php $subtotal += $ite->subtotal; echo $ite->subtotal; ?></td>

                                </tr>

                            <?php endif; endforeach; ?>
                        <tr>
                            <td colspan="3"></td>
                            <td>Total commande</td>
                            <td class="text-right text-danger">$<?= $subtotal; ?></td>
                        </tr>

                        <tr>
                            <td colspan="3"></td>
                            <td>Statut</td>
                            <td class="text-left text-info"><?=  $ite->statut; ?></td>
                        </tr>

                        </tbody>

                    </table>

                </div>
                <?php if ($ite->statut == "Votre commande est en attente") : ?>

                    <a class="btn btn-success btn-sm pull-left" href="<?= base_url('service_client/valider?cmd_id=' . $cmd_id_) ?>">Valider la commande</a>
                    <a class="btn btn-danger btn-sm pull-right" href="<?= base_url('service_client/invalider?cmd_id=' . $cmd_id_) ?>">Invalider la commande</a>
                <?php endif; ?>
                <br>
            </div>

        <?php endforeach; ?>


    </div>

</div>