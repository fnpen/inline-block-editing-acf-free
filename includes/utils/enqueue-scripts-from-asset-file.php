<?php

namespace InlineBlockEditingAcf {
	function enqueue_scripts_from_asset_file( $name, $plugin_file, $additional_script_dependencies = null ) {
		$script_asset_path = dirname( $plugin_file ) . "/build/$name.asset.php";
		if ( file_exists( $script_asset_path ) ) {
			$script_asset = include $script_asset_path;
			$script_dependencies = $script_asset['dependencies'] ?? [];

			if( is_array( $additional_script_dependencies ) ) {
				$script_dependencies = array_merge( $script_dependencies, $additional_script_dependencies );
			}

			if( in_array( 'wp-media-utils', $script_dependencies, true )) {
				wp_enqueue_media();
			}

			if ( in_array( 'wp-react-refresh-runtime', $script_asset['dependencies'], true ) && ! constant( 'SCRIPT_DEBUG' ) ) {
				wp_die( esc_html__( 'SCRIPT_DEBUG should be true. You use `hot` mode, it requires `wp-react-refresh-runtime` which availably only when SCRIPT_DEBUG is enabled.', 'inline-block-editing-acf' ) );
			}

			wp_enqueue_script( "inline-block-editing-acf-$name", plugins_url( "build/$name.js", $plugin_file ), $script_dependencies, $script_asset['version'], true );

			$style_dependencies = [];


			if( in_array( 'wp-components', $script_dependencies, true )) {
				$style_dependencies[] = 'wp-components';
			}

			wp_enqueue_style( "inline-block-editing-acf-$name", plugins_url( "build/$name.css", $plugin_file ), $style_dependencies, $script_asset['version'], 'all' );
		}
	}
}
