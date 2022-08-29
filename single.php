<?php get_header(); ?>

<code>single.php</code>

<?php 
    the_title( '<h1>', '</h1>', true );
    the_content(); 
?>
    
<?php get_footer(); ?>