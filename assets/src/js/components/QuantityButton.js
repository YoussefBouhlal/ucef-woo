(function( $ ){

    class QuantityButton
    {
        constructor() {
            
            this.events();
        }

        events() {

            let $cart               = $( '.woocommerce div.product form.cart' );
            let $quantitySelector   = '.qty';
            let $quantityBoxes      = $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).find( $quantitySelector );

            if ( $quantityBoxes && 'date' !== $quantityBoxes.prop( 'type' ) && 'hodden' !== $quantityBoxes.prop( 'type' ) ) {
                
                // Add plus and minus icons
                $quantityBoxes.parent().addClass( 'buttons_added' ).prepend( '<a href="javascript:void(0)" class="minus">-</a>' );
                $quantityBoxes.after( '<a href="javascript:void(0)" class="plus">+</a>' );

                // Target quantity inputs on product pages
                $( 'input' + $quantitySelector + ':not(.product-quantity input' + $quantitySelector + ')' ).each( function() {
                    let $min    = parseFloat( $( this ).attr( 'min' ) );

                    if ( $min && $min > 0 && parseFloat( $( this ).val() ) < $min ) {
                        $( this ).val( $min );
                    }
                });

                $( '.plus, .minus' ).unbind( 'click' );

                $( '.plus, .minus' ).on( 'click', function() {

                    // Quantity
                    let $quantityBox    = $( this ).closest( '.quantity' ).find( $quantitySelector );

                    // Get values
                    let $currentQuantity    = parseFloat( $quantityBox.val() ),
                        $maxQuantity        = parseFloat( $quantityBox.attr( 'max' ) ),
                        $minQuantity        = parseFloat( $quantityBox.attr( 'min' ) ),
                        $step               = $quantityBox.attr( 'step' );

                    // Fallback default values
                    if ( ! $currentQuantity || '' === $currentQuantity || 'NaN' === $currentQuantity ) {
                        $currentQuantity = 0;
                    }
                    if ( '' === $maxQuantity || 'NaN' === $maxQuantity ) {
                        $maxQuantity = '';
                    }
                    if ( '' === $minQuantity || 'NaN' === $minQuantity ) {
                        $minQuantity = 0;
                    }
                    if ( 'any' === $step || '' === $step || undefined === $step || 'NaN' === parseFloat( $step ) ) {
                        $step = 1;
                    }

                    // Change the value
                    if ( $( this ).is( '.plus' ) ) {

                        if ( $maxQuantity && ( $maxQuantity == $currentQuantity || $currentQuantity > $maxQuantity ) ) {
                            $quantityBox.val( $maxQuantity );
                        } else {
                            $quantityBox.val( $currentQuantity + parseFloat( $step ) );
                        }

                    } else {

                        if ( $minQuantity && ( $minQuantity == $currentQuantity || $currentQuantity < $minQuantity ) ) {
                            $quantityBox.val( $minQuantity );
                        } else if( $currentQuantity > 0 ) {
                            $quantityBox.val( $currentQuantity - parseFloat( $step ) );
                        }

                    }

                    // Trigger change event
                    $quantityBox.trigger( 'change' );

                } );

            }

        }

    }

    new QuantityButton();

})(jQuery)