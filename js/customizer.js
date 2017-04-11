(function($) {
	wp.customize('tema_search_text', function(value) {
		value.bind(function(to) {
			$('.search-field').attr('placeholder', to);
		});
	});
})(jQuery);