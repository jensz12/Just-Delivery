<div class="jumbotron">
	<h1><i class="fal fa-search"></i> Søg efter restaurant</h1>
	<input type="text" autofocus class="form-control" id="rest-find" aria-describedby="" placeholder="Indtast navn, adresse eller tlf. nr." />
	<p id="rest-result-count" class="mt-2 hide"><span></span>  resultat(er)</p>
</div>
<div class="jumbotron">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th style="width: 42%">Navn</th>
					<th style="width: 43%">Adresse</th>
					<th style="width: 15%">Telefon</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($this->rests as $rest): ?>
				<tr class="rest" data-search="<?php echo remove_accents($rest['name'].' '.$rest['address'].' '.$rest['postcode'].' '.$rest['city'].' '.$rest['tel']); ?>">
					<td><a class="d-block" href="" data-toggle="modal" data-target="#modal-rest" data-name="<?php echo $rest['name']; ?>" data-parking="<?php if (!empty($rest['parking'])) echo htmlspecialchars($rest['parking']); else echo 'Ingen parkeringsinfo endnu&hellip;'; ?>" data-navigate="<?php echo format_rest_nav_link($rest); ?>" data-call="tel:<?php echo $rest['tel']; ?>" data-link="/rest/<?php echo $rest['id']; ?>"><?php echo $rest['name']; ?></a></td>
					<td><a class="d-block" href="<?php echo format_rest_nav_link($rest); ?>"><?php echo format_rest_address($rest); ?><?php if (!empty($rest['note'])) echo ' - '.$rest['note']; ?></a></td>
					<td><a class="d-block" href="tel:<?php echo $rest['tel']; ?>"><?php echo $rest['tel']; ?></a></td>
				</tr>
				<?php endforeach; ?>
				<tr id="rest-no-results" class="hide">
					<td colspan="3">Ingen resultater, prøv at søge efter noget andet.</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
