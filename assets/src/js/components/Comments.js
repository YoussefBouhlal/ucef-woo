class Comments
{
    constructor() {
        this.form       = document.querySelector( '#commentform' );
        this.text       = document.querySelector( '#comment' );
        this.author     = document.querySelector( '#author' );
        this.email      = document.querySelector( '#email' );

        if ( this.form ) {
            this.events();
        }
    }

    events(){

        // Form Submit Event
        this.form.addEventListener( 'submit', (e) => this.validation(e) );

        // Fields Focus Event to Remove Error CSS Classes
        const fields = [this.text, this.author, this.email];
        fields.forEach(field => {
            if ( field ) {
                field.addEventListener( 'focus', (e) => this.removeErrClass(e) );
            }
        });
    }

    validation(e) {

        let textVal     = '';
        let authorVal   = '';
        let emailVal    = '';

        if ( ! this.text ) { textVal = 'nothing'; }
        if ( ! this.author ) { authorVal = 'nothing'; }
        if ( ! this.email ) { emailVal = 'default@email.com'; }

        if( this.text )textVal      = this.text.value;
        if( this.author )authorVal  = this.author.value;
        if( this.email )emailVal    = this.email.value;
        
        if ( textVal == '' ) {
            e.preventDefault();
            this.addErrClass( this.text );
        }
        
        if ( authorVal == '' ) {
            e.preventDefault();
            this.addErrClass( this.author );
        }
        
        if ( ! this.isEmail( emailVal ) ) {
            e.preventDefault();
            this.addErrClass( this.email );
        }

    }

    addErrClass( field ) {
        field.classList.add('border', 'border-danger');
        field.nextElementSibling.classList.remove('d-none');
    }

    removeErrClass(e) {
        e.target.classList.remove('border', 'border-danger');
        e.target.nextElementSibling.classList.add('d-none');
    }

    isEmail( emailVal ) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test( emailVal );
    }
}

export default Comments;