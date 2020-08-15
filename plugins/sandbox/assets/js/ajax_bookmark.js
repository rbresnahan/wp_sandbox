jQuery(document).ready( function() {

    jQuery(".select_bookmark").click( function(e) {
       e.preventDefault(); 
       post_id = jQuery(this).attr("data-post_id")
       nonce = jQuery(this).attr("data-nonce")
 
       jQuery.ajax({
          type : "post",
          dataType : "json",
          url : myAjax.ajaxurl,
          data : {action: "bookmark_this", post_id : post_id, nonce: nonce},
          success: function(response) {
             if(response.type == "success") {
                jQuery("#bookmarker").html(response.bookmark)
             }
             else {
                alert("Your bookmark could not be added")
             }
          }
       })   
 
    })
 
 })