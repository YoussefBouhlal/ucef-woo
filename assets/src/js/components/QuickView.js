(function($){

    class QuickView
    {
        constructor() {

            if ( typeof ucefwooLocalize === 'undefined' ){
                return;
            }

            this.modal      = $('#uw-qv-wrap');
            this.content    = $('#uw-qv-content');

            this.events();
        }

        events() {

            // let qv_modal   = $('#uw-qv-wrap');
            // let qv_content = $('#uw-qv-content');
            
            /**
             * Open quick view
             */
            $( document ).on( 'click', '.ucef-woo-quick-view', ( e ) => this.openQuickView( e ) );

            /**
             * Close quick view
             */
            $( '.uw-qv-overlay, .uw-qv-close' ).on( 'click', ( e ) => this.closeQuickView( e ) );

            /**
             * Add To Cart
             */
            $( document.body ).on( 'click', '#uw-qv-content .product:not(.product-type-external) .single_add_to_cart_button:not(.disabled)', ( e ) => this.addToCart( e ) );

             /**
             * Update Button
             */
            $( document.body ).on( 'added_to_cart', ( e, fragments, cart_hash, $button ) => this.updateButton( e, fragments, cart_hash, $button ) );


            $.fn.serializeArrayAll = function () {

                var rCRLF = /\r?\n/g;
                return this.map(function () {
                    return this.elements ? jQuery.makeArray(this.elements) : this;
                }).map(function (i, elem) {
                    var val = jQuery(this).val();
        
                    if (val == null) {
                        return val == null
        
                    //If checkbox is unchecked
                    } else if (this.type == "checkbox" && this.checked == false) {
                        return {name: this.name, value: this.checked ? this.value : ''}
        
                    } else if (this.type == "radio" && this.checked == false) {
                        return {name: this.name, value: this.checked ? this.value : ''}
        
                    //default: all checkboxes = on
                    } else {
                        return jQuery.isArray(val) ?
                                jQuery.map(val, function (val, i) {
                                    return {name: elem.name, value: val.replace(rCRLF, "\r\n")};
                                }) :
                                {name: elem.name, value: val.replace(rCRLF, "\r\n")};
                    }
                }).get();
            };

        }

        /**
         * Open quick view
         */
        openQuickView( e ) {
            e.preventDefault();

            const modal         =$(this.modal); 
            const content       = $(this.content);
            const $this       = $(e.target.closest( 'a' ));
            const product_id  = $this.data( 'product_id' );

            $this.parent().addClass( 'loading' );

            $.ajax( {
                url: ucefwooLocalize.ajax_url,
                data: {
                    action  : 'ucef_woo_product_quick_view',
                    product_id  : product_id
                },
                success: function ( results ) {

                    let innerWidth  = $( 'html' ).innerWidth();
                    $( 'html' ).css( 'overflow', 'hidden' );
                    let hiddenInnerWidth    = $( 'html' ).innerWidth();
                    $( 'html' ).css( 'margin-right', hiddenInnerWidth - innerWidth );
                    $( 'html' ).addClass( 'uw-qv-open' );

                    content.html( results );

                    // Display modal
                    modal.fadeIn();
                    modal.addClass( 'is-visible' );

                    // Variation Form
                    let form_variation = content.find( '.variations_form' );

                    form_variation.trigger( 'check_variations' );
                    form_variation.trigger( 'reset_image' );

                    let var_form = content.find( '.variations_form' );

                    if ( var_form.length > 0 ) {
                        var_form.wc_variation_form();
                        // var_form.find( 'select' ).change();
                    }

                    let image_slider_wrap = content.find( '.uw-qv-image' );

                    if ( image_slider_wrap.find( 'li' ).length > 1 ) {
                        image_slider_wrap.flexslider();
                    }

                    // If grouped product
                    let grouped = content.find( 'form.grouped_form' );
                    if ( grouped ) {
                        let grouped_product_url = content.find( 'form.grouped_form' ).attr( 'action' );
                        grouped.find( '.group_table, button.single_add_to_cart_button' ).hide();
                        grouped.append( ' <a href="' + grouped_product_url + '" class="button">' + ucefwooLocalize.grouped_text + '</a>' );
                    }

                    
                }
            } ).done( function() {
                $this.parent().removeClass( 'loading' );
            } );

        }

        /**
         * Close quick view
         */
        closeQuickView( e ) {
            e.preventDefault();

            const modal     = $(this.modal);
            const content   = $(this.content);

            $( 'html' ).css( {
                'overflow': '',
                'margin-right': ''
            } );
            $( 'html' ).removeClass( 'uw-qv-open' );
    
            modal.fadeOut();
            modal.removeClass( 'is-visible' );
    
            setTimeout( function() {
                content.html( '' );
            }, 600);
        }

        /**
         * Add to cart
         */
        addToCart( e ) {
            e.preventDefault();

            const button    = $( e.target.closest( 'button' ) );
            const $form     = button.closest( 'form.cart' );
            const data      = $form.serializeArrayAll();

            let is_valid    = false;

            $.each(data, function (i, item) {
                if (item.name === 'add-to-cart'){
                    is_valid    = true;
                    return false;
                }
            })

            if ( is_valid ){
                e.preventDefault();
            }else {
                return;
            }

            $(document.body).trigger('adding_to_cart', [button, data]);

            button.removeClass( 'added' );
            button.addClass( 'loading' );

            // Ajax action
            $.ajax ({
                url: ucefwooLocalize.wc_ajax_url,
                type: 'POST',
                data: data,

                success:function( results ){

                    $( document.body ).trigger( 'wc_fragment_refresh' );
                    $( document.body ).trigger( 'added_to_cart', [ results.fragments, results.cart_hash, button ] );

                }

            });

        }

        /**
         * Update button
         */
        updateButton( e, fragments, cart_hash, $button ) {

            $button = typeof $button === 'undefined' ? false : $button;

            if ( $button ){
                $button.removeClass( 'loading' );
                $button.addClass( 'added' );

                $button.after('<span>added</span>');
            }
        }

    }

    new QuickView();

})(jQuery)