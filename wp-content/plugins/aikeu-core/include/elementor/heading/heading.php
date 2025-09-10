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
class TP_heading extends Widget_Base
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
        return 'tp-heading-area';
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
        return __('Heading Area', 'tpcore');
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
                    'style_two' => esc_html__('Style Two', 'aikeu-core'),
                    'style_three' => esc_html__('Style Three', 'aikeu-core'),
                ],
                'default' => 'style_one',
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
                    '{{WRAPPER}} .section__header' => 'text-align: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'subtitle_reborn_show',
            [
                'label' => esc_html__('Subtitle Switch', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
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
                    'subtitle_reborn_show' => 'yes',
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
                    'subtitle_reborn_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'aikeu_vector_switch',
            [
                'label' => esc_html__('Hide Sub Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'aikeu-core'),
                'label_off' => esc_html__('Hide', 'aikeu-core'),
                'return_value' => 'yes',
                'default' => 'yes',
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
                    'aikeu_vector_switch' => 'yes',
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
                    '{{WRAPPER}} .cus_stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .cus_stitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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
                    '{{WRAPPER}} .cus_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .cus_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
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


        <!-- ==== about section one start ==== -->
        <?php if ($settings['aikeu_content_style_selection'] == 'style_one') : ?>
            <!-- section ai -->
            <section class="heading_area">
                <div class="row justify-content-center gaper">
                    <div class="col-12 col-lg-9 col-xxl-7">
                        <div class="section__header">
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
                            <?php if (!empty($settings['aikeu_vector_switch'] == 'yes')) : ?>
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
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($settings['aikeu_content_style_selection'] == 'style_two') : ?>
            <!-- section ai -->
            <section class="heading_area">
                <div class="container">
                    <div class="row justify-content-center gaper">
                        <div class="col-12 col-lg-9 col-xxl-7">
                            <div class="section__header">
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
                                <?php if (!empty($settings['aikeu_vector_switch'] == 'yes')) : ?>
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($settings['aikeu_content_style_selection'] == 'style_three') : ?>
            <!-- section ai -->
            <div class="section__header m-0">
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
                <?php if (!empty($settings['aikeu_vector_switch'] == 'yes')) : ?>
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
            </div>
        <?php endif; ?>
        <!-- ==== section  start ==== -->


<?php
    }
}

$widgets_manager->register(new TP_heading());
