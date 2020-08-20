( function( $ ){

  $( '#bookmark' ).prepend( '<p><a href="#like" class="btn bookmark-link">Bookmark: </a> <span class="bookmark-status"></span></p>' );

  $( '.bookmark-status' ).html( bookmark_globals.is_bookmarked );

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
           $( ".bookmark-status" ).html( response.is_bookmarked );
         } else {
            alert( 'Something went wrong!' );
         }
      }
    } )
  } );

} )( jQuery );
