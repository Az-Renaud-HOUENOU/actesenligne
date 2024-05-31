ClassicEditor
    .create( document.getElementById( 'description' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );

ClassicEditor
    .create( document.getElementById( 'description2' ) )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );
