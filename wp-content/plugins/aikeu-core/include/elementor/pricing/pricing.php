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
class TP_pricing extends Widget_Base
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
        return 'tp-pricing';
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
        return __('Pricing', 'tpcore');
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

        // about
        $this->start_controls_section(
            'aikeu_section_genaral',
            [
                'label' => esc_html__('Section Style', 'aikeu-core')
            ]
        );


        $this->add_control(
            'pricing_content_style_selection',
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

        $this->add_control(
            'section_pt_show',
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



        // content
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Header Content', 'aikeu-core'),

            ]
        );

        $this->add_responsive_control(
            'heading_content_align',
            [
                'label'         => esc_html__('Heading Text Align', 'aikeu-core'),
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
                    '{{WRAPPER}} .section__header' => 'text-align: {{VALUE}};',
                ],

            ]
        );
        $this->add_control(
            'aikeu_vector_image',
            [
                'label' => esc_html__('Choose Vector Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
            ]
        );

        $this->add_control(
            'aikeu_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Pricing', 'aikeu-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'aikeu-core'),
                'label_block' => true,
                'condition' => [
                    'pricing_content_style_selection' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Choose Your Best Plan', 'aikeu-core'),
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
                'default' => esc_html__('AI image generator tools have emerged as powerful resources for unleashing creative possibilities and transforming.', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
            ]
        );

        // Button text
        $this->add_control(
            'aikeu_content_button',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Monthly', 'aikeu-core'),
                'placeholder' => esc_html__('Type your button here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        // Button text
        $this->add_control(
            'aikeu_content_button2',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Annually', 'aikeu-core'),
                'placeholder' => esc_html__('Type your button here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        //pricing Section
        $this->start_controls_section(
            'pricing_card_section_genaral',
            [
                'label' => esc_html__('Card Button', 'aikeu-core')
            ]
        );

        // Button text
        $this->add_control(
            'pricing_content_button',
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
            'pricing_content_button_url',
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

        //pricing Section
        $this->start_controls_section(
            'pricing_section_genaral',
            [
                'label' => esc_html__('1st Card Content', 'aikeu-core')
            ]
        );



        $this->add_control(
            'first_card_pricing_content',
            [
                'label' => esc_html__('Card Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Free', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'first_card_pricing_content_description',
            [
                'label' => esc_html__('Short Description', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Explore a New Era of Intelligent and Immersive Gaming Adventures', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'condition' => [
                    'pricing_content_style_selection' => 'style_two',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'first_card_monthly_pricing_content',
            [
                'label' => esc_html__('Monthly Price', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$0.00', 'aikeu-core'),
                'placeholder' => esc_html__('Type your Monthly Price here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'first_card_yearly_pricing_content',
            [
                'label' => esc_html__('Yearly Price', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('$0.00', 'aikeu-core'),
                'placeholder' => esc_html__('Type your Yearly Price here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'first_card_pricing_list_title',
            [
                'label' => esc_html__('List Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("What's included", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'condition' => [
                    'pricing_content_style_selection' => 'style_two',
                ],
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // list content
        $repeater->add_control(
            'first_card_pricing_list',
            [
                'label' => esc_html__('List Content', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Increased image generation', 'aikeu-core'),
                'placeholder' => esc_html__('Type your list content here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'first_card_pricing_list_repeater',
            [
                'label' => esc_html__('pricing Card List', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'first_card_pricing_list' => esc_html__('Increased image generation', 'aikeu-core'),
                    ],
                    [
                        'first_card_pricing_list' => esc_html__('Access to a wider range', 'aikeu-core'),
                    ],
                    [
                        'first_card_pricing_list' => esc_html__('Basic customer support.', 'aikeu-core'),
                    ],
                    [
                        'first_card_pricing_list' => esc_html__('Affordable pricing', 'aikeu-core'),
                    ],
                ],
                'title_field' => '{{{ first_card_pricing_list }}}',
            ]
        );


        $this->end_controls_section();

        //pricing Section
        $this->start_controls_section(
            'pricing_section_genaral2',
            [
                'label' => esc_html__('2nd Card Content', 'aikeu-core')
            ]
        );



        $this->add_control(
            'second_card_pricing_content',
            [
                'label' => esc_html__('Card Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Standard', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'second_card_pricing_content_description',
            [
                'label' => esc_html__('Short Description', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Explore a New Era of Intelligent and Immersive Gaming Adventures', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'condition' => [
                    'pricing_content_style_selection' => 'style_two',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'second_card_monthly_pricing_content',
            [
                'label' => esc_html__('Monthly Price', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$9.99', 'aikeu-core'),
                'placeholder' => esc_html__('Type your Monthly Price here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'second_card_yearly_pricing_content',
            [
                'label' => esc_html__('Yearly Price', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('$30.00', 'aikeu-core'),
                'placeholder' => esc_html__('Type your Yearly Price here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'second_card_pricing_list_title',
            [
                'label' => esc_html__('List Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("What's included", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'condition' => [
                    'pricing_content_style_selection' => 'style_two',
                ],
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // list content
        $repeater->add_control(
            'second_card_pricing_list',
            [
                'label' => esc_html__('List Content', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Limited number of image', 'aikeu-core'),
                'placeholder' => esc_html__('Type your list content here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'second_card_pricing_list_repeater',
            [
                'label' => esc_html__('pricing Card List', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'second_card_pricing_list' => esc_html__('Limited number of image', 'aikeu-core'),
                    ],
                    [
                        'second_card_pricing_list' => esc_html__('Watermarked images.', 'aikeu-core'),
                    ],
                    [
                        'second_card_pricing_list' => esc_html__('Suitable for users', 'aikeu-core'),
                    ],
                    [
                        'second_card_pricing_list' => esc_html__('Suitable for users', 'aikeu-core'),
                    ],
                ],
                'title_field' => '{{{ second_card_pricing_list }}}',
            ]
        );


        $this->end_controls_section();

        //pricing Section
        $this->start_controls_section(
            'pricing_section_genaral3',
            [
                'label' => esc_html__('3rd Card Content', 'aikeu-core'),
                'condition' => [
                    'pricing_content_style_selection' => 'style_one',
                ]
            ]
        );
        $this->add_control(
            'third_card_pricing_content',
            [
                'label' => esc_html__('Card Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Premium', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'third_card_monthly_pricing_content',
            [
                'label' => esc_html__('Monthly Price', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$19.00', 'aikeu-core'),
                'placeholder' => esc_html__('Type your Monthly Price here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'third_card_yearly_pricing_content',
            [
                'label' => esc_html__('Yearly Price', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('$50.00', 'aikeu-core'),
                'placeholder' => esc_html__('Type your Yearly Price here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // list content
        $repeater->add_control(
            'third_card_pricing_list',
            [
                'label' => esc_html__('List Content', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Their specific needs', 'aikeu-core'),
                'placeholder' => esc_html__('Type your list content here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'third_card_pricing_list_repeater',
            [
                'label' => esc_html__('pricing Card List', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'third_card_pricing_list' => esc_html__('Their specific needs', 'aikeu-core'),
                    ],
                    [
                        'third_card_pricing_list' => esc_html__('Allows users to customize', 'aikeu-core'),
                    ],
                    [
                        'third_card_pricing_list' => esc_html__('Examples include', 'aikeu-core'),
                    ],
                    [
                        'third_card_pricing_list' => esc_html__('Their specific needs', 'aikeu-core'),
                    ],
                ],
                'title_field' => '{{{ third_card_pricing_list }}}',
            ]
        );


        $this->end_controls_section();


        // =======================  Style =================================//


        // Subtitle 
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'pricing_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'subtitle_style_typ',
                'selector' => '{{WRAPPER}} .cus_stitle',

            ]
        );

        $this->add_control(
            'subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_stitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_style_bgcolor',
            [
                'label'     => esc_html__('BG Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_stitle' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_subtitle_content_style' => 'style_one'
                ]
            ]
        );

        $this->add_responsive_control(
            'button_border_radius3',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_stitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'aikeu_subtitle_content_style' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'subtitle_border_style_bgcolor',
            [
                'label'     => esc_html__('Border Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title-two::before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_subtitle_content_style' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'sub_title_style_width',
            [
                'label' => esc_html__('Border Width', 'plugin-name'),
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
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sub-title-two' => '--width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'aikeu_subtitle_content_style' => 'style_two'
                ]
            ]
        );


        $this->add_responsive_control(
            'subtitle_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_stitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
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

        //  Category btn
        $this->start_controls_section(
            'category_style',
            [
                'label' => esc_html__('Category Btn', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'category_style_typ',
                'selector' => '{{WRAPPER}} .pricing .section__header .section__content-cta button',

            ]
        );

        $this->add_control(
            'category_style_color',
            [
                'label'     => esc_html__('Text Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'category_style_bg_color',
            [
                'label'     => esc_html__('BG Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_button_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_control(
            'category_style_color_active',
            [
                'label'     => esc_html__('Button Active Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta button.price-btn-active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'category_style_color_active_bg',
            [
                'label'     => esc_html__('Button Active BG', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta button.price-btn-active' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_button_border_radius_act',
            [
                'label'      => __('Active Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta button.price-btn-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'category_btn_style_padding',
            [
                'label'      => __('Button Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta button.price-btn-active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'category_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'category_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing .section__header .section__content-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // card bg
        $this->start_controls_section(
            'pricing_card_style',
            [
                'label' => esc_html__('Card', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'card_top_bgcolor',
            [
                'label'     => esc_html__('Card Divider color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing--secondary .pricing__content' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .pricing .divider' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'card_bgcolor',
            [
                'label'     => esc_html__('Card Background', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing__single' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .pricing__single',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'mf_input_label_box_shadow',
                'label' => esc_html__('Box Shadow', 'metform'),
                'selector' => '{{WRAPPER}} .pricing__single',
            ]
        );

        $this->add_responsive_control(
            'button_border_radius2',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing__single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'card_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pricing__single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pricing__single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        // Card Title 
        $this->start_controls_section(
            'pricing_card_title_style',
            [
                'label' => esc_html__('Card Title', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'pricing_card_title_style_typ',
                'selector' => '{{WRAPPER}} .card_title',

            ]
        );

        $this->add_control(
            'pricing_card_title_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pricing_card_title_style_color2',
            [
                'label'     => esc_html__('Second Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_title.two' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pricing_card_title_style_color3',
            [
                'label'     => esc_html__('Third Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_title.three' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'pricing_content_style_selection' => 'style_one',
                ]
            ]
        );

        $this->add_responsive_control(
            'pricing_card_title_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .card_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_card_title_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .card_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // pricing_content 
        $this->start_controls_section(
            'pricing_content_style',
            [
                'label' => esc_html__('Price Value', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'pricing_content_style_typ',
                'selector' => '{{WRAPPER}} .card_price',

            ]
        );

        $this->add_control(
            'pricing_content_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_content_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .card_price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_content_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .card_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        //    description_style
        $this->start_controls_section(
            'pricing_description_style',
            [
                'label' => esc_html__('Short Description', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'pricing_content_style_selection' => 'style_two',
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'pricing_description_style_typ',
                'selector' => '{{WRAPPER}} .card_det',

            ]
        );

        $this->add_control(
            'pricing_description_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_det' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_description_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .card_det' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_description_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .card_det' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //    list_title_style
        $this->start_controls_section(
            'pricing_listtitle_style',
            [
                'label' => esc_html__('List Title', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'pricing_content_style_selection' => 'style_two',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'pricing_listtitle_style_typ',
                'selector' => '{{WRAPPER}} .card_list h5',

            ]
        );

        $this->add_control(
            'pricing_listtitle_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_list h5' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_listtitle_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .card_list h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_listtitle_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .card_list h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // list content 
        $this->start_controls_section(
            'pricing_list_style',
            [
                'label' => esc_html__('List Content', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'pricing_list_style_typ',
                'selector' => '{{WRAPPER}} .card_list li',

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'pricing_list_icon_style_typ',
                'selector' => '{{WRAPPER}} .card_list li i',

            ]
        );

        $this->add_control(
            'pricing_list_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_list li i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .card_list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'space_between_widgets',
            [
                'label'     => esc_html__('Gap', 'aikeu-core'),
                'type'      => Controls_Manager::GAPS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw'],
                'selectors'  => [
                    '{{WRAPPER}} .card_list li' => 'gap: {{ROW}}{{UNIT}} {{COLUMN}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_list_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .card_list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pricing_list_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .card_list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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

        <!-- ==== pricing section One start ==== -->
        <?php if ($settings['pricing_content_style_selection'] == 'style_one') : ?>
            <section class="section pricing fade-wrapper <?php echo ($settings['section_pt_show'] == 'yes') ? 'pb-0' : ''; ?>" data-background="<?php echo esc_url($settings['aikeu_vector_image']['url']) ?>">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-7 col-xxl-6">
                            <div class="section__header text-center">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title mt-12 title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                                <div class="section__content-cta">
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <button aria-label="get monthly price" class="price-btn monthly-price price-btn-active"><?php echo esc_html($settings['aikeu_content_button']) ?></button>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_content_button2'])) : ?>
                                        <button aria-label="get annual price" class="price-btn yearly-price"><?php echo esc_html($settings['aikeu_content_button2']) ?></button>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start gaper">
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="pricing__single topy-tilt fade-top">
                                <div class="pricing__intro">
                                    <?php if (!empty($settings['first_card_pricing_content'])) : ?>
                                        <span class="card_title one primary-text"><?php echo esc_html($settings['first_card_pricing_content']) ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['first_card_monthly_pricing_content'])) : ?>
                                        <h2 class="card_price light-title monthly"><?php echo wp_kses($settings['first_card_monthly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['first_card_yearly_pricing_content'])) : ?>
                                        <h2 class="card_price light-title yearly"><?php echo wp_kses($settings['first_card_yearly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="divider"></div>
                                <div class="card_list pricing__content">
                                    <ul>
                                        <?php if (!empty($settings['first_card_pricing_list_repeater'])) : ?>
                                            <?php foreach ($settings['first_card_pricing_list_repeater'] as $item) : ?>
                                                <li>
                                                    <i class="material-symbols-outlined"> <?php echo esc_html('check_circle') ?> </i>
                                                    <?php echo !empty($item['first_card_pricing_list']) ? esc_html($item['first_card_pricing_list']) : ''; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if (!empty($settings['pricing_content_button'])) : ?>
                                    <div class="pricing__cta section__cta">
                                        <a href="<?php echo esc_html($settings['pricing_content_button_url']['url']) ?>" class="btn btn--secondary"><?php echo esc_html($settings['pricing_content_button']) ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="pricing__single pricing__single-active topy-tilt fade-top">
                                <div class="pricing__intro">
                                    <?php if (!empty($settings['second_card_pricing_content'])) : ?>
                                        <span class="card_title two primary-text"><?php echo esc_html($settings['second_card_pricing_content']) ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['second_card_monthly_pricing_content'])) : ?>
                                        <h2 class="card_price light-title monthly"><?php echo wp_kses($settings['second_card_monthly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['second_card_yearly_pricing_content'])) : ?>
                                        <h2 class="card_price light-title yearly"><?php echo wp_kses($settings['second_card_yearly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="divider"></div>
                                <div class="card_list pricing__content">
                                    <ul>
                                        <?php if (!empty($settings['second_card_pricing_list_repeater'])) : ?>
                                            <?php foreach ($settings['second_card_pricing_list_repeater'] as $item) : ?>
                                                <li>
                                                    <i class="material-symbols-outlined"><?php echo esc_html('check_circle') ?> </i>
                                                    <?php echo !empty($item['second_card_pricing_list']) ? esc_html($item['second_card_pricing_list']) : ''; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if (!empty($settings['pricing_content_button'])) : ?>
                                    <div class="pricing__cta section__cta">
                                        <a href="<?php echo esc_html($settings['pricing_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['pricing_content_button']) ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="pricing__single topy-tilt fade-top">
                                <div class="pricing__intro">
                                    <?php if (!empty($settings['third_card_pricing_content'])) : ?>
                                        <span class="card_title three primary-text"><?php echo esc_html($settings['third_card_pricing_content']) ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['third_card_monthly_pricing_content'])) : ?>
                                        <h2 class="card_price light-title monthly"><?php echo wp_kses($settings['third_card_monthly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['third_card_yearly_pricing_content'])) : ?>
                                        <h2 class="card_price light-title yearly"><?php echo wp_kses($settings['third_card_yearly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="divider"></div>
                                <div class="card_list pricing__content">
                                    <ul>
                                        <?php if (!empty($settings['third_card_pricing_list_repeater'])) : ?>
                                            <?php foreach ($settings['third_card_pricing_list_repeater'] as $item) : ?>
                                                <li>
                                                    <i class="material-symbols-outlined"> <?php echo esc_html('check_circle') ?> </i>
                                                    <?php echo !empty($item['third_card_pricing_list']) ? esc_html($item['third_card_pricing_list']) : ''; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php if (!empty($settings['pricing_content_button'])) : ?>
                                    <div class="pricing__cta section__cta">
                                        <a href="<?php echo esc_html($settings['pricing_content_button_url']['url']) ?>" class="btn btn--secondary"><?php echo esc_html($settings['pricing_content_button']) ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / pricing section One end ==== -->


        <!-- ==== pricing section Two start ==== -->
        <?php if ($settings['pricing_content_style_selection'] == 'style_two') : ?>
            <section class="section pricing pricing--secondary fade-wrapper <?php echo ($settings['section_pt_show'] == 'yes') ? 'pb-0' : ''; ?>">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-7 col-xxl-6">
                            <div class="section__header text-center">
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
                                    <h2 class="cus_title title  title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                                <div class="section__content-cta">
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <button aria-label="get monthly price" class="price-btn monthly-price price-btn-active"><?php echo esc_html($settings['aikeu_content_button']) ?></button>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_content_button2'])) : ?>
                                        <button aria-label="get annual price" class="price-btn yearly-price"><?php echo esc_html($settings['aikeu_content_button2']) ?></button>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start gaper">
                        <div class="col-12 col-md-6">
                            <div class="pricing__single topy-tilt fade-top">
                                <div class="pricing__intro">
                                    <?php if (!empty($settings['first_card_pricing_content'])) : ?>
                                        <span class="card_title one primary-text fw-5 stand"><?php echo esc_html($settings['first_card_pricing_content']) ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['first_card_pricing_content_description'])) :   ?>
                                        <p class="card_det tertiary-text"><?php echo wp_kses($settings['first_card_pricing_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                    <?php if (!empty($settings['first_card_monthly_pricing_content'])) : ?>
                                        <h2 class="card_price monthly"><?php echo wp_kses($settings['first_card_monthly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['first_card_yearly_pricing_content'])) : ?>
                                        <h2 class="card_price yearly"><?php echo wp_kses($settings['first_card_yearly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="card_list pricing__content ">
                                    <?php if (!empty($settings['first_card_pricing_list_title'])) : ?>
                                        <h5 class="fw-5 text-white"><?php echo wp_kses($settings['first_card_pricing_list_title'], wp_kses_allowed_html('post')) ?></h5>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if (!empty($settings['first_card_pricing_list_repeater'])) : ?>
                                            <?php foreach ($settings['first_card_pricing_list_repeater'] as $item) : ?>
                                                <li>
                                                    <i class="material-symbols-outlined"> <?php echo esc_html('check_circle') ?> </i>
                                                    <?php echo !empty($item['first_card_pricing_list']) ? esc_html($item['first_card_pricing_list']) : ''; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                    <?php if (!empty($settings['pricing_content_button'])) : ?>
                                        <div class="pricing__cta">
                                            <a href="<?php echo esc_html($settings['pricing_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['pricing_content_button']) ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="pricing__single topy-tilt fade-top">
                                <div class="pricing__intro">
                                    <?php if (!empty($settings['second_card_pricing_content'])) : ?>
                                        <span class="card_title two primary-text fw-5 premium"><?php echo esc_html($settings['second_card_pricing_content']) ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['second_card_pricing_content_description'])) :   ?>
                                        <p class="card_det tertiary-text"><?php echo wp_kses($settings['second_card_pricing_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                    <?php if (!empty($settings['second_card_monthly_pricing_content'])) : ?>
                                        <h2 class="card_price monthly"><?php echo wp_kses($settings['second_card_monthly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['second_card_yearly_pricing_content'])) : ?>
                                        <h2 class="card_price yearly"><?php echo wp_kses($settings['second_card_yearly_pricing_content'], wp_kses_allowed_html('post')) ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="card_list pricing__content">
                                    <?php if (!empty($settings['second_card_pricing_list_title'])) : ?>
                                        <h5 class="fw-5 text-white"><?php echo wp_kses($settings['second_card_pricing_list_title'], wp_kses_allowed_html('post')) ?></h5>
                                    <?php endif; ?>
                                    <ul>
                                        <?php if (!empty($settings['second_card_pricing_list_repeater'])) : ?>
                                            <?php foreach ($settings['second_card_pricing_list_repeater'] as $item) : ?>
                                                <li>
                                                    <i class="material-symbols-outlined"> <?php echo esc_html('check_circle') ?> </i>
                                                    <?php echo !empty($item['second_card_pricing_list']) ? esc_html($item['second_card_pricing_list']) : ''; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                    <?php if (!empty($settings['pricing_content_button'])) : ?>
                                        <div class="pricing__cta">
                                            <a href="<?php echo esc_html($settings['pricing_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['pricing_content_button']) ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== / pricing section Two end ==== -->
<?php
    }
}

$widgets_manager->register(new TP_pricing());
