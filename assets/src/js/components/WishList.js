(function($){

    class WishList
    {
        constructor() {

            if ( typeof ucefwooLocalize === 'undefined' ){
                return;
            }

            this.events();
        }

        events() {

            const modal     = $('#uw-wl-wrap');

            /**
             * Open modal
             */
            $( document ).on( 'click', '#ucef-woo-wishlist', function( e ) {
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
            modal.on( 'click', '.uw-wl-overlay, .uw-wl-close', function( e ){
                e.preventDefault();

                $( 'html' ).css( {'overflow': '', 'margin-right': ''} );
                modal.fadeOut();
                modal.removeClass( 'is-visible' );
            });

            /**
             * Update wishlist count in header
             */
            $( document ).on( 'added_to_wishlist removed_from_wishlist', function(){

                $.ajax( {
                    url: ucefwooLocalize.ajax_url,
                    data: {
                        action  : 'ucef_woo_update_wishlist_count',
                    },
                    success: function ( results ) {

                        $( '.wishlist-count' ).html( results );
                    }
                } );

            });
            
        }

    }
    new WishList();

})(jQuery)