<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="well text-center">
                <h2><b>Vous êtes sur l'interface utilisateur <i style="color: #3a35f3;"> de la facturation : <?= $nom_ut?></i></b></h2>
                <a class="" href="<?= base_url('auth') ?>"><i class="fa fa-hand-o-left fa-2x"> </i>Revenir au catalogue</a>
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

                <h3 class="text-uppercase">Facture appartenant à <?= $nom_cli_cmd; ?></h3>

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
                            <?php $tva = $subtotal * 16/100;?>
                            <td colspan="3"></td>
                            <td>TVA</td>
                            <td class="text-right text-danger">$<?= $tva; ?></td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td>NET A PAYER</td>
                            <td class="text-right text-danger">$<?= $subtotal + $tva; ?></td>
                        </tr>

                        </tbody>

                    </table>

                    </div>
                <a class="btn btn-success btn-sm pull-left" href="<?= base_url('service_client/valider?cmd_id=' . $cmd_id_) ?>">Etablir Facture</a>
                <a class="btn btn-danger btn-sm pull-right" href="<?= base_url('service_client/invalider?cmd_id=' . $cmd_id_) ?>">Invalider la Facture</a>
                <br>
            </div>

        <?php endforeach; ?>


    </div>

</div>