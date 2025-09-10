<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package aikeu
 */

get_header();
?>

<section class="section error">
   <div class="container">
      <div class="row justify-content-center">
         <?php
         // $aikeu_404_bg = get_theme_mod('aikeu_404_bg', get_template_directory_uri() . '/assets/images/error_page.png');
         $aikeu_error_title = get_theme_mod('aikeu_error_title', __('Page not found', 'aikeu'));
         $aikeu_error_link_text = get_theme_mod('aikeu_error_link_text', __('Back To Home', 'aikeu'));
         $aikeu_error_desc = get_theme_mod('aikeu_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'aikeu'));
         ?>
         <div class="col-12 col-lg-6">
            <div class="section__header text-center mb-0">
               <h2 class="title title-animation mt-12"><?php print esc_html($aikeu_error_title); ?></h2>
               <p class="det"><?php print esc_html($aikeu_error_desc); ?></p>
               <div class="section__cta">
                  <a href="<?php print esc_url(home_url('/')); ?>" class="btn btn--primary"><?php print esc_html($aikeu_error_link_text); ?><i class="bi bi-arrow-up-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php
get_footer();
