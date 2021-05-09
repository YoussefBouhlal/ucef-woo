(function($){

    class MiniCart
    {
        constructor() {

            this.modal     = $('#uw-mc-wrap');

            this.events();
        }

        events() {


            /**
             * Open modal
             */
            $( document ).on( 'click', '#ucef-woo-mini-cart', ( e ) => this.openModal( e ) );

            /**
             * Close modal
             */
            this.modal.on( 'click', '.uw-mc-overlay, .uw-mc-close', ( e ) => this.closeModal( e ) );

        }

        /**
         * Open modal 
         */
        openModal( e ) {

            e.preventDefault();

            const innerWidth  = $( 'html' ).innerWidth();
            $( 'html' ).css( 'overflow', 'hidden' );
            const hiddenInnerWidth  = $( 'html' ).innerWidth();
            $( 'html' ).css( 'margin-right', hiddenInnerWidth - innerWidth );

            // Display modal
            this.modal.fadeIn();
            this.modal.addClass( 'is-visible' );
        }

        /**
         * Close modal
         */
        closeModal( e ) {

            e.preventDefault();

            $( 'html' ).css( {'overflow': '', 'margin-right': ''} );
            this.modal.fadeOut();
            this.modal.removeClass( 'is-visible' );
        }

    }
    new MiniCart();

})(jQuery)