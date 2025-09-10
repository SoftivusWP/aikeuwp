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
class TP_call_action extends Widget_Base
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
        return 'tp-call-to-action';
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
        return __('call-to-action', 'tpcore');
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

        // action
        $this->start_controls_section(
            'aikeu_action_section_genaral',
            [
                'label' => esc_html__('Section', 'aikeu-core')
            ]
        );

        $this->add_control(
            'aikeu_action_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'aikeu-core'),
                    'style_two' => esc_html__('Style Two', 'aikeu-core'),
                    'style_three' => esc_html__('Style Three', 'aikeu-core'),
                ],
                'default' => 'style_one',
            ]
        );


        $this->add_control(
            'section_pt_show',
            [
                'label' => esc_html__('Section pt-0?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'section_pb_show',
            [
                'label' => esc_html__('Section pb-0?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'one_reborn_show',
            [
                'label' => esc_html__('Hide Vector', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_action_content_style_selection' => 'style_three',
                ]
            ]
        );

        $this->end_controls_section();


        // content
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'aikeu-core'),

            ]
        );

        $this->add_responsive_control(
            'aikeu_cont_card_content_align',
            [
                'label'         => esc_html__('Card Text Align', 'aikeu-core'),
                'type'             => \Elementor\Controls_Manager::CHOOSE,
                'options'         => [
                    'left'         => [
                        'title' => esc_html__('Left', 'aikeu-core'),
                        'icon'     => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'aikeu-core'),
                        'icon'     => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title' => esc_html__('Right', 'aikeu-core'),
                        'icon'     => 'eicon-text-align-right',
                    ],
                    'justify'     => [
                        'title' => esc_html__('Justified', 'aikeu-core'),
                        'icon'     => 'eicon-text-align-justify',
                    ],
                ],
                'default'         => 'center',
                'selectors'     => [
                    '{{WRAPPER}} .cta-two__inner' => 'text-align: {{VALUE}} !important;',
                    '{{WRAPPER}} .footer-cmn__cta' => 'text-align: {{VALUE}} !important;',
                    '{{WRAPPER}} .footer__content' => 'text-align: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Join Us Today", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );



        $this->add_control(
            'aikeu_button_content_style',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__('Select Style', 'aikeu-core'),
                'options' => [
                    'style_one' => esc_html__('Style One', 'aikeu-core'),
                    'style_two' => esc_html__('Style Two', 'aikeu-core'),
                ],
                'default' => 'style_one',
            ]
        );

        // Button text
        $this->add_control(
            'aikeu_content_button',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'aikeu-core'),
                'placeholder' => esc_html__('Type your button here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        // Button URL
        $this->add_control(
            'aikeu_content_button_url',
            [
                'label' => esc_html__('Button URL', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'aikeu-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );



        $this->end_controls_section();




        // ======================= Style =================================//


        // Title 
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .cus_title',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_style_margin',
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
            'title_style_padding',
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

        // =======================Button Style===========================//

        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'button_typ',
                'selector' => '{{WRAPPER}} .btn',
            ]
        );
        $this->add_control(
            'button_all_color',
            [
                'label'     => esc_html__('Btn Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'button_all_color_hover',
            [
                'label'     => esc_html__('Btn Hover Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn:hover' => 'color: {{VALUE}} !important;',
                ]
            ]
        );

        $this->add_control(
            'button_bdr_color',
            [
                'label' => esc_html__('Border Color', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bdr_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn:hover' => 'border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'button_border_width',
            [
                'label' => esc_html__('Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // btn primary
        // Background for items options.
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'label'     => esc_html__('BG Primary', 'aikeu-core'),
                'name'     => 'grid_items_style_background',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn.btn--primary',
                'condition' => [
                    'aikeu_button_content_style' => 'style_one',
                ]
            ]
        );
        // Background for items options.
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'label'     => esc_html__('BG Primary Hover', 'aikeu-core'),
                'name'     => 'grid_items_style_background_hover',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn.btn--primary::before',
                'condition' => [
                    'aikeu_button_content_style' => 'style_one',
                ]
            ]
        );

        // btn secondary
        // Background for items options.
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'label'     => esc_html__('BG Secondary', 'aikeu-core'),
                'name'     => 'grid_items_style_background_sec',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn.btn--secondary',
                'condition' => [
                    'aikeu_button_content_style' => 'style_two',
                ]
            ]
        );
        // Background for items options.
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'label'     => esc_html__('BG Secondary Hover', 'aikeu-core'),
                'name'     => 'grid_items_style_background_sec_hover',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn.btn--secondary::before',
                'condition' => [
                    'aikeu_button_content_style' => 'style_two',
                ]
            ]
        );


        $this->add_responsive_control(
            'button_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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

        <!-- Hero Section Start -->
        <?php if ($settings['aikeu_action_content_style_selection'] == 'style_one') : ?>

            <section class="call_to_action section <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : ''; ?> <?php echo ($settings['section_pb_show'] == 'yes') ? 'pb-0' : ''; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="cmn__cta text-center appear-down">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title fw-7 title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <!-- button -->
                                <?php if ($settings['aikeu_button_content_style'] == 'style_one') : ?>
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <div class="section__content-cta">
                                            <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--secondary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                                <?php if ($settings['aikeu_button_content_style'] == 'style_two') : ?>
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <div class="section__content-cta">
                                            <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / action section end ==== -->

        <!-- Hero Section Start -->
        <?php if ($settings['aikeu_action_content_style_selection'] == 'style_two') : ?>
            <section class="section cta-two parallax-bg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="cta-two__inner text-center">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title text-white fw-7 title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if ($settings['aikeu_button_content_style'] == 'style_one') : ?>
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <div class="section__content-cta">
                                            <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                                <?php if ($settings['aikeu_button_content_style'] == 'style_two') : ?>
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <div class="section__content-cta">
                                            <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--secondary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['aikeu_action_content_style_selection'] == 'style_three') : ?>
            <section class="footer section ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-9 col-lg-9 col-xl-10 col-xxl-9">
                            <div class="footer__content text-center">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title light-title fw-7 title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if ($settings['aikeu_button_content_style'] == 'style_one') : ?>
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <div class="footer__content-cta">
                                            <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                                <?php if ($settings['aikeu_button_content_style'] == 'style_two') : ?>
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <div class="footer__content-cta">
                                            <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--secondary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                    <div class="footer-thumb-one">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer-thumb-two.png" alt="<?php echo esc_attr('Image') ?>">
                    </div>
                <?php endif ?>
                <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                    <div class="footer-thumb-two">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer-thumb-one.png" alt="<?php echo esc_attr('Image') ?>">
                    </div>
                <?php endif ?>
            </section>
        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new TP_call_action());
