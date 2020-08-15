<?php

get_header()
?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.ajax({url: "demo_test.txt", success: function(result){
      $("#div1").html(result);
    }});
  });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>

<?php
    function wp_update_user_meta() {

        // get user id

        // in user meta
        // post id, 'bookmarked' true/false

        // check to see if already saved

        // if already saved toggle = 'bookmarked' = false

        // else toggle = 'bookmarked' = true


        $user_id = 2;

        $user_meta = get_user_meta( 2, 'bookmark', false );
        

        $new_value = [ 
                    'name'  => 'ava', 
                    'url'   => 'ava.com',
                ];

        
        if ( empty( $user_meta ) ) {
            add_user_meta( $user_id, 'bookmark', $new_value, true );
        } else {
            add_user_meta( $user_id, 'bookmark', $new_value, false );
        }


        // $keys = array_keys( $user_meta );

            // for ( $i = 0; $i < count( $user_meta ); $i++ ) {
            //     echo $keys[$i] . ' { <br>';
            //     foreach( $user_meta[ $keys[$i] ] as $key => $value ) {
                    
    

            //         if ( $user_meta[ $keys[$i] ]['name'] === $value ) {
            //             delete_user_meta( $user_id, 'bookmark', $user_meta );
            //         } else {
            //             echo $value;
            //         }
            //     }
            // } echo '<br>}';



    //     $new_value = [ 
    //         'name'  => 'ava', 
    //         'url'   => 'ava.com',
    //     ];
    //     print_r( $user_meta );
    // echo '<hr>three<br>';
    //     // $user_meta[] = $new_value;
    //     print_r( $new_value );
    //     echo '<hr>four<br>';
    //     print_r( $new_value['name'] );

    //     $user_meta = get_user_meta( 2, 'bookmark', false );
    //     print_r( $user_meta[0]['name'] );
    //     if ( $user_meta[1]['name'] === $new_value['name'] ) {
    //         echo 'MATCH';

    //     }
    //     add_user_meta( $user_id, 'bookmark', $new_value, false ); // adds second record

        // update_user_meta( $user_id, 'bookmark', $new_value ); // updates every instance accross multiple records
        // update_user_meta( $user_id, 'bookmark', $new_value, false ); // updates every instance accross multiple records
        // update_user_meta( $user_id, 'bookmark', $new_value, false ); // only updates if empty
    }

    wp_update_user_meta();

?>


<div class="wrapper">
    <div class="container center-of-page">
        <a href="">hello there</a>
    </div>
</div>


<?php
get_footer()

?>