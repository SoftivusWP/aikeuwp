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
class TP_services extends Widget_Base
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
        return 'tp-services';
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
        return __('services', 'tpcore');
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

    public function get_post_list_by_post_type($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => -1,
            'post_status'      => 'publish',
        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[get_the_ID()] = get_the_title();
        }
        wp_reset_query();
        return $return_val;
    }

    public function get_all_post_key($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => 6,
            'post_status'      => 'publish',

        );
        $all_post   = new \WP_Query($args);

        while ($all_post->have_posts()) {
            $all_post->the_post();
            $return_val[] = get_the_ID();
        }
        wp_reset_query();
        return $return_val;
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



        $this->start_controls_section(
            'services_general_content',
            [
                'label' => esc_html__('General', 'aikeu-core')
            ]
        );
        $this->add_control(
            'aikeu_content_style_selection',
            [
                'label'   => esc_html__('Select Style', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'aikeu-core'),
                    'style_two' => esc_html__('Style Two', 'aikeu-core'),
                    'style_three' => esc_html__('Style Three', 'aikeu-core'),
                    'style_four' => esc_html__('Style Four', 'aikeu-core'),
                    'style_five' => esc_html__('Style Five', 'aikeu-core'),
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
                'condition' => [
                    'aikeu_content_style_selection' => ['style_four', 'style_five']
                ]
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
                'condition' => [
                    'aikeu_content_style_selection' => ['style_four', 'style_five']
                ]
            ]
        );
        $this->add_control(
            'section_heading_show',
            [
                'label' => esc_html__('Section Heading Show?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_content_style_selection' => 'style_four'
                ]
            ]
        );
        $this->add_control(
            'card_button_show',
            [
                'label' => esc_html__('Card Button Show?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->end_controls_section();


        // Posts Per Page Show
        $this->start_controls_section(
            'services_one_general_content',
            [
                'label' => esc_html__('Posts Per Page Show', 'aikeu-core')
            ]
        );


        $this->add_control(
            'services_category',
            [
                'label' => __('Select services', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('services'),
                'default'     => $this->get_all_post_key('services'),
            ]
        );


        $this->add_control(
            'services_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'services_template_order_by',
            [
                'label'   => esc_html__('Order By', 'corelaw-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'corelaw-core'),
                    'author'     => esc_html__('Post Author', 'corelaw-core'),
                    'title'      => esc_html__('Title', 'corelaw-core'),
                    'post_date'  => esc_html__('Date', 'corelaw-core'),
                    'rand'       => esc_html__('Random', 'corelaw-core'),
                    'menu_order' => esc_html__('Menu Order', 'corelaw-core'),
                ],
            ]
        );
        $this->add_control(
            'services_template_order',
            [
                'label'   => esc_html__('Order', 'corelaw-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'corelaw-core'),
                    'desc' => esc_html__('Descending', 'corelaw-core')
                ],
                'default' => 'desc',
            ]
        );

        $this->end_controls_section();


        // Heading
        $this->start_controls_section(
            'services_three_heading_general_content',
            [
                'label' => esc_html__('Heading', 'aikeu-core'),
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four'],
                ]
            ]
        );

        $this->add_responsive_control(
            'aikeu_heading_content_align',
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
                    '{{WRAPPER}} .section__header' => 'text-align: {{VALUE}} !important;',
                    '{{WRAPPER}} .container > .row.justify-content-center' => 'justify-content: {{VALUE}} !important;',
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
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_four']
                ]
            ]
        );

        $this->add_control(
            'aikeu_heading_content_subtitle',
            [
                'label' => esc_html__('Subtitle', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Ai Gaming', 'aikeu-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'aikeu-core'),
                'label_block' => true,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_four']
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
                    'aikeu_content_style_selection' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Revolutionizing Gaming With Artificial Intelligence', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four']
                ]
            ]
        );
        $this->add_control(
            'aikeu_heading_content_description',
            [
                'label' => esc_html__('Short Description', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('AI image generation tools have emerged as powerful resources in the realm of digital art and design. These cutting-edge tools.', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'condition' => [
                    'aikeu_content_style_selection' => 'style_four'
                ]
            ]
        );

        $this->end_controls_section();





        // ======================= Heading Style =================================//

        // // Section 
        // $this->start_controls_section(
        //     'box_style',
        //     [
        //         'label' => esc_html__('Section Area', 'plugin-name'),
        //         'tab'   => Controls_Manager::TAB_STYLE,

        //     ]
        // );

        // $this->add_control(
        //     'box_style_color',
        //     [
        //         'label'     => esc_html__('Background', 'plugin-name'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .box_area' => 'background: {{VALUE}};',
        //         ],
        //     ]
        // );

        // $this->add_responsive_control(
        //     'box_style_margin',
        //     [
        //         'label' => esc_html__('Margin', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%', 'em'],
        //         'selectors' => [
        //             '{{WRAPPER}} .box_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // $this->add_responsive_control(
        //     'box_style_padding',
        //     [
        //         'label'      => __('Padding', 'plugin-name'),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%'],
        //         'selectors'  => [
        //             '{{WRAPPER}} .box_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         ]
        //     ]
        // );

        // $this->end_controls_section();


        // Subtitle 
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => 'style_one',
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
            'button_border_radius',
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
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three']
                ]
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

        // Card Title 
        $this->start_controls_section(
            'card_title_style',
            [
                'label' => esc_html__('Card Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                // 'condition' => [
                //     'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three']
                // ]
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

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Number Typography', 'plugin-name'),
                'name'     => 'card_nub_title_style_typ',
                'selector' => '{{WRAPPER}} .thumb p',
                'condition' => [
                    'aikeu_content_style_selection' => 'style_two',
                ]
            ]
        );

        $this->add_control(
            'card_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .thumb p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'card_title_style_bg_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card_title' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_five',
                ]
            ]
        );
        $this->add_responsive_control(
            'button_border_radius2',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_stitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition' => [
                    'aikeu_content_style_selection' => 'style_five',
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

        //    Description
        $this->start_controls_section(
            'card_description_style',
            [
                'label' => esc_html__('Card Description', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => 'style_four',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'card_description_style_typ',
                'selector' => '{{WRAPPER}} .overview-two p.tertiary-text',

            ]
        );

        $this->add_control(
            'card_description_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overview-two p.tertiary-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'card_description_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .overview-two p.tertiary-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_description_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .overview-two p.tertiary-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );


        $this->end_controls_section();

        // // card
        // $this->start_controls_section(
        //     'card_style',
        //     [
        //         'label' => esc_html__('Card', 'plugin-name'),
        //         'tab'   => Controls_Manager::TAB_STYLE,
        //     ]
        // );


        // $this->add_control(
        //     'card_style_color',
        //     [
        //         'label'     => esc_html__('Background Color', 'plugin-name'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_card' => 'background: {{VALUE}};',
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'card_inner_style_color',
        //     [
        //         'label'     => esc_html__('Inner Background Color', 'plugin-name'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_card::after' => 'background: {{VALUE}};',
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'card_inner_hover_style_color',
        //     [
        //         'label'     => esc_html__('Inner Background Hover Color', 'plugin-name'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_card:hover::after' => 'background: {{VALUE}};',
        //         ],
        //     ]
        // );


        // $this->add_responsive_control(
        //     'card_border_radius',
        //     [
        //         'label'      => __('Border Radius', 'aikeu-core'),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%'],
        //         'selectors'  => [
        //             '{{WRAPPER}} .cus_card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         ]
        //     ]
        // );
        // $this->add_responsive_control(
        //     'card_inner_border_radius',
        //     [
        //         'label'      => __('Card Inner Border Radius', 'aikeu-core'),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%'],
        //         'selectors'  => [
        //             '{{WRAPPER}} .cus_card:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         ]
        //     ]
        // );
        // $this->add_responsive_control(
        //     'card_style_margin',
        //     [
        //         'label' => esc_html__('Margin', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%', 'em'],
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // $this->add_responsive_control(
        //     'card_style_padding',
        //     [
        //         'label'      => __('Padding', 'plugin-name'),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%'],
        //         'selectors'  => [
        //             '{{WRAPPER}} .cus_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         ]
        //     ]
        // );


        // $this->end_controls_section();

        // // card  Icon 
        // $this->start_controls_section(
        //     'card_icon_style',
        //     [
        //         'label' => esc_html__('Card Icon', 'plugin-name'),
        //         'tab'   => Controls_Manager::TAB_STYLE,
        //     ]
        // );


        // $this->add_control(
        //     'card_icon_color',
        //     [
        //         'label'     => esc_html__('Color', 'plugin-name'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_icon i' => 'color: {{VALUE}};',
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'card_icon_bg_color',
        //     [
        //         'label'     => esc_html__('background', 'plugin-name'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_icon' => 'background: {{VALUE}};',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'card_icon_top_bdr_hvr_color',
        //     [
        //         'label' => esc_html__('Btn Hover BG Color', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_card:hover .cus_icon' => 'background: {{VALUE}}',
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'card_icon_bottom_bdr_hvr_color',
        //     [
        //         'label' => esc_html__('bottom Btn Hover BG Color', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_card:hover .cus_icon_2' => 'background: {{VALUE}}',
        //         ],
        //     ]
        // );

        // $this->add_control(
        //     'card_icon_bdr_color',
        //     [
        //         'label' => esc_html__('Border Color', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_icon' => 'border:1px solid {{VALUE}}',
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'card_icon_bdr_hvr_color',
        //     [
        //         'label' => esc_html__('Hover Border Color', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_card:hover .cus_icon' => 'border:1px solid {{VALUE}}',
        //         ],
        //     ]
        // );

        // // Icon Size
        // $this->add_responsive_control(
        //     'card_icon_custom_dimensionsss',
        //     [
        //         'label' => esc_html__('Icon or Image Size', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::SLIDER,
        //         'size_units' => ['px', '%'],
        //         'range' => [
        //             'px' => [
        //                 'min' => 1,
        //                 'max' => 100,
        //                 'step' => 1,
        //             ],
        //             '%' => [
        //                 'min' => 1,
        //                 'max' => 100,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
        //             '{{WRAPPER}} .cus_icon img' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',
        //         ],
        //     ]
        // );

        // // Icon box Size
        // $this->add_responsive_control(
        //     'icon_box_custom_dimensionsss',
        //     [
        //         'label' => esc_html__('Box Size', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::SLIDER,
        //         'size_units' => ['px', '%'],
        //         'range' => [
        //             'px' => [
        //                 'min' => 1,
        //                 'max' => 100,
        //                 'step' => 1,
        //             ],
        //             '%' => [
        //                 'min' => 1,
        //                 'max' => 100,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_icon' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


        //         ],
        //     ]
        // );


        // //bottom Icon box Size
        // $this->add_responsive_control(
        //     'icon_box2_custom_dimensionsss',
        //     [
        //         'label' => esc_html__('Bottom Box Size', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::SLIDER,
        //         'size_units' => ['px', '%'],
        //         'range' => [
        //             'px' => [
        //                 'min' => 1,
        //                 'max' => 100,
        //                 'step' => 1,
        //             ],
        //             '%' => [
        //                 'min' => 1,
        //                 'max' => 100,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_icon_2' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}} !important;',


        //         ],
        //     ]
        // );

        // // Icon Size
        // $this->add_responsive_control(
        //     'card_icon2_custom_dimensionsss',
        //     [
        //         'label' => esc_html__('Icon or Image Size', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::SLIDER,
        //         'size_units' => ['px', '%'],
        //         'range' => [
        //             'px' => [
        //                 'min' => 1,
        //                 'max' => 100,
        //                 'step' => 1,
        //             ],
        //             '%' => [
        //                 'min' => 1,
        //                 'max' => 100,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_icon_2 i' => 'font-size: {{SIZE}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // $this->add_responsive_control(
        //     'card_icon_border_radius',
        //     [
        //         'label'      => __('Border Radius', 'plugin-name'),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%'],
        //         'selectors'  => [
        //             '{{WRAPPER}} .cus_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         ]
        //     ]
        // );

        // $this->add_responsive_control(
        //     'card_icon_style_margin',
        //     [
        //         'label' => esc_html__('Margin', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%', 'em'],
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // $this->add_responsive_control(
        //     'card_icon_style_padding',
        //     [
        //         'label'      => __('Padding', 'plugin-name'),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%'],
        //         'selectors'  => [
        //             '{{WRAPPER}} .cus_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         ]
        //     ]
        // );

        // $this->end_controls_section();

        // // Card Title
        // $this->start_controls_section(
        //     'card_title_style',
        //     [
        //         'label' => esc_html__('Card Title', 'plugin-name'),
        //         'tab'   => Controls_Manager::TAB_STYLE,
        //     ]
        // );


        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     [
        //         'label'    => esc_html__('Typography', 'plugin-name'),
        //         'name'     => 'card_title_style_typ',
        //         'selector' => '{{WRAPPER}} .cus_title_link',

        //     ]
        // );

        // $this->add_control(
        //     'card_title_style_color',
        //     [
        //         'label'     => esc_html__('Color', 'plugin-name'),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_title_link' => 'color: {{VALUE}};',
        //         ],
        //     ]
        // );
        // $this->add_responsive_control(
        //     'card_title_style_margin',
        //     [
        //         'label' => esc_html__('Margin', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%', 'em'],
        //         'selectors' => [
        //             '{{WRAPPER}} .cus_title_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // $this->add_responsive_control(
        //     'card_title_style_padding',
        //     [
        //         'label'      => __('Padding', 'plugin-name'),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', '%'],
        //         'selectors'  => [
        //             '{{WRAPPER}} .cus_title_link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         ]
        //     ]
        // );


        // $this->end_controls_section();


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

        $query = new \WP_Query(
            array(
                'post_type'      => 'services',
                'posts_per_page' => $settings['services_posts_per_page'],
                'orderby'        => $settings['services_template_order_by'],
                'order'          => $settings['services_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',
                'post__in'          => $settings['services_category'],
            )
        );

?> 

        <style>
            .s-thumb img {
                max-width: 250px;
            }
            .overview-two .section__content-cta{
                margin-top: 24px;
            }
        </style>

        <!-- ==== training section start ==== -->
        <?php if ($settings['aikeu_content_style_selection'] == 'style_one') : ?>
            <section class="section revolution pb-0">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="section__header text-center">
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
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row gaper fade-wrapper">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                        ?>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="revolution__single fade-top">
                                        <div class="thumb">
                                            <a href="<?php the_permalink() ?>">
                                                <?php echo the_post_thumbnail() ?>
                                            </a>
                                            <?php
                                            $categories = get_the_terms(get_the_ID(), 'services-cat');
                                            ?>
                                            <?php if (!empty($categories)) :   ?>
                                                <span class="tag"> <?php echo $categories[0]->name; ?></span>
                                            <?php endif ?>
                                            <?php if (!empty($settings['aikeu_tag'])) :   ?>
                                                <span class="tag"><?php echo wp_kses($settings['aikeu_tag'], wp_kses_allowed_html('post'))  ?></span>
                                            <?php endif ?>
                                        </div>
                                        <div class="content">
                                            <a href="<?php the_permalink(); ?>" class="card_title primary-text cus_title_link">
                                                <?php the_title(); ?>
                                                <span class="arrow"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_two') : ?>
            <section class="section revolution-f fade-wrapper">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 col-xxl-6">
                            <div class="section__header text-center">
                                <?php if (!empty($settings['aikeu_sub_title_vector']['url'])) : ?>
                                    <div class="s-thumb">
                                        <img src="<?php echo esc_url($settings['aikeu_sub_title_vector']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    </div>
                                <?php endif ?>

                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_title title title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="revolution-f__content">
                                <?php
                                $counter = 1;
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                                        $counter_padded = str_pad($counter, 2, '0', STR_PAD_LEFT); // Pad the counter to 2 digits
                                ?>
                                        <div class="revolution-f__single fade-top">
                                            <div class="thumb">
                                                <p class="light-title-sm"><?php echo $counter_padded; ?></p>
                                            </div>
                                            <div class="content rev-f-content">
                                                <h3>
                                                    <a href="<?php the_permalink() ?>" class="card_title"> <?php the_title(); ?></a>
                                                </h3>
                                            </div>
                                            <div class="case-study-hover d-none d-sm-block" data-background="<?php echo esc_url($thumbnail_url); ?>"></div>
                                        </div>
                                        <?php $counter++; ?>
                                    <?php endwhile ?>
                                <?php endif ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_three') : ?>
            <section class="banner-six fade-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xxl-9">
                            <div class="banner-six__content">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h1 class="cus_title title title-animation fw-7"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h1>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row gaper">
                        <?php
                        $counter = 1;
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                        ?>
                                <div class="col-12 col-lg-6">
                                    <div class="banner-six__single fade-top">
                                        <div class="thumb">
                                            <a href="<?php the_permalink() ?>">
                                                <?php echo the_post_thumbnail() ?>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4>
                                                <a href="<?php the_permalink() ?>" class="card_title"> <?php the_title(); ?></a>
                                            </h4>
                                            <p class="tertiary-text text-uppercase"><?php echo get_the_date() ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>
        <?php if ($settings['aikeu_content_style_selection'] == 'style_four') : ?>
            <!-- ==== overview two start ==== -->
            <section class="section overview-two fade-wrapper <?php echo ($settings['section_pb_show'] == 'yes') ? 'pb-0' : '' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : '' ?>">
                <div class="container">
                    <?php if (!empty($settings['section_heading_show'] == 'yes')) :   ?>
                        <div class="row justify-content-center">
                            <div class="col-12 col-xl-7">
                                <div class="section__header section__content text-center">
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
                                        <h2 class="cus_title title title-animation"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                        <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="row align-items-center justify-content-center gaper">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $service_icon_img = function_exists('get_field') ? get_field('service_icon_img') : '';
                        ?>
                                <div class="col-12 col-sm-9 col-md-6 col-xl-4">
                                    <div class="overview-two__single text-center fade-top">
                                        <div class="thumb">
                                            <?php if (!empty($service_icon_img)) : ?>
                                                <img src="<?php echo esc_url($service_icon_img['url']); ?>" alt="<?php echo esc_attr('image'); ?>" />
                                            <?php endif ?>
                                        </div>
                                        <div class="content">
                                            <h4>
                                                <a href="<?php the_permalink() ?>" class="card_title"> <?php the_title(); ?></a>
                                            </h4>
                                            <p class="tertiary-text"><?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?> </p>
                                            <?php if (!empty($settings['card_button_show'] == 'yes')) :   ?>
                                                <div class="section__content-cta">
                                                    <a href="<?php the_permalink() ?>">
                                                        <span class="arrow"></span>
                                                    </a>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata() ?>
                    </div>
                </div>
            </section>
            <!-- ==== / overview two end ==== -->
        <?php endif; ?>
        <?php if ($settings['aikeu_content_style_selection'] == 'style_five') : ?>
            <div class="section s-main fade-wrapper <?php echo ($settings['section_pb_show'] == 'yes') ? 'pb-0' : '' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : '' ?>">
                <div class="container">
                    <div class="row gaper">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                        ?>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="s-main__single fade-top">
                                        <div class="thumb">
                                            <a href="<?php the_permalink() ?>">
                                                <?php echo the_post_thumbnail() ?>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <a href="<?php the_permalink(); ?>" class="card_title primary-text btn btn--secondary">
                                                <?php the_title(); ?>
                                                <span class="arrow"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>



<?php
    }
}

$widgets_manager->register(new TP_services());
