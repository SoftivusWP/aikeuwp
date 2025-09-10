<?php

namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_contact extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'tp-contact';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Contact', 'tpcore');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'tp-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['tpcore'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['tpcore'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        // ====================================== Join Club Content One ============================================//

        $this->start_controls_section(
            'club_content_one',
            [
                'label' => esc_html__('Content', 'aikeu-core'),
            ]
        );

        $this->add_control(
            'golftio_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Please Message Me, If You Have Any Queries', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'contact_content_form_shortcode',
            [
                'label' => esc_html__('Contact Form Shortcode', 'gamestorm-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => esc_html__('Type your Shortcode here', 'aikeu-core'),
            ]
        );
        $this->add_control(
            'aikeu_content_image',
            [
                'label' => esc_html__('Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        // ======================= Style =================================//


        // card  Title 
        $this->start_controls_section(
            'card_title_style',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'card_title_style_typ',
                'selector' => '{{WRAPPER}} .cus_title',

            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_title_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_title_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>
        <script>
            jQuery(document).ready(function($) {
                /**
                 * ======================================
                 * 32. image reveal animation
                 * ======================================
                 */
                gsap.registerPlugin(
                    ScrollTrigger,
                );
                if ($(".reveal-img").length > 0) {
                    gsap.utils.toArray(".reveal-img").forEach((el) => {
                        gsap.to(el, {
                            scrollTrigger: {
                                trigger: el,
                                start: "top 80%",
                                markers: false,
                                onEnter: () => {
                                    el.classList.add("reveal-img-active");
                                    gsap.to(el, {
                                        opacity: 1,
                                        duration: 0.5
                                    });
                                },
                            },
                        });
                    });
                }
            });
        </script>

        <!-- ==== contact form start ==== -->
        <section class="section m-contact fade-wrapper">
            <div class="container">
                <div class="row gaper align-items-center">
                    <div class="col-12 col-lg-6 col-xl-6">
                        <div class="m-contact__form">
                            <?php if (!empty($settings['golftio_heading_content_title'])) :   ?>
                                <h3 class="cus_title title-animation fw-7 text-white text-uppercase mt-12"><?php echo wp_kses($settings['golftio_heading_content_title'], wp_kses_allowed_html('post'))  ?></h3>
                            <?php endif ?>
                            <?php if (!empty($settings['contact_content_form_shortcode'])) :   ?>
                                <?php echo do_shortcode($settings['contact_content_form_shortcode']) ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                            <div class="m-contact__thumb reveal-img parallax-img">
                                <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==== / contact form end ==== -->

<?php
    }
}

$widgets_manager->register(new TP_contact());
