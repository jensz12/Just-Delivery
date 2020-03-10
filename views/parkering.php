<div class="jumbotron">
  <h1><i class="fal fa-search"></i> Søg efter restaurant</h1>
    <input type="text" autofocus class="form-control" id="rest-find" aria-describedby="" placeholder="Indtast navn">
</div>

<div class="row">
<?php foreach ($this->rests as $rest): ?>
  <div class="col-sm-6 rest" data-search="<?php echo mb_strtolower($rest['navn']).' '.implode(' ', $rest['under_rests_lowercase']); ?>">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title"><?php echo $rest['navn']; ?></h2>
        <h3><i class="fal fa-map-marker-check"></i> <a href="https://www.google.com/maps/dir/?api=1&origin=&destination=<?php echo urlencode($rest['adresse']); ?>"><?php echo $rest['adresse']; ?></a><?php if (!empty($rest['note'])) echo ' - '.$rest['note']; ?></h3>
          <?php if (!empty($rest['tlf'])): ?>
            <h4><i class="fal fa-phone"></i><a href="tel:<?php echo $rest['tlf']; ?>"> <?php echo $rest['tlf']; ?></a></h4>
          <?php endif; ?>
        <h4><i class="fal fa-parking"></i> Parkering:</h4>
        <p><?php echo $rest['parkering']; ?></p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
