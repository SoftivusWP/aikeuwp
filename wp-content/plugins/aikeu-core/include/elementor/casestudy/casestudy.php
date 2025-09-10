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
class TP_casestudy extends Widget_Base
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
        return 'tp-casestudy';
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
        return __('Case Study', 'tpcore');
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
            'casestudy_general_content',
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

        $this->end_controls_section();


        // Posts Per Page Show
        $this->start_controls_section(
            'casestudy_one_general_content',
            [
                'label' => esc_html__('Posts Per Page Show', 'aikeu-core')
            ]
        );


        $this->add_control(
            'casestudy_category',
            [
                'label' => __('Select casestudy', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('casestudy'),
                'default'     => $this->get_all_post_key('casestudy'),
            ]
        );


        $this->add_control(
            'casestudy_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => -1,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'casestudy_template_order_by',
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
            'casestudy_template_order',
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
            'casestudy_three_heading_general_content',
            [
                'label' => esc_html__('Heading', 'aikeu-core'),
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_five'],
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
                    'aikeu_content_style_selection' => 'style_one',
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
                    'aikeu_content_style_selection' => 'style_one',
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
                'default' => esc_html__('Case Study', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_five']
                ]
            ]
        );
        $this->add_control(
            'aikeu_heading_content_description',
            [
                'label' => esc_html__('Short Description', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__('AI chatbots can generate analytics and insights on user interactions,', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'condition' => [
                    'aikeu_content_style_selection' => 'style_one',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'aikeu_button_section_genaral',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_five']
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

        // ======================= Heading Style =================================//


        // Title 
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Heading Title', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_three', 'style_five']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .head_title',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .head_title' => 'color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .head_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .head_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    'aikeu_content_style_selection' => ['style_one',]
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

        //  category
        $this->start_controls_section(
            'category_style',
            [
                'label' => esc_html__('Category', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_four',]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'category_style_typ',
                'selector' => '{{WRAPPER}} .tags',

            ]
        );

        $this->add_control(
            'category_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tags' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'category_bg_style_color',
            [
                'label'     => esc_html__('BG Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tags' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'facility_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tags' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} .tags' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tags' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        //  filter
        $this->start_controls_section(
            'filter_style',
            [
                'label' => esc_html__('filter', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_two',]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'filter_style_typ',
                'selector' => '{{WRAPPER}} .case-filter__wrapper button, {{WRAPPER}} .case-filter__wrapper button span',
            ]
        );


        $this->add_control(
            'filter_style_color',
            [
                'label'     => esc_html__('Filter Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-filter__wrapper button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .case-filter__wrapper button span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'filter_bg_style_color',
            [
                'label'     => esc_html__('Filter BG Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-filter__wrapper button' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'filter_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .case-filter__wrapper button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'space_between_widgets',
            [
                'label'     => esc_html__('Gap', 'aikeu-core'),
                'type'      => Controls_Manager::GAPS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw'],
                'selectors'  => [
                    '{{WRAPPER}} .h-s-case-alter .case-filter__wrapper' => 'gap: {{ROW}}{{UNIT}} {{COLUMN}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'filter_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .case-filter__wrapper button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'filter_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .case-filter__wrapper button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // Content Title 
        $this->start_controls_section(
            'cont_title_style',
            [
                'label' => esc_html__('Content Title', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two', 'style_four',]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'cont_title_style_typ',
                'selector' => '{{WRAPPER}} .cus_title',

            ]
        );

        $this->add_control(
            'cont_title_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'cont_title_style_margin',
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
            'cont_title_style_padding',
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
                'condition' => [
                    'aikeu_content_style_selection' =>'style_five'
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
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


        $query = new \WP_Query(
            array(
                'post_type'      => 'casestudy',
                'posts_per_page' => $settings['casestudy_posts_per_page'],
                'orderby'        => $settings['casestudy_template_order_by'],
                'order'          => $settings['casestudy_template_order'],
                'post_status'    => 'publish',
                'post__in'       => $settings['casestudy_category'],
                'paged'          => $paged,
            )
        );

?>


        <script>
            jQuery(document).ready(function($) {
                /**
                 * ======================================
                 * 16. case slider
                 * ======================================
                 */
                $(".c-slide__wrapper")
                    .not(".slick-initialized")
                    .slick({
                        slidesToShow: 4,
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
                                    slidesToShow: 3,
                                },
                            },
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                },
                            },
                            {
                                breakpoint: 576,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                },
                            },
                        ],
                    });

            });
        </script>


        <!-- ==== training section start ==== -->
        <?php if ($settings['aikeu_content_style_selection'] == 'style_one') : ?>
            <!-- ==== case study start ==== -->
            <section class="section h-s-case">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="section__header text-center">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="head_title title-animation mt-12 "><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                    <p class="xlr pp"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-s-case-wrapper">
                    <?php
                    if ($query->have_posts()) :
                        $count = 0;
                        while ($query->have_posts()) :
                            $query->the_post();
                    ?>
                            <div class="h-s-case-single <?php echo $count == 0 ? 'h-s-case-single-active' : ''; ?>">
                                <div class="thumb">
                                    <?php echo the_post_thumbnail() ?>
                                </div>
                                <div class="h-case-content">
                                    <div class="case-title">
                                        <h2 class="light-title">
                                            <a href="<?php the_permalink() ?>" class="cus_title">
                                                <?php echo the_title() ?>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="h-c-continent">
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
                                        <a href="<?php the_permalink() ?>" class="cta">
                                            <span class="arrow"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php $count++; ?>
                        <?php endwhile ?>
                    <?php endif ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </section>
            <!-- ==== / case study end ==== -->
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_two') : ?>

            <section class="section h-s-case-alter fade-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__header--secondary">
                                <div class="row align-items-center gaper">
                                    <div class="col-12 col-lg-5">
                                        <div class="section__header mb-0 text-center text-lg-start">
                                            <?php if (!empty($settings['aikeu_heading_content_title'])) : ?>
                                                <h2 class="head_title title-animation mt-12"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h2>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="case-filter__wrapper justify-content-center justify-content-lg-end">
                                            <button aria-label="Filter Product" data-filter="*" class="active">
                                                <span class="material-symbols-outlined"><?php echo esc_html('add') ?></span> <?php echo esc_html('All') ?>
                                            </button>
                                            <?php
                                            $terms = get_terms(array(
                                                'taxonomy' => 'casestudy-cat',
                                                'hide_empty' => true,
                                            ));
                                            if (!empty($terms) && !is_wp_error($terms)) :
                                                foreach ($terms as $term) :
                                            ?>
                                                    <button aria-label="Filter Product" data-filter=".<?php echo esc_attr($term->slug); ?>">
                                                        <span class="material-symbols-outlined"><?php echo esc_html('add') ?></span><?php echo esc_html($term->name); ?>
                                                    </button>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row case-masonry">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $post_terms = get_the_terms(get_the_ID(), 'casestudy-cat');
                                $term_classes = '';
                                if (!empty($post_terms) && !is_wp_error($post_terms)) {
                                    foreach ($post_terms as $post_term) {
                                        $term_classes .= ' ' . $post_term->slug;
                                    }
                                }
                        ?>
                                <div class="col-12 col-md-6 case-item<?php echo esc_attr($term_classes); ?>">
                                    <div class="h-s-case-single fade-top topy-tilt">
                                        <div class="thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                        <div class="h-case-content">
                                            <div class="case-title">
                                                <h2 class="light-title">
                                                    <a href="<?php the_permalink(); ?>" class="cus_title"><?php the_title(); ?></a>
                                                </h2>
                                            </div>
                                            <div class="h-c-continent">
                                                <p><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
                                                <a href="<?php the_permalink(); ?>" class="cta">
                                                    <span class="arrow"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>



                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="section__cta">
                                <?php
                                $big = 999999999; // need an unlikely integer
                                $pagination = paginate_links(array(
                                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                    'format'    => '?paged=%#%',
                                    'current'   => max(1, get_query_var('paged')),
                                    'total'     => $query->max_num_pages,
                                    'type'      => 'list',
                                    'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                                    'next_text' => '<i class="fa-solid fa-angle-right"></i>',
                                ));
                                if ($pagination) {
                                    echo '<div class="pagination">' . $pagination . '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_three') : ?>
            <div class="c-slide section pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="c-slide__wrapper">
                                <?php
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                ?>
                                        <div class="c-slide-single">
                                            <a href="<?php the_permalink() ?>">
                                                <?php echo the_post_thumbnail() ?>
                                            </a>
                                        </div>
                                    <?php endwhile ?>
                                <?php endif ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_four') : ?>
            <!-- ==== poster start ==== -->
            <section class="section h-s-poster">
                <div class="container">
                    <div class="row">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                        ?>
                                <div class="col-12">
                                    <div class="news-alter__single appear-down">
                                        <div class="thumb">
                                            <a href="<?php the_permalink() ?>">
                                                <?php echo the_post_thumbnail() ?>
                                            </a>
                                            <?php
                                            $categories = get_the_terms(get_the_ID(), 'casestudy-cat');
                                            ?>
                                            <?php if (!empty($categories)) :   ?>
                                                <span class="tags"> <?php echo $categories[0]->name; ?></span>
                                            <?php endif ?>
                                        </div>
                                        <div class="content">
                                            <h2>
                                                <a href="<?php the_permalink() ?>" class="cus_title title-animation"> <?php the_title(); ?> </a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
            <!-- ==== / poster end ==== -->

        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_five') : ?>
            <!-- ==== poster start ==== -->
            <section class="section h-s-case-alter fade-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__header--secondary">
                                <div class="row align-items-center gaper">
                                    <div class="col-12 col-lg-5">
                                        <div class="section__header mb-0 text-center text-lg-start">
                                            <?php if (!empty($settings['aikeu_heading_content_title'])) : ?>
                                                <h2 class="head_title title title-animation mt-12"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post')) ?></h2>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <!-- button -->
                                        <?php if ($settings['aikeu_button_content_style'] == 'style_one') : ?>
                                            <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                                <div class="text-center text-lg-end">
                                                    <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--primary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                                </div>
                                            <?php endif ?>
                                        <?php endif ?>
                                        <?php if ($settings['aikeu_button_content_style'] == 'style_two') : ?>
                                            <?php if (!empty($settings['aikeu_content_button'])) : ?>
                                                <div class="text-center text-lg-end">
                                                    <a href="<?php echo esc_html($settings['aikeu_content_button_url']['url']) ?>" class="btn btn--secondary"><?php echo esc_html($settings['aikeu_content_button']) ?></a>
                                                </div>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row case-masonry">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $post_terms = get_the_terms(get_the_ID(), 'casestudy-cat');
                                $term_classes = '';
                                if (!empty($post_terms) && !is_wp_error($post_terms)) {
                                    foreach ($post_terms as $post_term) {
                                        $term_classes .= ' ' . $post_term->slug;
                                    }
                                }
                        ?>
                                <div class="col-12 col-md-6 case-item<?php echo esc_attr($term_classes); ?>">
                                    <div class="h-s-case-single fade-top topy-tilt">
                                        <div class="thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                        <div class="h-case-content">
                                            <div class="case-title">
                                                <h2 class="light-title">
                                                    <a href="<?php the_permalink(); ?>" class="cus_title"><?php the_title(); ?></a>
                                                </h2>
                                            </div>
                                            <div class="h-c-continent">
                                                <p><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
                                                <a href="<?php the_permalink(); ?>" class="cta">
                                                    <span class="arrow"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>

            <?php endif; ?>


    <?php
    }
}

$widgets_manager->register(new TP_casestudy());
