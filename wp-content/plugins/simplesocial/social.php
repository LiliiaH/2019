<?php
/**
 * Plugin Name: SimpleSocial
 * Plugin URI: https://simplesocial.pro/
 * Description: Add icons for your social media profiles.
 * Version: 1.0
 * Author: Bryan Hadaway
 * Author URI: https://calmestghost.com/
 * License: GPL
 * License URI: https://www.gnu.org/licenses/gpl.html
 * Text Domain: social
 */

add_action( 'admin_menu', 'social_menu_link' );
function social_menu_link() {
	add_options_page( __( 'SimpleSocial Settings', 'social' ), __( 'SimpleSocial', 'social' ), 'manage_options', 'social', 'social_options_page' );
}

add_action( 'admin_init', 'social_admin_init' );
function social_admin_init() {
	add_settings_section( 'social-section', __( '', 'social' ), 'social_section_callback', 'social' );
	add_settings_field( 'social-field', __( '', 'social' ), 'social_field_callback', 'social', 'social-section' );
	register_setting( 'social-options', 'facebook-url', 'sanitize_text_field' );
	register_setting( 'social-options', 'facebook-icon', 'sanitize_text_field' );
	register_setting( 'social-options', 'twitter-url', 'sanitize_text_field' );
	register_setting( 'social-options', 'twitter-icon', 'sanitize_text_field' );
	register_setting( 'social-options', 'linkedin-url', 'sanitize_text_field' );
	register_setting( 'social-options', 'linkedin-icon', 'sanitize_text_field' );
	register_setting( 'social-options', 'googleplus-url', 'sanitize_text_field' );
	register_setting( 'social-options', 'googleplus-icon', 'sanitize_text_field' );
	register_setting( 'social-options', 'youtube-url', 'sanitize_text_field' );
	register_setting( 'social-options', 'youtube-icon', 'sanitize_text_field' );
	register_setting( 'social-options', 'instagram-url', 'sanitize_text_field' );
	register_setting( 'social-options', 'instagram-icon', 'sanitize_text_field' );
	register_setting( 'social-options', 'pinterest-url', 'sanitize_text_field' );
	register_setting( 'social-options', 'pinterest-icon', 'sanitize_text_field' );
	register_setting( 'social-options', 'icon-size', 'sanitize_text_field' );
	register_setting( 'social-options', 'icon-color', 'sanitize_text_field' );
}

function social_section_callback() {
	echo __( '', 'social' );
}

function social_field_callback() {
	$social_setting = esc_url( get_option( 'facebook-url' ) );
	echo "<h2>Facebook</h2><input type='text' size='50' name='facebook-url' value='$social_setting' placeholder='Profile URL' />";
	$social_setting = esc_url( get_option( 'facebook-icon' ) );
	echo "<input type='text' size='50' name='facebook-icon' value='$social_setting' placeholder='Profile Icon URL (leave blank for default)' />";
	$social_setting = esc_url( get_option( 'twitter-url' ) );
	echo "<h2>Twitter</h2><input type='text' size='50' name='twitter-url' value='$social_setting' placeholder='Profile URL' />";
	$social_setting = esc_url( get_option( 'twitter-icon' ) );
	echo "<input type='text' size='50' name='twitter-icon' value='$social_setting' placeholder='Profile Icon URL (leave blank for default)' />";
	$social_setting = esc_url( get_option( 'linkedin-url' ) );
	echo "<h2>LinkedIn</h2><input type='text' size='50' name='linkedin-url' value='$social_setting' placeholder='Profile URL' />";
	$social_setting = esc_url( get_option( 'linkedin-icon' ) );
	echo "<input type='text' size='50' name='linkedin-icon' value='$social_setting' placeholder='Profile Icon URL (leave blank for default)' />";
	$social_setting = esc_url( get_option( 'googleplus-url' ) );
	echo "<h2>Google+</h2><input type='text' size='50' name='googleplus-url' value='$social_setting' placeholder='Profile URL' />";
	$social_setting = esc_url( get_option( 'googleplus-icon' ) );
	echo "<input type='text' size='50' name='googleplus-icon' value='$social_setting' placeholder='Profile Icon URL (leave blank for default)' />";
	$social_setting = esc_url( get_option( 'youtube-url' ) );
	echo "<h2>YouTube</h2><input type='text' size='50' name='youtube-url' value='$social_setting' placeholder='Profile URL' />";
	$social_setting = esc_url( get_option( 'youtube-icon' ) );
	echo "<input type='text' size='50' name='youtube-icon' value='$social_setting' placeholder='Profile Icon URL (leave blank for default)' />";
	$social_setting = esc_url( get_option( 'instagram-url' ) );
	echo "<h2>Instagram</h2><input type='text' size='50' name='instagram-url' value='$social_setting' placeholder='Profile URL' />";
	$social_setting = esc_url( get_option( 'instagram-icon' ) );
	echo "<input type='text' size='50' name='instagram-icon' value='$social_setting' placeholder='Profile Icon URL (leave blank for default)' />";
	$social_setting = esc_url( get_option( 'pinterest-url' ) );
	echo "<h2>Pinterest</h2><input type='text' size='50' name='pinterest-url' value='$social_setting' placeholder='Profile URL' />";
	$social_setting = esc_url( get_option( 'pinterest-icon' ) );
	echo "<input type='text' size='50' name='pinterest-icon' value='$social_setting' placeholder='Profile Icon URL (leave blank for default)' />";
	$social_setting = get_option( 'icon-size' );
	echo "<h2>Icon Size</h2><input type='number' name='icon-size' value='$social_setting' placeholder='Default is 32' />";
	$social_setting = get_option( 'icon-color' );
	echo "<h2>Icon Color</h2><input type='text' size='6' name='icon-color' class='jscolor {required:false}' value='$social_setting' />";
}

