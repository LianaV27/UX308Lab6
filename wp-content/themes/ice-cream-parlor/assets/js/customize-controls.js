( function( api ) {

	// Extends our custom "ice-cream-parlor" section.
	api.sectionConstructor['ice-cream-parlor'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );