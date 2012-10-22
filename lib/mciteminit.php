<?php
add_action( 'init', 'am_cpt_init' );
function am_cpt_init() {
	$args = array(
		'label' 		=> 'Minecraft Item',
		'labels' 		=> array(
								'name' 				=> 'Minecraft Item',
								'singular_name' 	=> 'Minecraft Item',
								'add_new' 			=> 'Add New MC Item',
								'add_new_item' 		=> 'Add New MC Item',
								'edit_item' 		=> 'Edit MC Item',
								'new_item' 			=> 'New MC Item',
								'view_item' 		=> 'View MC Item',
								'search_items'		=> 'Search MC Items',
								'not_found'			=> 'No MC Items Found',
								'not_found_in_trash'	=> 'No MC Items found in trash'
							),
		'description'	=> 'Minecraft post type for entering Minecraft Items',
		'public'		=> true,
		'show_in_nav_menus' => false,
		'show_in_menu'	=> true,
		'supports' 		=>	array(
								'title',
								'editor',
								'author',
								'thumbnail',
								'excerpt',
								'comments',
								'revisions',
								'page-attributes'
							),
		'register_meta_box_cb'	=>	'mc_item_boxes',
		'taxonomies'			=> array(
										'mctype'
									),
		'rewrite'		=> array(
								'slug'	=> 'minecraft-item',
								'with_front'	=> true,
								'feeds'			=> true,
								'pages'			=> true
							)		
	);
	register_post_type( 'minecraft-item', $args );
	
	$args = array(
				'label'		=> 'MC Categories',
				'labels'	=> array(
									'name' => 'MC Categories',
									'singular_name'	=> 'MC Category',
									'search_terms'	=> 'Search MC Categories',
									'all_items'		=> 'All MC Categories',
									'parent_item'	=> 'Parent MC Category',
									'parent_item_colon'	=> 'Parent MC Category:',
									'edit_item'		=> 'Edit MC Category',
									'update_item'	=> 'Update MC Category',
									'add_new_item'	=> 'Add MC Category',
									'new_item_name'	=> 'New MC Category Name'
								),
				'public'	=> true,
				'hierarchical'	=> true
			);
	register_taxonomy('mctype', 'minecraft-item', $args);
}

function alien_flush_perma() {
    am_cpt_init();
    flush_rewrite_rules();
	
	$default_terms = array(
						'Craftable' 			=> false,
						'Crafting Station'		=> false,
						'Material'				=> false,
						'Source'				=> false,
						'Item Library'		=> false,
						'Raw Materials'			=> 'Item Library',
						'Food'					=> 'Item Library',
						'Potions'				=> 'Item Library',
						'Plants'				=> 'Item Library',
						'Wool Dyes'				=> 'Item Library',
						'Tools'					=> 'Item Library',
						'Weapons'				=> 'Item Library',
						'Armor'					=> 'Item Library',
						'Vehicles'				=> 'Item Library',
						'Decorations'			=> 'Item Library',
						'Natural Blocks'		=> 'Item Library',
						'Building Blocks'		=> 'Item Library',
						'Manufactured Blocks'	=> 'Item Library',
						'Utility'				=> 'Item Library',
						'Mechanisms'			=> 'Item Library',
						'Ores'					=> 'Item Library',
						'The Nether'			=> 'Item Library',
						'Crafting Station'		=> 'Item Library',
						'Fuel'					=> 'Item Library',
						'Gems'					=> 'Item Library',
						'Metals'				=> 'Item Library',
						'Switches'				=> 'Item Library',
						'Critters'				=> 'Item Library',
						'Monsters'				=> 'Item Library',
					);
	
	foreach ($default_terms As $k => $v) {
		if (!term_exists($k, 'mctype')) {
			if ($v) {
				$parent_term = term_exists( $v, 'mctype' );
				if (is_object($parent_term)) {
					$parent_term_id = $parent_term->term_id;
				}
				else if (is_array($parent_term)) {
					$parent_term_id = $parent_term['term_id'];
				}
				else {
					$parent_term_id = '';
				}
			}
			else {
				$parent_term_id = '';
			}
			wp_insert_term(
				$k, // the term 
				'mctype', // the taxonomy
				array(
					'parent'=> $parent_term_id
				)
			);
		}
	}
	$almc_options = array(
					'lang_crafted_with' => 'Crafted With',
					'lang_req_mats' => 'Required Materials',
					);
	add_option('almc_options', $almc_options, '', 'yes');
}
register_activation_hook( __FILE__, 'alien_flush_perma' );
?>