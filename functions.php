<?php
// Add extra styles for red line and hoover colors (red)
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', 20);

function my_theme_enqueue_styles(){
  wp_enqueue_style('blackoot-lite-child-custom-style', get_stylesheet_directory_uri().'/css/blackoot-child-style.css');
  wp_enqueue_script('blackoot_responsive_menu', get_stylesheet_directory_uri().'/js/menu.js',array('jquery'), '1.0.0', true);
}

/*
 * Create dropdown menu (used in responsive mode)
 * Requires a custom menu to be set (won't work with fallback menu)
 */
function child_blackoot_dropdown_nav_menu() {

	$menu_name = 'primary';
	$locations = get_nav_menu_locations();

	if ( ( $locations ) && isset( $locations[ $menu_name ] ) ) :

		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		if ( $menu ) :

			$menu_items = wp_get_nav_menu_items( $menu->term_id );
			$menu_list  = '<div id="menu"><span>&#9776;</span></div> ';
			$menu_list .= '<ul id="dropdown-menu">';

			foreach ( (array) $menu_items as $key => $menu_item ) :

				$title = $menu_item->title;
				$url = $menu_item->url;
				if ( $menu_item->menu_item_parent && $menu_item->menu_item_parent > 0 ) :
					$menu_list .= '<li value="' . esc_url( $url ) . '"> &raquo; ' . esc_html( $title ) . '</li>';
				else :
					$menu_list .= '<li value="' . esc_url( $url ) . '">' . esc_html( $title ) . '</li>';
				endif;

			endforeach;

			$menu_list .= '</ul>';

			// $menu_list is now ready to output
			echo $menu_list; // WPCS: XSS ok.

		endif;

	endif;

}
