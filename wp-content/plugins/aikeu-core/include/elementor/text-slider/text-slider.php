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
class TP_text_slider extends Widget_Base
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
        return 'tp-text-slider';
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
        return __('Text Slider', 'tpcore');
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
                    'style_three' => esc_html__('Style Three', 'aikeu-core'),
                    'style_four' => esc_html__('Style Four', 'aikeu-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'section_content_alt_show',
            [
                'label' => esc_html__('Slider rtl?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_one'
                ]
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
                'default' => 'no',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'text_slider',
            [
                'label' => esc_html__('Text Slider', 'aikeu-core'),
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_one'
                ]
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_banner_text_slider_carousel',
            [
                'label' => esc_html__('Add Banner Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('NEXT', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'aikeu_banner_text_slider_carousel2',
            [
                'label' => esc_html__(' Add Banner Text Slider 2', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('LEVEL', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        // Link URL
        $repeater->add_control(
            'aikeu_banner_text_slider_carousel_url',
            [
                'label' => esc_html__('Link URL', 'aikeu-core'),
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

        $this->add_control(
            'text_slide_repeater',
            [
                'label' => esc_html__('Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('AI', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('Image Generator', 'aikeu-core'),
                    ],
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('AI', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('Image Generator', 'aikeu-core'),
                    ],
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('AI', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('Image Generator', 'aikeu-core'),
                    ]

                ],
                'title_field' => '{{{ aikeu_banner_text_slider_carousel }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'text_slider3',
            [
                'label' => esc_html__('Text Slider', 'aikeu-core'),
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_three'
                ]
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_banner_text_slider_carousel',
            [
                'label' => esc_html__('Add Banner Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('NEXT', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'aikeu_banner_text_slider_carousel2',
            [
                'label' => esc_html__(' Add Banner Text Slider 2', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('LEVEL', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        // Link URL
        $repeater->add_control(
            'aikeu_banner_text_slider_carousel_url',
            [
                'label' => esc_html__('Link URL', 'aikeu-core'),
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

        $this->add_control(
            'text_slide_repeater3',
            [
                'label' => esc_html__('Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('NEXT', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('LEVEL', 'aikeu-core'),
                    ],
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('NEXT', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('LEVEL', 'aikeu-core'),
                    ],
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('NEXT', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('LEVEL', 'aikeu-core'),
                    ],

                ],
                'title_field' => '{{{ aikeu_banner_text_slider_carousel }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'text_slider2',
            [
                'label' => esc_html__('Text Slider', 'aikeu-core'),
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_four'
                ]
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_text_slider_carousel',
            [
                'label' => esc_html__('Add Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('AI', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'aikeu_text_slider_carousel2',
            [
                'label' => esc_html__(' Add Text Slider 2', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Image Generator', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'text_slide_repeater2',
            [
                'label' => esc_html__('Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_text_slider_carousel' => esc_html__('About', 'aikeu-core'),
                        'aikeu_text_slider_carousel2' => esc_html__('About', 'aikeu-core'),
                    ],
                    [
                        'aikeu_text_slider_carousel' => esc_html__('About', 'aikeu-core'),
                        'aikeu_text_slider_carousel2' => esc_html__('About', 'aikeu-core'),
                    ],
                    [
                        'aikeu_text_slider_carousel' => esc_html__('About', 'aikeu-core'),
                        'aikeu_text_slider_carousel2' => esc_html__('About', 'aikeu-core'),
                    ]

                ],
                'title_field' => '{{{ aikeu_text_slider_carousel }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'banner_content_text_bg',
            [
                'label' => esc_html__('Banner BG Text Slider', 'aikeu-core'),
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_two'
                ]
            ]
        );


        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_hero_bg_text_slider',
            [
                'label' => esc_html__('BG Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Image', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_text_repeater',
            [
                'label' => esc_html__('BG Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_hero_bg_text_slider' => esc_html__('NEXT LEVEL AI', 'aikeu-core'),
                    ],
                    [
                        'aikeu_hero_bg_text_slider' => esc_html__('NEXT LEVEL AI', 'aikeu-core'),
                    ],
                    [
                        'aikeu_hero_bg_text_slider' => esc_html__('NEXT LEVEL AI', 'aikeu-core'),
                    ],

                ],
                'title_field' => '{{{ aikeu_hero_bg_text_slider }}}',
            ]
        );

        $this->end_controls_section();


        // ======================= Content Style =================================//

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
                    '{{WRAPPER}} .cus_title a' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .text-slider-large-wrapper .text-stroke::before' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .text-slider-large-wrapper h2::before' => 'background-color: {{VALUE}} !important;',
                ],
                'condition' => [
                    'aikeu_heading_content_style_selection' => ['style_one', 'style_three', 'style_four']
                ]
            ]
        );

        $this->add_control(
            'title_stroke_style_color',
            [
                'label'     => esc_html__('Text Stroke Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-stroke' => '-webkit-text-stroke: 1px {{VALUE}} !important;',
                ],
                'condition' => [
                    'aikeu_heading_content_style_selection' => ['style_one', 'style_four']
                ]
            ]
        );
        $this->add_control(
            'title_stroke_style_color2',
            [
                'label'     => esc_html__('Second Text Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-span' => 'color: {{VALUE}} !important;',
                ],
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_three'
                ]
            ]
        );

        $this->add_control(
            'title_stroke2_style_color',
            [
                'label'     => esc_html__('Text Stroke Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => '-webkit-text-stroke: 2px {{VALUE}} !important;',
                ],
                'condition' => [
                    'aikeu_heading_content_style_selection' => ['style_two',]
                ]
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
                $(".text-slider-large").not(".slick-initialized").slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 0,
                    speed: 8000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    draggable: false,
                    variableWidth: true,
                    cssEase: "linear",
                });

                $(".text-slider-large-rtl").not(".slick-initialized").slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 0,
                    speed: 12000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    draggable: false,
                    variableWidth: true,
                    cssEase: "linear",
                    rtl: true,
                });



                $(".b-text-slider").not(".slick-initialized").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 0,
                    speed: 19000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    draggable: false,
                    variableWidth: true,
                    cssEase: "linear",
                });


            });
        </script>
        <style>
            .b-text-slider .slick-list {
                padding-top: 20px;
            }

            .text-slider-large-rtl .slick-list,
            .text-slider-large .slick-list {
                margin-top: -16px;
            }
        </style>

        <?php if ($settings['aikeu_heading_content_style_selection'] == 'style_one') : ?>

            <!-- ==== text slider large start ==== -->
            <section class="text-slider-large-wrapper section <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : ''; ?>  <?php echo ($settings['section_pb_show'] == 'yes') ? ' pb-0' : ''; ?>">
                <div class="<?php echo ($settings['section_content_alt_show'] == 'yes') ? 'text-slider-large-rtl' : 'text-slider-large'; ?>" <?php echo ($settings['section_content_alt_show'] == 'yes') ? 'dir="rtl"' : ''; ?>>
                    <?php foreach ($settings['text_slide_repeater'] as $item) : ?>
                        <div class="text-slider__single">
                            <h2 class="cus_title large-title">
                                <a href="<?php echo esc_html($item['aikeu_banner_text_slider_carousel_url']['url']) ?>">
                                    <?php echo esc_html($item['aikeu_banner_text_slider_carousel']) ?>
                                    <span class="text-stroke" data-text="<?php echo esc_html($item['aikeu_banner_text_slider_carousel2']) ?>"> <?php echo esc_html($item['aikeu_banner_text_slider_carousel2']) ?></span>
                                </a>
                            </h2>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>

        <?php endif ?>

        <?php if ($settings['aikeu_heading_content_style_selection'] == 'style_two') : ?>
            <div class="section <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : ''; ?>  <?php echo ($settings['section_pb_show'] == 'yes') ? ' pb-0' : ''; ?>">
                <div class="b-text-slider b-g-text-slider">
                    <?php foreach ($settings['hero_text_repeater'] as $item) : ?>
                        <?php if (!empty($item['aikeu_hero_bg_text_slider'])) :   ?>
                            <div class="single">
                                <p class="cus_title l-t"><?php echo wp_kses($item['aikeu_hero_bg_text_slider'], wp_kses_allowed_html('post')) ?></p>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endif ?>

        <?php if ($settings['aikeu_heading_content_style_selection'] == 'style_three') : ?>
            <section class="text-slider-large-wrapper section alter-l-text <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : ''; ?>  <?php echo ($settings['section_pb_show'] == 'yes') ? ' pb-0' : ''; ?>">
                <div class="text-slider-large">
                    <?php foreach ($settings['text_slide_repeater3'] as $item) : ?>
                        <div class="text-slider__single">
                            <h2 class="cus_title large-title">
                                <a href="<?php echo esc_html($item['aikeu_banner_text_slider_carousel_url']['url']) ?>">
                                    <?php echo esc_html($item['aikeu_banner_text_slider_carousel']) ?>
                                    <span class="text-span" data-text="<?php echo esc_html($item['aikeu_banner_text_slider_carousel2']) ?>"> <?php echo esc_html($item['aikeu_banner_text_slider_carousel2']) ?></span>
                                </a>
                            </h2>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>
        <?php endif ?>
        <?php if ($settings['aikeu_heading_content_style_selection'] == 'style_four') : ?>
            <section class="text-slider-large-wrapper alter-text-large section <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : ''; ?>  <?php echo ($settings['section_pb_show'] == 'yes') ? ' pb-0' : ''; ?>">
                <div class="text-slider-large">
                    <?php foreach ($settings['text_slide_repeater2'] as $item) : ?>
                        <div class="text-slider__single">
                            <h2 class="cus_title large-title">
                                <?php echo esc_html($item['aikeu_text_slider_carousel']) ?>
                            </h2>
                        </div>
                        <div class="text-slider__single">
                            <h2 class="cus_title large-title">
                                <span class="text-stroke" data-text="<?php echo esc_html($item['aikeu_text_slider_carousel2']) ?>"><?php echo esc_html($item['aikeu_text_slider_carousel2']) ?> </span>
                            </h2>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>
        <?php endif ?>

<?php

    }
}
$widgets_manager->register(new TP_text_slider());
