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
use Kirki\Compatibility\Control;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_product extends Widget_Base
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
        return 'tp-product';
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
        return __('Product', 'tpcore');
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

    public function get_taxonomy_terms($taxonomy)
    {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ]);

        $term_options = [];
        foreach ($terms as $term) {
            $term_options[$term->term_id] = $term->name;
        }

        return $term_options;
    }
    // // Retrieve taxonomy terms
    // public function get_taxonomy_terms($taxonomy)
    // {
    //     $terms = get_terms([
    //         'taxonomy' => $taxonomy,
    //         'hide_empty' => false,
    //     ]);

    //     if (is_wp_error($terms)) {
    //         return [];
    //     }

    //     $term_options = [];
    //     foreach ($terms as $term) {
    //         $term_options[$term->term_id] = $term->name;
    //     }

    //     return $term_options;
    // }

    public function get_all_post_key($post_type)
    {
        $return_val = [];
        $args       = array(
            'post_type'      => $post_type,
            'posts_per_page' => 12,
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
            'product_general_content',
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
                'default' => 'yes',
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


        $this->add_control(
            'cate_hide',
            [
                'label' => esc_html__('Top Category Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_content_style_selection' => 'style_two'
                ]
            ]
        );

        $this->add_control(
            'filter_hide',
            [
                'label' => esc_html__('Filter Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two']
                ]
            ]
        );

        $this->add_control(
            'card_cate_hide',
            [
                'label' => esc_html__('Card Category Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_content_style_selection' => ['style_two', 'style_three']
                ]
            ]
        );


        $this->add_control(
            'search_hide',
            [
                'label' => esc_html__('Search Box Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_content_style_selection' => 'style_one'
                ]
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
                'condition' => [
                    'aikeu_content_style_selection' => ['style_two', 'style_three']
                ]
            ]
        );
        $this->add_control(
            'star_review_hide',
            [
                'label' => esc_html__('Star Review Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_content_style_selection' => ['style_two', 'style_three']
                ]
            ]
        );
        $this->add_control(
            'review_count_hide',
            [
                'label' => esc_html__('Review Count Hide?', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'aikeu_content_style_selection' =>  ['style_two', 'style_three']
                ]
            ]
        );
        $this->end_controls_section();


        // Elementor Controls Section
        $this->start_controls_section(
            'product_one_general_content',
            [
                'label' => esc_html__('Product Settings', 'aikeu-core')
            ]
        );


        $this->add_control(
            'product_grid_column',
            [
                'label' => esc_html__('Columns', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '12' => esc_html__('1 Column', 'rsaddon'),
                    '6' => esc_html__('2 Column', 'rsaddon'),
                    '4' => esc_html__('3 Column', 'rsaddon'),
                    '3' => esc_html__('4 Column', 'rsaddon'),
                    '2' => esc_html__('6 Column', 'rsaddon'),
                ],
            ]
        );

        $this->add_control(
            'product_name',
            [
                'label' => __('Select product', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_post_list_by_post_type('product'),
                'default'     => $this->get_all_post_key('product'),
            ]
        );

        $this->add_control(
            'product_category',
            [
                'label' => __('Select Category', 'turio-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options' => $this->get_taxonomy_terms('product_cat'), // Adjust 'product_cat' to your taxonomy
                'default'     => [],
            ]
        );


        $this->add_control(
            'product_grid_product_filter',
            [
                'label' => esc_html__('Filter By', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => 'recent-products',
                'options' => [
                    'recent-products'       => esc_html__('Recent Products', 'rsaddon'),
                    'featured-products'     => esc_html__('Featured Products', 'rsaddon'),
                    'best-selling-products' => esc_html__('Best Selling Products', 'rsaddon'),
                    'sale-products'         => esc_html__('Sale Products', 'rsaddon'),
                    'top-products'          => esc_html__('Top Rated Products', 'rsaddon'),
                ],
            ]
        );

        $this->add_control(
            'product_posts_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'corelaw-core'),
                'type'        => Controls_Manager::NUMBER,
                'default' => -1,
                'min'     => -1,
                'max'     => 1000,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'product_template_order_by',
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
            'product_template_order',
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
            'product_three_heading_general_content',
            [
                'label' => esc_html__('Heading', 'aikeu-core'),
                'condition' => [
                    'aikeu_content_style_selection' => ['style_two', 'style_three']
                ]
            ]
        );

        $this->add_control(
            'aikeu_heading_content_title',
            [
                'label' => esc_html__('Title', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('All The Category', 'aikeu-core'),
                'placeholder' => esc_html__('Type your title here', 'aikeu-core'),
                'label_block' => true,

            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'aikeu_button_section_genaral',
            [
                'label' => esc_html__('Button', 'aikeu-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'aikeu_content_style_selection' => 'style_two'
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



        // style


        // cus_head_title 
        $this->start_controls_section(
            'head_title_style',
            [
                'label' => esc_html__('Heading Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_two', 'style_three']
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
                    '{{WRAPPER}} .cus_head_title' => 'text-align: {{VALUE}};',
                ],

            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'head_title_style_typ',
                'selector' => '{{WRAPPER}} .cus_head_title',

            ]
        );

        $this->add_control(
            'head_title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_head_title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'head_title_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_head_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'head_title_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_head_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // card 
        $this->start_controls_section(
            'card_style',
            [
                'label' => esc_html__('Product Card', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'card_style_typ',
                'selector' => '{{WRAPPER}} .cus_card',

            ]
        );

        $this->add_control(
            'cardborder_style_color',
            [
                'label'     => esc_html__('BG Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_card' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'card_style_color',
            [
                'label'     => esc_html__('Card Border Bottom Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_card hr' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .cus_card .content' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .cus_card',
            ]
        );

        $this->add_responsive_control(
            'card_img_border_radius',
            [
                'label'      => __('Image Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_card .thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        $this->add_responsive_control(
            'card_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );

        $this->add_responsive_control(
            'card_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );

        $this->end_controls_section();

        // Title 
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Product Title', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .cus_title .woocommerce-loop-product__title',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_title .woocommerce-loop-product__title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .cus_title .woocommerce-loop-product__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .cus_title .woocommerce-loop-product__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // price 
        $this->start_controls_section(
            'price_style',
            [
                'label' => esc_html__('Product price', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'price_style_typ',
                'selector' => '{{WRAPPER}} .cus_price',

            ]
        );

        $this->add_control(
            'price_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'price_style_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_style_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        //  filter
        $this->start_controls_section(
            'filter_style',
            [
                'label' => esc_html__('Filter', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two']
                ]
            ]
        );

        $this->add_responsive_control(
            'aikeu_filter_content_align',
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
                    '{{WRAPPER}} .category-filter' => 'justify-content: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'filter_style_typ',
                'selector' => '{{WRAPPER}} .category .category-filter button',

            ]
        );

        $this->add_control(
            'filter_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category .category-filter button' => 'color: {{VALUE}}  !important;',
                ],
            ]
        );
        $this->add_control(
            'filter_bg_style_color',
            [
                'label'     => esc_html__('BG Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .category .category-filter button' => 'background: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'filter_space_between_widgets',
            [
                'label'     => esc_html__('Gap', 'aikeu-core'),
                'type'      => Controls_Manager::GAPS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw'],
                'selectors'  => [
                    '{{WRAPPER}} .category .category-filter' => 'gap: {{ROW}}{{UNIT}} {{COLUMN}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'filter_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .category .category-filter button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        $this->add_responsive_control(
            'filter_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .category .category-filter button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .category .category-filter button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );

        $this->end_controls_section();

        //  search
        $this->start_controls_section(
            'search_style',
            [
                'label' => esc_html__('search', 'aikeu-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'aikeu_content_style_selection' => ['style_one', 'style_two']
                ]
            ]
        );

        $this->add_responsive_control(
            'aikeu_search_content_align',
            [
                'label'         => esc_html__('Search Align', 'aikeu-core'),
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
                    '{{WRAPPER}} .filter-category .row.gaper.justify-content-end' => 'justify-content: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'search_style_typ',
                'selector' => '{{WRAPPER}} .filter-category .product-search input',

            ]
        );

        $this->add_control(
            'search_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-search' => 'color: {{VALUE}}  !important;',
                ],
            ]
        );
        $this->add_control(
            'search_bg_style_color',
            [
                'label'     => esc_html__('BG Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-search' => 'background: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'search_border_style_color',
            [
                'label'     => esc_html__('Border Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-search' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_input_style_padding',
            [
                'label'      => __('Input Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .filter-category .product-search input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );

        $this->add_responsive_control(
            'search_border_radius',
            [
                'label'      => __('Border Radius', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
                ]
            ]
        );
        $this->add_responsive_control(
            'search_style_margin',
            [
                'label' => esc_html__('Margin', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .product-search' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'search_style_padding',
            [
                'label'      => __('Padding', 'aikeu-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .product-search' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    'aikeu_content_style_selection' => ['style_two', 'style_three']
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'aikeu-core'),
                'name'     => 'category_style_typ',
                'selector' => '{{WRAPPER}} .cus_cat',

            ]
        );

        $this->add_control(
            'category_style_color',
            [
                'label'     => esc_html__('Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_cat' => 'color: {{VALUE}}  !important;',
                ],
            ]
        );
        $this->add_control(
            'category_bg_style_color',
            [
                'label'     => esc_html__('BG Color', 'aikeu-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_cat' => 'background: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .cus_cat' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    '{{WRAPPER}} .cus_cat' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .cus_cat' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    'aikeu_content_style_selection' => ['style_two', 'style_three']
                ]
            ]
        );

        $this->add_responsive_control(
            'aikeu_button_content_align',
            [
                'label'         => esc_html__('Button Text Align', 'aikeu-core'),
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
                    '{{WRAPPER}} .section__cta' => 'text-align: {{VALUE}} !important;',
                ],
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
                    '{{WRAPPER}} .btn' => 'border:1px solid {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'button_bdr_hvr_color',
            [
                'label' => esc_html__('Hover Border Color', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn:hover' => 'border:1px solid {{VALUE}} !important',
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
                    '{{WRAPPER}} .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    '{{WRAPPER}} .btn' => 'width: {{SIZE}}{{UNIT}} !important;',
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
                'selector' => '{{WRAPPER}} .btn',
            ]
        );
        // Background for items options.
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'label'     => esc_html__('BG Primary Hover', 'aikeu-core'),
                'name'     => 'grid_items_style_background_hover',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .btn::before',
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

        $query_args = array(
            'post_type'      => 'product',
            'posts_per_page' => $settings['product_posts_per_page'],
            'orderby'        => $settings['product_template_order_by'],
            'order'          => $settings['product_template_order'],
            'post_status'    => 'publish',
            'post__in'       => $settings['product_name'],
        );

        if (!empty($settings['product_category'])) {
            $query_args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat', // Replace with your category taxonomy
                    'field'    => 'term_id',
                    'terms'    => $settings['product_category'],
                ],
            ];
        }


        if ($settings['product_grid_product_filter'] == 'featured-products') {
            $query_args['tax_query'] = [
                [
                    'taxonomy' => 'product_visibility',
                    'field' => 'name',
                    'terms' => 'featured'
                ]
            ];
        } else if ($settings['product_grid_product_filter'] == 'best-selling-products') {
            $query_args['meta_key'] = 'total_sales';
            $query_args['orderby'] = 'meta_value_num';
            $query_args['order'] = 'DESC';
        } else if ($settings['product_grid_product_filter'] == 'sale-products') {
            $query_args['meta_query'] = [
                'relation' => 'OR',
                [
                    'key' => '_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric',
                ],
                [
                    'key' => '_min_variation_sale_price',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric',
                ],
            ];
        } else if ($settings['product_grid_product_filter'] == 'top-products') {
            $query_args['meta_key'] = '_wc_average_rating';
            $query_args['orderby'] = 'meta_value_num';
            $query_args['order'] = 'DESC';
        }


        $query = new \WP_Query($query_args);

?>

        <script>
            jQuery(document).ready(function($) {

                /**
                 * ======================================
                 * 09. showcase slider
                 * ======================================
                 */
                $(".showcase__slider")
                    .not(".slick-initialized")
                    .slick({
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 0,
                        speed: 8000,
                        arrows: false,
                        dots: false,
                        pauseOnHover: true,
                        draggable: false,
                        variableWidth: false,
                        cssEase: "linear",
                        responsive: [{
                                breakpoint: 1400,
                                settings: {
                                    slidesToShow: 3,
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
        <style>
            .divider {
                margin: 60px 0px;
                border: var(--woo-border-1);
            }
        </style>


        <?php if ($settings['aikeu_content_style_selection'] == 'style_one') : ?>
            <!-- ==== / product filter end ==== -->
            <section class="section category filter-category <?php echo ($settings['section_pb_show'] == 'yes') ? 'pb-0' : '' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : '' ?>">
                <div class="container">
                    <div class="row gaper justify-content-end">
                        <?php if (!empty($settings['search_hide'] == 'yes')) :   ?>
                            <div class="col-12 col-lg-5 col-xxl-5">
                                <div class="product-search pb_60">
                                    <form action="<?php echo esc_url(home_url('/')); ?>" method="GET" id="filter_search" class="filter__search">
                                        <div class="input-group">
                                            <input type="text" name="s" value="<?php echo get_search_query(); ?>" id="supportSearch" placeholder="<?php echo esc_attr__('Search', 'aikeu'); ?>" required>
                                            <button type="submit" class="search_icon"><i class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if (!empty($settings['filter_hide'] == 'yes')) :   ?>
                            <div class="col-12 <?php echo ($settings['search_hide'] == 'yes') ? 'col-lg-7 col-xxl-6 offset-xxl-1' : '' ?>">
                                <div class="category-filter-1 <?php echo ($settings['search_hide'] == 'yes') ? 'justify-content-lg-end' : '' ?>">
                                    <button aria-label="cus_cat Filter Product" data-filter="*" class="active">
                                        <?php echo esc_html('All') ?>
                                    </button>
                                    <?php
                                    $terms = get_terms(array(
                                        'taxonomy' => 'product_cat',
                                        'hide_empty' => true,
                                    ));
                                    if (!empty($terms) && !is_wp_error($terms)) :
                                        foreach ($terms as $term) :
                                    ?>
                                            <button aria-label="cus_cat Filter Product" data-filter=".<?php echo esc_attr($term->slug); ?>">
                                                <?php echo esc_html($term->name); ?>
                                            </button>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="row category-masonry-1 fade-wrapper">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                global $product;

                                $post_terms = get_the_terms($product->get_id(), 'product_cat');
                                $term_classes = '';
                                if (!empty($post_terms) && !is_wp_error($post_terms)) {
                                    foreach ($post_terms as $post_term) {
                                        $term_classes .= ' ' . $post_term->slug;
                                    }
                                }

                        ?>
                                <div class="col-12 col-md-6 col-xl-<?php echo esc_html($settings['product_grid_column']); ?> category-item chat-g fade-top <?php echo esc_html($post_term->slug) ?>">
                                    <div class="cus_card category__single topy-tilt">
                                        <div class="thumb">
                                            <a href="<?php echo the_permalink(); ?>">
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo esc_attr('image') ?>">
                                            </a>
                                            <!-- <button>
                                                    <?php
                                                    // $output = do_shortcode('[yith_wcwl_add_to_wishlist]');
                                                    // if ($output !== '') {
                                                    //     echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                                                    // }
                                                    ?>
                                                </button> -->
                                        </div>
                                        <div class="content">
                                            <a href="<?php echo the_permalink() ?>" class="cus_title"><?php woocommerce_template_loop_product_title() ?></a>
                                            <span class="cus_price"><?php woocommerce_template_loop_price() ?></span>
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
            </section>
            <!-- ==== / product filter end ==== -->
        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_two') : ?>
            <!-- ==== category start ==== -->
            <section class="section category <?php echo ($settings['section_pb_show'] == 'yes') ? 'pb-0' : '' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : '' ?>">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="section__header text-center">
                                <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                    <h2 class="cus_head_title title-animation fw-7 text-white"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['cate_hide'] == 'yes')) :   ?>
                        <div class="row gaper fade-wrapper">

                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'product_cat',
                                'hide_empty' => true,
                            ));
                            if (!empty($terms) && !is_wp_error($terms)) :
                                foreach ($terms as $term) :
                                    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                                    $image_url = wp_get_attachment_url($thumbnail_id);
                            ?>
                                    <?php if (!empty($image_url)) : ?>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="category-overview__single fade-top">
                                                <a href="<?php echo get_term_link($term); ?>">
                                                    <span><?php echo esc_attr($term->slug); ?></span>
                                                    <?php if ($image_url) : ?>
                                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="divider"></div>
                    <?php endif ?>
                    <?php if (!empty($settings['filter_hide'] == 'yes')) :   ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="category-filter-2 <?php echo ($settings['search_hide'] == 'yes') ? 'justify-content-lg-end' : '' ?>">
                                    <button aria-label="cus_cat Filter Product" data-filter="*" class="active">
                                        <?php echo esc_html('All') ?>
                                    </button>
                                    <?php
                                    $terms = get_terms(array(
                                        'taxonomy' => 'product_cat',
                                        'hide_empty' => true,
                                    ));
                                    if (!empty($terms) && !is_wp_error($terms)) :
                                        foreach ($terms as $term) :
                                    ?>
                                            <button aria-label="cus_cat Filter Product" data-filter=".<?php echo esc_attr($term->slug); ?>">
                                                <?php echo esc_html($term->name); ?>
                                            </button>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <div class="row category-masonry-2 fade-wrapper">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                global $product;

                                $post_terms = get_the_terms($product->get_id(), 'product_cat');
                                $term_classes = '';
                                if (!empty($post_terms) && !is_wp_error($post_terms)) {
                                    foreach ($post_terms as $post_term) {
                                        $term_classes .= ' ' . $post_term->slug;
                                    }
                                }

                        ?>
                                <div class="col-12 col-md-6 col-xl-<?php echo esc_html($settings['product_grid_column']); ?> category-item chat-g fade-top <?php echo esc_html($post_term->slug) ?>">
                                    <div class="cus_card category__single topy-tilt">
                                        <div class="thumb">
                                            <a href="<?php echo the_permalink(); ?>">
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo esc_attr('image') ?>">
                                            </a>
                                            <?php if (!empty($settings['card_cate_hide'] == 'yes')) :   ?>
                                                <?php
                                                $pro_categories = get_the_terms(get_the_ID(), 'product_cat');
                                                if (!empty($pro_categories) && !is_wp_error($pro_categories)) :
                                                    // Get the first category
                                                    $first_category = $pro_categories[0];
                                                ?>
                                                    <a href="<?php echo get_term_link($first_category); ?>" class="cus_cat tag">
                                                        <?php echo esc_html($first_category->name); ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="content">
                                            <a href="<?php echo the_permalink() ?>" class="cus_title"><?php woocommerce_template_loop_product_title() ?></a>
                                        </div>
                                        <hr>
                                        <div class="meta">
                                            <div class="meta-info">
                                                <p class="cus_price tertiary-text"><?php woocommerce_template_loop_price() ?></p>
                                            </div>
                                            <?php if (!empty($settings['star_review_hide'] == 'yes')) :   ?>
                                                <a href="<?php echo the_permalink() ?>" class="meta-review">
                                                    <?php
                                                    $rating_count = $product->get_average_rating();
                                                    $review_count = $product->get_review_count();
                                                    ?>
                                                    <?php if ($rating_count > 0) : ?>
                                                        <?php for ($x = 0; $x < 5; $x++) : ?>
                                                            <?php if ($x < $rating_count) : ?>
                                                                <i class="bi bi-star-fill"></i>
                                                            <?php else : ?>
                                                                <i class="bi bi-star"></i>
                                                            <?php endif ?>
                                                        <?php endfor ?>
                                                        <?php if (!empty($settings['review_count_hide'] == 'yes')) :   ?>
                                                            <?php if ($review_count > 0) : ?>
                                                                <span>(<?php echo esc_html($review_count) ?>)</span>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                </a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
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

            <!-- ==== / category end ==== -->

        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_three') : ?>
            <section class="section new-prompts fade-wrapper <?php echo ($settings['section_pb_show'] == 'yes') ? 'pb-0' : '' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : '' ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if (!empty($settings['aikeu_heading_content_title'])) :   ?>
                                <div class="section__header text-start">
                                    <h2 class="cus_head_title title title-animation mt-12"><?php echo wp_kses($settings['aikeu_heading_content_title'], wp_kses_allowed_html('post'))  ?></h2>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row gaper">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                global $product;
                        ?>
                                <div class="col-12 col-md-6  col-xxl-<?php echo esc_html($settings['product_grid_column']); ?> fade-top">
                                    <div class="cus_card category__single topy-tilt">
                                        <div class="thumb">
                                            <a href="<?php echo the_permalink(); ?>" class="thumb-img">
                                                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo esc_attr('image') ?>">
                                            </a>
                                            <?php if (!empty($settings['card_cate_hide'] == 'yes')) :   ?>
                                                <?php
                                                $pro_categories = get_the_terms(get_the_ID(), 'product_cat');
                                                if (!empty($pro_categories) && !is_wp_error($pro_categories)) :
                                                    // Get the first category
                                                    $first_category = $pro_categories[0];
                                                ?>
                                                    <a href="<?php echo get_term_link($first_category); ?>" class="cus_cat tag">
                                                        <?php echo esc_html($first_category->name); ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="content">

                                            <a href="<?php echo the_permalink() ?>" class="cus_title"><?php woocommerce_template_loop_product_title() ?></a>

                                        </div>
                                        <hr>
                                        <div class="meta">
                                            <div class="meta-info">
                                                <p class="cus_price tertiary-text"><?php woocommerce_template_loop_price() ?></p>
                                            </div>
                                            <?php if (!empty($settings['star_review_hide'] == 'yes')) :   ?>
                                                <a href="<?php echo the_permalink() ?>" class="meta-review">
                                                    <?php
                                                    $rating_count = $product->get_average_rating();
                                                    $review_count = $product->get_review_count();
                                                    ?>
                                                    <?php if ($rating_count > 0) : ?>
                                                        <?php for ($x = 0; $x < 5; $x++) : ?>
                                                            <?php if ($x < $rating_count) : ?>
                                                                <i class="bi bi-star-fill"></i>
                                                            <?php else : ?>
                                                                <i class="bi bi-star"></i>
                                                            <?php endif ?>
                                                        <?php endfor ?>
                                                        <?php if (!empty($settings['review_count_hide'] == 'yes')) :   ?>
                                                            <?php if ($review_count > 0) : ?>
                                                                <span>(<?php echo esc_html($review_count) ?>)</span>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                </a>
                                            <?php endif ?>
                                        </div>
                                        <?php if (!empty($settings['button_hide'] == 'yes')) :   ?>
                                            <div class="cta">
                                                <a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="btn btn--quaternary add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>"><?php echo esc_html('Add to Cart') ?></a>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_four') : ?>
            <!-- ==== Slider start ==== -->
            <div class="section showcase <?php echo ($settings['section_pb_show'] == 'yes') ? 'pb-0' : '' ?> <?php echo ($settings['section_pt_show'] == 'yes') ? 'pt-0' : '' ?>">
                <div class="showcase__slider">
                    <?php
                    if ($query->have_posts()) :
                        while ($query->have_posts()) :
                            $query->the_post();
                            global $product;
                    ?>
                            <div class="showcase__single">
                                <a href="<?php echo the_permalink(); ?>" class="thumb-img">
                                    <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo esc_attr('image') ?>">
                                </a>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <!-- ==== / Slider end ==== -->
        <?php endif; ?>


<?php
    }
}

$widgets_manager->register(new TP_product());
