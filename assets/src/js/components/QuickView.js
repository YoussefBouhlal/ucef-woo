(function($){

    class QuickView
    {
        constructor() {

            if ( typeof ucefwooLocalize === 'undefined' ){
                return;
            }

            this.qv_modal   = $('#uw-qv-wrap');
            this.qv_content = $('uw-qv-content');

            this.events();
        }

        events() {
            
            /**
             * Open quick view
             */
            $( document ).on( 'click', '.ucef-woo-quick-view', function( e ) {
                e.preventDefault();

                let $this       = $(this);
                let product_id  = $(this).data( 'product_id' );

                $this.parent().addClass( 'loading' );

            } );
        }

    }

    new QuickView();

})(jQuery)