function social_options_page() {
	?>
    <div class="wrap">
		<script src="<?php echo plugin_dir_url( __FILE__ ) . 'js/color.js' ?>"></script>
        <style>
            .wrap .form-table th {
                width: 0;
                padding: 0
            }

            .wrap .form-table td {
                padding: 15px 0
            }

            .wrap input[type="text"] {
                display: block;
                margin-bottom: 7px;
                clear: both
            }
        </style>
        <h1><?php _e( 'SimpleSocial Settings', 'social' ); ?></h1>
        <p><?php _e( 'Thank you for using SimpleSocial by <a href="https://calmestghost.com/" target="_blank">Bryan Hadaway</a>.', 'social' ); ?></p>
        <p><?php _e( 'If you would like to set your own custom icons, simply <a href="' . admin_url() . 'upload.php" target="_blank">upload them to the Media area</a> and copy and paste their image URLs below.', 'social' ); ?></p>
        <pre><code>[social]</code></pre>
        <pre><code>&lt;?php echo do_shortcode( '[social]' ); ?&gt;</code></pre>
        <form action="options.php" method="POST">
			<?php settings_fields( 'social-options' ); ?>
			<?php do_settings_sections( 'social' ); ?>
			<?php submit_button(); ?>
        </form>
    </div>
	<?php
}

