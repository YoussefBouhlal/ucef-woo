(function($){

    class MiniCart
    {
        constructor() {

            this.events();
        }

        events() {

            const modal     = $('#uw-mc-wrap');

            /**
             * Open modal
             */
            $( document ).on( 'click', '#ucef-woo-mini-cart', function( e ) {
                e.preventDefault();

                const innerWidth  = $( 'html' ).innerWidth();
                $( 'html' ).css( 'overflow', 'hidden' );
                const hiddenInnerWidth  = $( 'html' ).innerWidth();
                $( 'html' ).css( 'margin-right', hiddenInnerWidth - innerWidth );

                // Display modal
                modal.fadeIn();
                modal.addClass( 'is-visible' );
                
            });

            /**
             * Close modal
             */
            modal.on( 'click', '.uw-mc-overlay, .uw-mc-close', function( e ){
                e.preventDefault();

                $( 'html' ).css( {'overflow': '', 'margin-right': ''} );
                modal.fadeOut();
                modal.removeClass( 'is-visible' );
            });

        }

    }
    new MiniCart();

})(jQuery)