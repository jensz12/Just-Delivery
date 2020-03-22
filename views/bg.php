<div class="row">
	<?php foreach ($this->backgrounds as $name => $backgrounds): ?>
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title"><?php echo $name; ?></h5>
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_android_<?php echo strtolower(str_replace(' ', '', $name)); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Android
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdown_android_<?php echo strtolower(str_replace(' ', '', $name)); ?>">
						<?php foreach ($backgrounds as $background): ?>
						<a class="dropdown-item" href="https://static.jensz12.com/je/<?php echo $background; ?>.jpg"><?php echo strtoupper($background); ?></a>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_iphone_<?php echo strtolower(str_replace(' ', '', $name)); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						iPhone
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdown_iphone_<?php echo strtolower(str_replace(' ', '', $name)); ?>">
					<?php foreach ($backgrounds as $background): ?>
						<a class="dropdown-item" href="https://static.jensz12.com/je/<?php echo $background; ?>-i.jpg"><?php echo strtoupper($background); ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
