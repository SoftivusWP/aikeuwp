<?php
class TpProjectPost
{
	function __construct()
	{
		add_action('init', array($this, 'register_custom_post_type'));
		add_action('init', array($this, 'create_cat'));
		add_filter('template_include', array($this, 'casestudy_template_include')); 
	}

	public function casestudy_template_include($template)
	{
		if (is_singular('casestudy')) {
			return $this->get_template('single-casestudy.php');
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
		$aikeu_case_study_slug = get_theme_mod('aikeu_case_study_slug', __('casestudy', 'aikeu'));
		// $medidove_mem_slug = get_theme_mod('medidove_mem_slug','member'); 
		$labels = array(
			'name'                  => esc_html_x($aikeu_case_study_slug, 'Post Type General Name', 'tpcore'),
			'singular_name'         => esc_html_x('Case Study', 'Post Type Singular Name', 'tpcore'),
			'menu_name'             => esc_html__($aikeu_case_study_slug, 'tpcore'),
			'name_admin_bar'        => esc_html__('Case Study', 'tpcore'),
			'archives'              => esc_html__('Item Archives', 'tpcore'),
			'parent_item_colon'     => esc_html__('Parent Item:', 'tpcore'),
			'all_items'             => esc_html__('All Items', 'tpcore'),
			'add_new_item'          => esc_html__('Add New Case Study', 'tpcore'),
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
			'inserbt_into_item'     => esc_html__('Insert into item', 'tpcore'),
			'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'tpcore'),
			'items_list'            => esc_html__('Items list', 'tpcore'),
			'items_list_navigation' => esc_html__('Items list navigation', 'tpcore'),
			'filter_items_list'     => esc_html__('Filter items list', 'tpcore'),
		);

		$args   = array(
			'label'                 => esc_html__('Case Study', 'tpcore'),
			'labels'                => $labels,
			'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'   			=> 'dashicons-index-card',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite' => array(
				'slug' => $aikeu_case_study_slug,
				'with_front' => false,
				'menu_name' => $aikeu_case_study_slug,
				'name'      => $aikeu_case_study_slug,
			),
		);

		register_post_type('casestudy', $args);
	} 

	public function create_cat()
	{
		$aikeu_case_study_slug = get_theme_mod('aikeu_case_study_slug', __('casestudy', 'aikeu'));
		$taxonomy_slug = $aikeu_case_study_slug . '-cat';
		$labels = array(
			'name'                       => esc_html_x($aikeu_case_study_slug . 'Categories', 'Taxonomy General Name', 'tpcore'),
			'singular_name'              => esc_html_x('Case Study Categories', 'Taxonomy Singular Name', 'tpcore'),
			'menu_name'                  => esc_html__('Case Study Categories', 'tpcore'),
			'all_items'                  => esc_html__('All ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'parent_item'                => esc_html__('Parent ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'parent_item_colon'          => esc_html__('Parent ' . $aikeu_case_study_slug . ' Category:', 'tpcore'),
			'new_item_name'              => esc_html__('New ' . $aikeu_case_study_slug . ' Category Name', 'tpcore'),
			'add_new_item'               => esc_html__('Add New ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'edit_item'                  => esc_html__('Edit ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'update_item'                => esc_html__('Update ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'view_item'                  => esc_html__('View ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'separate_items_with_commas' => esc_html__('Separate ' . $aikeu_case_study_slug . ' categories with commas', 'tpcore'),
			'add_or_remove_items'        => esc_html__('Add or remove ' . $aikeu_case_study_slug . ' ', 'tpcore'),
			'choose_from_most_used'      => esc_html__('Choose from the most used'  . $aikeu_case_study_slug . ' categories', 'tpcore'),
			'popular_items'              => esc_html__('Popular ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'search_items'               => esc_html__('Search ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'not_found'                  => esc_html__('Not Found', 'tpcore'),
			'no_terms'                   => esc_html__('No ' . $aikeu_case_study_slug . ' Category', 'tpcore'),
			'items_list'                 => esc_html__('' . $aikeu_case_study_slug . ' Category list', 'tpcore'),
			'items_list_navigation'      => esc_html__('' . $aikeu_case_study_slug . ' Category list navigation', 'tpcore'),
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

		register_taxonomy('casestudy-cat', 'casestudy', $args);
	}
}

new TpProjectPost();
