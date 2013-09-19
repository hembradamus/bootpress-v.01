(function ($) {
	//Add Bootstrap classes needed for dropdown menus
	$('ul.navbar-nav li.dropdown > a').addClass('dropdown-toggle');
	$('a.dropdown-toggle').attr('data-toggle', 'dropdown').append('<b class="caret"></b>');
	$('ul.sub-menu').removeClass('sub-menu').addClass('dropdown-menu');
	console.log('butts');
})(jQuery);