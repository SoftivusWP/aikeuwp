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
class TP_Blog extends Widget_Base
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
        return 'tp-blog';
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
        return __('Blog', 'tpcore');
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

        // ======================Content================================//

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
                ],
                'default' => 'style_one',
            ]
        );

        $this->end_controls_section();

        // Posts Per Page Show
        $this->start_controls_section(
            'aikeu_general_content',
            [
                'label' => esc_html__('Posts Per Page Show', 'aikeu-core')
            ]
        );

        $this->add_control(
            'blog_category',
            [
                'label' => __('Select Blog', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('post'),
                'default'     => $this->get_all_post_key('post'),
            ]
        );

        $this->add_control(
            'aikeu_blog_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'aikeu-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 3,
                'label_block' => false,
            ]
        );
        $this->add_control(
            'aikeu_blog_template_orderby',
            [
                'label'   => esc_html__('Order By', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'aikeu-core'),
                    'author'     => esc_html__('Post Author', 'aikeu-core'),
                    'title'      => esc_html__('Title', 'aikeu-core'),
                    'post_date'  => esc_html__('Date', 'aikeu-core'),
                    'rand'       => esc_html__('Random', 'aikeu-core'),
                    'menu_order' => esc_html__('Menu Order', 'aikeu-core'),
                ],
            ]
        );
        $this->add_control(
            'aikeu_blog_template_order',
            [
                'label'   => esc_html__('Order', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'aikeu-core'),
                    'desc' => esc_html__('Descending', 'aikeu-core')
                ],
                'default' => 'desc',
            ]
        );

        $this->end_controls_section();



        // Heading
        $this->start_controls_section(
            'product_three_heading_general_content',
            [
                'label' => esc_html__('Content', 'aikeu-core'),
            ]
        );

        $this->add_control(
            'showheading',
            [
                'label' => esc_html__('Show Heading Section', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'plugin-name'),
                'label_off' => esc_html__('Hide', 'plugin-name'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'one_reborn_show',
            [
                'label' => esc_html__('Show Subtitle img?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'aikeu_content_style_selection' => 'style_one'
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
                    'aikeu_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__("News & Articles", 'aikeu-core'),
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
                'default' => esc_html__('AI image generator tools have emerged as powerful', 'aikeu-core'),
                'placeholder' => esc_html__('Type your description here', 'aikeu-core'),
                'condition' => [
                    'aikeu_content_style_selection' => 'style_one'
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
                'condition' => [
                    'aikeu_content_style_selection' => 'style_one'
                ]
            ]
        );

        // Button text
        $this->add_control(
            'aikeu_content_button',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View More', 'aikeu-core'),
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
                ],
                'label_block' => true,
                'condition' => [
                    'aikeu_content_style_selection' => 'style_one'
                ]
            ]
        );

        $this->end_controls_section();



        // =======================Style=================================//


        // Heading Title
        $this->start_controls_section(
            'sheadingstyle',
            [
                'label' => esc_html__('Heading Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'heading_typ',
                'selector' => '{{WRAPPER}} .cus_head',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_head' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_margin',
            [
                'label'      => esc_html__('Margin', 'plugin-name'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_head' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_head' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'headingstyle',
            [
                'label' => esc_html__('Heading Des', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,

                'condition' => [
                    'aikeu_content_style_selection' => 'style_one'
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'subheading_typ',
                'selector' => '{{WRAPPER}} .cus_head_det',

            ]
        );

        $this->add_control(
            'subheading_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_head_det' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'subheading_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_head_det' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subheading_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_head_det' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    'aikeu_content_style_selection' => 'style_one'
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


        // card 
        $this->start_controls_section(
            'bg_style',
            [
                'label' => esc_html__('Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_style_color',
            [
                'label'     => esc_html__('BG Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_box' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'mf_input_label_box_shadow',
                'label' => esc_html__('Box Shadow', 'metform'),
                'selector' => '{{WRAPPER}} .cus_box',
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .cus_box',
            ]
        );

        $this->add_responsive_control(
            'card_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_responsive_control(
            'img_border_radius',
            [
                'label'      => __('Image Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'border_sepa_style_color',
            [
                'label'     => esc_html__('Border Separator Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} hr' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // category 
        $this->start_controls_section(
            'cat_style',
            [
                'label' => esc_html__('Category', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'cattyp',
                'selector' => '{{WRAPPER}} .news-alter .news-alter__single .thumb .tags',

            ]
        );

        $this->add_control(
            'cat_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-alter .news-alter__single .thumb .tags' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cat_style_bg_color',
            [
                'label'     => esc_html__('BG Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-alter .news-alter__single .thumb .tags' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border_cat',
                'selector' => '{{WRAPPER}} .news-alter .news-alter__single .thumb .tags',
            ]
        );

        $this->add_responsive_control(
            'cat_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .news-alter .news-alter__single .thumb .tags' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'cat_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .news-alter .news-alter__single .thumb .tags' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cat_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .news-alter .news-alter__single .thumb .tags' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        // // meta
        $this->start_controls_section(
            'metastyle',
            [
                'label' => esc_html__('Meta', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'metatyp',
                'selector' => '{{WRAPPER}} .cus_meta',

            ]
        );

        $this->add_control(
            'metacolor',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_meta' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'metacolorhover',
            [
                'label'     => esc_html__('Link Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.cus_meta:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'metamargin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'metapadding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // card title
        $this->start_controls_section(
            'titlestyle',
            [
                'label' => esc_html__('Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'title_typ',
                'selector' => '{{WRAPPER}} .cus_title',

            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'titlecolorhover',
            [
                'label'     => esc_html__('Link Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.cus_title:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
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
            'title_padding',
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



        // $this->end_controls_section();

        $this->start_controls_section(
            'constyle',
            [
                'label' => esc_html__('Continue Button', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => 'style_two'
                ]
            ]
        );


        $this->add_control(
            'spinnfdfdsfer_color',
            [
                'label' => esc_html__('Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-alter .news-alter__single .cta a' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_control(
            'spinnfdfdsfer_colorhover',
            [
                'label' => esc_html__('Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-alter .news-alter__single .cta a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );


        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cta a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cta a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
        $query = new \WP_Query(
            array(
                'post_type'      => 'post',
                'posts_per_page' => $settings['aikeu_blog_posts_per_page'],
                'orderby'        => $settings['aikeu_blog_template_orderby'],
                'order'          => $settings['aikeu_blog_template_order'],
                'offset'         => 0,
                'post_status'    => 'publish',
                'post__in'          => $settings['blog_category'],
            )
        );

        $query1 = new \WP_Query(
            array(
                'post_type'      => 'post',
                'posts_per_page' => 1,
                'orderby'        => $settings['aikeu_blog_template_orderby'],
                'order'          => $settings['aikeu_blog_template_order'],
                'offset'         => 3,
                'post_status'    => 'publish',
                'post__in'       => $settings['blog_category'],
            )
        );


        $query2 = new \WP_Query(
            array(
                'post_type'      => 'post',
                'posts_per_page' => 2,
                'orderby'        => $settings['aikeu_blog_template_orderby'],
                'order'          => $settings['aikeu_blog_template_order'],
                'offset'         => 4, // New offset value
                'post_status'    => 'publish',
                'post__in'       => $settings['blog_category'],
            )
        );


?>


        <style>
            .news-alter .news-alter__single .thumb .tags {
                height: auto;
                width: auto;
                padding: 4px 8px;
            }
        </style>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_one') : ?>
            <!-- ==== blog one start ==== -->
            <section class="section blog">
                <div class="container">

                    <?php if (!empty($settings['showheading'] == 'yes')) :   ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="section__header--secondary">
                                    <div class="row align-items-center gaper">
                                        <div class="col-12 col-lg-8">
                                            <div class="section__header mb-0 text-center text-lg-start">
                                                <?php if (!empty($settings['one_reborn_show'] == 'yes')) :   ?>
                                                    <?php if (!empty($settings['aikeu_sub_title_vector']['url'])) : ?>
                                                        <div class="s-thumb">
                                                            <img src="<?php echo esc_url($settings['aikeu_sub_title_vector']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                                        </div>
                                                    <?php endif ?>
                                                <?php endif ?>
                                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                                    <h2 class="cus_head title title-animation <?php echo ($settings['one_reborn_show'] == 'yes') ? '' : 'mt-12' ?>"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                                <?php endif ?>
                                                <?php if (!empty($settings['aikeu_heading_content_description'])) :   ?>
                                                    <p class="xlr cus_head_det"><?php echo wp_kses($settings['aikeu_heading_content_description'], wp_kses_allowed_html('post'))  ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
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
                    <?php endif ?>
                    <div class="row gaper fade-wrapper">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>

                                <div class="col-12 col-md-6 col-xl-4 fade-top">
                                    <div class="cus_box blog__single topy-tilt">
                                        <div class="blog__single-thumb">
                                            <?php if (has_post_thumbnail()) :   ?>
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="Image" class="w-100">
                                            <?php endif ?>
                                        </div>
                                        <div class="blog__single-content">
                                            <div class="blog__single-meta">
                                                <span class="cus_meta"><?php echo get_the_date() ?></span>
                                                <a href="<?php comments_link(); ?>" class="cus_meta"><?php comments_number(); ?></a>
                                            </div>

                                            <h4 class="blog_title">
                                                <a href="<?php the_permalink() ?>" class="cus_title">
                                                    <?php the_title() ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
            <!-- ==== / blog one end ==== -->
        <?php endif ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_two') : ?>
            <section class="news-alter section">
                <div class="container">
                    <?php if (!empty($settings['showheading'] == 'yes')) :   ?>
                        <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="section__header text-center">
                                        <h2 class="cus_head title title-animation mt-12"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                    <div class="row gaper section pt-0 fade-wrapper">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="cus_box news-alter__single fade-top">
                                        <div class="thumb">
                                            <?php if (has_post_thumbnail()) :   ?>
                                                <a href="<?php the_permalink() ?>">
                                                    <img src="<?php the_post_thumbnail_url() ?>" alt="Image" class="w-100">
                                                </a>
                                            <?php endif ?>
                                            <?php
                                            $pro_categories = get_the_terms(get_the_ID(), 'category');
                                            if (!empty($pro_categories) && !is_wp_error($pro_categories)) :
                                                // Get the first category
                                                $first_category = $pro_categories[0];
                                            ?>
                                                <a href="<?php echo get_term_link($first_category); ?>" class="tags">
                                                    <?php echo esc_html($first_category->name); ?>
                                                </a>
                                            <?php endif;
                                            ?>
                                        </div>
                                        <div class="content">
                                            <div class="meta">
                                                <span class="author cus_meta"><?php echo get_the_author() ?></span>
                                                <span class="time cus_meta"> <?php echo get_the_date() ?> </span>
                                            </div>
                                            <h4>
                                                <a href="<?php the_permalink() ?>" class="cus_title">
                                                    <?php the_title() ?>
                                                </a>
                                            </h4>
                                            <div class="cta">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php echo esc_html($settings['aikeu_content_button']) ?>
                                                    <span class="material-symbols-outlined"><?php echo esc_html('trending_flat') ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="row gaper fade-wrapper">
                        <?php
                        if ($query1->have_posts()) {
                            while ($query1->have_posts()) {
                                $query1->the_post();
                        ?>

                                <div class="col-12 col-lg-6">
                                    <div class="cus_box news-alter__single news-alter-single-alt fade-top">
                                        <div class="thumb">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php the_post_thumbnail_url() ?>" alt="Image" class="w-100">
                                                </a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                        <div class="col-12 col-lg-6">
                            <div class="news-alter__single news-alter-single-alt">
                                <?php
                                if ($query2->have_posts()) {
                                    while ($query2->have_posts()) {
                                        $query2->the_post();
                                ?>
                                        <div class="news-alter-single fade-top">
                                            <div class="thumb">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php the_post_thumbnail_url() ?>" alt="Image" class="w-100">
                                                    </a>
                                                <?php endif ?>
                                            </div>
                                            <div class="content">
                                                <div class="meta">
                                                    <span class="author cus_meta"><?php echo get_the_author() ?></span>
                                                    <span class="time cus_meta">
                                                        <span class="material-symbols-outlined"><?php echo esc_html('trending_flat') ?></span>
                                                        <?php echo get_the_date() ?>
                                                    </span>
                                                </div>
                                                <h4>
                                                    <a href="<?php the_permalink() ?>" class="cus_title">
                                                        <?php the_title() ?>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>

                            </div>
                        </div>

                    </div>

                </div>
            </section>
        <?php endif ?>


<?php
    }
}

$widgets_manager->register(new TP_Blog());
