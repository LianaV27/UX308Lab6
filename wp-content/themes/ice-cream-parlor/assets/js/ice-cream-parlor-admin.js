( function( jQuery ){
 jQuery( document ).on( 'click', '.notice-get-started-class .notice-dismiss', function () {
        var type = jQuery( this ).closest( '.notice-get-started-class' ).data( 'notice' );
        jQuery.ajax( ajaxurl,
          {
            type: 'POST',
            data: {
              action: 'ice_cream_parlor_dismissed_notice_handler',
              type: type,
              wpnonce: ice_cream_parlor.wpnonce
            }
          } );
      } );
}( jQuery ) )