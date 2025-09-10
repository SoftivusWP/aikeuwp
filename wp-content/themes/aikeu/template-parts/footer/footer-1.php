</main>
<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aikeu
 */

//  footer area start 

$footer_bg_color = get_theme_mod('footer_bg_color');

$style_attributes = '';


if (isset($footer_bg_color)) {
    $style_attributes .= 'background-color: ' . esc_attr($footer_bg_color) . '; ';
}

?>
<footer class="footer-cmn">

    <div class="footer__copyright " style="<?php echo esc_attr($style_attributes); ?>">
        <div class="container">
            <div class="row gaper">
                <div class="col-12">
                    <div class="footer__copyright-content text-center">
                        <p><?php echo aikeu_copyright_text(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- smooth-wrapper -->
</div>
</div>

<!-- my-app -->
</div>