<div class="row">
    <nav>
        <p class="previous"><?= $this->tag->linkTo(['product/index', 'Search a product']) ?></p>
        <p class="next"><?= $this->tag->linkTo(['product/new', 'Create a new product']) ?></p>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

<?= $this->getContent() ?>

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
            <th>Create</th>
            <th>Update</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($page as $product) { ?>
            <tr>
            <td><?= $product->id ?></td>
            <td><?= $product->id_owner ?></td>
            <td><?= $product->id_sub_category ?></td>
            <td><?= $product->name ?></td>
            <td><?= $product->description ?></td>
            <td><?= $product->stock ?></td>
            <td><?= $product->picture_url ?></td>
            <td><?= $product->create_at ?></td>
            <td><?= $product->update_at ?></td>

                <td><?= $this->tag->linkTo(['product/page/' . $product->id, 'Page']) ?></td>
                <td><?= $this->tag->linkTo(['product/edit/' . $product->id, 'Edit']) ?></td>
                <td><?= $this->tag->linkTo(['product/delete/' . $product->id, 'Delete']) ?></td>
            </tr>
        
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
             <?= $this->tag->linkTo([$page->getCurrent(), '/', $page->getTotalItems()]) ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?= $this->tag->linkTo(['product/search', 'First', 'class' => 'page-link', 'id' => 'first']) ?></li>
                <li><?= $this->tag->linkTo(['product/search?page=' . $page->getPrevious(), 'Previous', 'class' => 'page-link', 'id' => 'previous']) ?></li>
                <li><?= $this->tag->linkTo(['product/search?page=' . $page->getNext(), 'Next', 'class' => 'page-link', 'id' => 'next']) ?></li>
                <li><?= $this->tag->linkTo(['product/search?page=' . $page->getLast(), 'Last', 'class' => 'page-link', 'id' => 'last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
