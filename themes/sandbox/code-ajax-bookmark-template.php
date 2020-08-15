<?php
/**
* Template Name: Ajax Bookmark
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
   $bookmarks = get_post_meta($post->ID, "bookmarks", true);
   $bookmarks = ($bookmarks === "") ? 0 : $bookmarks;
?>

<!-- This bookmark has <div id='bookmark_counter'><?php echo $bookmarks ?></div> claims<br> -->
Bookmarked <div id='bookmark_counter'><?php echo $bookmarks ?></div><br>
<div id='bookmarker'><?php echo $bookmarks ?></div><br>

<?php
    $nonce = wp_create_nonce("my_user_bookmark_nonce");
    $link = admin_url('admin-ajax.php?action=bookmark_this&post_id='.$post->ID.'&nonce='.$nonce);
    
    echo '<a class="user_bookmark" data-nonce="' . $nonce . '" data-post_id="' . $post->ID . '" href="' . $link . '">bookmark for this article</a><br><br>';

    echo '<a class="select_bookmark" data-nonce="' . $nonce . '" data-post_id="' . $post->ID . '" href="' . $link . '">[ bookmark this ]</a>';
?>

</div>
</div>

<?php
get_footer()

?>