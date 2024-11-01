<?php
/*
Plugin Name: Zedna Social Share Floating Buttons
Plugin URI: https://profiles.wordpress.org/zedna#content-plugins
Description: Show floating social share buttons on the side and size you want.
Version: 1.1
Author: Radek Mezulanik
Author URI: https://www.mezulanik.cz
License: GPL2
*/

// CREATE Zedna Social Share Floating Buttons options

// Buttons position
add_option('zedna_social_share_buttons_position', 'right', '', 'yes');

// Show share buttons
add_option('zedna_social_share_buttons_show_facebook', 'yes', '', 'yes');
add_option('zedna_social_share_buttons_show_twitter', 'yes', '', 'yes');
add_option('zedna_social_share_buttons_show_googleplus', 'yes', '', 'yes');
add_option('zedna_social_share_buttons_show_linkedin', 'yes', '', 'yes');
add_option('zedna_social_share_buttons_show_rss', 'yes', '', 'yes');

// Icons width
add_option('zedna_social_share_buttons_width', '64', '', 'yes');

// #CREATE Zedna Social Share Floating Buttons options

add_action( 'wp_head','zedna_social_share_buttons_showlinks' );
function zedna_social_share_buttons_showlinks() {
    // Show buttons on page load
    include_once(dirname(__FILE__) . '/zedna-social-share-buttons-widget.php');
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__) , 'zedna_social_share_buttons_links');

function zedna_social_share_buttons_links($links)
    {
    $links[] = '<a href="https://profiles.wordpress.org/zedna/#content-plugins" target="_blank">More plugins by Radek Mezulanik</a>';
    return $links;
    }

// Add admin page

add_action('admin_menu', 'zedna_social_share_buttons_setttings_menu');

if (!defined('ABSPATH')) die('-1');

function zedna_social_share_buttons_setttings_menu()
    {
    $pluginURI = get_option('siteurl') . '/wp-content/plugins/' . dirname(plugin_basename(__FILE__));
    add_menu_page('Share buttons settings page', 'Share buttons settings', 'manage_options', 'zedna_social_share_buttons', 'zedna_social_share_buttons_init', $pluginURI . '/img/wpill-ico.png');

    // Call update_zedna_social_share_buttons function to update database

    add_action('admin_init', 'update_zedna_social_share_buttons');
    }

// Create function to register plugin settings in the database

if (!function_exists("update_zedna_social_share_buttons"))
    {
    function update_zedna_social_share_buttons()
        {
        register_setting('zedna_social_share_buttons-settings', 'zedna_social_share_buttons_position');
        register_setting('zedna_social_share_buttons-settings', 'zedna_social_share_buttons_show_facebook');
        register_setting('zedna_social_share_buttons-settings', 'zedna_social_share_buttons_show_twitter');
        register_setting('zedna_social_share_buttons-settings', 'zedna_social_share_buttons_show_googleplus');
        register_setting('zedna_social_share_buttons-settings', 'zedna_social_share_buttons_show_linkedin');
        register_setting('zedna_social_share_buttons-settings', 'zedna_social_share_buttons_show_rss');
        register_setting('zedna_social_share_buttons-settings', 'zedna_social_share_buttons_width');
        }
    }

