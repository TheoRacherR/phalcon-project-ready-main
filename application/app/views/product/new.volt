{{ form('product/create', 'method': 'post', 'enctype': 'multipart/form-data') }}

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
		<label for='picture_url'>Picture url</label>
		{{ file_field('picture_url', "class": "form-control", "id": "formFile") }}
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
		{{ submit_button('Create', "class": "btn btn-primary mt-3") }}
	</div>

	{{ end_form() }}
