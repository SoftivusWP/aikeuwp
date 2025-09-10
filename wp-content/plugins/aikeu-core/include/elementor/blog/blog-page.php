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
class TP_Blog_page extends Widget_Base
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
        return 'tp-blog-page';
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
        return __('Blog Page', 'tpcore');
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
                    'style_one' => esc_html__('Style Grid', 'aikeu-core'),
                    'style_two' => esc_html__('Style Left Sidebar', 'aikeu-core'),
                    'style_three' => esc_html__('Style Right Sidebar', 'aikeu-core'),
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


        // =======================Style=================================//

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
                    '{{WRAPPER}} .cus_box .thumb a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cus_box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'card_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .cus_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
        
        // card link
        $this->start_controls_section(
            'linkstyle',
            [
                'label' => esc_html__('Link', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'link_typ',
                'selector' => '{{WRAPPER}} .cus_link',

            ]
        );

        $this->add_control(
            'link_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_link' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'linkcolorhover',
            [
                'label'     => esc_html__('Link Hover Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.cus_link:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_margin',
            [
                'label' => esc_html__('Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cus_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'link_padding',
            [
                'label'      => __('Padding', 'plugin-name'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .cus_link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                'post_type'      => 'post',
                'posts_per_page' => $settings['aikeu_blog_posts_per_page'],
                'orderby'        => $settings['aikeu_blog_template_orderby'],
                'order'          => $settings['aikeu_blog_template_order'],
                'post_status'    => 'publish',
                'post__in'          => $settings['blog_category'],
                'paged'          => $paged,
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
            <!-- ==== blog Grid start ==== -->
            <section class="news-alter section">
                <div class="container">
                    <div class="row g-4">
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
                                                    <?php echo wp_trim_words(get_the_title(), 7);?>
                                                </a>
                                            </h4>
                                            <div class="cta">
                                                <a href="<?php the_permalink() ?>" class='cus_link'>
                                                    <?php echo esc_html('Learn More') ?>
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
            <!-- ==== / blog Grid end ==== -->
        <?php endif ?>

        <?php if ($settings['aikeu_content_style_selection'] == 'style_two') : ?>
            <!-- ==== blog Left Sidrbar start ==== -->
            <section class="news-alter section">
                <div class="container">
                    <div class="row gy-5 gy-lg-0">
                        <div class="col-12 col-lg-5 col-xl-4">
                            <div class="sidebar wow fadeInDown" data-wow-duration="0.8s">
                                <?php get_sidebar() ?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-xl-8">
                            <div class="row g-4">
                                <?php
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                ?>
                                        <div class="col-12 col-xl-6">
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
                                                            <?php echo wp_trim_words(get_the_title(), 7);?>
                                                        </a>
                                                    </h4>
                                                    <div class="cta">
                                                        <a href="<?php the_permalink() ?>" class='cus_link'>
                                                            <?php echo esc_html('Learn More') ?>
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
                    </div>
                </div>
            </section>
            <!-- ==== / blog Left Sidrbar end ==== -->
        <?php endif ?>
        
        <?php if ($settings['aikeu_content_style_selection'] == 'style_three') : ?>
            <!-- ==== blog Right Sidrbar start ==== -->
            <section class="news-alter section">
                <div class="container">
                    <div class="row gy-5 gy-lg-0">
                        <div class="col-12 col-lg-7 col-xl-8">
                            <div class="row g-4">
                                <?php
                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                ?>
                                        <div class="col-12 col-xl-6">
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
                                                            <?php echo wp_trim_words(get_the_title(), 7);?>
                                                        </a>
                                                    </h4>
                                                    <div class="cta">
                                                        <a href="<?php the_permalink() ?>" class='cus_link'>
                                                            <?php echo esc_html('Learn More') ?>
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
                        
                        <div class="col-12 col-lg-5 col-xl-4">
                            <div class="sidebar wow fadeInDown" data-wow-duration="0.8s">
                                <?php get_sidebar() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ==== / blog Right Sidrbar end ==== -->
        <?php endif ?>


<?php
    }
}

$widgets_manager->register(new TP_Blog_page());
