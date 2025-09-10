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
class TP_publisher_slider extends Widget_Base
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
        return 'tp-publisher-slider';
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
        return __('Publisher Slider', 'tpcore');
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
                'label' => esc_html__('Heading', 'aikeu-core')
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
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'section_pt_show',
            [
                'label' => esc_html__('Section pb-0?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'text_slider',
            [
                'label' => esc_html__('Content', 'aikeu-core'),
                'condition' => [
                    'aikeu_heading_content_style_selection' => 'style_one',
                ]
            ]
        );
        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("This Week Top Publisher", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_publisher_content_title',
            [
                'label' => esc_html__('Slider Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Alen sopon", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'aikeu_content_image',
            [
                'label' => esc_html__('Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'text_slide_repeater',
            [
                'label' => esc_html__('Publisher Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_publisher_content_title' => esc_html__('Alen sopon', 'aikeu-core'),
                    ],
                    [
                        'aikeu_publisher_content_title' => esc_html__('Jacob Jones', 'aikeu-core'),
                    ],
                    [
                        'aikeu_publisher_content_title' => esc_html__('Kathryn Murphy', 'aikeu-core'),
                    ],
                    [
                        'aikeu_publisher_content_title' => esc_html__('Courtney Henry', 'aikeu-core'),
                    ],
                    [
                        'aikeu_publisher_content_title' => esc_html__('Savannah Nguyen', 'aikeu-core'),
                    ],

                ],
                'title_field' => '{{{ aikeu_publisher_content_title }}}',
            ]
        );

        $this->end_controls_section();


        // ======================= Heading Style =================================//



        // Title 
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title', 'plugin-name'),
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


        // content Title 
        $this->start_controls_section(
            'pub_title_style',
            [
                'label' => esc_html__('Content Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'pub_title_style_typ',
                'selector' => '{{WRAPPER}} .pub_title',

            ]
        );

        $this->add_control(
            'pub_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pub_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pub_title_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pub_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pub_title_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pub_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                 * 17. publisher slider
                 * ======================================
                 */
                $(".publisher__slider")
                    .not(".slick-initialized")
                    .slick({
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 6000,
                        speed: 2000,
                        arrows: false,
                        dots: false,
                        pauseOnHover: true,
                        draggable: false,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 4,
                                },
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                },
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                },
                            },
                            {
                                breakpoint: 425,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                },
                            },
                        ],
                    });

            });
        </script>

        <?php if ($settings['aikeu_heading_content_style_selection'] == 'style_one') : ?>
            <!-- ==== publisher start ==== -->
            <section class="section publisher <?php echo ($settings['section_pt_show'] == 'yes') ? 'pb-0' : ''; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__header text-center">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation mt-12"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="publisher__slider">
                                <?php foreach ($settings['text_slide_repeater'] as $item) : ?>
                                    <div class="publisher__single">
                                        <?php if (!empty($item['aikeu_content_image']['url'])) : ?>
                                            <div class="thumb">
                                                <img src="<?php echo esc_url($item['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                            </div>
                                        <?php endif ?>
                                        <div class="content">
                                            <?php if (!empty($item['aikeu_publisher_content_title'])) :   ?>
                                                <h5 class="pub_title"><?php echo wp_kses($item['aikeu_publisher_content_title'], wp_kses_allowed_html('post'))  ?></h5>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <?php endif ?>

<?php

    }
}
$widgets_manager->register(new TP_publisher_slider());
