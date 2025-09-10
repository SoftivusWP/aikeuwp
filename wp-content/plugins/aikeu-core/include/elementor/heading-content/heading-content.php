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
class TP_content extends Widget_Base
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
        return 'tp-heading';
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
        return __('Heading', 'tpcore');
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
                'label' => esc_html__('Contnet', 'aikeu-core')
            ]
        );

        $this->add_control(
            'aikeu_content_style',
            [
                'label'   => esc_html__('Content Style', 'aikeu-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('h1', 'aikeu-core'),
                    'style_two' => esc_html__('h2', 'aikeu-core'),
                    'style_three' => esc_html__('h3', 'aikeu-core'),
                    'style_four' => esc_html__('h4', 'aikeu-core'),
                    'style_five' => esc_html__('h5', 'aikeu-core'),
                    'style_six' => esc_html__('h6', 'aikeu-core'),
                    'style_seven' => esc_html__('p', 'aikeu-core'),
                ],
                'default' => 'style_two',
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
                'default'         => 'left',
                'selectors'     => [
                    '{{WRAPPER}} .cus_content' => 'text-align: {{VALUE}} !important;',
                ],
            ]
        );



        $this->add_control(
            'aikeu_content',
            [
                'label' => esc_html__('Content', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__("Add Your Heading Text Here​", 'aikeu-core'),
                'placeholder' => esc_html__('Type your Contnet here', 'aikeu-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Title 
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Content', 'plugin-name'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'plugin-name'),
                'name'     => 'title_style_typ',
                'selector' => '{{WRAPPER}} .cus_content',

            ]
        );

        $this->add_control(
            'title_style_color',
            [
                'label'     => esc_html__('Color', 'plugin-name'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cus_content' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .cus_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .cus_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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

        <style>
            ul,
            ol {
                list-style-position: inside;
                padding-left: 20px;
                list-style-position: outside;
            }
        </style>


        <!-- ==== about section one start ==== -->
        <?php if ($settings['aikeu_content_style'] == 'style_one') : ?>
            <?php if (!empty($settings['aikeu_content'])) :   ?>
                <h1 class="cus_content title title-animation"><?php echo wp_kses($settings['aikeu_content'], wp_kses_allowed_html('post'))  ?></h1>
            <?php endif ?>
        <?php endif ?>
        <?php if ($settings['aikeu_content_style'] == 'style_two') : ?>
            <?php if (!empty($settings['aikeu_content'])) :   ?>
                <h2 class="cus_content title title-animation"><?php echo wp_kses($settings['aikeu_content'], wp_kses_allowed_html('post'))  ?></h2>
            <?php endif ?>
        <?php endif ?>
        <?php if ($settings['aikeu_content_style'] == 'style_three') : ?>
            <?php if (!empty($settings['aikeu_content'])) :   ?>
                <h3 class="cus_content title title-animation"><?php echo wp_kses($settings['aikeu_content'], wp_kses_allowed_html('post'))  ?></h3>
            <?php endif ?>
        <?php endif ?>
        <?php if ($settings['aikeu_content_style'] == 'style_four') : ?>
            <?php if (!empty($settings['aikeu_content'])) :   ?>
                <h4 class="cus_content title title-animation"><?php echo wp_kses($settings['aikeu_content'], wp_kses_allowed_html('post'))  ?></h4>
            <?php endif ?>
        <?php endif ?>
        <?php if ($settings['aikeu_content_style'] == 'style_five') : ?>
            <?php if (!empty($settings['aikeu_content'])) :   ?>
                <h5 class="cus_content title title-animation"><?php echo wp_kses($settings['aikeu_content'], wp_kses_allowed_html('post'))  ?></h5>
            <?php endif ?>
        <?php endif ?>
        <?php if ($settings['aikeu_content_style'] == 'style_six') : ?>
            <?php if (!empty($settings['aikeu_content'])) :   ?>
                <h6 class="cus_content title title-animation"><?php echo wp_kses($settings['aikeu_content'], wp_kses_allowed_html('post'))  ?></h6>
            <?php endif ?>
        <?php endif ?>
        <?php if ($settings['aikeu_content_style'] == 'style_seven') : ?>
            <?php if (!empty($settings['aikeu_content'])) :   ?>
                <p class="cus_content"><?php echo wp_kses($settings['aikeu_content'], wp_kses_allowed_html('post'))  ?></p>
            <?php endif ?>
        <?php endif; ?>
        <!-- ==== section  start ==== -->


<?php
    }
}

$widgets_manager->register(new TP_content());
