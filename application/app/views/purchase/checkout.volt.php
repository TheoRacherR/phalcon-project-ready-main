<div class="container">
    <h1>Le détail de votre commande</h1><br/>
    <div class="row">
        <div class="col-md-6">
            <h2>Informations de livraison</h2>
            <div class="mb-5"><?= $user->address ?></div>


            <h2>Informations de paiement</h2>
            <select class="mb-5">
                <option value="1">Carte bancaire</option>
                <option value="2">Paypal</option>
            </select>
            
            
        </div>
        <div class="col-md-6">
            <h2>Récap de votre commande</h2>
            <table class="table table-borderless mb-5">
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><img src="<?= $product->picture_url ?>" width="50" height="50"></td>
                            <td><?= $product->name ?></td>
                            <td>X <?= $product->quantity ?></td>
                            <td><?= $product->price * $product->quantity ?> €</td>
                        </tr>
                        <?php $total = $total + ($product->price * $product->quantity); ?>
                    <?php } ?>
                    <?= $this->tag->form(['purchase/checkout', 'method' => 'post']) ?>
                    <?= $this->tag->endForm() ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-6">
                    <h3>Total commande :</h3>
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <h3><?= $total ?> €</h3>
                </div>
            </div>

            <?= $this->tag->form(['purchase/checkout', 'method' => 'post']) ?>
            <?= $this->tag->textField(['total', 'value' => $total, 'hidden' => true]) ?>


            <?= $this->tag->linkTo(['purchase/checkout', 'Valider ma commande', 'class' => 'btn btn-success btn-lg btn-block', 'type' => 'submit']) ?>

            <?= $this->tag->endForm() ?>

        </div>
    </div>
</div>

