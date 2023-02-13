<div class="row">
    <nav>
        <?= $this->tag->linkTo(['product/new', 'Create a new product', 'class' => 'btn btn-success mb-5']) ?>
    </nav>
</div>

<div class="page-header">
    <h1>All the products</h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['product/search', 'method' => 'post']) ?>

	<div>
		<label for='id_sub_category'>Categories</label>
		<?= $this->tag->select(['id_sub_category', $categories, 'using' => ['id', 'name'], 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control']) ?>
	</div>

	<div>
		<?= $this->tag->submitButton(['Search', 'class' => 'btn btn-primary mt-3']) ?>
	</div>

<?= $this->tag->endForm() ?>


<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id Of Owner</th>
                <th>Id Of Sub Of Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Picture Of Url</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productsF as $product) { ?>
            <tr>
            <td><?= $product->id ?></td>
            <td><?= $product->id_owner ?></td>
            <td><?= $product->id_sub_category ?></td>
            <td><?= $product->name ?></td>
            <td><?= ($this->length($product->description) > 10 ? $this->slice($product->description, 0, 10) . '...' : $product->description) ?></td>
            <td><?= $product->stock ?></td>
            <td><?= $product->picture_url ?></td>
            

                <td><?= $this->tag->linkTo(['cart/add/' . $product->id, 'Add to cart', 'class' => 'btn btn-success']) ?></td>

                <td><?= $this->tag->linkTo(['product/page/' . $product->id, 'Page', 'class' => 'btn btn-primary']) ?></td>
                <td><?= $this->tag->linkTo(['product/edit/' . $product->id, 'Edit', 'class' => 'btn btn-warning']) ?></td>
                <td><?= $this->tag->linkTo(['product/delete/' . $product->id, 'Delete', 'class' => 'btn btn-danger']) ?></td>
            </tr>
        
        <?php } ?>
        </tbody>
    </table>
</div>