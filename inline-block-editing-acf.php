<?php
/**
 * Plugin Name:       Inline Block Editing for ACF Pro and WordPress
 * Plugin URI:        https://github.com/fnpen/inline-block-editing-acf
 * Description:
 *
 * Text Domain:       inline-block-editing-acf
 * Domain Path:       /languages
 *
 * Author:            Ilya Zolotov
 * Author URI:        https://ilyazolotov.com/
 *
 * Version:           0.3.6
 * Requires at least: 5.8
 * Tested up to:      6.1.1
 * Requires PHP:      7.1
 */

namespace InlineBlockEditingAcf;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'INLINE_BLOCK_EDITING_PATH', \plugin_dir_path( __FILE__ ) );
define( 'INLINE_BLOCK_EDITING_URL', \plugins_url( '/', __FILE__ ) );
define( 'INLINE_BLOCK_EDITING_PLUGIN_FILE', __FILE__ );
define( 'INLINE_BLOCK_EDITING_PLUGIN_DIR', __DIR__ );
define( 'INLINE_BLOCK_EDITING_VERSION', '0.3.6' );

require 'includes/utils/enqueue-scripts-from-asset-file.php';
require 'includes/integrate.php';
