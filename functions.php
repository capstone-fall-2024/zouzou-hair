<?php

/**
 * zouzou-hair-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zouzou-hair-theme
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zouzou_hair_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on zouzou-hair-theme, use a find and replace
		* to change 'zouzou-hair-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('zouzou-hair-theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'zouzou-hair-theme'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'zouzou_hair_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'zouzou_hair_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zouzou_hair_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('zouzou_hair_theme_content_width', 640);
}
add_action('after_setup_theme', 'zouzou_hair_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zouzou_hair_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'zouzou-hair-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'zouzou-hair-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'zouzou_hair_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function zouzou_hair_theme_scripts()
{
	wp_enqueue_style('zouzou-hair-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('zouzou-hair-theme-style', 'rtl', 'replace');

	wp_enqueue_script('zouzou-hair-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'zouzou_hair_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('after_setup_theme', 'zouzou_hair_theme_block_parts_setup');

function zouzou_hair_theme_block_parts_setup()
{
	add_theme_support('block-template-parts');
}

/**
 * ACF FUNCTIONS
 */

// INITIALIZE SERVICE CATEGORY TAXONOMY
add_action( 'init', function() {
	register_taxonomy( 'service-category', array(
	0 => '',
), array(
	'labels' => array(
		'name' => 'Categories',
		'singular_name' => 'Category',
		'menu_name' => 'Service Categories',
		'all_items' => 'All Service Categories',
		'edit_item' => 'Edit Service Category',
		'view_item' => 'View Service Category',
		'update_item' => 'Update Service Category',
		'add_new_item' => 'Add New Service Category',
		'new_item_name' => 'New Service Category Name',
		'parent_item' => 'Parent Service Category',
		'parent_item_colon' => 'Parent Service Category:',
		'search_items' => 'Search Service Categories',
		'not_found' => 'No service categories found',
		'no_terms' => 'No service categories',
		'filter_by_item' => 'Filter by service category',
		'items_list_navigation' => 'Service Categories list navigation',
		'items_list' => 'Service Categories list',
		'back_to_items' => '← Go to service categories',
		'item_link' => 'Service Category Link',
		'item_link_description' => 'A link to a service category',
	),
	'public' => true,
	'hierarchical' => true,
	'show_in_menu' => true,
	'show_in_rest' => true,
) );
} );

// INITIALIZE SERVICES CUSTOM POST TYPE
add_action( 'init', function() {
	register_post_type( 'services', array(
	'labels' => array(
		'name' => 'Services',
		'singular_name' => 'Service',
		'menu_name' => 'Services',
		'all_items' => 'All Services',
		'edit_item' => 'Edit Service',
		'view_item' => 'View Service',
		'view_items' => 'View Service',
		'add_new_item' => 'Add New Service',
		'add_new' => 'Add New Service',
		'new_item' => 'New Service',
		'parent_item_colon' => 'Parent Service:',
		'search_items' => 'Search Services',
		'not_found' => 'No services found',
		'not_found_in_trash' => 'No services found in Trash',
		'archives' => 'Services Archives',
		'attributes' => 'Services Attributes',
		'insert_into_item' => 'Insert into service',
		'uploaded_to_this_item' => 'Uploaded to this service',
		'filter_items_list' => 'Filter services list',
		'filter_by_date' => 'Filter services by date',
		'items_list_navigation' => 'Services list navigation',
		'items_list' => 'Services list',
		'item_published' => 'Service published.',
		'item_published_privately' => 'Service published privately.',
		'item_reverted_to_draft' => 'Service reverted to draft.',
		'item_scheduled' => 'Service scheduled.',
		'item_updated' => 'Service updated.',
		'item_link' => 'Service Link',
		'item_link_description' => 'A link to a service.',
	),
	'public' => true,
	'hierarchical' => true,
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-admin-post',
	'supports' => array(
		0 => 'title',
		1 => 'custom-fields',
	),
	'taxonomies' => array(
		0 => 'service-category',
	),
	'delete_with_user' => false,
) );
} );

