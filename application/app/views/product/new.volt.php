<?= $this->tag->form(['product/create', 'method' => 'post', 'enctype' => 'multipart/form-data']) ?>

	<div>
		<label for='name'>Name</label>
		<?= $this->tag->textField(['name', 'size' => 32, 'class' => 'form-control']) ?>
	</div>

	<div>
		<label for='description'>Description</label>
		<?= $this->tag->textField(['description', 'size' => 32, 'class' => 'form-control']) ?>
	</div>

	<div>
		<label for='stock'>Stock</label>
		<?= $this->tag->textField(['stock', 'size' => 32, 'class' => 'form-control']) ?>
	</div>

	<div>
		<label for='picture_url'>Picture url</label>
		<?= $this->tag->fileField(['picture_url', 'class' => 'form-control', 'id' => 'formFile']) ?>
	</div>

	<div>
		<label for='id_sub_category'>Categories</label>
		<?= $this->tag->select(['id_sub_category', $id_sub_category, 'using' => ['id', 'name'], 'useEmpty' => true, 'emptyText' => '...', 'emptyValue' => '', 'class' => 'form-control']) ?>
	</div>

	<div>
		<?= $this->tag->submitButton(['Create', 'class' => 'btn btn-primary mt-3']) ?>
	</div>

	<?= $this->tag->endForm() ?>
