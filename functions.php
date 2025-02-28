<?php
/**
 * Satori Digital functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Satori_Digital
 * @since Satori_Digital 1.0
 */


 
/**
 * Registers a custom post type 'Services'.
 *
 * @since 1.0.0
 *
 * @return void
 */
function satori_services() : void {
	$labels = [
		'name' => _x( 'services', 'Post Type General Name', 'satori-services' ),
		'singular_name' => _x( 'Service', 'Post Type Singular Name', 'satori-services' ),
		'menu_name' => __( 'Services', 'satori-services' ),
		'name_admin_bar' => __( 'Services', 'satori-services' ),
		'archives' => __( 'Service Archives', 'satori-services' ),
		'attributes' => __( 'Service Attributes', 'satori-services' ),
		'parent_item_colon' => __( 'Parent Service:', 'satori-services' ),
		'all_items' => __( 'All Services', 'satori-services' ),
		'add_new_item' => __( 'Add New Service', 'satori-services' ),
		'add_new' => __( 'Add New', 'satori-services' ),
		'new_item' => __( 'New Service', 'satori-services' ),
		'edit_item' => __( 'Edit Service', 'satori-services' ),
		'update_item' => __( 'Update Service', 'satori-services' ),
		'view_item' => __( 'View Service', 'satori-services' ),
		'view_items' => __( 'View Services', 'satori-services' ),
		'search_items' => __( 'Search Services', 'satori-services' ),
		'not_found' => __( 'Service Not Found', 'satori-services' ),
		'not_found_in_trash' => __( 'Service Not Found in Trash', 'satori-services' ),
		'featuredImage' => __( 'Featured Image', 'satori-services' ),
		'set_featuredImage' => __( 'Set Featured Image', 'satori-services' ),
		'remove_featuredImage' => __( 'Remove Featured Image', 'satori-services' ),
		'use_featuredImage' => __( 'Use as Featured Image', 'satori-services' ),
		'insert_into_item' => __( 'Insert into Service', 'satori-services' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', 'satori-services' ),
		'items_list' => __( 'Services List', 'satori-services' ),
		'items_list_navigation' => __( 'Services List Navigation', 'satori-services' ),
		'filter_items_list' => __( 'Filter Services List', 'satori-services' ),
	];
	$labels = apply_filters( 'services-labels', $labels );

	$args = [
		'label' => __( 'Service', 'satori-services' ),
		'description' => __( 'My Post Type Description', 'satori-services' ),
		'labels' => $labels,
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'excerpt',
		],
		'taxonomies'   => array('category', 'post_tag'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-groups',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'can_export' => true,
		'capability_type' => 'page',
		'show_in_rest' => true,
	];
	$args = apply_filters( 'services-args', $args );

	register_post_type( 'services', $args );
}
add_action( 'init', 'satori_services', 0 );



/**
 * Registers default css from SASS build.
 *
 * @since 1.0.0
 *
 * @return void
 */

function register_theme_styles() {
    wp_register_style( 'theme-styles', get_template_directory_uri().'/build/style.css' );
    wp_enqueue_style( 'theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'register_theme_styles' );






// // Adds theme support for post formats.
// if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
// 	/**
// 	 * Adds theme support for post formats.
// 	 *
// 	 * @since Twenty Twenty-Five 1.0
// 	 *
// 	 * @return void
// 	 */
// 	function twentytwentyfive_post_format_setup() {
// 		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
// 	}
// endif;
// add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// // Enqueues editor-style.css in the editors.
// if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
// 	/**
// 	 * Enqueues editor-style.css in the editors.
// 	 *
// 	 * @since Twenty Twenty-Five 1.0
// 	 *
// 	 * @return void
// 	 */
// 	function twentytwentyfive_editor_style() {
// 		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
// 	}
// endif;
// add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// // Enqueues style.css on the front.
// if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
// 	/**
// 	 * Enqueues style.css on the front.
// 	 *
// 	 * @since Twenty Twenty-Five 1.0
// 	 *
// 	 * @return void
// 	 */
// 	function twentytwentyfive_enqueue_styles() {
// 		wp_enqueue_style(
// 			'twentytwentyfive-style',
// 			get_parent_theme_file_uri( 'style.css' ),
// 			array(),
// 			wp_get_theme()->get( 'Version' )
// 		);
// 	}
// endif;
// add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

// // Registers custom block styles.
// if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
// 	/**
// 	 * Registers custom block styles.
// 	 *
// 	 * @since Twenty Twenty-Five 1.0
// 	 *
// 	 * @return void
// 	 */
// 	function twentytwentyfive_block_styles() {
// 		register_block_style(
// 			'core/list',
// 			array(
// 				'name'         => 'checkmark-list',
// 				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
// 				'inline_style' => '
// 				ul.is-style-checkmark-list {
// 					list-style-type: "\2713";
// 				}

// 				ul.is-style-checkmark-list li {
// 					padding-inline-start: 1ch;
// 				}',
// 			)
// 		);
// 	}
// endif;
// add_action( 'init', 'twentytwentyfive_block_styles' );

// // Registers pattern categories.
// if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
// 	/**
// 	 * Registers pattern categories.
// 	 *
// 	 * @since Twenty Twenty-Five 1.0
// 	 *
// 	 * @return void
// 	 */
// 	function twentytwentyfive_pattern_categories() {

// 		register_block_pattern_category(
// 			'twentytwentyfive_page',
// 			array(
// 				'label'       => __( 'Pages', 'twentytwentyfive' ),
// 				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
// 			)
// 		);

// 		register_block_pattern_category(
// 			'twentytwentyfive_post-format',
// 			array(
// 				'label'       => __( 'Post formats', 'twentytwentyfive' ),
// 				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
// 			)
// 		);
// 	}
// endif;
// add_action( 'init', 'twentytwentyfive_pattern_categories' );

// // Registers block binding sources.
// if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
// 	/**
// 	 * Registers the post format block binding source.
// 	 *
// 	 * @since Twenty Twenty-Five 1.0
// 	 *
// 	 * @return void
// 	 */
// 	function twentytwentyfive_register_block_bindings() {
// 		register_block_bindings_source(
// 			'twentytwentyfive/format',
// 			array(
// 				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
// 				'get_value_callback' => 'twentytwentyfive_format_binding',
// 			)
// 		);
// 	}
// endif;
// add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// // Registers block binding callback function for the post format name.
// if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
// 	/**
// 	 * Callback function for the post format name block binding source.
// 	 *
// 	 * @since Twenty Twenty-Five 1.0
// 	 *
// 	 * @return string|void Post format name, or nothing if the format is 'standard'.
// 	 */
// 	function twentytwentyfive_format_binding() {
// 		$post_format_slug = get_post_format();

// 		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
// 			return get_post_format_string( $post_format_slug );
// 		}
// 	}
// endif;

function add_background_image_to_query_loop($blockContent, $block) {
    if ($block['blockName'] === 'core/group' && !empty($block['attrs']['className']) && strpos($block['attrs']['className'], 'custom-post-bg') !== false) {
        $postId = get_the_ID();
        $featuredImage = get_the_post_thumbnail_url($postId, 'large');

        if ($featuredImage) {
            return preg_replace('/(<div class="custom-post-bg")/', '$1 style="background-image: url(' . esc_url($featuredImage) . ');"', $blockContent, 1);
        }
    }
    return $blockContent;
}
add_filter('render_block', 'add_background_image_to_query_loop', 10, 2);

function custom_post_grid_shortcode($atts) {
    ob_start();

    $args = array(
        'post_type'      => 'post', // Change to your custom post type if needed
        'posts_per_page' => 6,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="custom-post-grid">';
        while ($query->have_posts()) {
            $query->the_post();
            $background = get_the_post_thumbnail_url(get_the_ID(), 'large');

            echo '<div class="custom-grid-item" style="background-image: url(' . esc_url($background) . ');">';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    }

    return ob_get_clean();
}
add_shortcode('custom_post_grid', 'custom_post_grid_shortcode');
