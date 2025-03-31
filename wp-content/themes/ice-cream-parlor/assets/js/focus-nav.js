( function( window, document ) {
  function ice_cream_parlor_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const ice_cream_parlor_nav = document.querySelector( '.sidenav' );
      if ( ! ice_cream_parlor_nav || ! ice_cream_parlor_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...ice_cream_parlor_nav.querySelectorAll( 'input, a, button' )],
        ice_cream_parlor_lastEl = elements[ elements.length - 1 ],
        ice_cream_parlor_firstEl = elements[0],
        ice_cream_parlor_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && ice_cream_parlor_lastEl === ice_cream_parlor_activeEl ) {
        e.preventDefault();
        ice_cream_parlor_firstEl.focus();
      }
      if ( shiftKey && tabKey && ice_cream_parlor_firstEl === ice_cream_parlor_activeEl ) {
        e.preventDefault();
        ice_cream_parlor_lastEl.focus();
      }
    } );
  }
  ice_cream_parlor_keepFocusInMenu();
} )( window, document );