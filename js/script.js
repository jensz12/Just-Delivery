var ref;
var update_list = function () {
	var rest_find = jQuery('#rest-find').val().toLowerCase();
	var matches = 0;

	jQuery('.rest').each(function () {
		var search = jQuery(this).data('search').toString();

		if (search.indexOf(rest_find) !== -1) {
			jQuery(this).removeClass('hide');
			matches++;
		}

		else
			jQuery(this).addClass('hide');
	});

	if (matches === 0)
		$('#rest-no-results').removeClass('hide');
	else
		$('#rest-no-results').addClass('hide');

	if (rest_find) {
		$('#rest-result-count').removeClass('hide');
		$('#rest-result-count span').text(matches);
	}

	else
		$('#rest-result-count').addClass('hide');
};

var wrapper = function () {
	window.clearTimeout(ref);
	ref = window.setTimeout(update_list, 150);
};

jQuery(function () {
	jQuery('#rest-find').keyup(function () {
		wrapper();
	});
});

$('#modal-rest').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget);

	var name = button.data('name');
	var parking = button.data('parking');
	var navigate = button.data('navigate');
	var call = button.data('call');
	var link = button.data('link');

	$('#modal-rest-name').text(name);
	$('#modal-rest-parking').html(parking);
	$('#modal-rest-navigate').attr('href', navigate);
	$('#modal-rest-link').attr('href', link);

	if (call === 'tel:')
		$('#modal-rest-call').addClass('hide');

	else {
		$('#modal-rest-call').attr('href', call);
		$('#modal-rest-call').removeClass('hide');
	}
})
