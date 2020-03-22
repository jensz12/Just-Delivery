<div class="jumbotron">
	<h1><?php echo $this->rest['name']; ?></h1>
	<h2><i class="fal fa-map-marker-check"></i> <?php echo format_rest_address($this->rest) ?></h2>
	<?php if (!empty($this->rest['tel'])): ?>
	<h3><i class="fal fa-phone"></i> <?php echo $this->rest['tel']; ?></h3>
	<?php endif; ?>
	<h4><i class="fal fa-parking"></i> <?php if (!empty($this->rest['parking'])) echo $this->rest['parking']; else echo 'Ingen parkeringsinfo endnu&hellip;'; ?></h4>
	<a href="<?php echo format_rest_nav_link($this->rest); ?>" class="btn btn-outline-dark"><i class="fal fa-map-marker-check"></i> Naviger til resaturanten</a>
	<?php if (!empty($this->rest['tel'])): ?>
	<a href="tel:<?php echo $this->rest['tel']; ?>" class="btn btn-outline-dark"><i class="fal fa-phone"></i> Ring til resaturanten</a>
	<?php endif; ?>
</div>
