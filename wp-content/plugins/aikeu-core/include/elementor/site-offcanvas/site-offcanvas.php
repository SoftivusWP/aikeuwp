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
class TP_site_offcanvas extends Widget_Base
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
        return 'tp-site-off-canvas';
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
        return __('Site OffCanvas', 'tpcore');
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



        // content
        $this->start_controls_section(
            'section_card_content',
            [
                'label' => esc_html__('Contact Info', 'aikeu-core'),
            ]
        );


        $this->add_control(
            'aikeu_content_logo',
            [
                'label' => esc_html__('Choose Logo', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Intelligent Conversations Made Simple", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cus_info_title',
            [
                'label' => esc_html__('Contact Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Contact Us", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'aikeu_social_title',
            [
                'label' => esc_html__('Soocial Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Follow Us :", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_cont_content',
            [
                'label' => esc_html__('Contact ', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('123-456-7891', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'card_repeater',
            [
                'label' => esc_html__('Contact Info', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_cont_content' => esc_html__('123-456-7891', 'aikeu-core'),
                    ],
                ],
                'title_field' => '{{{ aikeu_cont_content }}}',
            ]
        );

        $this->end_controls_section();


        // Social Content
        $this->start_controls_section(
            'social_content',
            [
                'label' => esc_html__('Social', 'bankio-core'),
            ]
        );

        // Social Align
        $this->add_responsive_control(
            'golftio_social_content_align',
            [
                'label' => esc_html__('Social Align', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'bankio-core'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'bankio-core'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'bankio-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'bankio-core'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .social_area ' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .social ' => 'justify-content: {{VALUE}};',
                ],

            ]
        );

        // Facebook URL
        $this->add_control(
            'social_fb_icon_url',
            [
                'label' => esc_html__('Facebook URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        // Twitter URL
        $this->add_control(
            'social_tw_icon_url',
            [
                'label' => esc_html__('Twitter URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        // Pinterest URL
        $this->add_control(
            'social_pi_icon_url',
            [
                'label' => esc_html__('Pinterest URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );
        // Twitch URL
        $this->add_control(
            'social_twi_icon_url',
            [
                'label' => esc_html__('Twitch URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        // Skype URL
        $this->add_control(
            'social_sk_icon_url',
            [
                'label' => esc_html__('Skype URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        // Instagram URL
        $this->add_control(
            'social_in_icon_url',
            [
                'label' => esc_html__('Instagram URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        // LinkedIn URL
        $this->add_control(
            'social_ln_icon_url',
            [
                'label' => esc_html__('LinkedIn URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        // YouTube URL
        $this->add_control(
            'social_yt_icon_url',
            [
                'label' => esc_html__('YouTube URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        // Telegram URL
        $this->add_control(
            'social_tel_icon_url',
            [
                'label' => esc_html__('Telegram URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        // WhatsApp URL
        $this->add_control(
            'social_wa_icon_url',
            [
                'label' => esc_html__('WhatsApp URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );
        // WeChat URL
        $this->add_control(
            'social_wc_icon_url',
            [
                'label' => esc_html__('WeChat URL', 'bankio-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'bankio-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // style

        // Title 
        $this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__('Icon', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'icon_style_typ',
                'selector' => '{{WRAPPER}} button.open-offcanvas',

            ]
        );
        
          $this->add_control(
            'open_offcanvas_style_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .open-offcanvas i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_style_padding',
            [
                'label'      => __('Icon Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} button.open-offcanvas' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Title 
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Heading', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .cus_title',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //contact Title 
        $this->start_controls_section(
            'contact_title_style',
            [
                'label' => esc_html__('Contact Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'contact_title_style_typ',
                'selector' => '{{WRAPPER}} .cus_info_title',

            ]
        );

        $this->add_control(
            'contact_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_info_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_title_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_info_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_title_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_info_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //contact Title 
        $this->start_controls_section(
            'contact_cont_style',
            [
                'label' => esc_html__('Info', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'contact_cont_style_typ',
                'selector' => '{{WRAPPER}} .cus_cont a, {{WRAPPER}} .cus_cont span',
            ]
        );

        $this->add_control(
            'contact_cont_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_cont a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cus_cont' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_cont_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_cont' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_cont_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_cont' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //contact Title 
        $this->start_controls_section(
            'contact_social_style',
            [
                'label' => esc_html__('Social Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'plugin-name'),
                'name'     => 'contact_con_social_style_typ',
                'selector' => '{{WRAPPER}} .offcanvas-info .offcanvas-info__footer p',

            ]
        );

        $this->add_control(
            'contact_social_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-info .offcanvas-info__footer p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Social Typography', 'plugin-name'),
                'name'     => 'contact_social_style_typ',
                'selector' => '{{WRAPPER}} .offcanvas-info .offcanvas-info__footer a',

            ]
        );

        $this->add_control(
            'contact_social_style_color',
            [
                'label'     => esc_html__('Social Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-info .offcanvas-info__footer a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'contact_social_hover_style_color',
            [
                'label'     => esc_html__('Social hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-info .offcanvas-info__footer a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_social_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-info__footer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_social_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .offcanvas-info__footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
            /**
             * ======================================
             * 12. offcanvas info
             * ======================================
             */
            jQuery(document).ready(function($) {
                 if (document.querySelector(".open-offcanvas")) {
                    $(".open-offcanvas").on("click", function() {
                        $(".offcanvas-info").addClass("offcanvas-info-active");
                        $(".offcanvas-info-backdrop").addClass("offcanvas-info-backdrop-active");
                    });
        
                    $(".close-offcanvas-info, .offcanvas-info-backdrop").on(
                        "click",
                        function() {
                            $(".offcanvas-info").removeClass("offcanvas-info-active");
                            $(".offcanvas-info-backdrop").removeClass(
                                "offcanvas-info-backdrop-active"
                            );
                            $("body").removeClass("body-active");
                        }
                    );
                }
            });
        </script>

        <button class="open-offcanvas" aria-label="open offcanvas" title="open offcanvas">
            <i class="bi bi-grid-3x3-gap"></i>
        </button>

        <div class="offcanvas-info">
            <div class="offcanvas-info__inner">
                <div class="offcanvas-info__intro">
                    <div class="offcanvas-info__logo">
                        <?php if (!empty($settings['aikeu_content_logo']['url'])) : ?>
                            <div class="offcanvas-info__logo">
                                <a href="<?php echo home_url(); ?>">
                                    <img src="<?php echo esc_url($settings['aikeu_content_logo']['url']) ?>" alt="<?php echo esc_attr('Logo') ?>">
                                </a>
                            </div>
                        <?php endif ?>
                    </div>
                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                        <h4 class="cus_title"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h4>
                    <?php endif ?>
                </div>
                <div class="offcanvas-info__content">
                    <?php if (!empty($settings['cus_info_title'])) :   ?>
                        <h5 class="cus_info_title"><?php echo wp_kses($settings['cus_info_title'], wp_kses_allowed_html('post'))  ?></h5>
                    <?php endif ?>
                    <ul>
                        <?php foreach ($settings['card_repeater'] as $item) : ?>
                            <?php if (!empty($item['aikeu_cont_content'])) : ?>
                                <li>
                                    <span class="cus_cont"><?php echo wp_kses($item['aikeu_cont_content'], wp_kses_allowed_html('post')) ?></span>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="offcanvas-info__footer">
                    <p class="tertiary-text"><?php echo wp_kses($settings['aikeu_social_title'], wp_kses_allowed_html('post'))  ?></p>
                    <div class="social">
                        <?php if (!empty($settings['social_fb_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_fb_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-facebook"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_tw_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_tw_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-twitter"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_pi_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_pi_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-pinterest"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_twi_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_twi_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-twitch"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_sk_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_sk_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-skype"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_in_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_in_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-instagram"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_ln_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_ln_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_yt_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_yt_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-youtube"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_tel_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_tel_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-telegram"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_wc_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_wc_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        <?php endif ?>
                        <?php if (!empty($settings['social_wa_icon_url']['url'])) :   ?>
                            <a href="<?php echo esc_url($settings['social_wa_icon_url']['url']); ?>" class="box_8 p-0 btn_theme btn_alt">
                                <i class="bi bi-wechat"></i>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <button class="close-offcanvas-info" aria-label="close offcanvas info">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="offcanvas-info-backdrop"></div>
<?php

    }
}
$widgets_manager->register(new TP_site_offcanvas());
