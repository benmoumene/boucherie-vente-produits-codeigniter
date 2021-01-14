<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="well text-center">
                <h2><b>Vous êtes sur l'espace utilisateur <i style="color: #3a35f3;"> du service client : <?= $nom_ut?></i></b></h2>
                <a class="" href="<?= base_url('auth') ?>"><i class="fa fa-hand-o-left fa-2x"> </i>Revenir au catalogue</a>
            </div>
        </div>
    </div>
    <div class="row">

        <form role="form" method="post" action="<?= base_url( $role_ut . '/ajout_materiaux') ?>">
            <h2 class="text-center" style="font-weight: bold;">Ajout d'un nouveau produit</h2>

                <fieldset class="col-sm-8 col-sm-offset-2">

                        <div class="form-group col-sm-6 text-left">
                            <label for="name" class="control-label">Intitulé du produit :</label>
                            <input type="text" name="name" class="form-control form-control-sm
                                        is-valid flat text-white" placeholder="Nom du produit" minlength="3" maxlength="30" required autofocus>
                        </div>

                        <div class="form-group col-sm-6 text-left">
                            <label for="prix_unitaire" class="control-label">Prix unitaire en $</label>
                            <input type="number" name="prix_unitaire" class="form-control form-control-sm
                             is-valid flat text-white" placeholder="Prix du produit" min="5" max="5000" required>
                        </div>

                        <div class="form-group col-sm-6 text-left">
                            <label for="qte_stock" class="control-label">Quantite en stock :</label>
                            <input type="number" name="qte_stock" class="form-control form-control-sm
                             is-valid flat text-white" placeholder="Quantite du produit en stock" min="2" max="1000" required>
                        </div>

                        <div class="form-group col-sm-6 text-left">
                            <label for="desc_mat" class="control-label">Description du produit :</label>
                            <textarea type="text" name="desc_mat" class="form-control form-control-sm
                            is-valid flat text-white" placeholder="La description du produit" required>
                            </textarea>
                        </div>

                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-primary flat btn-block">Enregistrer le produit</button>
                        </div>

                    <div class="form-group col-sm-6">
                        <button type="button" class="btn btn-warning flat btn-block" data-dismiss="modal">Annuler</button>
                    </div>

                </fieldset>
        </form>

    </div>
    <div class="row">
        <div class="col-sm-12">

            <h3 class="text-uppercase">Liste de tous les produits disponibles</h3>

            <div class="table-responsive-sm">

                <table class="table table-sm table-striped table-hover table-bordered">

                    <thead class="thead-light">

                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th class="text-center">Produit</th>
                        <th width="15%">Stock</th>
                        <th width="15%" class="text-center">Prix unitaire</th>
                    </tr>

                    </thead>

                    <tbody>
                    <?php $count = 1; foreach ($materiaux as $mat) : ?>
                        <tr>
                            <td class="text-center"><?= $count++;?></td>
                            <td class="text-uppercase text-centcode_mat"><?= $mat->name;?></td>
                            <td><?= $mat->qte_stock;?></td>
                            <td><?= $mat->prix_unitaire;?> $</td>

                            <td width="10%" class="text-center">
                                <a onclick="return confirm('Vous êtes sur le point de supprimer un produit?')" class="btn btn-sm btn-block btn-danger"
                                   href="<?= base_url('service_client/suppr_mat?code_mat=' . $mat->code_mat); ?>" style="border-radius: unset;">
                                    Supprimer
                                </a>
                            </td>

                        <td width="10%" class="text-center">
                                <a class="btn btn-sm btn-block btn-warning"
                                   href="<?= base_url('service_client/edit_mat?code_mat=' . $mat->code_mat); ?>" style="border-radius: unset;">
                                    Editer
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>