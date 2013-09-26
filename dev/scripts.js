(function ($) {
	//Add Bootstrap classes needed for dropdown menus
	/*$( 'ul.navbar-nav li.dropdown > a' ).addClass( 'dropdown-toggle' );
	$( 'a.dropdown-toggle' ).attr( 'data-toggle', 'dropdown' ).append( '<b class="caret"></b>' );
	$( 'ul.sub-menu' ).removeClass( 'sub-menu' ).addClass( 'dropdown-menu' );*/

	/*Bootstrap component script - TBD on how to load these separately as needed */
	//Offcanvas Script
	$('[data-toggle=offcanvas]').click(function() {
		$('.row-offcanvas').toggleClass('active');
	});

	console.log( 'butts' );
})(jQuery);