function social_display_icons() {
	ob_start();
	$social_facebook_url          = esc_url( get_option( 'facebook-url' ) );
	$social_default_facebook_icon = plugins_url( 'images/facebook.svg', __FILE__ );
	$social_custom_facebook_icon  = esc_url( get_option( 'facebook-icon' ) );
	if ( ( $social_facebook_url ) && empty( $social_custom_facebook_icon ) ) {
		echo '<a href="' . esc_url( $social_facebook_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_default_facebook_icon ) . '" alt="Facebook" class="social-icon" /></a>';
	} else if ( ( $social_facebook_url ) ) {
		echo '<a href="' . esc_url( $social_facebook_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_custom_facebook_icon ) . '" alt="Facebook" class="social-icon" /></a>';
	} else {
	}
	$social_twitter_url          = esc_url( get_option( 'twitter-url' ) );
	$social_default_twitter_icon = plugins_url( 'images/twitter.svg', __FILE__ );
	$social_custom_twitter_icon  = esc_url( get_option( 'twitter-icon' ) );
	if ( ( $social_twitter_url ) && empty( $social_custom_twitter_icon ) ) {
		echo '<a href="' . esc_url( $social_twitter_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_default_twitter_icon ) . '" alt="Twitter" class="social-icon" /></a>';
	} else if ( ( $social_twitter_url ) ) {
		echo '<a href="' . esc_url( $social_twitter_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_custom_twitter_icon ) . '" alt="Twitter" class="social-icon" /></a>';
	} else {
	}
	$social_linkedin_url          = esc_url( get_option( 'linkedin-url' ) );
	$social_default_linkedin_icon = plugins_url( 'images/linkedin.svg', __FILE__ );
	$social_custom_linkedin_icon  = esc_url( get_option( 'linkedin-icon' ) );
	if ( ( $social_linkedin_url ) && empty( $social_custom_linkedin_icon ) ) {
		echo '<a href="' . esc_url( $social_linkedin_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_default_linkedin_icon ) . '" alt="LinkedIn" class="social-icon" /></a>';
	} else if ( ( $social_linkedin_url ) ) {
		echo '<a href="' . esc_url( $social_linkedin_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_custom_linkedin_icon ) . '" alt="LinkedIn" class="social-icon" /></a>';
	} else {
	}
	$social_googleplus_url          = esc_url( get_option( 'googleplus-url' ) );
	$social_default_googleplus_icon = plugins_url( 'images/googleplus.svg', __FILE__ );
	$social_custom_googleplus_icon  = esc_url( get_option( 'googleplus-icon' ) );
	if ( ( $social_googleplus_url ) && empty( $social_custom_googleplus_icon ) ) {
		echo '<a href="' . esc_url( $social_googleplus_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_default_googleplus_icon ) . '" alt="Google+" class="social-icon" /></a>';
	} else if ( ( $social_googleplus_url ) ) {
		echo '<a href="' . esc_url( $social_googleplus_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_custom_googleplus_icon ) . '" alt="Google+" class="social-icon" /></a>';
	} else {
	}
	$social_youtube_url          = esc_url( get_option( 'youtube-url' ) );
	$social_default_youtube_icon = plugins_url( 'images/youtube.svg', __FILE__ );
	$social_custom_youtube_icon  = esc_url( get_option( 'youtube-icon' ) );
	if ( ( $social_youtube_url ) && empty( $social_custom_youtube_icon ) ) {
		echo '<a href="' . esc_url( $social_youtube_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_default_youtube_icon ) . '" alt="YouTube" class="social-icon" /></a>';
	} else if ( ( $social_youtube_url ) ) {
		echo '<a href="' . esc_url( $social_youtube_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_custom_youtube_icon ) . '" alt="YouTube" class="social-icon" /></a>';
	} else {
	}
	$social_instagram_url          = esc_url( get_option( 'instagram-url' ) );
	$social_default_instagram_icon = plugins_url( 'images/instagram.svg', __FILE__ );
	$social_custom_instagram_icon  = esc_url( get_option( 'instagram-icon' ) );
	if ( ( $social_instagram_url ) && empty( $social_custom_instagram_icon ) ) {
		echo '<a href="' . esc_url( $social_instagram_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_default_instagram_icon ) . '" alt="Instagram" class="social-icon" /></a>';
	} else if ( ( $social_instagram_url ) ) {
		echo '<a href="' . esc_url( $social_instagram_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_custom_instagram_icon ) . '" alt="Instagram" class="social-icon" /></a>';
	} else {
	}
	$social_pinterest_url          = esc_url( get_option( 'pinterest-url' ) );
	$social_default_pinterest_icon = plugins_url( 'images/pinterest.svg', __FILE__ );
	$social_custom_pinterest_icon  = esc_url( get_option( 'pinterest-icon' ) );
	if ( ( $social_pinterest_url ) && empty( $social_custom_pinterest_icon ) ) {
		echo '<a href="' . esc_url( $social_pinterest_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_default_pinterest_icon ) . '" alt="Pinterest" class="social-icon" /></a>';
	} else if ( ( $social_pinterest_url ) ) {
		echo '<a href="' . esc_url( $social_pinterest_url ) . '" rel="me" class="social-link"><img src="' . esc_url( $social_custom_pinterest_icon ) . '" alt="Pinterest" class="social-icon" /></a>';
	} else {
	}
	$social_icon_size = get_option( 'icon-size' );
	$social_icon_color = get_option( 'icon-color' );
	if ( $social_icon_size && $social_icon_color ) {
		echo '<style>.social-link{color:#' . $social_icon_color . ' !important;text-decoration:none !important;box-shadow:none !important}.social-link:hover{color:#' . $social_icon_color . ' !important}.social-icon{display:inline-block !important;max-width:' . $social_icon_size . 'px !important;border:none !important;margin:10px !important;opacity:1 !important;transition:all 0.5s ease !important}.social-icon:hover{opacity:0.8 !important}</style>';
	} else if ( $social_icon_size ) {
		echo '<style>.social-link{text-decoration:none !important;box-shadow:none !important}.social-icon{display:inline-block !important;max-width:' . $social_icon_size . 'px !important;border:none !important;margin:10px !important;opacity:1 !important;transition:all 0.5s ease !important}.social-icon:hover{opacity:0.8 !important}</style>';
	} else if ( $social_icon_color ) {
		echo '<style>.social-link{color:#' . $social_icon_color . ' !important;text-decoration:none !important;box-shadow:none !important}.social-link:hover{color:#' . $social_icon_color . ' !important}.social-icon{display:inline-block !important;max-width:32px !important;border:none;margin:10px !important;opacity:1 !important;transition:all 0.5s ease !important}.social-icon:hover{opacity:0.8 !important}</style>';
	} else {
		echo '<style>.social-link{text-decoration:none !important;box-shadow:none !important}.social-icon{display:inline-block !important;max-width:32px !important;border:none !important;margin:10px !important;opacity:1 !important;transition:all 0.5s ease !important}.social-icon:hover{opacity:0.8 !important}</style>';
	}
	echo '<script>
		  if (typeof jQuery == \'undefined\') {
			  document.write(\'<script src="https://code.jquery.com/jquery-latest.min.js"><\/script>\');        
		  }
		  </script>
		  <script>
		  jQuery(document).ready(function ($) {
			  $("img[src$=\'.svg\']").each(function () {
				  var $img = $(this);
				  var imgURL = $img.attr("src");
				  var attributes = $img.prop(\'attributes\');
				  $.get(imgURL, function (data) {
					  var $svg = $(data).find("svg");
					  $svg = $svg.removeAttr("xmlns:a");
					  $.each(attributes, function () {
						  $svg.attr(this.name, this.value);
					  });
					  $img.replaceWith($svg);
				  }, "xml");
			  });
		  });
		  </script>';
	$output = ob_get_clean();
	return $output;
}

add_action( 'init', 'social_add_shortcodes' );
function social_add_shortcodes() {
	add_shortcode( 'social', 'social_shortcode' );
	add_filter( 'widget_text', 'do_shortcode' );
}

function social_shortcode() {
	return social_display_icons();
}

?>