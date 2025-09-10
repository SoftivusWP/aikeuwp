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
class TP_text_brif extends Widget_Base
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
        return 'tp-text-brif';
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
        return __('Text Brif', 'tpcore');
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


        //Heading Section
        $this->start_controls_section(
            'aikeu_heading_one_section_genaral',
            [
                'label' => esc_html__('Heading', 'aikeu-core')
            ]
        );

        $this->add_control(
            'aikeu_heading_content_style_selection',
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


        $this->start_controls_section(
            'text_brif',
            [
                'label' => esc_html__('Text Brif', 'aikeu-core'),
            ]
        );

        $this->add_control(
            'aikeu_text_brif',
            [
                'label' => esc_html__('Brif One', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Next-Level Gaming with AI', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'aikeu_card_content_image',
            [
                'label' => esc_html__('Card Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'aikeu_text_brif2',
            [
                'label' => esc_html__('Brif Two', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore the Future of', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'aikeu_card_content_image2',
            [
                'label' => esc_html__('Card Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'aikeu_text_brif3',
            [
                'label' => esc_html__('Brif Three', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Interactive Entertainment', 'aikeu-core'),
                'placeholder' => esc_html__('Type your text here', 'aikeu-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'aikeu_card_content_image3',
            [
                'label' => esc_html__('Card Choose Image', 'aikeu-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section();




        // ======================= Heading Style =================================//




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


        <?php if ($settings['aikeu_heading_content_style_selection'] == 'style_one') : ?>
            <!-- ==== text brief start ==== -->
            <section class="text-brief section" id="scrollPosition">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-brief__inner">
                                <div class="t-br-one">
                                    <?php if (!empty($settings['aikeu_card_content_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($settings['aikeu_card_content_image']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_text_brif'])) :   ?>
                                        <h2 class="cus_title light-title fw-7 text-white title-animation"> <?php echo wp_kses($settings['aikeu_text_brif'], wp_kses_allowed_html('post'))  ?></h2>
                                    <?php endif ?>
                                </div>
                                <div class="t-br-two">
                                    <?php if (!empty($settings['aikeu_text_brif2'])) :   ?>
                                        <h3 class="cus_title light-title fw-7 text-white title-animation"> <?php echo wp_kses($settings['aikeu_text_brif2'], wp_kses_allowed_html('post'))  ?></h3>
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_card_content_image2']['url'])) : ?>
                                        <img src="<?php echo esc_url($settings['aikeu_card_content_image2']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    <?php endif ?>
                                </div>
                                <div class="t-br-three">
                                    <?php if (!empty($settings['aikeu_card_content_image3']['url'])) : ?>
                                        <img src="<?php echo esc_url($settings['aikeu_card_content_image3']['url']) ?>" alt="<?php echo esc_attr('Image') ?>">
                                    <?php endif ?>
                                    <?php if (!empty($settings['aikeu_text_brif3'])) :   ?>
                                        <h4 class="cus_title light-title fw-7 text-white title-animation"> <?php echo wp_kses($settings['aikeu_text_brif3'], wp_kses_allowed_html('post'))  ?></h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ==== / text brief end ==== -->
        <?php endif ?>

<?php

    }
}
$widgets_manager->register(new TP_text_brif());
