<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
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
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"crossorigin="anonymous"></script>
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
</script>
</body>
</html>