(function($){

    class WishList
    {
        constructor() {

            if ( typeof ucefwooLocalize === 'undefined' ){
                return;
            }

            this.modal     = $('#uw-wl-wrap');

            this.events();
        }

        events() {

            /**
             * Open modal
             */
            $( document ).on( 'click', '#ucef-woo-wishlist', ( e ) => this.openModal( e ) );

            /**
             * Close modal
             */
            this.modal.on( 'click', '.uw-wl-overlay, .uw-wl-close', ( e ) => this.closeModal( e ) );

            /**
             * SlidUp product whene it removed from wishlist slider
             */
            this.modal.on( 'click', '.product-remove a', ( e ) => this.slidUpProduct( e ) );

            /**
             * Update the wishlist with ajax
             */
            $( document ).on( 'added_to_wishlist removed_from_wishlist', () => this.UpdateWishlist() );
            
        }

        /**
         * Open Modal
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
         * Close Modal
         */
        closeModal( e ) {

            e.preventDefault();

            $( 'html' ).css( {'overflow': '', 'margin-right': ''} );
            this.modal.fadeOut();
            this.modal.removeClass( 'is-visible' );

        }

        /**
         * SlidUp product whene it removed from wishlist slider
         */
        slidUpProduct( e ) {

            const target    = e.target.closest('tr');
            $( target ).slideUp();

        }

        /**
         * Update the wishlist with ajax
         */
        UpdateWishlist() {

            $.ajax( {
                url: ucefwooLocalize.ajax_url,
                data: {
                    action  : 'ucef_woo_update_wishlist_count',
                },
                success: function ( results ) {

                    $( '.wishlist-count' ).html( results.count );
                    $( '#uw-wl-body' ).html( results.wishlist );
                }
            } );

        }

    }
    new WishList();

})(jQuery)