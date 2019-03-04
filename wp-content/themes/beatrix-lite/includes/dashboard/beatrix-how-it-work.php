<?php
/**
 * Theme Welcome page function
 *
 * @package Beatrix Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'beatrix_lite_register_design_page');

/**
 * Register Theme Welcome page in admin menu
 * 
 * @package Beatrix Lite
 * @since 1.0
 */

  $theme = wp_get_theme();
  $theme_name  = $theme->name;
  $theme_slug  = $theme->template;
  $theme_version  = $theme->version;
  $theme_description  = $theme->description;
 
  
 add_action( 'admin_enqueue_scripts', 'enqueue_scripts'); 
 
 function enqueue_scripts( $hook ) {
        global $theme_name,$theme_slug;
        if ( "appearance_page_{$theme_slug}" !== $hook ) {
                return;
        }
        wp_enqueue_style( "{$theme_slug}-dashboard-style", get_template_directory_uri() . '/includes/dashboard/css/dashboard-style.css' );
}
 

  

function beatrix_lite_register_design_page() {
    
    global $theme_name,$theme_slug;
    
    add_theme_page(
			 $theme_name,
			 'Beatrix Lite',
			 'edit_theme_options',
			 'beatrix-lite',
			 'beatrix_lite_designs_page' 
    );
}

/**
 * Function to display Welcome page
 * 
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_designs_page() {
    
        global $theme_name,$theme_slug,$theme_version,$theme_description;
	$wpos_feed_tabs = beatrix_lite_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'getting-started';
?>
		
	<div class="wrap beatrix-lite-postformate-wrap-custom about-wrap">
        <?php include get_template_directory() . '/includes/dashboard/sections/welcome.php'; ?>
		<h2 class="nav-tab-wrapper">
                    <?php
                    foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
                            $tab_name	= $tab_val['name'];
                            $active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
                            $tab_link 	= add_query_arg( array( 'page' => 'beatrix-lite', 'tab' => $tab_key), admin_url('themes.php') );
                    ?>

                    <a class="nav-tab <?php echo esc_attr($active_cls); ?>" href="<?php echo esc_url($tab_link); ?>"><?php echo $tab_name; ?></a>

			<?php } ?>
		</h2>
		
		<div class="beatrix-lite-postformate-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'getting-started' ) {
				beatrix_lite_getting_started_page();
			}
			
		?>
		</div><!-- end .beatrix-lite-postformate-tab-cnt-wrp -->

	</div><!-- end .beatrix-lite-postformate-wrap -->

<?php } 

/**
 * Function to get plugin feed tabs
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_help_tabs() {
	$wpos_feed_tabs = array(
                                'getting-started' 	=> array(
                                                            'name'              => __('Getting Started', 'beatrix-lite'),
                                                        ),                                                              
                                );
	return $wpos_feed_tabs;
}

/**
 * Function to Display getting started tab
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_getting_started_page() { ?>
	<div class="post-box-container">
		<div id="poststuff">
			<?php include get_template_directory() . '/includes/dashboard/sections/getting-started.php'; ?>				
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }

