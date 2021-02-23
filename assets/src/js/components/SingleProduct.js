(function( $ ){

    class SingleProduct
    {
        constructor() {

            this.events();
        }

        events() {

            let singleProduct = $('.single-product');

            let image_slider_wrap = singleProduct.find( '.uw-qv-image' );

            if ( image_slider_wrap.find( 'li' ).length > 1 ) {
                image_slider_wrap.flexslider();
            }
        }

    }

    new SingleProduct();

})(jQuery)