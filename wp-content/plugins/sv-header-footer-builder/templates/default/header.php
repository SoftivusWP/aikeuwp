<?php

/**
 * Header Site
 *
 * Handle header Site.
 *
 * @package Boostify_Header_Footer_Template
 *
 * Written by ptp
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php

$aikeu_preloader = get_theme_mod('aikeu_preloader', false);
$aikeu_backtotop = get_theme_mod('aikeu_backtotop', false);

$page_bg_particles = function_exists('get_field') ? get_field('page_bg_particles') : '';



// bg color
$page_bg = function_exists('get_field') ? get_field('page_bg') : '';
$bg_color = !empty($page_bg) ? 'home-five' : '';
?>

<body <?php body_class($bg_color); ?>>

	<div class="my-app">
		<!--  Preloader  -->
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				<div class="animation-preloader">
					<div class="spinner"></div>
					<div class="txt-loading">
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
					</div>
				</div>
				<div class="loader-section section-left"></div>
				<div class="loader-section section-right"></div>
			</div>
		</div>
		<!-- ==== / preloader end ==== -->

		<!-- ==== mouse cursor drag start ==== -->
		<div class="mouseCursor cursor-outer"></div>
		<div class="mouseCursor cursor-inner"></div>
		<!-- ==== / mouse cursor drag end ==== -->

		<!-- ==== scroll to top start ==== -->
		<?php // if (!empty($aikeu_backtotop)) : 
		?>
		<button class="progress-wrap" aria-label="scroll indicator" title="go to top">
			<span></span>
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
			</svg>
		</button>
		<?php // endif; 
		?>
		<!-- ==== / scroll to top end ==== -->
		<?php
		$page_bg_particles = function_exists('get_field') ? get_field('page_bg_particles') : '';
		?>

		<?php if (!empty($page_bg_particles)) : ?>
			<div id="particles-js"></div>
		<?php endif ?>

		<?php
		if (function_exists('wp_body_open')) {
			wp_body_open();
		}
		do_action('boostify_hf_header');
		?>

		<div id="page" class="bhf-site">
			<?php do_action('boostify_hf_get_header'); ?>

			<div id="smooth-wrapper">
				<div id="smooth-content">
					<main>
					     <?php do_action('aikeu_before_main_content'); ?>