<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $this->title; ?>  - Just Eat Delivery</title>
<meta name="description" content="<?php echo $this->title; ?>  - Just Eat Delivery">
<meta name="theme-color" content="#ff8000">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@jensz12">
<meta name="twitter:creator" content="@jensz12">
<meta name="twitter:title" content="<?php echo $this->title; ?>  - Just Eat Delivery">
<meta name="twitter:description" content="<?php echo $this->title; ?>  - Just Eat Delivery">
<meta name="twitter:image:src" content="/img/logo/je-takeaway-badge.svg">
<link rel="icon" href="/img/logo/je-takeaway-badge.svg">
<link rel="manifest" href="/manifest.json">
<link rel="apple-touch-icon" href="/img/logo/je-takeaway-badge.svg">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php echo $this->title; ?> - Just Eat Delivery">
<link rel="apple-touch-startup-image" href="/img/andet/je-bg.png">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/774ac70799.js"></script>
<script>
if ('serviceWorker' in navigator) {
	window.addEventListener('load', function() {
		navigator.serviceWorker.register('/sw.js').then(function(registration) {
			// Registration was successful
			console.log('ServiceWorker registration successful with scope: ', registration.scope);
		}).catch(function(err) {
			// registration failed :(
			console.log('ServiceWorker registration failed: ', err);
		});
	});
}
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-43679005-24"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-43679005-24');
</script>
<style>
<?php include 'css/style.css'; ?>
</style>
</head>
<body>
<header>
<?php $this->partial('partials/nav.php'); ?>
</header>
<main class="container">
	<?php if(DEV): ?>
	<div class="alert alert-danger" role="alert">
	Dette er en udvikler side. <a class="alert-link" href="https://findparkering.nu">Du kan se den rigtige side ved at klikke her</a>
	</div>
	<?php endif; ?>
	<?php if (isset($this->breadcrumb)): ?>
	<div class="card">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<?php echo format_breadcrumb($this->breadcrumb); ?>
			</ol>
		</nav>
	</div>
	<?php endif; ?>
	<?php $this->yieldView(); ?>
	<div class="card">
		<div class="card-body">
			<p>Just Eat er <b>ikke</b> ansvarlige for indholdet på denne side. Senest opdateret i maj 2020. <small>Made with ❤️ in <a href="https://jensz12.com">Aalborg</a> & <a href="https://spirit55555.dk">København</a></p>
		</div>
	</div>
</main>
<div class="modal fade" tabindex="-1" id="modal-rest" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-rest-name"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Luk">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="modal-rest-parking"></p>
			</div>
			<div class="modal-footer">
				<a id="modal-rest-navigate" href="" class="btn btn-block btn-outline-dark"><i class="fal fa-map-marker-check"></i> Naviger til resaturanten</a>
				<a id="modal-rest-call" href="" class="btn btn-block btn-outline-dark"><i class="fal fa-phone"></i> Ring til resaturanten</a>
				<a id="modal-rest-link" href="" class="btn btn-block btn-outline-dark"><i class="fal fa-external-link"></i> Åben på ny side</a>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
<?php include 'js/script.js'; ?>
</script>
</body>
</html>
