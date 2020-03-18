<div class="row">
<?php foreach ($this->cities as $url => $city): ?>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title"><?php echo $city['name']; ?></h1>
        <p class="card-text"><?php echo $city['desc']; ?></p>
        <a href="/parkering/<?php echo $url; ?>" class="btn btn-outline-dark"><i class="fal fa-parking fa-fw"></i> Parkering</a><a href="/info/<?php echo $url; ?>" class="btn btn-dark disabled" role="button" aria-disabled="true"><i class="fal fa-info"></i> God Information</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>