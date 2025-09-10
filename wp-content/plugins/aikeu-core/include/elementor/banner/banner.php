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
class TP_banner extends Widget_Base
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
        return 'tp-banner';
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
        return __('banner', 'tpcore');
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

        // banner
        $this->start_controls_section(
            'aikeu_banner_section_genaral',
            [
                'label' => esc_html__('banner Section', 'aikeu-core')
            ]
        );

        $this->add_control(
            'aikeu_banner_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'aikeu-core'),
                    'style_two' => esc_html__('Style Two', 'aikeu-core'),
                    'style_three' => esc_html__('Style Three', 'aikeu-core'),
                    'style_four' => esc_html__('Style Four', 'aikeu-core'),
                    'style_five' => esc_html__('Style Five', 'aikeu-core'),
                    'style_six' => esc_html__('Style Six', 'aikeu-core'),
                    'style_seven' => esc_html__('Style About', 'aikeu-core'),
                    'style_eight' => esc_html__('Style Service', 'aikeu-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'banner_reborn_content2',
            [
                'label' => esc_html__('Reborn', 'aikeu-core'),
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_seven', 'style_eight']
                ]
            ]
        );
        $this->add_control(
            'bg_reborn_show',
            [
                'label' => esc_html__('BG Effect Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_seven', 'style_eight']
                ]
            ]
        );


        $this->add_control(
            'image_reborn_hide',
            [
                'label' => esc_html__('Hide Image?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_banner_content_style_selection' => 'style_eight'
                ]
            ]
        );

        $this->add_control(
            'scrolls_reborn_show',
            [
                'label' => esc_html__('Show Scroll Text Reborn?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_banner_content_style_selection' => 'style_seven'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'banner_one_reborn_content',
            [
                'label' => esc_html__('Reborn', 'aikeu-core'),
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_five', 'style_six']
                ]
            ]
        );


        $this->add_control(
            'one_reborn_show',
            [
                'label' => esc_html__('Reborn?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_one', 'style_three', 'style_five', 'style_six']
                ]
            ]
        );

        $this->add_control(
            'scroll_reborn_show',
            [
                'label' => esc_html__('Scroll Text Reborn?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_five', 'style_six']
                ]
            ]
        );
        $this->add_control(
            'text_slider_show',
            [
                'label' => esc_html__('Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_banner_content_style_selection' =>  'style_five',
                ]
            ]
        );
        $this->add_control(
            'text_bg_slider_show',
            [
                'label' => esc_html__('BG Text Slider', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_banner_content_style_selection' =>  'style_five',
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'banner_content_title',
            [
                'label' => esc_html__('Banner Content', 'aikeu-core'),
            ]
        );

        $this->add_control(
            'videolink',
            [
                'label' => esc_html__('Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'plugin-name'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'aikeu_banner_content_style_selection' => 'style_six'
                ]
            ]
        );

        $this->add_control(
            'aikeu_subtitle_content_style',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__('Select Subtitle Style', 'aikeu-core'),
                'options' => [
                    'style_one' => esc_html__('Style One', 'aikeu-core'),
                    'style_two' => esc_html__('Style Two', 'aikeu-core'),
                ],
                'default' => 'style_one',
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_seven', 'style_eight']
                ]
            ]
        );

        $this->add_control(
            'aikeu_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('AI Image', 'aikeu-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'aikeu-core'),
                'label_block' => true,
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_seven', 'style_eight']
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
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_two', 'style_six']
                ]
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
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_six']
                ]
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
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_two', 'style_three', 'style_five', 'style_six', 'style_eight']
                ]
            ]
        );

        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            'aikeu_button_section_genaral',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_two', 'style_six']
                ]
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

        $this->start_controls_section(
            'banner_content_large',
            [
                'label' => esc_html__('Banner Large Slider', 'aikeu-core'),
                'condition' => [
                    'aikeu_banner_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'aikeu_banner_large_slider_carousel',
            [
                'label' => esc_html__('Add Banner Large Slider', 'aikeu-core'),
                'type' => Controls_Manager::GALLERY,
                'default' => [],
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'banner_content_small',
            [
                'label' => esc_html__('Banner Small Slider', 'aikeu-core'),
                'condition' => [
                    'aikeu_banner_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->add_control(
            'aikeu_banner_small_slider_carousel',
            [
                'label' => esc_html__('Add Banner Small Slider', 'aikeu-core'),
                'type' => Controls_Manager::GALLERY,
                'default' => [],
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'banner_content_text',
            [
                'label' => esc_html__('Banner Text Slider', 'aikeu-core'),
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_one', 'style_five'],
                    'text_slider_show' =>  'yes',
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
                'default' => esc_html__('AI', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
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

        $repeater->add_control(
            'aikeu_banner_text_slider_carousel2',
            [
                'label' => esc_html__(' Add Banner Text Slider 2', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Image', 'aikeu-core'),
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
                        'aikeu_banner_text_slider_carousel2' => esc_html__('Image', 'aikeu-core'),
                    ],
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('AI', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('Image', 'aikeu-core'),
                    ],
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('AI', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('Image', 'aikeu-core'),
                    ],
                    [
                        'aikeu_banner_text_slider_carousel' => esc_html__('AI', 'aikeu-core'),
                        'aikeu_banner_text_slider_carousel2' => esc_html__('Image', 'aikeu-core'),
                    ],

                ],
                'title_field' => '{{{ aikeu_banner_text_slider_carousel }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'banner_content_text_bg',
            [
                'label' => esc_html__('Banner BG Text Slider', 'aikeu-core'),
                'condition' => [
                    'aikeu_banner_content_style_selection' => 'style_five',
                    'text_bg_slider_show' => 'yes',
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




        // ======================= Style =================================//

        // card 
        $this->start_controls_section(
            'card_style',
            [
                'label' => esc_html__('card', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_banner_content_style_selection' => 'style_five',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'card_style_typ',
                'selector' => '{{WRAPPER}} .banner-five',

            ]
        );

        $this->add_control(
            'card_style_color',
            [
                'label'     => esc_html__('BG Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-five' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_style_padding',
            [
                'label'      => __('Banner Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-five' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'card_text_bottom',
            [
                'label'      => __('Bottom Position', 'aikeu-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-five .b-five-wrapper' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

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

        //  Description
        $this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__('Description', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_two', 'style_six']
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

        //  BG Text Slider
        $this->start_controls_section(
            'bg_text_style',
            [
                'label' => esc_html__('BG Text Slider', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_banner_content_style_selection' => 'style_five',
                    'text_bg_slider_show' => 'yes',
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'bg_text_style_typ',
                'selector' => '{{WRAPPER}} .b-text-slider p',

            ]
        );

        $this->add_control(
            'bg_text_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .b-five-wrapper p.l-t' => '-webkit-text-stroke: 2px {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //  Banner Text Slider
        $this->start_controls_section(
            'banner_text_style',
            [
                'label' => esc_html__('Banner Text Slider', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_one', 'style_five'],
                    'text_slider_show' =>  'yes',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'banner_text_style_typ',
                'selector' => '{{WRAPPER}} .light-title',

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
                    '{{WRAPPER}} .text-slider-wrapper .text-slider .text-slider__single .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .text-slider-wrapper .text-slider .text-slider__single .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'banner_text_style_bg_color',
            [
                'label'     => esc_html__('Bg Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-slider-wrapper .text-slider::before' => 'background-color : {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'banner_text_style_bg_color_after',
            [
                'label'     => esc_html__('BG Color After', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-slider-wrapper::after' => 'background-color : {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'banner_text_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-slider-wrapper .text-slider a.text-stroke' => '-webkit-text-stroke: 2px {{VALUE}};',
                    '{{WRAPPER}} .text-slider-wrapper .text-slider .text-slider__single .icon path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .text-slider-wrapper .text-slider .text-stroke::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .text-slider-wrapper .text-slider a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


        // =======================Button Style===========================//

        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_banner_content_style_selection' => ['style_two', 'style_six']
                ]
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
        // end Style
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
                 * 03.  banner large image slider
                 * ======================================
                 */
                $(".banner__large-slider").not(".slick-initialized").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 0,
                    speed: 10000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    draggable: false,
                    variableWidth: true,
                    cssEase: "linear",
                });

                /**
                 * ======================================
                 * 04.  banner small image slider
                 * ======================================
                 */
                $(".banner__small-slider").not(".slick-initialized").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 0,
                    speed: 10000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    draggable: false,
                    variableWidth: true,
                    rtl: true,
                    cssEase: "linear",
                });


                /**
                 * ======================================
                 * 05. text slider
                 * ======================================
                 */

                $(".text-slider").not(".slick-initialized").slick({
                    slidesToShow: 1,
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




                /**
                 * ======================================
                 * 15. banner five text slider
                 * ======================================
                 */
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

                $(".b-text-slider-alt").not(".slick-initialized").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 0,
                    speed: 24000,
                    arrows: false,
                    dots: false,
                    pauseOnHover: false,
                    draggable: false,
                    variableWidth: true,
                    cssEase: "linear",
                    rtl: true,
                });

            });
        </script>

        <!-- Hero Section Start -->
        <?php if ($settings['aikeu_banner_content_style_selection'] == 'style_one') : ?>
            <!-- ==== banner start ==== -->
            <main>
                <section class="banner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-9 col-md-7 col-lg-7 col-xxl-7">
                                <div class="banner__content text-center">
                                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                        <h1 class="cus_title title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h1>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner__large-slider">
                        <?php foreach ($settings['aikeu_banner_large_slider_carousel'] as $item) : ?>
                            <?php if (!empty($item['url'])) :   ?>
                                <div class="banner__large-slider__single">
                                    <img src="<?php echo esc_url($item['url']) ?>" alt="<?php echo esc_attr('slider-img') ?>">
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div dir="rtl">
                        <div class="banner__small-slider">
                            <?php foreach ($settings['aikeu_banner_small_slider_carousel'] as $item) : ?>
                                <?php if (!empty($item['url'])) :   ?>
                                    <div class="banner__small-slider__single ">
                                        <img src="<?php echo esc_url($item['url']) ?>" alt="<?php echo esc_attr('slider-img') ?>">
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                        <div class="banner-thumb-one">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/banner-thumb-one.png" alt="<?php echo esc_attr('Image') ?>">
                        </div>
                    <?php endif ?>
                    <?php if (!empty($settings['scroll_reborn_show'] == 'yes')) :   ?>
                        <a class="scroll-position-btn" href="#scrollPosition">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/frame-one.png" alt="<?php echo esc_attr('Image') ?>">
                            <i class="bi bi-arrow-down"></i>
                        </a>
                    <?php endif ?>
                </section>
                <!-- ==== / banner end ==== -->
                <!-- ==== text slider start ==== -->
                <section class="text-slider-wrapper">
                    <div class="text-slider">
                        <?php foreach ($settings['text_slide_repeater'] as $item) : ?>
                            <div class="text-slider__single">
                                <h2 class="light-title"> <a href="<?php echo esc_html($item['aikeu_banner_text_slider_carousel_url']['url']) ?>"> <?php echo esc_html($item['aikeu_banner_text_slider_carousel']) ?> </a> </h2>
                                <?php if (!empty($item['aikeu_cont_card_icon'])) : ?>
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon($item['aikeu_cont_card_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                                <h2 class="light-title"> <a href="<?php echo esc_html($item['aikeu_banner_text_slider_carousel_url']['url']) ?>" class="text-stroke" data-text="<?php echo esc_html($item['aikeu_banner_text_slider_carousel2']) ?>"> <?php echo esc_html($item['aikeu_banner_text_slider_carousel2']) ?> </a> </h2>
                                <?php if (!empty($item['aikeu_cont_card_icon'])) : ?>
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon($item['aikeu_cont_card_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </section>
                <!-- ==== / text slider end ==== -->
            <?php endif; ?>
            <!-- ==== / banner section end ==== -->

            <!-- Hero Section Start -->
            <?php if ($settings['aikeu_banner_content_style_selection'] == 'style_two') : ?>
                <section class="banner-two">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-10 col-lg-6">
                                <div class="banner-two__content">
                                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                        <h1 class="cus_title title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h1>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                        <p class="xlr pp primary-text"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                    <!-- button -->
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
                    <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                        <div class="banner-two__thumb">
                            <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                        </div>
                    <?php endif ?>
                    <?php if (!empty($settings['scroll_reborn_show'] == 'yes')) :   ?>
                        <a class="scroll-position-btn" href="#scrollPosition">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/frame-three.png" alt="<?php echo esc_attr('Image') ?>">
                            <i class="bi bi-arrow-down"></i>
                        </a>
                    <?php endif ?>
                </section>
            <?php endif; ?>
            <?php if ($settings['aikeu_banner_content_style_selection'] == 'style_three') : ?>
                <section class="banner-three">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-7">
                                <div class="banner-three__content text-center">
                                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                        <h1 class="cus_title fw-7 title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h1>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                        <div class="banner-three__thumb">
                                            <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                        <div class="banner-t-s-thumb">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/banner-three-s-thumb.png" alt="<?php echo esc_attr('Image') ?>">
                        </div>
                    <?php endif ?>
                    <?php if (!empty($settings['scroll_reborn_show'] == 'yes')) :   ?>
                        <a class="scroll-position-btn" href="#scrollPosition">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/frame-one.png" alt="<?php echo esc_attr('Image') ?>">
                            <i class="bi bi-arrow-down"></i>
                        </a>
                    <?php endif ?>
                </section>
            <?php endif; ?>
            <?php if ($settings['aikeu_banner_content_style_selection'] == 'style_four') : ?>
                <!-- ==== banner start ==== -->
                <section class="banner-four">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-10 col-lg-12 col-xxl-10">
                                <div class="banner-four__content text-center">
                                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                        <h1 class="cus_title title-animation fw-7 text-white"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h1>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ==== / banner end ==== -->
            <?php endif; ?>
            <?php if ($settings['aikeu_banner_content_style_selection'] == 'style_five') : ?>
                <section class="banner-five">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="banner__five-content">
                                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                        <h1 class="cus_title title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h1>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                        <div class="banner-five__thumb text-center">
                                            <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['text_bg_slider_show'] == 'yes')) :   ?>
                        <div class="b-five-wrapper">
                            <div class="b-text-slider">
                                <?php foreach ($settings['hero_text_repeater'] as $item) : ?>
                                    <?php if (!empty($item['aikeu_hero_bg_text_slider'])) :   ?>
                                        <div class="single">
                                            <p class="l-t"><?php echo wp_kses($item['aikeu_hero_bg_text_slider'], wp_kses_allowed_html('post')) ?></p>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                            <div dir="rtl">
                                <div class="b-text-slider-alt">
                                    <?php foreach ($settings['hero_text_repeater'] as $item) : ?>
                                        <?php if (!empty($item['aikeu_hero_bg_text_slider'])) :   ?>
                                            <div class="single">
                                                <p class="l-t"><?php echo wp_kses($item['aikeu_hero_bg_text_slider'], wp_kses_allowed_html('post')) ?></p>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="b-text-slider">
                                <?php foreach ($settings['hero_text_repeater'] as $item) : ?>
                                    <?php if (!empty($item['aikeu_hero_bg_text_slider'])) :   ?>
                                        <div class="single">
                                            <p class="l-t"><?php echo wp_kses($item['aikeu_hero_bg_text_slider'], wp_kses_allowed_html('post')) ?></p>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                        <div class="b-f-s-thumb">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/banner-five-s-thumb.png" alt="<?php echo esc_attr('Image') ?>">
                        </div>
                    <?php endif ?>
                    <?php if (!empty($settings['scroll_reborn_show'] == 'yes')) :   ?>
                        <a class="scroll-position-btn" href="#scrollPosition">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/frame-one.png" alt="<?php echo esc_attr('Image') ?>">
                            <i class="bi bi-arrow-down"></i>
                        </a>
                    <?php endif ?>
                </section>
                <?php if (!empty($settings['text_slider_show'] == 'yes')) :   ?>
                    <!-- ==== text slider start ==== -->
                    <section class="text-slider-wrapper">
                        <div class="text-slider">
                            <?php foreach ($settings['text_slide_repeater'] as $item) : ?>
                                <div class="text-slider__single">
                                    <h2 class="light-title"> <a href="<?php echo esc_html($item['aikeu_banner_text_slider_carousel_url']['url']) ?>"> <?php echo esc_html($item['aikeu_banner_text_slider_carousel']) ?> </a> </h2>
                                    <?php if (!empty($item['aikeu_cont_card_icon'])) : ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($item['aikeu_cont_card_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <h2 class="light-title"> <a href="<?php echo esc_html($item['aikeu_banner_text_slider_carousel_url']['url']) ?>" class="text-stroke" data-text="<?php echo esc_html($item['aikeu_banner_text_slider_carousel2']) ?>"> <?php echo esc_html($item['aikeu_banner_text_slider_carousel2']) ?> </a> </h2>
                                    <?php if (!empty($item['aikeu_cont_card_icon'])) : ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($item['aikeu_cont_card_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </section>
                    <!-- ==== / text slider end ==== -->
                <?php endif ?>
            <?php endif; ?>
            <?php if ($settings['aikeu_banner_content_style_selection'] == 'style_six') : ?>
                <section class="banner-seven">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-9 col-xxl-7">
                                <div class="banner-seven__content">
                                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                        <h1 class="cus_title title-animation fw-9"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h1>
                                    <?php endif ?>
                                    <div class="banner-seven__group">
                                        <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                                            <?php if (!empty($settings['aikeu_content_vector_image']['url'])) : ?>
                                                <div class="thumb">
                                                    <img src="<?php echo esc_url($settings['aikeu_content_vector_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                                    <?php if (!empty($settings['videolink']['url'])) :   ?>
                                                        <a href="<?php echo esc_url($settings['videolink']['url']) ?>" target="_blank" class="video-btn">
                                                            <span class="material-symbols-outlined">
                                                                <?php echo esc_html('play_arrow') ?>
                                                            </span>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                            <?php endif ?>
                                        <?php endif ?>
                                        <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                            <div class="content">
                                                <p class="xlr pp primary-text"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <!-- button -->
                                    <?php if ($settings['aikeu_button_content_style'] == 'style_one') : ?>
                                        <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                            <div class="section__cta text-start">
                                                <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                            </div>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if ($settings['aikeu_button_content_style'] == 'style_two') : ?>
                                        <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                            <div class="section__cta text-start">
                                                <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--secondary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                            </div>
                                        <?php endif ?>
                                    <?php endif ?>
                                </div>
                                <?php if (!empty($settings['scroll_reborn_show'] == 'yes')) :   ?>
                                    <a class="scroll-position-btn" href="#scrollPosition">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/frame-one.png" alt="<?php echo esc_attr('Image') ?>">
                                        <i class="bi bi-arrow-down"></i>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                        <div class="banner-seven__thumb">
                            <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                        </div>
                    <?php endif ?>
                </section>
            <?php endif; ?>
            <?php if ($settings['aikeu_banner_content_style_selection'] == 'style_seven') : ?>
                <section class="about-banner <?php echo ($settings['bg_reborn_show'] == 'yes') ? '' : 'about' ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="about-banner__content section__content">
                                    <?php if ($settings['aikeu_subtitle_content_style'] == 'style_one') : ?>
                                        <?php if (!empty($settings['aikeu_heading_content_subtitle'])) :   ?>
                                            <span class="cus_stitle sub-title"><?php echo wp_kses($settings['aikeu_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if ($settings['aikeu_subtitle_content_style'] == 'style_two') : ?>
                                        <?php if (!empty($settings['aikeu_heading_content_subtitle'])) :   ?>
                                            <span class="cus_stitle sub-title-two"><?php echo wp_kses($settings['aikeu_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                        <h2 class="cus_title light-title title-animation fw-7 text-white"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['scrolls_reborn_show'] == 'yes')) :   ?>
                        <a class="scroll-position-btn" href="#scrollPosition">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/frame-one.png" alt="<?php echo esc_attr('Image') ?>">
                            <i class="bi bi-arrow-down"></i>
                        </a>
                    <?php endif ?>
                </section>
            <?php endif; ?>
            <?php if ($settings['aikeu_banner_content_style_selection'] == 'style_eight') : ?>
                <section class="service-banner <?php echo ($settings['bg_reborn_show'] == 'yes') ? '' : 'service' ?>">
                    <div class="container">
                        <div class="row gaper align-items-center">
                            <div class="col-12 <?php echo ($settings['image_reborn_hide'] == 'yes') ? '' : 'col-md-8' ?>">
                                <div class="service-banner__content section__content">
                                    <?php if ($settings['aikeu_subtitle_content_style'] == 'style_one') : ?>
                                        <?php if (!empty($settings['aikeu_heading_content_subtitle'])) :   ?>
                                            <span class="cus_stitle sub-title"><?php echo wp_kses($settings['aikeu_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if ($settings['aikeu_subtitle_content_style'] == 'style_two') : ?>
                                        <?php if (!empty($settings['aikeu_heading_content_subtitle'])) :   ?>
                                            <span class="cus_stitle sub-title-two"><?php echo wp_kses($settings['aikeu_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                        <h2 class="cus_title light-title title-animation fw-7 text-white"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif ?>
                                </div>
                            </div>
                            <?php if (empty($settings['image_reborn_hide'] == 'yes')) :   ?>
                                <div class="col-12 col-md-4 d-none d-md-block">
                                    <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                        <div class="service-banner__thumb parallax-img text-center">
                                            <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                        </div>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!--Hero Section End -->

    <?php
    }
}

$widgets_manager->register(new TP_banner());
