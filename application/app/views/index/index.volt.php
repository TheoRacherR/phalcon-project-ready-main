<div class="page-header">
	<h1>Welcome to this eShop</h1>

    <h5>Latest product :</h5>
    <div class="d-flex" style="overflow-x: auto !important">
        <?php foreach ($prod as $p) { ?>
            <div class="m-2 p-4 border border-dark">
                <?= $this->tag->linkTo(['product/page/' . $p->id, $p->name]) ?>
                <div><?= $this->tag->linkTo(['cart/add/' . $p->id, 'Ajouter', 'class' => 'btn btn-success']) ?></div>
            </div>

        <?php } ?>
	</div>

</div>
