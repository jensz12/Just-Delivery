<div class="row">
<?php foreach ($this->cities as $city): ?>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h1 class="card-title"><?php echo $city['name']; ?></h1>
				<p class="card-text"><?php echo $city['desc']; ?></p>
				<p class="card-text">Antal restauranter: <?php echo get_rests_count($city['id']); ?></p>
				<a href="/parkering/<?php echo $city['url']; ?>" class="btn btn-block btn-outline-dark"><i class="fal fa-parking fa-fw"></i> Parkering</a>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>
