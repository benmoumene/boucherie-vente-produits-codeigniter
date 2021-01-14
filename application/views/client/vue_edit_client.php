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
                        <form action="<?= base_url('client/edit_client'); ?>" method="post">
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
        <div class="col-sm-6">
            <form action="<?= base_url('client/panier') ?>" method="post" class="" id="formlogin">
                <h3 class="panel-heading text-center" id="formheader">
                    <b>Commander les produits dont vous avez besoin</b>
                </h3><br>
                <?php include_once 'application/views/auth/systeme_alert.php'; ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="form-group has-feedback <?= (form_error('code_mat')) ? 'has-error' : NULL; ?> ">
                                <label class="control-label" for="code_mat">produits <span class="text-red">*</span> :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <select name="code_mat" class="form-control form-control-sm <?= form_error('code_mat') ? 'is-invalid' : NULL; ?>" required>

                                        <option disabled selected>Choisir les produits ici</option>
                                        <?php foreach ($materiaux as $row) : ?>
                                            <option id="<?= $row->name; ?>" value="<?= $row->name; ?>" <?= set_select('name', $row->name); ?>><?= $row->name . " | $". $row->prix_unitaire; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback <?= (form_error('qte_cmd')) ? 'has-error' : NULL; ?>">
                                <label class="control-label" for="qte_cmd">Quantité à commander <span class="text-red">*</span> :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-sort-numeric-asc"></i>
                                    </span>
                                    <input type="number" name="qte_cmd" id="qte_cmd" min="5" max="100" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text-center">
                            <button type="submit" class="btn formsubmit">&emsp;<i class="fa fa-shopping-cart"></i>&emsp; Ajouter au panier &emsp;</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <h2 style="font-family: Leelawadee"><i class="fa fa-database"></i> Votre panier</h2>
            <div class="table-responsive-sm">

                <table class="table table-bordered">

                    <tr>
                        <th>Quantité</th>
                        <th>Designation</th>
                        <th style="text-align:right">Prix unitaire</th>
                        <th style="text-align:right">Prix total</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php if (isset($cart)) foreach ($cart as $items): ?>

                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                        <tr>
                            <td><?php echo $items['qty']; ?></td>
                            <td class="text-uppercase">
                                <?php echo $items['name']; ?>

                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                    <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                    </p>

                                <?php endif; ?>

                            </td>
                            <td style="text-align:right">$<?php echo $this->cart->format_number($items['price']); ?></td>
                            <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                        </tr>

                        <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2"> </td>
                        <td class="right"><strong>Montant Total</strong></td>
                        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    </tr>

                </table>

                <a class="btn btn-success pull-left" href="<?= base_url('client/submit_cmd') ?>">Soumettre la commande</a>
                <a class="btn btn-danger pull-right" href="<?= base_url('client/reinit_cmd') ?>">Reinitialiser la commande</a>

            </div>
        </div>

        <div class="col-sm-12">

            <h3 class="text-uppercase">Liste de mes commandes</h3>

            <div class="table-responsive-sm">

                <table class="table table-sm table-striped table-hover table-bordered">

                    <thead class="thead-light">

                    <tr>
                        <th class="text-center">#</th>
                        <th>Nom du client</th>
                        <th>Référence</th>
                        <th width="15%" class="text-center">Date demande</th>
                        <th width="30%" class="text-right">Statut</th>
                        <th width="10%" class="text-right">Action</th>

                    </tr>

                    </thead>

                    <tbody>
                    <?php $count = 1; foreach ($commandes as $commande) : ?>
                        <tr>
                            <td class="text-center"><?= $count++;?></td>
                            <td class="text-uppercase"><?= $commande->nom_client;?></td>
                            <td class="text-uppercase"><a href="#"><?= $commande->cmd_id;?></a></td>
                            <td class="text-center"><?= date_format(new DateTime($commande->date_cmd), 'd/m/Y');?></td>
                            <td class="text-right"><?= $commande->statut;?></td>
                            <?php if ($commande->statut == "Votre commande est en attente") : ?>
                                <td class="text-center">
                                    <a onclick="return confirm('Vous êtes sur le point de supprimer une commande?')" class="btn btn-sm btn-block btn-warning" href="<?= base_url('client/suppr_cmd?id=' . $commande->id); ?>" style="border-radius: unset;">
                                        Supprimer
                                    </a>
                                </td>
                            <?php elseif($commande->statut == "Votre commande est réfusée"): ?>
                                <td class="text-center"><a onclick="return alert('Commande refusée')" href="#"><i class="fa fa-times-circle fa-2x text-danger"></i></a></td>
                            <?php else:?>
                                <td class="text-center"><a onclick="return alert('Commande validée')" href="#"><i class="fa fa-check-circle fa-2x text-success"></i></a></td>
                            <?php endif;?>

                        </tr>
                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>