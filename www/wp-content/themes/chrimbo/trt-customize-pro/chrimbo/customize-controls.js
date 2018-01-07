( function( api ) {

	// Extends our custom "chrimbo" section.
	api.sectionConstructor['chrimbo'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
	jQuery( "#accordion-panel-chrimbo-theme-options" ).addClass( "sudeep-class" );

} )( wp.customize );
