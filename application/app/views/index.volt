<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta
		name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Phalcon PHP Framework</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="./index.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
	</head>
	<body>
		<div class="container">
			<div class="mt-3">
				{{ flashSession.output() }}
			</div>
			<div class="previous">
				{{ link_to("/", "Homes") }}
			</div>
			{{ content() }}
		</div>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Menu</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">

					{% for categ in categories %}{% endfor %}


					{%- if count($subCategories) > 0 -%}

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $categ->name ?>

								<span class="sr-only">(current)</span>
							</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php
                        foreach ($subCategories as $subCategory) {
                        ?>
									<a class="dropdown-item" href="#"><?php echo $subCategory->name ?></a>
								<?php
                        }
                        ?>
							</div>
						</li>
					{%- else -%}

						<li class="nav-item active">
							<a class="nav-link" href="#">
								<?php echo $categ->name ?>
								<span class="sr-only">(current)</span>
							</a>
						</li>

					{%- endif -%}
				</ul>
				<span class="nav-item active">
					<a class="nav-link" href="/account/login">Connectez vous<span class="sr-only">(current)</span>
					</a>
				</span>
			</div>


		</nav>

		<!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
