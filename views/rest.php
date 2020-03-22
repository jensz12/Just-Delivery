<div class="jumbotron">
	<h1><?php echo $this->rest['name']; ?></h1>
	<h2><i class="fal fa-map-marker-check"></i> <?php echo format_rest_address($this->rest) ?></h2>
	<h3><i class="fal fa-phone"></i> <?php echo $this->rest['tel']; ?></h3>
	<h4><i class="fal fa-parking"></i> <?php echo $this->rest['parking']; ?></h4>
	<a href="#" class="btn btn-outline-dark"><i class="fal fa-map-marker-check"></i> Naviger til resaturanten</a>
	<a href="tel:<?php echo $this->rest['tel']; ?>" class="btn btn-outline-dark"><i class="fal fa-phone"></i> Ring til resaturanten</a>
</div>
