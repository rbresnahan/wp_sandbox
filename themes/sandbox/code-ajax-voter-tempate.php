<?php
/**
* Template Name: Ajax Voter
*
* @package WordPress
* @subpackage Sandbox
* @since 1.0.0
*/

get_header()
?>

<div class="wrapper">
    <div class="container homepage-title">
        <h2><?php the_title(); ?></h2>
        <p class="frontpage-content"><?php the_content(); ?></p>
    

<?php
   $votes = get_post_meta($post->ID, "votes", true);
   $votes = ($votes === "") ? 0 : $votes;
?>

This post has <div id='vote_counter'><?php echo $votes ?></div> votes<br>

<?php
    $nonce = wp_create_nonce("my_user_vote_nonce");
    $link = admin_url('admin-ajax.php?action=my_user_vote&post_id='.$post->ID.'&nonce='.$nonce);
    echo '<a class="user_vote" data-nonce="' . $nonce . '" data-post_id="' . $post->ID . '" href="' . $link . '">vote for this article</a>';
?>

</div>
</div>

<?php
get_footer()

?>