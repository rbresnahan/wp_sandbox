( function( $ ){

//   $( '.bookmark-status' ).html( 'Bookmark' );

    $('.bookmark-link' ).click( function() {

        event.preventDefault();

        $.ajax( {
            type : 'post',
            dataType : 'json',
            url : bookmark_globals.ajax_url,
            data : {
                action: 'add_bookmark',
                _ajax_nonce: bookmark_globals.nonce
            },
            success: function( response ) {

                if( 'success' === response.type ) {
                    $( '.bookmark-status' ).html( response.is_bookmarked );
                } else {
                    alert( 'Error' );
                }
        }
        } )
    } );

} )( jQuery );
