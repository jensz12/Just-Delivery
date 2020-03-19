<div class="jumbotron">
  <h1><i class="fal fa-search"></i> Søg efter restaurant</h1>
    <input type="text" autofocus class="form-control" id="rest-find" aria-describedby="" placeholder="Indtast navn">
</div>

<!--<div class="row">
<?php foreach ($this->rests as $rest): ?>
  <div class="col-md-6 rest" data-search="<?php echo remove_accents($rest['navn']); ?>">
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
</div>-->

  <div class="jumbotron">
    <div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th style="width: 33%">Navn</th>
                <th style="width: 34%">Adresse</th>
                <th style="width: 33%">Telefon</th>
							</tr>
						</thead>
						<tbody>
            <?php foreach ($this->rests as $rest): ?>
							<tr class="rest" data-search="<?php echo remove_accents($rest['navn']); ?>">
								<td><a class="d-block" href="" data-toggle="modal" data-target="#modal-rest-<?php echo $rest['id']; ?>"><?php echo $rest['navn']; ?></a></td>
								<td><a class="d-block" href="https://www.google.com/maps/dir/?api=1&origin=&destination=<?php echo urlencode($rest['adresse']); ?>"><?php echo $rest['adresse']; ?></a><?php if (!empty($rest['note'])) echo ' - '.$rest['note']; ?></td>
                <td><a class="d-block" href="tel:<?php echo $rest['tlf']; ?>"><?php echo $rest['tlf']; ?></a></td>
              </tr>
            <?php endforeach; ?>
						</tbody>
          </table>
          <?php foreach ($this->rests as $rest): ?>
          <div class="modal fade" tabindex="-1" id="modal-rest-<?php echo $rest['id']; ?>" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title"><?php echo $rest['navn']; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <p><?php echo $rest['parkering']; ?></p>
                  </div>
                  <div class="modal-footer">
                  <a href="https://www.google.com/maps/dir/?api=1&origin=&destination=<?php echo urlencode($rest['adresse']); ?>" class="btn btn-outline-dark"><i class="fal fa-map-marker-check"></i> Naviger til resaturanten</a>
                  <a href="tel:<?php echo $rest['tlf']; ?>" class="btn btn-outline-dark"><i class="fal fa-phone"></i> Ring til resaturanten</a>
                  </div>
              </div>
            </div>
          </div>
				</div>
        <?php endforeach; ?>
  </div>
</div>