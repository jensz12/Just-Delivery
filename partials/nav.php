<nav class="navbar fixed-top navbar-dark navbar-expand-lg">
	<div class="container">
		<a class="navbar-brand" href="/">
			<img src="/img/logo/je.png" width="30" height="30" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fal fa-parking fa-fw"></i> Parkering</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php foreach ($this->cities as $url => $city): ?>
							<a class="dropdown-item" href="/parkering/<?php echo $city['url']; ?>"><i class="fal fa-parking fa-fw" aria-hidden="true"></i> <?php echo $city['name']; ?></a>
						<?php endforeach; ?>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/bg"><i class="fal fa-mobile-android fa-fw"></i> Baggrunde</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
