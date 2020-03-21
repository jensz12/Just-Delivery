<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $this->title; ?>  - Just Eat Delivery</title>
<meta name="description" content="<?php echo $this->title; ?>  - Just Eat Delivery">
<meta name="theme-color" content="#FA0029">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@jensz12">
<meta name="twitter:creator" content="@jensz12">
<meta name="twitter:title" content="<?php echo $this->title; ?>  - Just Eat Delivery">
<meta name="twitter:description" content="<?php echo $this->title; ?>  - Just Eat Delivery">
<meta name="twitter:image:src" content="https://justeat.jensz12.com/img/logo/1024.png">
<link rel="icon" href="https://justeat.jensz12.com/img/logo/1024.png">
<link rel="manifest" href="https://justeat.jensz12.com/manifest.json">
<link rel="apple-touch-icon" href="https://justeat.jensz12.com/img/logo/1024.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php echo $this->title; ?> - Just Eat Delivery">
<link rel="apple-touch-startup-image" href="https://justeat.jensz12.com/img/andet/je-bg.png">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300' rel='stylesheet' type='text/css'>
<script src="https://kit.fontawesome.com/774ac70799.js"></script>
<script>
	if ('serviceWorker' in navigator) {
	window.addEventListener('load', function() {
		navigator.serviceWorker.register('/js/sw.js').then(function(registration) {
			// Registration was successful
			console.log('ServiceWorker registration successful with scope: ', registration.scope);
		}).catch(function(err) {
			// registration failed :(
			console.log('ServiceWorker registration failed: ', err);
		});
	});
}
</script>
</head>
<body>
<header>
<?php $this->partial('partials/nav.php'); ?>
</header>
<main class="container">
	<?php $this->yieldView(); ?>
	<div class="card">
		<div class="card-body">
			<p>Just Eat er <b>ikke</b> ansvarlige for indholdet på denne side. Fejl og forbedringer kan sendes til <a href="mailto:jens@jensz12.com">Jens</a>. Websiden er lavet med hjælp fra <a href="https://spirit55555.dk">Anders</a>. Restaurant listen er sidst opdateret i marts <?php echo date("Y")?>.</p>
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
				<a id="modal-rest-navigate" href="" class="btn btn-outline-dark"><i class="fal fa-map-marker-check"></i> Naviger til resaturanten</a>
				<a id="modal-rest-call" href="" class="btn btn-outline-dark"><i class="fal fa-phone"></i> Ring til resaturanten</a>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
var ref;
var update_list = function(){
	var rest_find = jQuery('#rest-find').val().toLowerCase();

	jQuery('.rest').each(function(){
		var search = jQuery(this).data('search').toString();

		if (search.indexOf(rest_find) !== -1)
			jQuery(this).removeClass('hide');
		else
			jQuery(this).addClass('hide');
	});
};

var wrapper = function(){
	window.clearTimeout(ref);
	ref = window.setTimeout(update_list, 150);
};

jQuery(function(){
	jQuery('#rest-find').keyup(function(){
		wrapper();
	});
});

$('#modal-rest').on('show.bs.modal', function (event){
	var button = $(event.relatedTarget);

	var name     = button.data('name');
	var parking  = button.data('parking');
	var navigate = button.data('navigate');
	var call     = button.data('call');

	$('#modal-rest-name').text(name);
	$('#modal-rest-parking').html(parking);
	$('#modal-rest-navigate').attr('href', navigate);
	$('#modal-rest-call').attr('href', call);
})
</script>
</body>
</html>
