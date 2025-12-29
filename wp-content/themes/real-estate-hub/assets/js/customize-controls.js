( function( api ) {

	// Extends our custom "real-estate-hub" section.
	api.sectionConstructor['real-estate-hub'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );