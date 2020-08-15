<?php
/**
* Template Name: Frontpage
*
* @package WordPress
* @subpackage Sandbox
* @since 1.0.0
*/

get_header()
?>

<div class="wrapper">
    <div class="container homepage-title">
        <h1><?php the_title(); ?></h1>
        <p class="frontpage-content"><?php the_content(); ?></p>
    </div>
</div>


<?php
get_footer()

?>