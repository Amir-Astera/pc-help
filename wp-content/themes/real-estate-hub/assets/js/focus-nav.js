( function( window, document ) {
  function real_estate_hub_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const real_estate_hub_nav = document.querySelector( '.sidenav' );
      if ( ! real_estate_hub_nav || ! real_estate_hub_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...real_estate_hub_nav.querySelectorAll( 'input, a, button' )],
        real_estate_hub_lastEl = elements[ elements.length - 1 ],
        real_estate_hub_firstEl = elements[0],
        real_estate_hub_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && real_estate_hub_lastEl === real_estate_hub_activeEl ) {
        e.preventDefault();
        real_estate_hub_firstEl.focus();
      }
      if ( shiftKey && tabKey && real_estate_hub_firstEl === real_estate_hub_activeEl ) {
        e.preventDefault();
        real_estate_hub_lastEl.focus();
      }
    } );
  }
  real_estate_hub_keepFocusInMenu();
} )( window, document );