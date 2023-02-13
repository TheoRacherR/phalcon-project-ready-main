<div class="row">
    <nav>
        {{ link_to("product/new", "Create a new product", "class": "btn btn-success mb-5") }}
    </nav>
</div>

<div class="page-header">
    <h1>All the products</h1>
</div>

{{ content() }}

{{ form('product/search', 'method': 'post') }}

	<div>
		<label for='id_sub_category'>Categories</label>
		{{ 
            select([
                    'id_sub_category', 
                    categories, 
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
		{{ submit_button('Search', "class": "btn btn-primary mt-3") }}
	</div>

{{ end_form() }}


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
                {#<th>Create</th>
                <th>Update</th>#}
            </tr>
        </thead>
        <tbody>
        {% for product in productsF %}
            <tr>
            <td>{{ product.id }}</td>
            <td>{{ product.id_owner }}</td>
            <td>{{ product.id_sub_category }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.description | length > 10 ? product.description|slice(0, 10) ~ '...' : product.description}}</td>
            <td>{{ product.stock }}</td>
            <td>{{ product.picture_url }}</td>
            {#<td>{{ date("d M Y", product.create_at)}}</td>
            <td>{{ date("d M Y", product.update_at)}}</td>#}

                <td>{{ link_to("cart/add/" ~ product.id, "Add to cart", "class": "btn btn-success") }}</td>

                <td>{{ link_to("product/page/" ~ product.id, "Page", "class": "btn btn-primary") }}</td>
                <td>{{ link_to("product/edit/" ~ product.id, "Edit", "class": "btn btn-warning") }}</td>
                <td>{{ link_to("product/delete/" ~ product.id, "Delete", "class": "btn btn-danger") }}</td>
            </tr>
        
        {% endfor %}
        </tbody>
    </table>
</div>