<div class="page-header">
    <h1>Edit product</h1>
</div>

<?= $this->tag->form(['product/save', 'method' => 'post']) ?>

    <div>
        <label for='name'>Name</label>
        <?= $this->tag->textField(['name', 'size' => 32]) ?>
    </div>

    <div>
        <label for='description'>Description</label>
        <?= $this->tag->textField(['description', 'size' => 32]) ?>
    </div>

    <div>
        <label for='stock'>Stock</label>
        <?= $this->tag->textField(['stock', 'size' => 32]) ?>
    </div>

    <div>
        <label for='picture_url'>Picture url</label>
        <?= $this->tag->textField(['picture_url', 'size' => 32]) ?>
    </div>

    <div>
        <label for='id_sub_category'>Categories</label>
        <?= $this->tag->select(['id_sub_category', $id_sub_category, 'using' => ['id', 'name'], 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '']) ?>
    </div>
        
    <div>
        <?= $this->tag->submitButton(['Send']) ?>
    </div>

<?= $this->tag->endForm() ?>