function zedna_social_share_buttons_init()
    {
    $zssi_position = (get_option('zedna_social_share_buttons_position') != '') ? get_option('zedna_social_share_buttons_position') : 'floatright';
    $zssi_facebook = (get_option('zedna_social_share_buttons_show_facebook') != '') ? get_option('zedna_social_share_buttons_show_facebook') : 'true';
    $zssi_twitter = (get_option('zedna_social_share_buttons_show_twitter') != '') ? get_option('zedna_social_share_buttons_show_twitter') : 'true';
    $zssi_googleplus = (get_option('zedna_social_share_buttons_show_googleplus') != '') ? get_option('zedna_social_share_buttons_show_googleplus') : 'true';
    $zssi_linkedin = (get_option('zedna_social_share_buttons_show_linkedin') != '') ? get_option('zedna_social_share_buttons_show_linkedin') : 'true';
    $zssi_rss = (get_option('zedna_social_share_buttons_show_rss') != '') ? get_option('zedna_social_share_buttons_show_rss') : 'true';
    $zssi_width = (get_option('zedna_social_share_buttons_width') != '') ? get_option('zedna_social_share_buttons_width') : '64';
?>
<div class="wrap">
<h1>Zedna Social Share Floating Buttons Settings</h1>
<img src="<?php
    echo plugins_url('/img/banner-772x250.png', __FILE__); ?>">
  <form method="post" action="options.php">
    <?php
    settings_fields('zedna_social_share_buttons-settings'); ?>
    <?php
    do_settings_sections('zedna_social_share_buttons-settings'); ?>
    <table class="form-table">
      <tr valign="top">
      <th scope="row">Floating buttons position:</th>
      <td>
    <?php
    $zssi_position = get_option('zedna_social_share_buttons_position');
    ?>
        <label><input type="radio" name="zedna_social_share_buttons_position" value="top" <?php if ($zssi_position == 'top') {echo ' checked ';}?> /> Top</label><br />
        <label><input type="radio" name="zedna_social_share_buttons_position" value="bottom" <?php if ($zssi_position == 'bottom') {echo ' checked ';}?> /> Bottom</label><br />
        <label><input type="radio" name="zedna_social_share_buttons_position" value="left" <?php if ($zssi_position == 'left') {echo ' checked ';}?> /> Left</label><br />
        <label><input type="radio" name="zedna_social_share_buttons_position" value="right" <?php if ($zssi_position == 'right') {echo ' checked ';}?> /> Right</label>
      </td>
      </tr>
    <?php
    $zssi_facebook = get_option('zedna_social_share_buttons_show_facebook');
    $zssi_twitter = get_option('zedna_social_share_buttons_show_twitter');
    $zssi_googleplus = get_option('zedna_social_share_buttons_show_googleplus');
    $zssi_linkedin = get_option('zedna_social_share_buttons_show_linkedin');
    $zssi_rss = get_option('zedna_social_share_buttons_show_rss');
    $zssi_width = get_option('zedna_social_share_buttons_width');
    ?>
      <tr valign="top">
          <th scope="row">Buttons will appear in posts.:</th>
          <td>
          <label><input type="checkbox" name="zedna_social_share_buttons_show_facebook" value="yes" <?php if ($zssi_facebook == 'yes') {echo ' checked ';}?>/> Facebook</label><br />
          <label><input type="checkbox" name="zedna_social_share_buttons_show_twitter" value="yes" <?php if ($zssi_twitter == 'yes') {echo ' checked ';}?>/> Twitter</label><br />
          <label><input type="checkbox" name="zedna_social_share_buttons_show_googleplus" value="yes" <?php if ($zssi_googleplus == 'yes') {echo ' checked ';}?>/> Google+</label><br />
          <label><input type="checkbox" name="zedna_social_share_buttons_show_linkedin" value="yes" <?php if ($zssi_linkedin == 'yes') {echo ' checked ';}?>/> LinkedIn</label><br />
          <label><input type="checkbox" name="zedna_social_share_buttons_show_rss" value="yes" <?php if ($zssi_rss == 'yes') {echo ' checked ';}?>/> RSS</label>
      </tr>
    <tr valign="top">
      <th scope="row">Icons width:</th>
      <td>
    <?php
    $zssi_width = get_option('zedna_social_share_buttons_width');
    ?>
        <label><input type="radio" name="zedna_social_share_buttons_width" value="16" <?php if ($zssi_width == '16') {echo ' checked ';}?> /><img src="<?php echo plugins_url('/social-icons/16-wordpress.png', __FILE__); ?>"></label><br />
        <label><input type="radio" name="zedna_social_share_buttons_width" value="32" <?php if ($zssi_width == '32') {echo ' checked ';}?> /><img src="<?php echo plugins_url('/social-icons/32-wordpress.png', __FILE__); ?>"></label><br />
        <label><input type="radio" name="zedna_social_share_buttons_width" value="64" <?php if ($zssi_width == '64') {echo ' checked ';}?> /><img src="<?php echo plugins_url('/social-icons/64-wordpress.png', __FILE__); ?>"></label><br />
        <label><input type="radio" name="zedna_social_share_buttons_width" value="128" <?php if ($zssi_width == '128') {echo ' checked ';}?> /><img src="<?php echo plugins_url('/social-icons/128-wordpress.png', __FILE__); ?>"></label>
      </td>
      </tr>
    </table>
  <?php
    submit_button(); ?>
  </form>
</div>
<p>If you like this plugin, please donate us for faster upgrade</p>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<?php
    }
?>
