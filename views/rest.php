<div class="jumbotron">
	<h1><?php echo $this->rest['name']; ?></h1>
	<h2><i class="fal fa-map-marker-check"></i> <?php echo format_rest_address($this->rest) ?></h2>
	<h3><i class="fal fa-parking"></i> <?php echo $this->rest['parking']; ?></h3>
</div>
