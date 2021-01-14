<div class="page-header" id="banner"><br>
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary" href="<?= base_url('admin/ajout_ut') ?>" style="border-radius: unset;">Ajouter un utilisateur par ici</a>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-12">
            <div class="card border-primary jf">

                <div class="card-header">
                    <h3 class="display-5">Liste des Utilisateurs </h3>
                </div>

                <div class="card-body">

                    <div class="table-responsive-sm">
                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nom d'utilisateur</th>
                                <th>Date Création</th>
                                <th>Privilège</th>
                                <th width="10%">Suppression</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; foreach ($utilisateurs as $row): if ($row->role_ut != 'admin') : ?>
                                <tr>
                                    <td class="text-center"><?= $count++; ?></td>
                                    <td class="text-uppercase"><?= $row->nom_ut; ?></td>
                                    <td><?= $row->date_creat; ?></td>
                                    <td class="text-uppercase"><?= $row->role_ut; ?></td>
                                    <td>
                                        <a onclick="return confirm('Vous êtes sur le point de supprimer un utilisateur?')" class="btn btn-sm btn-block btn-danger" href="<?= base_url('admin/suppr_ut?id=' . $row->id . '&nom_ut='. $row->nom_ut); ?>" style="border-radius: unset;">
                                            Supprimer
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