// INITIALIZE MEMBERS CUSTOM POST TYPE
add_action( 'init', function() {
	register_post_type( 'members', array(
	'labels' => array(
		'name' => 'Members',
		'singular_name' => 'Member',
		'menu_name' => 'Members',
		'all_items' => 'All Members',
		'edit_item' => 'Edit Member',
		'view_item' => 'View Member',
		'view_items' => 'View Members',
		'add_new_item' => 'Add New Member',
		'add_new' => 'Add New Member',
		'new_item' => 'New Member',
		'parent_item_colon' => 'Parent Member:',
		'search_items' => 'Search Members',
		'not_found' => 'No members found',
		'not_found_in_trash' => 'No members found in Trash',
		'archives' => 'Member Archives',
		'attributes' => 'Member Attributes',
		'insert_into_item' => 'Insert into member',
		'uploaded_to_this_item' => 'Uploaded to this member',
		'filter_items_list' => 'Filter members list',
		'filter_by_date' => 'Filter members by date',
		'items_list_navigation' => 'Members list navigation',
		'items_list' => 'Members list',
		'item_published' => 'Member published.',
		'item_published_privately' => 'Member published privately.',
		'item_reverted_to_draft' => 'Member reverted to draft.',
		'item_scheduled' => 'Member scheduled.',
		'item_updated' => 'Member updated.',
		'item_link' => 'Member Link',
		'item_link_description' => 'A link to a member.',
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-admin-post',
	'supports' => array(
		0 => 'title',
		1 => 'custom-fields',
	),
	'delete_with_user' => false,
) );
} );

// INITIALIZE ACF FIELDS
if (function_exists('acf_add_local_field_group')):

	// CUSTOM FIELDS FOR CONTACT PAGE
	acf_add_local_field_group(array(
		'key' => 'store_info',
		'title' => 'Store Information',
		'fields' => array(
			array(
				'key' => 'hours',
				'label' => 'Hours',
				'name' => 'hours',
				'type' => 'textarea',
				'value' => 'Monday: 4pm to 8pm Tuesday - Saturday: 10am to 4pm',
				'instructions' => 'Enter the store hours',
				'required' => 1,
			),
			array(
				'key' => 'location',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'textarea',
				'value' => '8718 109 St NW Edmonton, AB T6G 1E9',
				'instructions' => 'Enter the store location',
				'required' => 1,
			),
			array(
				'key' => 'phone',
				'label' => 'Phone',
				'name' => 'phone',
				'type' => 'text',
				'value' => '780-758-4242',
				'instructions' => 'Enter the store phone number',
				'required' => 1,
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-contact.php',
				),
			),
		),
	));

	//CUSTOM FIELD FOR HOME PAGE INFORMATION SECTION
	add_action( 'acf/include_fields', function() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}
	
		acf_add_local_field_group( array(
		'key' => 'group_6723fae4753ec',
		'title' => 'Home Page Information Section',
		'fields' => array(
			array(
				'key' => 'field_6723fae5c0936',
				'label' => 'Paragraph 1',
				'name' => 'paragraph_1',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Update the info section about Zouzou Hair on the home page',
				'maxlength' => '',
				'allow_in_bindings' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_6723fede146a4',
				'label' => 'Paragraph 2 (Optional)',
				'name' => 'paragraph_2_optional',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'This is another space for you to add more information.',
				'maxlength' => '',
				'allow_in_bindings' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	} );
	

	// CUSTOM FIELDS FOR IMAGES FOR SERVICE CATEGORIES
	acf_add_local_field_group( array(
		'key' => 'service-gallery',
		'title' => 'Service Gallery',
		'fields' => array(
			array(
				'key' => 'images',
				'label' => 'Images',
				'name' => 'images',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => 'Upload images for this service category',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'image_1',
						'label' => 'Image 1',
						'name' => 'image_1',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'allow_in_bindings' => 0,
						'preview_size' => 'medium',
					),
					array(
						'key' => 'image_2',
						'label' => 'Image 2',
						'name' => 'image_2',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'image_3',
						'label' => 'Image 3',
						'name' => 'image_3',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'image_4',
						'label' => 'Image 4',
						'name' => 'image_4',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'image_5',
						'label' => 'Image 5',
						'name' => 'image_5',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'image_6',
						'label' => 'Image 6',
						'name' => 'image_6',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'image_7',
						'label' => 'Image 7',
						'name' => 'image_7',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'image_8',
						'label' => 'Image 8',
						'name' => 'image_8',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 0,
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'service-category',
				),
			),
		),
	) );

	// CUSTOM FIELDS FOR EACH SERVICE
	acf_add_local_field_group(array(
		'key' => 'service_info',
		'title' => 'Service Information',
		'fields' => array(
			array(
				'key' => 'price',
				'label' => 'Price',
				'name' => 'price',
				'type' => 'text',
				'instructions' => 'Enter the price of the service with the dollar sign. Example: $10',
				'required' => 1,
			),
			array(
				'key' => 'duration',
				'label' => 'Duration',
				'name' => 'duration',
				'type' => 'text',
				'instructions' => 'Enter the duration of the service. Example: 1hr',
				'required' => 1,
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services',
				),
			),
		),
	));

	// CUSTOM FIELDS FOR ADDING NEW MEMBERS
	acf_add_local_field_group( array(
		'key' => 'member',
		'title' => 'Member',
		'fields' => array(
			array(
				'key' => 'position',
				'label' => 'Position',
				'name' => 'position',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => 'Enter the position of the member here.',
				'required' => 1,
			),
			array(
				'key' => 'introduction',
				'label' => 'Introduction',
				'name' => 'introduction',
				'type' => 'textarea',
				'instructions' => 'Enter the introduction for the member here.',
				'required' => 1,
			),
			array(
				'key' => 'image',
				'label' => 'Image',
				'name' => 'image',
				'aria-label' => '',
				'type' => 'image',
				'instructions' => 'Enter an image for the member here.',
				'required' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'members',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );

endif;

function get_store_info()
{
	$contact_pages = get_posts(array(
		'post_type' => 'page',
		'meta_query' => array(
			array(
				'key' => '_wp_page_template',
				'value' => 'page-contact.php',
				'compare' => 'LIKE',
			),
		),
	));

	if (!empty($contact_pages)) {
		$contact_page = $contact_pages[0];

		return array(
			'phone' => get_field('phone', $contact_page->ID),
			'location' => get_field('location', $contact_page->ID),
			'hours' => get_field('hours', $contact_page->ID),
		);
	}

	return false;
}

// DISABLES BLOCK EDITOR WHEN ADDING A NEW SERVICE
add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_services', 10, 2);
function disable_gutenberg_for_services($current_status, $post_type)
{
    if ($post_type === 'services') return false;
    return $current_status;
}

// DISABLES BLOCK EDITOR WHEN ADDING A NEW MEMBER
add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_members', 10, 2);
function disable_gutenberg_for_members($current_status, $post_type)
{
    if ($post_type === 'members') return false;
    return $current_status;
}

// CSS HACK TO DISABLE SLUG AND DESCRIPTION WHEN CREATING A NEW SERVICE CATEGORY
add_action( 'admin_head', 'disable_slug_description_css' );
function disable_slug_description_css() {

    global $taxonomy;

    $modified_taxonomy = array( 'service-category' );

    if(empty($taxonomy) || !in_array($taxonomy, $modified_taxonomy)) {
        return;
    }

    ?>

        <style>
            .form-field.term-slug-wrap,
            .form-field.term-parent-wrap,
            .form-field.term-description-wrap   {display: none;}
        </style>

    <?php

}

// ADDS SUPPORT FOR CUSTOM WOOCOMMERCE TEMPLATES
function zouzou_hair_theme_add_woocommerce_support() {
	add_theme_support('woocommerce');
}

add_action( 'after_setup_theme', 'zouzou_hair_theme_add_woocommerce_support' );

// FUNCTION THAT SETS SEARCH TO ONLY SEARCH FOR PRODUCTS
function search_only_products($query) {
	
	if ($query->is_search) {
		$query->set('post_type' ,'product');
		$query->set('wc_query', 'product_query');
	}

	return $query;

}
add_action( 'pre_get_posts', 'search_only_products' );