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
class TP_section_ai extends Widget_Base
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
        return 'tp-section_render';
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
        return __('Section Render', 'tpcore');
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
                    'style_one' => esc_html__('Style One(5:7)', 'aikeu-core'),
                    'style_two' => esc_html__('Style Two(7:4)', 'aikeu-core'),
                    'style_three' => esc_html__('Style Three(4:7)', 'aikeu-core'),
                    'style_four' => esc_html__('Style Four(4:6)', 'aikeu-core'),
                    'style_five' => esc_html__('Style Five(5:5)', 'aikeu-core'),
                    'style_six' => esc_html__('Style Six(5:6)', 'aikeu-core'),
                    'style_six_alt' => esc_html__('Style Subtitle(5:6)', 'aikeu-core'),
                    'style_seven' => esc_html__('Style Seven(6:5)', 'aikeu-core'),
                    'style_seven_alt' => esc_html__('Style Subtitle(6:5)', 'aikeu-core'),
                    'style_eight' => esc_html__('Style Eight(with card)', 'aikeu-core'),
                    'style_nine' => esc_html__('Style Nine(5:6 with)', 'aikeu-core'),
                    'style_ten' => esc_html__('Style Ten(6:6 Empowering)', 'aikeu-core'),
                    'style_eleven' => esc_html__('Style Eleven(5:6 Empowering)', 'aikeu-core'),
                ],
                'default' => 'style_one',
            ]
        );


        $this->add_control(
            'section_content_alt_show',
            [
                'label' => esc_html__('Section Alt', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_content_style_selection' => ['style_six_alt', 'style_seven_alt']
                ]
            ]
        );

        $this->add_control(
            'section_content_unset_show',
            [
                'label' => esc_html__('Img Unset?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_content_style_selection' => ['style_five', 'style_six_alt']
                ]
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
                'condition' => [
                    'aikeu_content_style_selection' => ['style_five', 'style_seven_alt', 'style_six_alt']
                ]
            ]
        );

        $this->add_control(
            'bg_reborn_show',
            [
                'label' => esc_html__('BG Effect?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_five',]
                ]
            ]
        );

        $this->add_control(
            'section_content_vector_show',
            [
                'label' => esc_html__('Vector Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_content_style_selection' => ['style_four', 'style_six']
                ]
            ]
        );

        $this->end_controls_section();

        // Reborn
        $this->start_controls_section(
            'aikeu_reborn_content',
            [
                'label' => esc_html__('Reborn', 'aikeu-core'),
                'condition' => [
                    'aikeu_content_style_selection' => 'style_one',
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

        $this->end_controls_section();


        // $this->end_controls_section();
        // content
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'aikeu-core'),

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
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six', 'style_seven', 'style_eight', 'style_nine', 'style_eleven',]
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
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six', 'style_seven', 'style_eight', 'style_nine', 'style_eleven']
                ]
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
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six', 'style_seven', 'style_eight', 'style_nine', 'style_eleven', 'style_six_alt', 'style_seven_alt']
                ]
            ]
        );

        $this->add_control(
            'aikeu_sub_title_vector',
            [
                'label' => esc_html__('Choose Subtitle Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'aikeu_content_style_selection' => ['style_six_alt', 'style_seven_alt']
                ]
            ]
        );

        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Crafting Tomorrow's Images With Artificial Intelligence", 'aikeu-core'),
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
            'aikeu_heading_content_img_title',
            [
                'label' => esc_html__('Image Box Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Gaming", 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_seven_alt', 'style_nine']
                ]
            ]
        );
        $this->add_control(
            'aikeu_heading_content_img_subtitle',
            [
                'label' => esc_html__('Image Box Subtitle', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('AR/VR', 'aikeu-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'aikeu-core'),
                'label_block' => true,
                'condition' => [
                    'aikeu_content_style_selection' => 'style_nine',
                ]
            ]
        );

        $this->end_controls_section();

        // content
        $this->start_controls_section(
            'section_card_content',
            [
                'label' => esc_html__('Card Content', 'aikeu-core'),
                'condition' => [
                    'aikeu_content_style_selection' => 'style_eight',
                ]
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
            'aikeu_cart_content_title',
            [
                'label' => esc_html__('Card Content', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Customization', 'aikeu-core'),
                'placeholder' => esc_html__('Type your card content here', 'aikeu-core'),
            ]
        );

        $this->add_control(
            'aikeu_cart_content_image',
            [
                'label' => esc_html__('Card Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'aikeu_cart_title2',
            [
                'label' => esc_html__('Card Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("Chatbot", 'aikeu-core'),
                'placeholder' => esc_html__('Type your card title here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'aikeu_cart_content_title2',
            [
                'label' => esc_html__('Card Content', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Customization', 'aikeu-core'),
                'placeholder' => esc_html__('Type your card content here', 'aikeu-core'),
            ]
        );

        $this->add_control(
            'aikeu_cart_content_image2',
            [
                'label' => esc_html__('Card Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Empowering Card
        $this->start_controls_section(
            'aikeu_empowering_section_genaral',
            [
                'label' => esc_html__('Empowering Card', 'aikeu-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'aikeu_content_style_selection' => 'style_ten'
                ]
            ]
        );
        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_empow_title',
            [
                'label' => esc_html__('Empowering Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Active User', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'aikeu_empow_des',
            [
                'label' => esc_html__('Empowering Description', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Develop an AI system that generates realistic and high-quality images based on given input or descriptions', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'card_repeater',
            [
                'label' => esc_html__('Empowering Card', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_empow_title' => esc_html__('AI Prompt', 'aikeu-core'),
                    ],
                    [
                        'aikeu_empow_title' => esc_html__('Image Generated', 'aikeu-core'),
                    ],
                    [
                        'aikeu_empow_title' => esc_html__('AI News', 'aikeu-core'),
                    ],
                ],
                'title_field' => '{{{ aikeu_empow_title }}}',
            ]
        );


        $this->end_controls_section();


        // Overview Card
        $this->start_controls_section(
            'aikeu_over_section_genaral',
            [
                'label' => esc_html__('Overview Card', 'aikeu-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'aikeu_content_style_selection' => 'style_eleven'
                ]
            ]
        );
        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aikeu_card__over_image',
            [
                'label' => esc_html__('Card Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $repeater->add_control(
            'aikeu_over_title',
            [
                'label' => esc_html__('Card Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'rows' => 10,
                'default' => esc_html__('Smooth AI Tools', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'aikeu_over_des',
            [
                'label' => esc_html__('Card Description', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('Deep Dream is a mesmerizing AI image generator that generates.', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'card_over_repeater',
            [
                'label' => esc_html__('Overview Card', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'aikeu_over_title' => esc_html__('Smooth AI Tools', 'aikeu-core'),
                        'aikeu_over_des' => esc_html__('Deep Dream is a mesmerizing AI image generator that generates.', 'aikeu-core'),
                    ],
                    [
                        'aikeu_over_title' => esc_html__('Image Generator', 'aikeu-core'),
                        'aikeu_over_des' => esc_html__('Deep Dream is a mesmerizing AI image generator that generates.', 'aikeu-core'),
                    ],
                    [
                        'aikeu_over_title' => esc_html__('Online Editing', 'aikeu-core'),
                        'aikeu_over_des' => esc_html__('Deep Dream is a mesmerizing AI image generator that generates.', 'aikeu-core'),
                    ],
                    [
                        'aikeu_over_title' => esc_html__('Use All Place', 'aikeu-core'),
                        'aikeu_over_des' => esc_html__('Deep Dream is a mesmerizing AI image generator that generates.', 'aikeu-core'),
                    ],
                ],
                'title_field' => '{{{ aikeu_over_title }}}',
            ]
        );


        $this->end_controls_section();



        $this->start_controls_section(
            'aikeu_button_section_genaral',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_four', 'style_five', 'style_six', 'style_six_alt', 'style_seven', 'style_nine', 'style_seven_alt', 'style_ten']
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


        // Card Title 
        $this->start_controls_section(
            'card_title_style',
            [
                'label' => esc_html__('Card Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_seven_alt']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'card_title_style_typ',
                'selector' => '{{WRAPPER}} .card_title',

            ]
        );

        $this->add_control(
            'card_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_title_style_bgcolor',
            [
                'label'     => esc_html__('BG Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h-u-t-content' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .h-u-t-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} .card_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .card_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Card Title 
        $this->start_controls_section(
            'card_title_style2',
            [
                'label' => esc_html__('Card Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_eight', 'style_nine', 'style_ten', 'style_eleven']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'card_title_style_typ2',
                'selector' => '{{WRAPPER}} .card_title',

            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Sub Text Typography', 'plugin-name'),
                'name'     => 'card_title_style_typ3',
                'selector' => '{{WRAPPER}} .card_content',
            ]
        );

        $this->add_control(
            'card_title_style_color2',
            [
                'label'     => esc_html__('Title Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_title' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'card_des_style_color',
            [
                'label'     => esc_html__('Sub Text Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_content' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => ['style_eight', 'style_ten']
                ]
            ]
        );

        $this->add_control(
            'card_hover_style_color2',
            [
                'label'     => esc_html__('Title Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_card:hover .card_title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_eleven'
                ]
            ]
        );

        $this->add_control(
            'card_deshover_style_color',
            [
                'label'     => esc_html__('Sub Text Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_card:hover .card_content' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_eleven'
                ]
            ]
        );

        $this->add_control(
            'card_des_style_color2',
            [
                'label'     => esc_html__('Sub Text Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_content' => '-webkit-text-stroke: 2px {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_nine'
                ]
            ]
        );

        $this->add_control(
            'card_button_style_color',
            [
                'label'     => esc_html__('Button Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h-empower .h-empower-single button' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_ten'
                ]
            ]
        );
        $this->add_control(
            'card_button_style_activecolor',
            [
                'label'     => esc_html__('Button Icon Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .o-accordion > span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_ten'
                ]
            ]
        );
        $this->add_control(
            'card_button_style_activecolor2',
            [
                'label'     => esc_html__('Button Active Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h-empower .h-empower-single-active button' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_ten'
                ]
            ]
        );
        $this->add_control(
            'card_button_style_activecolorfilter',
            [
                'label'     => esc_html__('Button Active Filter Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h-empower .h-empower-single-active button' => 'filter: drop-shadow(0px 4px 23px {{VALUE}});',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_ten'
                ]
            ]
        );


        $this->add_control(
            'card_title_style_bgcolor2',
            [
                'label'     => esc_html__('BG Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_card' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_title_hover_style_bgcolor2',
            [
                'label'     => esc_html__('BG Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overview .overview__single:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .overview .overview__single::before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_eleven'
                ]
            ]
        );


        $this->add_control(
            'card_border_style_color2',
            [
                'label'     => esc_html__('Border Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .h-empower .h-empower-single' => 'border-color:  {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_ten'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .cus_card',
                'condition' => [
                    'aikeu_content_style_selection' => ['style_eight', 'style_eleven']
                ]
            ]
        );


        $this->add_responsive_control(
            'card_title_style_margin2',
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
            'card_title_style_padding2',
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
            .s-thumb img {
                max-width: 250px;
            }
        </style>

        <!-- ==== about section one start ==== -->
        <?php if ($settings['aikeu_content_style_selection'] == 'style_one') : ?>
            <!-- section ai -->
            <section class="section craft <?php echo ($settings['bg_reborn_show'] == 'yes') ? '' : 'craft-alt'; ?> ">
                <div class="container">
                    <div class="row align-items-center gaper">
                        <div class="col-12 col-lg-6 col-xxl-5">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
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
                        <div class="col-12 col-lg-6 col-xxl-7">
                            <div class="craft__thumb text-start text-lg-end">
                                <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                    <div class="reveal-img parallax-img ">
                                        <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                    <div class="anime-one">
                        <img src="<?php echo esc_url($settings['aikeu_vector_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                    </div>
                <?php endif ?>
            </section>

            <!-- About Us end -->
        <?php endif; ?>
        <!-- ==== about section one start ==== -->


        <!-- ==== section two start ==== -->
        <?php if ($settings['aikeu_content_style_selection'] == 'style_two') : ?>
            <!-- section Future -->
            <section class="section tools pb-0">
                <div class="container">
                    <div class="row gaper align-items-center">
                        <div class="col-12 col-lg-7">
                            <div class="tools__thumb dir-rtl">
                                <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                    <div class="reveal-img parallax-img ">
                                        <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 col-xxl-4 offset-xxl-1 order-first order-lg-last">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation  <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- ==== about section two End ==== -->


        <!-- ==== about section three start ==== -->
        <?php if ($settings['aikeu_content_style_selection'] == 'style_three') : ?>
            <section class="section gen pb-0">
                <div class="container">
                    <div class="row align-items-center gaper">
                        <div class="col-12 col-lg-5 col-xxl-4">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-xxl-7 offset-xxl-1">
                            <div class="gen__thumb">
                                <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                    <div class="reveal-img parallax-img ">
                                        <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_four') : ?>
            <section class="section unlock pb-0">
                <div class="container">
                    <div class="row align-items-center gaper">
                        <div class="col-12 col-lg-5 col-xxl-4">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation  <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
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
                        <div class="col-12 col-lg-6 offset-lg-1 col-xxl-6 offset-xxl-2">
                            <div class="text-start text-lg-end <?php echo ($settings['section_content_vector_show'] == 'yes') ? '' : 'unlock__thumb'; ?> ">
                                <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                    <div class="reveal-img parallax-img">
                                        <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_five') : ?>
            <section class="section gen-two <?php echo ($settings['section_pt_show']) ? 'pb-0' : '' ?> <?php echo ($settings['bg_reborn_show'] == 'yes') ? 'easy' : ''; ?>">
                <div class="container">
                    <div class="row align-items-center gaper justify-content-between">
                        <div class="col-12 col-lg-6 col-xxl-5 order-last order-lg-first">
                            <div class="gen-two__thumb me-lg-5 me-xxl-0">
                                <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                    <div class="reveal-img parallax-img <?php echo ($settings['section_content_unset_show'] == 'yes') ? 'dir-rtl d-block' : ''; ?>">
                                        <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>" class="<?php echo ($settings['section_content_unset_show'] == 'yes') ? 'unset' : ''; ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xxl-5">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation  <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
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
            </section>
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_six') : ?>
            <section class="section pb-0 <?php echo ($settings['section_content_vector_show'] == 'yes') ? '' : 'gen'; ?>" id="scrollPosition">
                <div class="container">
                    <div class="row align-items-center gaper">
                        <div class="col-12 col-lg-5 col-xxl-5">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
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
                        <div class="col-12 col-lg-7 col-xxl-6 offset-xxl-1">
                            <div class="gen__thumb">
                                <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                    <div class="reveal-img parallax-img">
                                        <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_six_alt') : ?>

            <section class="section n-level <?php echo ($settings['section_pt_show']) ? 'pb-0' : '' ?>" id="scrollPosition">
                <div class="container">
                    <div class="row gaper align-items-center justify-content-between">
                        <div class="col-12 col-lg-5  <?php echo ($settings['section_content_alt_show'] == 'yes') ? 'order-2' : ''; ?>">
                            <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                <div class="n-level__thumb reveal-img parallax-img <?php echo ($settings['section_content_unset_show'] == 'yes') ? 'dir-rtl d-block' : ''; ?> <?php echo ($settings['section_content_alt_show'] == 'yes') ? 'dir-ltr' : ''; ?>">
                                    <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>" class="<?php echo ($settings['section_content_unset_show'] == 'yes') ? 'unset' : ''; ?>">
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="n-level__content section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
                                    <?php if (!empty($settings['aikeu_sub_title_vector']['url'])) : ?>
                                        <div class="s-thumb">
                                            <img src="<?php echo esc_url($settings['aikeu_sub_title_vector']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>

                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation  <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"> <?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
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
            </section>
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_seven') : ?>
            <!-- ==== easy two start ==== -->
            <section class="section easy-two position-relative">
                <div class="container">
                    <div class="row gaper align-items-center">
                        <div class="col-12 col-lg-6 col-xl-6">
                            <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                <div class="easy__thumb reveal-img parallax-img">
                                    <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
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
            </section>
            <!-- ==== / easy two end ==== -->
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_seven_alt') : ?>
            <!-- ==== easy two start ==== -->
            <section class="section h-unlock <?php echo ($settings['section_pt_show']) ? 'pb-0' : '' ?>">
                <div class="container">
                    <div class="row gaper align-items-center justify-content-between">
                        <div class="col-12 col-lg-6 <?php echo ($settings['section_content_alt_show'] == 'yes') ? 'order-2' : ''; ?>">
                            <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                <div class="h-unlock__thumb reveal-img parallax-img">
                                    <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    <div class="h-u-t-content">
                                        <?php if (!empty($settings['aikeu_heading_content_img_title'])) :   ?>
                                            <h2 class="card_title"><?php echo wp_kses($settings['aikeu_heading_content_img_title'], wp_kses_allowed_html('post'))  ?></h2>
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
                                    <?php if (!empty($settings['aikeu_sub_title_vector']['url'])) : ?>
                                        <div class="s-thumb">
                                            <img src="<?php echo esc_url($settings['aikeu_sub_title_vector']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>

                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
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
            </section>
            <!-- ==== / easy two end ==== -->
        <?php endif; ?>
        <?php if ($settings['aikeu_content_style_selection'] == 'style_eight') : ?>
            <section class="section easy easy--secondary position-relative">
                <div class="container">
                    <div class="row gaper align-items-center">
                        <div class="col-12 col-lg-6 col-xl-5">
                            <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                <div class="easy__thumb dir-rtl reveal-img d-block parallax-img">
                                    <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-6 offset-xl-1">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                                <div class="section__content-cta">
                                    <div class="easy__cta">
                                        <div class="cus_card easy__cta-single" data-background="<?php echo get_template_directory_uri() ?>/assets/images/r-line.png">
                                            <div class="content">
                                                <?php if (!empty($settings['aikeu_cart_title'])) :   ?>
                                                    <h4 class="card_title"><?php echo wp_kses($settings['aikeu_cart_title'], wp_kses_allowed_html('post'))  ?></h4>
                                                <?php endif ?>
                                                <?php if (!empty($settings['aikeu_cart_content_title'])) :   ?>
                                                    <p class="card_content"><?php echo wp_kses($settings['aikeu_cart_content_title'], wp_kses_allowed_html('post'))  ?></p>
                                                <?php endif ?>
                                            </div>
                                            <?php if (!empty($settings['aikeu_cart_content_image']['url'])) : ?>
                                                <div class="thumb">
                                                    <img src="<?php echo esc_url($settings['aikeu_cart_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <div class="cus_card easy__cta-single easy__cta-single-alt">
                                            <div class="thumber">
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/wave.png" alt="<?php echo esc_attr('Vector') ?>">
                                            </div>
                                            <div class="content">
                                                <?php if (!empty($settings['aikeu_cart_title2'])) :  ?>
                                                    <h4 class="card_title"><?php echo wp_kses($settings['aikeu_cart_title2'], wp_kses_allowed_html('post'))  ?></h4>
                                                <?php endif ?>
                                                <?php if (!empty($settings['aikeu_cart_content_title2'])) :  ?>
                                                    <p class="card_content"><?php echo wp_kses($settings['aikeu_cart_content_title2'], wp_kses_allowed_html('post'))  ?></p>
                                                <?php endif ?>
                                            </div>
                                            <?php if (!empty($settings['aikeu_cart_content_image2']['url'])) : ?>
                                                <div class="thumb">
                                                    <img src="<?php echo esc_url($settings['aikeu_cart_content_image2']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($settings['aikeu_content_style_selection'] == 'style_nine') : ?>
            <section class="section empower fade-wrapper">
                <div class="container">
                    <div class="row align-items-center gaper">
                        <div class="col-12 col-lg-6 col-xl-5">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) : ?>
                                    <?php if ($settings['aikeu_subtitle_content_style'] == 'style_one') : ?>
                                        <?php if (!empty($settings['aikeu_heading_content_subtitle'])) :   ?>
                                            <span class="cus_stitle sub-title text-primary"><?php echo wp_kses($settings['aikeu_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                    <?php if ($settings['aikeu_subtitle_content_style'] == 'style_two') : ?>
                                        <?php if (!empty($settings['aikeu_heading_content_subtitle'])) :   ?>
                                            <span class="cus_stitle sub-title-two text-primary"><?php echo wp_kses($settings['aikeu_heading_content_subtitle'], wp_kses_allowed_html('post'))  ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation  <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
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
                        <div class="col-12 col-lg-6 col-xl-6 offset-xl-1">
                            <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                <div class="empower__thumb fade-top">
                                    <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    <div class="cus_card content-wrapper">
                                        <div class="content text-center text-xl-end">
                                            <?php if (!empty($settings['aikeu_heading_content_img_title'])) :   ?>
                                                <span class="light-title card_title"><?php echo wp_kses($settings['aikeu_heading_content_img_title'], wp_kses_allowed_html('post'))  ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($settings['aikeu_heading_content_img_subtitle'])) :   ?>
                                                <h2 class="card_content img_subtitle"><?php echo wp_kses($settings['aikeu_heading_content_img_subtitle'], wp_kses_allowed_html('post'))  ?></h2>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($settings['aikeu_content_style_selection'] == 'style_ten') : ?>
            <!-- ==== empower start ==== -->
            <section class="section h-empower fade-wrapper">
                <div class="container">
                    <div class="row gaper align-items-center">
                        <div class="col-12 col-lg-6">
                            <?php if (!empty($settings['aikeu_content_image']['url'])) : ?>
                                <div class="h-empower__thumb reveal-img parallax-img">
                                    <img src="<?php echo esc_url($settings['aikeu_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="section__content">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation mt-12"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                                <div class="h-empower-accordion">
                                    <?php foreach ($settings['card_repeater'] as $item) : ?>
                                        <div class="h-empower-single fade-top">
                                            <div class="lefter">
                                                <?php if (!empty($item['aikeu_empow_title'])) :   ?>
                                                    <h3 class="card_title"><?php echo wp_kses($item['aikeu_empow_title'], wp_kses_allowed_html('post'))  ?></h3>
                                                <?php endif ?>
                                                <?php if (!empty($item['aikeu_empow_des'])) :   ?>
                                                    <p class="card_content sho-item"><?php echo wp_kses($item['aikeu_empow_des'], wp_kses_allowed_html('post'))  ?></p>
                                                <?php endif ?>
                                            </div>
                                            <div class="thumb">
                                                <button class="o-accordion">
                                                    <span class="material-symbols-outlined">
                                                        <?php echo esc_html('north_east') ?>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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
                        </div>
                    </div>
                </div>
            </section>
            <!-- ==== / empower end ==== -->
        <?php endif; ?>
        <?php if ($settings['aikeu_content_style_selection'] == 'style_eleven') : ?>
            <!-- ==== overview start ==== -->
            <section class="section overview lilu-view">
                <div class="container">
                    <div class="row gaper align-items-center">
                        <div class="col-12 col-lg-5 col-xxl-5">
                            <div class="section__content">
                                <?php if (!empty($settings['subtitle_reborn_show'] == 'yes')) :   ?>
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
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation  <?php echo ($settings['subtitle_reborn_show'] == 'yes') ? '' : 'mt-12'; ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-xxl-6 offset-xxl-1 fade-wrapper">
                            <div class="row gaper">
                                <?php foreach ($settings['card_over_repeater'] as $item) : ?>
                                    <div class="col-12 col-md-6 fade-top">
                                        <div class="cus_card overview__single">
                                            <?php if (!empty($item['aikeu_card__over_image']['url'])) : ?>
                                                <div class="overview__thumb">
                                                    <img src="<?php echo esc_url($item['aikeu_card__over_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                                </div>
                                            <?php endif ?>
                                            <div class="overview__content">
                                                <?php if (!empty($item['aikeu_over_title'])) :   ?>
                                                    <h4 class="card_title title title-animation"><?php echo wp_kses($item['aikeu_over_title'], wp_kses_allowed_html('post'))  ?></h4>
                                                <?php endif ?>
                                                <?php if (!empty($item['aikeu_over_des'])) :   ?>
                                                    <p class="card_content tertiary-text"><?php echo wp_kses($item['aikeu_over_des'], wp_kses_allowed_html('post'))  ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ==== / overview end ==== -->
        <?php endif; ?>
        <!-- ==== about section three start ==== -->
<?php
    }
}

$widgets_manager->register(new TP_section_ai());
