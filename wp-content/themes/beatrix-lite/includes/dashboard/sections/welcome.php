<?php
/**
 * Display Welcome page Welcome section.
 *
 * @package Beatrix Lite
 * @since 1.0
 * 
 */

?>
 <h1>
<?php
// Translators: %1$s - Theme name, %2$s - Theme version.
echo esc_html( sprintf( __( 'Welcome to %1$s - Version %2$s', 'beatrix-lite' ), $theme_name, $theme_version ) );
?>
</h1>
<div class="about-text"><?php echo esc_html( $theme_description ); ?></div>
<div class="wp-badge"><?php esc_html_e( 'Beatrix', 'beatrix-lite' ); ?></div>
