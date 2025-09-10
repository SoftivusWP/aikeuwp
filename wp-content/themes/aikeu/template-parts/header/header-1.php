<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aikeu
 */

// info
$header_button_switch = get_theme_mod('header_button_switch', false);
$aikeu_navright_search_switch = get_theme_mod('aikeu_navright_search_switch', false);
// $header_button_align = $header_button_switch ? '' : 'd-flex justify-content-center';



// contact button
$aikeu_buttonone_text = get_theme_mod('aikeu_btnone_text', __('Contact', 'aikeu'));
$aikeu_buttonone_link = get_theme_mod('aikeu_btnone_link', __('', 'aikeu'));

$page_bg_particles = function_exists('get_field') ? get_field('page_bg_particles') : '';


// // header right
// $aikeu_header_right = get_theme_mod('aikeu_header_right', false);

?>

<!-- header area start -->


<!-- ==== header start ==== -->
<header class="header">
   <div class="primary-navbar">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav class="navbar py-3 flex-nowrap">
                  <div class="navbar__logo">
                     <?php aikeu_header_logo(); ?>
                  </div>
                  <?php if (!empty($aikeu_navright_search_switch) || !empty($header_button_switch)) : ?>
                     <div class="navbar__menu d-flex justify-content-center">
                        <?php aikeu_header_menu(); ?>
                     </div>
                  <?php else : ?>
                     <div class="navbar__menu">
                        <?php aikeu_header_menu(); ?>
                     </div>
                  <?php endif ?>
                  <?php if (!empty($aikeu_navright_search_switch) || !empty($header_button_switch)) : ?>

                     <div class="navbar__options d-none d-sm-flex">
                        <div class="navbar__mobile-options">
                           <?php if (!empty($aikeu_navright_search_switch)) : ?>
                              <button class="open-search" aria-label="search products" title="open search box">
                                 <i class="bi bi-search"></i>
                              </button>
                           <?php endif; ?>
                           <?php if (!empty($header_button_switch)) : ?>
                              <a href="<?php echo esc_url($aikeu_buttonone_link) ?>" class="btn btn--primary"><?php echo esc_html($aikeu_buttonone_text) ?></a>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php else : ?>

                  <?php endif; ?>

                  <button class="open-mobile-menu d-flex d-xl-none" aria-label="toggle mobile menu" title="open mobile menu">
                     <i class="material-symbols-outlined">
                        <?php echo esc_html('menu_open') ?>
                     </i>
                  </button>
               </nav>
            </div>
         </div>
      </div>
      <!-- ==== mobile menu start ==== -->
      <div class="mobile-menu d-block d-xl-none">
         <nav class="mobile-menu__wrapper">
            <div class="mobile-menu__header nav-fade">
               <div class="logo">
                  <?php aikeu_header_logo(); ?>
               </div>
               <button aria-label="close mobile menu" class="close-mobile-menu">
                  <i class="bi bi-x-lg"></i>
               </button>
            </div>
            <div class="mobile-menu__list"></div>
            <?php if (!empty($aikeu_navright_search_switch) || !empty($header_button_switch)) : ?>
               <div class="navbar__options d-sm-none">
                  <div class="navbar__mobile-options">
                     <?php if (!empty($aikeu_navright_search_switch)) : ?>
                        <button class="open-search" aria-label="search products" title="open search box">
                           <i class="bi bi-search"></i>
                        </button>
                     <?php endif; ?>
                     <?php if (!empty($header_button_switch)) : ?>
                        <a href="<?php echo esc_url($aikeu_buttonone_link) ?>" class="btn btn--primary"><?php echo esc_html($aikeu_buttonone_text) ?></a>
                     <?php endif; ?>
                  </div>
               </div>
            <?php else : ?>

            <?php endif; ?>
         </nav>
      </div>
      <div class="mobile-menu__backdrop"></div>
      <!-- ==== / mobile menu end ==== -->
   </div>
</header>
<!-- ==== / header end ==== -->

<?php if (!empty($aikeu_navright_search_switch)) : ?>
   <!-- ==== search popup start ==== -->
   <div class="search-popup">
      <button class="close-search" aria-label="close search box" title="close search box">
         <i class="bi bi-x-lg"></i>
      </button>
      <form method="GET" id="search" class="inner__form" action="<?php echo esc_url(home_url('/')); ?>">
         <div class="search-popup__group">
            <input type="text" class="form-control" placeholder="<?php echo esc_attr__('Search Here', 'aikeu'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr('Search for:', 'aikeu'); ?>" required>
            <button type="submit" class="search_icon"> <i class="bi bi-search"></i></button>
         </div>
      </form>
   </div>
   <!-- ==== / search popup end ==== -->
<?php endif; ?>


<?php if (!empty($page_bg_particles)) : ?>
   <div id="particles-js"></div>
<?php endif ?>
<div id="smooth-wrapper">
   <div id="smooth-content">
      <main>