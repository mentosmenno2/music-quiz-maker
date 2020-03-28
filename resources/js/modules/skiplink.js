( function( app ) {
	app.skiplink = function( element ) {

		const $element = $( element );

		// Initialize an instance
		function initialize() {
			console.log($);
			addEventListeners();
		}

		function addEventListeners() {
			$element.on( 'click', handleClick );
		}

		function handleClick() {
			const target = $( this ).attr( 'href' );
			$( 'html, body' ).animate( {
				scrollTop: $( target ).offset().top,
			}, 200 );
		}

		initialize();
	};

}( window.app = window.app || {} ) );
