<?php
/* custom programing for this theme */

 if ( !function_exists( 'be_themes_get_header_logo_image' ) ) {
	function be_themes_get_header_logo_image() {
		global $be_themes_data;
		$logo_alt_text = esc_attr(get_bloginfo('name'));
		$logo = get_template_directory_uri().'/img/logo.png';
		if( ! empty( $be_themes_data['logo']['url'] ) ) {
			$logo = be_themes_protocol_based_urls( $be_themes_data['logo']['url'] );
		}
		if( ! empty( $be_themes_data['logo_sticky']['url'] ) ) {
			$logo_sticky = be_themes_protocol_based_urls( $be_themes_data['logo_sticky']['url'] );
		} else {
			$logo_sticky = $logo;
		}
		if( ! empty( $be_themes_data['logo_transparent']['url'] )) {
			$logo_transparent = be_themes_protocol_based_urls( $be_themes_data['logo_transparent']['url'] );
		} else {
			$logo_transparent = $logo;
		}
		if( ! empty( $be_themes_data['logo_transparent_light']['url'] )) {
			$logo_transparent_light = be_themes_protocol_based_urls( $be_themes_data['logo_transparent_light']['url'] );
		} else {
			$logo_transparent_light = $logo_transparent;
		}
		echo '<a class="logo1 hide-mobile hide-tablet" href="'.home_url().'">';
			$post_id = be_get_page_id();
			if(is_singular( 'post' ) && is_single($post_id) && isset($be_themes_data['single_blog_hero_section_from']) && $be_themes_data['single_blog_hero_section_from'] == 'inherit_option_panel') {
				$header_transparent = $be_themes_data['single_blog_header_transparent'];
			} else if((in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && is_product($post_id)) && isset($be_themes_data['single_shop_hero_section_from']) && $be_themes_data['single_shop_hero_section_from'] == 'inherit_option_panel') {
				$header_transparent = $be_themes_data['single_shop_header_transparent'];
			} else {
				$header_transparent = get_post_meta($post_id, 'be_themes_header_transparent', true);
			}
			if(!empty($header_transparent) && isset($header_transparent) && ('none' != $header_transparent)) {
				echo '<img class="transparent-logo dark-scheme-logo" src="'.apply_filters('be_themes_dark_scheme_logo', $logo_transparent ).'" alt="'.$logo_alt_text.'" />';
				echo '<img class="transparent-logo light-scheme-logo" src="'.apply_filters('be_themes_light_scheme_logo', $logo_transparent_light ).'" alt="'.$logo_alt_text.'" />';
				echo '<img class="normal-logo" src="'.apply_filters('be_themes_normal_logo', $logo ).'" alt="'.$logo_alt_text.'" />';
				echo '<img class="sticky-logo" src="'.apply_filters('be_themes_sticky_logo', $logo_sticky ).'" alt="'.$logo_alt_text.'" />';
			} else {
				echo '<img class="normal-logo" src="'.apply_filters('be_themes_normal_logo', $logo ).'" alt="'.$logo_alt_text.'" />';
				echo '<img class="sticky-logo" src="'.apply_filters('be_themes_sticky_logo', $logo_sticky ).'" alt="'.$logo_alt_text.'" />';
			}
		echo '</a>';
    // some text in between two logos,
      //echo '<div class="logo-text"><h1>Harbor View Store & Stonecutters Kitchen</h1></div>';
    // second logo
    if ( is_active_sidebar( 'sck-logo-text') ) {
		    dynamic_sidebar( 'sck-logo-text' );
	  }
    echo '<a class="logo2 hide-mobile hide-tablet" href="'.home_url().'">';
    echo '<img  src="'.get_stylesheet_directory_uri().'/images/sck-small.png" alt="'.$logo_alt_text.'">';
    echo '</a>';
	}
}
