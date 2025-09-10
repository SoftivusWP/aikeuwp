<?php

class TpServicesPost
{
    public function __construct()
    {
        add_action('init', array($this, 'register_custom_post_type'));
        add_action('init', array($this, 'create_cat'));
        add_filter('template_include', array($this, 'services_template_include'));
    }

    public function services_template_include($template)
    {
        if (is_singular('services')) {
            return $this->get_template('single-services.php');
        }
        return $template;
    }

    public function get_template($template)
    {
        if ($theme_file = locate_template(array($template))) {
            $file = $theme_file;
        } else {
            $file = TPCORE_ADDONS_DIR . '/include/template/' . $template;
        }
        return apply_filters(__FUNCTION__, $file, $template);
    }


    public function register_custom_post_type()
    {
        $aikeu_services_slug = get_theme_mod('aikeu_services_slug', __('services', 'aikeu'));
        $labels = array(
            'name'                  => esc_html_x($aikeu_services_slug, 'Post Type General Name', 'tpcore'),
            'singular_name'         => esc_html_x('Service', 'Post Type Singular Name', 'tpcore'),
            'menu_name'             => esc_html__($aikeu_services_slug, 'tpcore'),
            'name_admin_bar'        => esc_html__('Service', 'tpcore'),
            'archives'              => esc_html__('Item Archives', 'tpcore'),
            'parent_item_colon'     => esc_html__('Parent Item:', 'tpcore'),
            'all_items'             => esc_html__('All Items', 'tpcore'),
            'add_new_item'          => esc_html__('Add New Service', 'tpcore'),
            'add_new'               => esc_html__('Add New', 'tpcore'),
            'new_item'              => esc_html__('New Item', 'tpcore'),
            'edit_item'             => esc_html__('Edit Item', 'tpcore'),
            'update_item'           => esc_html__('Update Item', 'tpcore'),
            'view_item'             => esc_html__('View Item', 'tpcore'),
            'search_items'          => esc_html__('Search Item', 'tpcore'),
            'not_found'             => esc_html__('Not found', 'tpcore'),
            'not_found_in_trash'    => esc_html__('Not found in Trash', 'tpcore'),
            'featured_image'        => esc_html__('Featured Image', 'tpcore'),
            'set_featured_image'    => esc_html__('Set featured image', 'tpcore'),
            'remove_featured_image' => esc_html__('Remove featured image', 'tpcore'),
            'use_featured_image'    => esc_html__('Use as featured image', 'tpcore'),
            'insert_into_item'      => esc_html__('Insert into item', 'tpcore'), // Corrected typo
            'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'tpcore'),
            'items_list'            => esc_html__('Items list', 'tpcore'),
            'items_list_navigation' => esc_html__('Items list navigation', 'tpcore'),
            'filter_items_list'     => esc_html__('Filter items list', 'tpcore'),
        );

        $args = array(
            'label'                 => esc_html__('Service', 'tpcore'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
            'taxonomies'            => array('post_tag'), // Add support for post tags
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-shield',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'rewrite' => array(
                'slug' => $aikeu_services_slug,
                'with_front' => false
            ),
        );

        register_post_type('services', $args);
    }

    public function create_cat()
    {
        $aikeu_services_slug = get_theme_mod('aikeu_services_slug', __('services', 'aikeu'));
        $taxonomy_slug = $aikeu_services_slug . '-cat';
        $labels = array(
            'name'                       => esc_html_x($aikeu_services_slug . 'Categories', 'Taxonomy General Name', 'aikeu'),
            'singular_name'              => esc_html_x('Category', 'Taxonomy Singular Name', 'aikeu'),
            'menu_name'                  => esc_html__('Categories', 'aikeu'),
            'all_items'                  => esc_html__('All ' . $aikeu_services_slug . ' Categories', 'aikeu'),
            'parent_item'                => esc_html__('Parent ' . $aikeu_services_slug . ' Category', 'aikeu'),
            'parent_item_colon'          => esc_html__('Parent ' . $aikeu_services_slug . ' Category:', 'aikeu'),
            'new_item_name'              => esc_html__('New ' . $aikeu_services_slug . ' Category Name', 'aikeu'),
            'add_new_item'               => esc_html__('Add New ' . $aikeu_services_slug . ' Category', 'aikeu'),
            'edit_item'                  => esc_html__('Edit ' . $aikeu_services_slug . ' Category', 'aikeu'),
            'update_item'                => esc_html__('Update ' . $aikeu_services_slug . ' Category', 'aikeu'),
            'view_item'                  => esc_html__('View ' . $aikeu_services_slug . ' Category', 'aikeu'),
            'separate_items_with_commas' => esc_html__('Separate ' . $aikeu_services_slug . ' categories with commas', 'aikeu'),
            'add_or_remove_items'        => esc_html__('Add or remove ' . $aikeu_services_slug . ' categories', 'aikeu'),
            'choose_from_most_used'      => esc_html__('Choose from the most used ' . $aikeu_services_slug . ' categories', 'aikeu'),
            'popular_items'              => esc_html__('Popular ' . $aikeu_services_slug . ' Categories', 'aikeu'),
            'search_items'               => esc_html__('Search ' . $aikeu_services_slug . ' Categories', 'aikeu'),
            'not_found'                  => esc_html__('Not Found', 'aikeu'),
            'no_terms'                   => esc_html__('No ' . $aikeu_services_slug . ' categories', 'aikeu'),
            'items_list'                 => esc_html__($aikeu_services_slug . ' categories list', 'aikeu'),
            'items_list_navigation'      => esc_html__($aikeu_services_slug . ' categories list navigation', 'aikeu'),
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'           => array(
                'slug'       => $taxonomy_slug,
                'with_front' => false,
            ),
        );

        register_taxonomy('services-cat', 'services', $args); 
    }
}

new TpServicesPost();
