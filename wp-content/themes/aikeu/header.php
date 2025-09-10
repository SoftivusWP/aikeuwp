<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aikeu
 */
?>
<?php

// bg color
$page_bg = function_exists('get_field') ? get_field('page_bg') : '';
$bg_color = !empty($page_bg) ? 'home-five' : '';
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class($bg_color); ?>>
    <style>
        .ctn-preloader .animation-preloader .txt-loading .letters-loading::before {
            animation-delay: calc(var(--char-index) * 0.2s);
        }
    </style>

    <?php
    $aikeu_preloader = get_theme_mod('aikeu_preloader', false);
    $preloader_text = get_theme_mod('aikeu_preloader_text', '');
    $preloader_image = get_theme_mod('aikeu_preloader_image', '');

    $aikeu_backtotop = get_theme_mod('aikeu_backtotop', false);

    ?>

    <div class="my-app">
        <!--  Preloader Start -->
        <?php if (!empty($aikeu_preloader)) : ?>
            <div id="preloader">
                <div id="ctn-preloader" class="ctn-preloader" style="--char-count: <?php echo strlen($preloader_text); ?>;">
                    <div class="animation-preloader">
                        <?php if (!empty($preloader_image)) : ?>
                            <div class="preloader_image mb-40 text-center">
                                <img
                                    src="<?= esc_url($preloader_image) ?>"
                                    alt="<?= esc_attr__('Loading...', 'your-textdomain') ?>"
                                    class="preloader-custom-image">
                            </div>
                        <?php else : ?>
                            <div class="spinner"></div>
                        <?php endif; ?>
                        <div class="txt-loading">
                            <?php
                            if (!empty($preloader_text)) :
                                $chars = str_split($preloader_text);
                                foreach ($chars as $index => $char) :
                                    if (trim($char) !== '') : ?>
                                        <span data-text-preloader="<?php echo esc_attr($char); ?>" class="letters-loading" style="--char-index: <?php echo $index; ?>;">
                                            <?php echo esc_html($char); ?>
                                        </span>
                                <?php endif;
                                endforeach; ?>
                            <?php else : ?>
                                <span data-text-preloader="L" class="letters-loading">
                                    L
                                </span>
                                <span data-text-preloader="O" class="letters-loading">
                                    O
                                </span>
                                <span data-text-preloader="A" class="letters-loading">
                                    A
                                </span>
                                <span data-text-preloader="D" class="letters-loading">
                                    D
                                </span>
                                <span data-text-preloader="I" class="letters-loading">
                                    I
                                </span>
                                <span data-text-preloader="N" class="letters-loading">
                                    N
                                </span>
                                <span data-text-preloader="G" class="letters-loading">
                                    G
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
                </div>
            </div>
        <?php endif; ?>
        <!-- ==== / preloader end ==== -->

        <!-- ==== mouse cursor drag start ==== -->
        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"></div>
        <!-- ==== / mouse cursor drag end ==== -->

        <!-- ==== scroll to top start ==== -->
        <?php if (!empty($aikeu_backtotop)) : ?>
            <button class="progress-wrap" aria-label="scroll indicator" title="go to top">
                <span></span>
                <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
                </svg>
            </button>
        <?php endif; ?>
        <!-- ==== / scroll to top end ==== -->



        <?php wp_body_open(); ?>




        <!-- header start -->
        <?php do_action('aikeu_header_style'); ?>
        <!-- header end -->

        <!-- wrapper-box start -->
        <?php do_action('aikeu_before_main_content'); ?>