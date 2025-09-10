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
class TP_game extends Widget_Base
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
        return 'tp-game';
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
        return __('Game', 'tpcore');
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

        // section
        $this->start_controls_section(
            'aikeu_section_genaral',
            [
                'label' => esc_html__('Section', 'aikeu-core')
            ]
        );

        $this->add_control(
            'aikeu_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'aikeu-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();

        // Show/Hide Section
        $this->start_controls_section(
            'show_hide_general_content',
            [
                'label' => esc_html__('Show/Hide Settings', 'aikeu-core')
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
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'subtitle_reborn_show',
            [
                'label' => esc_html__('Hide Subtitle?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'button_hide',
            [
                'label' => esc_html__('Button Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->end_controls_section();


        // $this->end_controls_section();
        // content
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Heading Content', 'aikeu-core'),

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
                'default' => esc_html__('Upgrade Gaming', 'aikeu-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'aikeu-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Experience Next-level Gameplay Like Never Before", 'aikeu-core'),
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
                'default' => esc_html__("Our commitment to innovation and cutting-edge technology ensures that each gaming your preferences, creating personalized and unforgettable moments.", 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
            ]
        );

        $this->end_controls_section();

        // content
        $this->start_controls_section(
            'section_card_content',
            [
                'label' => esc_html__('Card Content', 'aikeu-core')
            ]
        );

        $this->add_control(
            'aikeu_cart_category',
            [
                'label' => esc_html__('Card Category', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Chatbot", 'aikeu-core'),
                'placeholder' => esc_html__('Type your card title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'aikeu_cart_title',
            [
                'label' => esc_html__('Card Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Chatbot", 'aikeu-core'),
                'placeholder' => esc_html__('Type your card title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'aikeu_cart_date_title',
            [
                'label' => esc_html__('Release Date Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'placeholder' => esc_html__('Type your Release Date here', 'aikeu-core'),
            ]
        );
        $this->add_control(
            'aikeu_cart_date',
            [
                'label' => esc_html__('Release Date', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'placeholder' => esc_html__('Type your Release Date here', 'aikeu-core'),
            ]
        );

        $this->add_control(
            'aikeu_cart_content_image',
            [
                'label' => esc_html__('Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Button text
        $this->add_control(
            'aikeu_card_content_button',
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
            'aikeu_card_content_button_url',
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

        // image 2

        $this->add_control(
            'aikeu_cart_content_image2',
            [
                'label' => esc_html__('Choose Image Two', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'aikeu_card_content_button_url2',
            [
                'label' => esc_html__('Image Two URL', 'aikeu-core'),
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

        // image 2
        $this->add_control(
            'aikeu_cart_content_image3',
            [
                'label' => esc_html__('Choose Image Three ', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'aikeu_card_content_button_url3',
            [
                'label' => esc_html__('Image Three URL', 'aikeu-core'),
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
            'aikeu_button_section_genaral',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'default' => esc_html__('View aAll', 'aikeu-core'),
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


        // Subtitle 
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six', 'style_seven', 'style_eight', 'style_nine', 'style_eleven']
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
                    '{{WRAPPER}} .cus_stitle' => 'color: {{VALUE}} !important;',
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
            'subtitle_border_radius',
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

        // Description
        $this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__('Description', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'description_style_typ',
                'selector' => '{{WRAPPER}} .pp',

            ]
        );

        $this->add_control(
            'description_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pp' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'description_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
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
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .pp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();


        // Card  
        $this->start_controls_section(
            'card_title_style',
            [
                'label' => esc_html__('Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Category Typography', 'plugin-name'),
                'name'     => 'card_cat_style_typ',
                'selector' => '{{WRAPPER}} .tag',

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'plugin-name'),
                'name'     => 'card_title_style_typ',
                'selector' => '{{WRAPPER}} .card_title',

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button Typography', 'plugin-name'),
                'name'     => 'card_btn_style_typ2',
                'selector' => '{{WRAPPER}} .cus_date_title',

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button Typography', 'plugin-name'),
                'name'     => 'card_btn_style_typ5',
                'selector' => '{{WRAPPER}} .cus_date',

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button Typography', 'plugin-name'),
                'name'     => 'card_btn_style_typ3',
                'selector' => '{{WRAPPER}} .cus_btn',

            ]
        );


        $this->add_control(
            'card_title_style_color',
            [
                'label'     => esc_html__('Category Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tag' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_title_style_color1',
            [
                'label'     => esc_html__('Title Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_title_style_color3',
            [
                'label'     => esc_html__('Date Title Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_date_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_title_style_color4',
            [
                'label'     => esc_html__('Date Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_date' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'card_title_style_color5',
            [
                'label'     => esc_html__(' Btn Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_title_style_color6',
            [
                'label'     => esc_html__(' border Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} hr' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_title_style_bgcolor',
            [
                'label'     => esc_html__('Card BG Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_card' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_button_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'card_title_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_title_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_four', 'style_five', 'style_six', 'style_seven', 'style_nine', 'style_ten', 'style_six_alt', 'style_seven_alt']
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


        <?php if ($settings['aikeu_content_style_selection'] == 'style_one') : ?>
            <section class="section  gaming <?php echo ($settings['section_pb_show'] == 'yes') ? 'pb-0' : '' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : '' ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__header--secondary">
                                <div class="row align-items-center justify-content-center gaper">
                                    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                                        <div class="section__header mb-0 text-center text-lg-start">
                                            <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
                                                <?php if ($settings['aikeu_subtitle_content_style'] == 'style_one') : ?>
                                                    <?php if (!empty($settings['aikeu_heading_content_subtitle'])) :   ?>
                                                        <span class="cus_stitle sub-title"><?php echo wp_kses($settings['aikeu_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></span>
                                                    <?php endif ?>
                                                <?php endif ?>
                                                <?php if ($settings['aikeu_subtitle_content_style'] == 'style_two') : ?>
                                                    <?php if (!empty($settings['aikeu_heading_content_subtitle'])) :   ?>
                                                        <span class="cus_stitle sub-title-two text-primary"><?php echo wp_kses($settings['aikeu_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></span>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php endif ?>
                                            <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                                <h2 class="cus_title title title-animation <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8 col-lg-6 col-xl-5 offset-xl-1">
                                        <div class="text-center text-lg-start">
                                            <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                                <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gaper fade-wrapper">
                        <div class="col-12 col-xl-6">
                            <div class="cus_card gaming__single-alt fade-top">
                                <div class="thumb">
                                    <?php if (!empty($settings['aikeu_cart_content_image']['url'])) : ?>
                                        <a href="<?php echo esc_html($settings['aikeu_card_content_button_url']['url']) ?>">
                                            <img src="<?php echo esc_url($settings['aikeu_cart_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                        </a>
                                    <?php endif ?>
                                </div>
                                <div class="content">
                                    <a href="<?php echo esc_html($settings['aikeu_card_content_button_url']['url']) ?>" class="tag">
                                        <?php echo esc_html($settings['aikeu_cart_category']) ?>
                                    </a>
                                    <h4>
                                        <a href="<?php echo esc_html($settings['aikeu_card_content_button_url']['url']) ?>" class="card_title">
                                            <?php echo esc_html($settings['aikeu_cart_title']) ?>
                                        </a>
                                    </h4>
                                    <div class="info">
                                        <p class="cus_date_title tertiary-text"> <?php echo esc_html($settings['aikeu_cart_date_title']) ?></p>
                                        <p class="cus_date text-white"> <?php echo esc_html($settings['aikeu_cart_date']) ?></p>
                                    </div>
                                    <hr />
                                    <div class="cta">
                                        <a href="<?php echo esc_html($settings['aikeu_card_content_button_url']['url']) ?>" class="cus_btn">
                                            <?php echo esc_html($settings['aikeu_card_content_button']) ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="cus_card gaming__single fade-top">
                                <div class="thumb">
                                    <?php if (!empty($settings['aikeu_cart_content_image2']['url'])) : ?>
                                        <a href="<?php echo esc_html($settings['aikeu_card_content_button_url2']['url']) ?>">
                                            <img src="<?php echo esc_url($settings['aikeu_cart_content_image2']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="cus_card gaming__single fade-top">
                                <div class="thumb">
                                    <?php if (!empty($settings['aikeu_cart_content_image3']['url'])) : ?>
                                        <a href="<?php echo esc_html($settings['aikeu_card_content_button_url3']['url']) ?>">
                                            <img src="<?php echo esc_url($settings['aikeu_cart_content_image3']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['button_hide'] == 'yes')) :   ?>
                        <div class="row">
                            <div class="col-12">
                                <!-- button -->
                                <?php if ($settings['aikeu_button_content_style'] == 'style_one') : ?>
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <div class="section__cta text-center">
                                            <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                                <?php if ($settings['aikeu_button_content_style'] == 'style_two') : ?>
                                    <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                        <div class="section__cta text-center">
                                            <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--secondary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </section>

            <!-- About Us end -->
        <?php endif; ?>
        <!-- ==== about section one start ==== -->


<?php
    }
}

$widgets_manager->register(new TP_game());
