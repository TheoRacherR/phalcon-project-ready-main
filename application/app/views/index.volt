<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta
		name="viewport" content="width=device-width, initial-scale=1">
		<title>eShop Phalcon</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="./index.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
		{{ assets.outputCss() }}
		{{ assets.outputInlineCss() }}
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		{{ assets.outputJs() }}
		{{ assets.outputInlineJs() }}
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			{{ link_to("/", "eShop Phalcon", 'class' : 'navbar-brand') }}
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			

				<div class="collapse navbar-collapse">
					{{ link_to("product/", "Product") }}
				</div>

				<div class="collapse navbar-collapse">
					{% for a in session.get('auth') %}
						{{ a }}
					{% endfor %}
				</div>

				<span class="nav-item active">
					{{ link_to("cart", "Cart 🛒") }}
				</span>

				<span class="nav-item active">
					{% if session.get('auth') %}
						<a href="/account/logout" class="btn btn-warning">Logout</a>
					{% else %}
						<a class="nav-link" href="/account/login">Sign in<a>
					{% endif %}
				</span>
			</div>


		</nav>

		<div class="container">
        			<div class="mt-3">
        				{{ flashSession.output() }}
        			</div>
        			{#<div class="previous">
        				{{ link_to("/", "Home") }}
        			</div>#}
        			{{ content() }}
        		</div>
	</body>
</html>
