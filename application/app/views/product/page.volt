<div class="page-header" style="display:flex">
    <div>
        {{ link_to( "product", "Go Back", "class": 'btn btn-primary ml-2 mb-5') }}
    </div>
    <div>
        {{ link_to("product/new", "New Product", "class": 'btn btn-success ml-2 mb-5') }}
    </div>
    <div>
        {{ link_to("product/edit/" ~ prod.id, "Edit this Product", "class": 'btn btn-warning ml-2 mb-5') }}
    </div>
    <div>
        {{ link_to("product/delete/" ~ prod.id, "Delete this Product", "class": 'btn btn-danger ml-2 mb-5') }}
    </div>
</div>
    <h1>{{  prod.name }}</h1>

{{ content() }}

{% block content %}


    {# <p>Product id : {{ prod.id }}</p> #}
    <p>by {{ owner }}</p>
    <div>{{ link_to("cart/add/" ~ product.id, "Ajouter", "class": "btn btn-success mb-3") }}</div>
    <p>Product category : {{  category }} </p>
    <p>Product sub_category : {{  sub_category }} </p> 
    {#<p>Product name : {{  prod.name }} </p>#}

    <h3>Price : {{  prod.price }}€</h3>

    <p>Description : {{  prod.description }} </p>

    {% if prod.stock === 0 %}

        <p><span style="color:red">This product is unavalable</span></p>
    
    {% else %}
    
        <p>{{ prod.stock }} products left. </p>
        
    {% endif %}

    <p>Product photo : </p><img src="var/www/html/application/public/images/{{prod.picture_url}}" alt="image of the product">




{% endblock %}