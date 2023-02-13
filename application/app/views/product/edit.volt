<div class="page-header">
    <h1>Edit product</h1>
</div>

{{ form('product/edit', 'method': 'post') }}

	<div>
		<label for='name'>Name</label>
		{{ text_field('name', 'size': 32, "class": "form-control") }}
	</div>

	<div>
		<label for='description'>Description</label>
		{{ text_field('description', 'size': 32, "class": "form-control") }}
	</div>

	<div>
		<label for='stock'>Stock</label>
		{{ text_field('stock', 'size': 32, "class": "form-control") }}
	</div>

	<div>
		<label for='price'>Price</label>
		{{ text_field('price', 'size': 32, "class": "form-control") }}
	</div>

	<div>
		<label for='id_sub_category'>Categories</label>
		{{ 
            select([
                    'id_sub_category', 
                    id_sub_category, 
                    'using': ['id', 'name'], 
                    'useEmpty': true, 
                    'emptyText': '...', 
                    'emptyValue': '',
                    "class": "form-control"
                ]
            ) 
        }}
	</div>

	<div>
		{{ submit_button('Edit', "class": "btn btn-primary mt-3") }}
	</div>

	{{ end_form() }}
