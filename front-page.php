<?php get_header(); ?>

<code>front-page.php</code>


    <ul>
        <?php wp_list_categories( array(
            'orderby' => 'name'
        ) ); ?> 
    </ul>

    <?php
        the_content();
    ?>
    
<?php get_footer(); ?>