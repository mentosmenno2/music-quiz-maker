require('./bootstrap');
require('./helpers/translations');
require('./modules/skiplink');


( function( app ) {
	'use strict';

	app.instantiate = function( elem ) {
		const $this   = $( elem );
		const module  = $this.attr( 'data-module' );
		if ( module === undefined ) {
			throw 'Module not defined (use data-module="")';
		} else if ( module in app ) {
			new app[ module ]( elem );
			$this.attr( 'data-initialized', true );
		} else {
			throw 'Module \'' + module + '\' not found';
		}
	};

	$( '[data-module]' ).each( function() {
		app.instantiate( this );
	} );

	function handleFirstTab( e ) {
		if ( 9 === e.keyCode ) {
			$( 'body' ).addClass( 'user-is-tabbing' );
			window.removeEventListener( 'keydown', handleFirstTab );
		}
	}

	window.addEventListener( 'keydown', handleFirstTab );
}( window.app = window.app || {} ) );
