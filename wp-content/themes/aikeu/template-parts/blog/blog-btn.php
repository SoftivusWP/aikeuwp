<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aikeu
 */

$aikeu_blog_btn = get_theme_mod( 'aikeu_blog_btn', 'Read More' );
$aikeu_blog_btn_switch = get_theme_mod( 'aikeu_blog_btn_switch', true );

?>

<?php if ( !empty( $aikeu_blog_btn_switch ) ): ?>
<div class="postbox__read-more mt-4">
    <a href="<?php the_permalink();?>" class="tp-btn btn btn--primary"><?php print esc_html( $aikeu_blog_btn );?></a>
</div>
<?php endif;?>