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
class TP_counter extends Widget_Base
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
        return 'tp-counter';
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
        return __('Counter', 'tpcore');
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

        // ====================================== Content One ============================================//
        //Heading Section
        $this->start_controls_section(
            'aikeu_heading_one_section_genaral',
            [
                'label' => esc_html__('Section', 'aikeu-core')
            ]
        );

        $this->add_control(
            'aikeu_heading_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'aikeu-core'),
                    'style_two' => esc_html__('Style Two', 'aikeu-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'banner_one_reborn_content',
            [
                'label' => esc_html__('Reborn', 'aikeu-core'),
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'one_reborn_show',
            [
                'label' => esc_html__('Show Reborn?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'scroll_reborn_show',
            [
                'label' => esc_html__('Show Scroll Text Reborn?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'banner_content_title',
            [
                'label' => esc_html__('Banner Content', 'aikeu-core'),
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Make AI Image With Your Imagination', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'aikeu_heading_content_description',
            [
                'label' => esc_html__('Short Description', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('AI image generation tools have emerged as powerful resources in the realm of digital art and design. These cutting-edge tools leverage advanced.', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
            ]
        );

        $this->add_control(
            'aikeu_content_vector_image',
            [
                'label' => esc_html__('Choose Vector Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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


        // Button URL
        $this->add_control(
            'aikeu_content_button_url',
            [
                'label' => esc_html__('Scroll Button URL', 'aikeu-core'),
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
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_two',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Counter', 'aikeu-core'),
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_counter_number',
            [
                'label' => esc_html__('Counter number', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('80', 'aikeu-core'),
                'placeholder' => esc_html__('Type your number here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'aikeu_counter_sign',
            [
                'label' => esc_html__('Counter Sign', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('k', 'aikeu-core'),
                'placeholder' => esc_html__('Type your number here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'aikeu_counter_text',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Active User', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'aikeu_cont_card_icon',
            [
                'label' => esc_html__('Icon', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'bi bi-star-fill',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'card_repeater',
            [
                'label' => esc_html__('Counter Card', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_counter_number' => esc_html__('80', 'aikeu-core'),
                        'aikeu_counter_text' => esc_html__('Active User', 'aikeu-core'),
                    ],
                    [
                        'aikeu_counter_number' => esc_html__('100', 'aikeu-core'),
                        'aikeu_counter_sign' => esc_html__('%', 'aikeu-core'),
                        'aikeu_counter_text' => esc_html__('Satisfaction', 'aikeu-core'),
                    ],
                    [
                        'aikeu_counter_number' => esc_html__('2000', 'aikeu-core'),
                        'aikeu_counter_sign' => esc_html__('+', 'aikeu-core'),
                        'aikeu_counter_text' => esc_html__('Daily User', 'aikeu-core'),
                    ],
                    [
                        'aikeu_counter_number' => esc_html__('5', 'aikeu-core'),
                        'aikeu_counter_text' => esc_html__('Years of Business', 'aikeu-core'),
                    ],
                ],
                'title_field' => '{{{ aikeu_counter_text }}}',

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
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_two'
                ]
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

        //  Description
        $this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__('Description', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'description_style_typ',
                'selector' => '{{WRAPPER}} .pp',

            ]
        );

        $this->add_control(
            'description_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // counter_number_style
        $this->start_controls_section(
            'counter_number_style',
            [
                'label' => esc_html__('Counter Number', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'counter_number_style_typ',
                'selector' => '{{WRAPPER}} .light-title',

            ]
        );

        $this->add_control(
            'counter_number_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .light-title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'counter_sign_style_color',
            [
                'label'     => esc_html__('Sign Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .light-title span.prefix' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_number_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .light-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_number_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .light-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // counter_text
        $this->start_controls_section(
            'counter_text_style',
            [
                'label' => esc_html__('Counter Text', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'counter_text_style_typ',
                'selector' => '{{WRAPPER}} .counter_text',

            ]
        );

        $this->add_control(
            'counter_text_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter_text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //  Banner Text Slider
        $this->start_controls_section(
            'banner_text_style',
            [
                'label' => esc_html__('Star Icon', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'icon_custom_dimensionsss',
            [
                'label' => esc_html__('Icon Size', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter .counter__inner .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .counter .counter__inner .icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->add_control(
            'banner_text_style_color',
            [
                'label'     => esc_html__('Icon Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter .counter__inner .icon path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .counter .counter__inner .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        // ======================= Style End=================================//

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
                 * 36. image reveal animation
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
                                },
                            },
                        });
                    });
                }

            });
        </script>
        
        <style>
            .counter .counter__inner .icon i {
                font-size: 20px;
                color: var(--primary-color);
            }
        </style>

        <?php if ($settings['aikeu_heading_content_style_selection'] == 'style_one') : ?>
            <!-- ==== counter section start ==== -->
            <section class="counter section pb-0 fade-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="counter__inner">
                                <?php foreach ($settings['card_repeater'] as $item) : ?>
                                    <div class="counter__single fade-top">
                                        <?php if (!empty($item['aikeu_counter_number'])) :   ?>
                                            <h2 class="light-title"> <span class="odometer" data-odometer-final="<?php echo esc_html($item['aikeu_counter_number']) ?>"></span> <span class="prefix"> <?php echo esc_html($item['aikeu_counter_sign']) ?></span> </h2>
                                        <?php endif ?>
                                        <?php if (!empty($item['aikeu_counter_text'])) :   ?>
                                            <p class="counter_text primary-text"><?php echo wp_kses($item['aikeu_counter_text'], wp_kses_allowed_html('post'))  ?></p>
                                        <?php endif ?>
                                    </div>
                                    <?php if (!empty($item['aikeu_cont_card_icon'])) : ?>
                                        <div class="icon counter__single c_icon  d-xxl-block d-none">
                                            <?php \Elementor\Icons_Manager::render_icon($item['aikeu_cont_card_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ==== / counter section end ==== -->
        <?php endif ?>

        <?php if ($settings['aikeu_heading_content_style_selection'] == 'style_two') : ?>
            <!-- ==== journey start ==== -->
            <section class="s-journey section" id="scrollPosition">
                <div class="container">
                    <div class="row gaper align-items-center section__header--secondary">
                        <div class="col-12 col-md-9 col-lg-7 col-xxl-6">
                            <div class="section__content">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title mt-12 title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-4 offset-lg-1 col-xxl-3 offset-xxl-3">
                            <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                                <?php if (!empty($settings['aikeu_content_vector_image']['url'])) : ?>
                                    <div class="s-h-thumb parallax-img">
                                        <img src="<?php echo esc_url($settings['aikeu_content_vector_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row gaper align-items-end">
                        <div class="col-12 col-lg-8 col-xxl-9">
                            <div class="w-r">
                                <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                    <div class="s-journey__thumb reveal-img parallax-img">
                                        <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    </div>
                                <?php endif ?>
                                <?php if (!empty($settings['scroll_reborn_show'] == 'yes')) :   ?>
                                    <a class="scroll-position-btn" href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/frame-one.png" alt="<?php echo esc_attr('Image') ?>">
                                        <i class="bi bi-arrow-down"></i>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-xxl-3">
                            <div class="s-journey__content">
                                <?php foreach ($settings['card_repeater'] as $item) : ?>
                                    <div class="counter__single">
                                        <?php if (!empty($item['aikeu_counter_number'])) :   ?>
                                            <h2 class="light-title"> <span class="odometer" data-odometer-final="<?php echo esc_html($item['aikeu_counter_number']) ?>"></span> <span class="prefix"> <?php echo esc_html($item['aikeu_counter_sign']) ?></span> </h2>
                                        <?php endif ?>
                                        <?php if (!empty($item['aikeu_counter_text'])) :   ?>
                                            <p class="counter_text primary-text"><?php echo wp_kses($item['aikeu_counter_text'], wp_kses_allowed_html('post'))  ?></p>
                                        <?php endif ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif ?>
<?php
    }
}

$widgets_manager->register(new TP_counter());
