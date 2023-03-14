<?php

namespace InlineBlockEditingAcf {
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\acf_enqueue_block_assets', 100 );

	/**
	 * Includes asset.
	 *
	 * @return void
	 */
	function acf_enqueue_block_assets() {
		enqueue_scripts_from_asset_file( 'script', INLINE_BLOCK_EDITING_PLUGIN_FILE, [ 'acf-blocks' ] );
	}
}

namespace {
	function acf_content_editing( string $name, string $placeholder = '' ) {
		$args = acf_request_args( [ 'query' => [] ] );

		if ( ! is_admin() || ! ( acf_is_block_editor() || $args['query']['preview'] ) ) {
			return '';
		}

		$field = get_field_object($name);

		$settings = [
			'inline-editing' => true,
			'placeholder' => $field['placeholder'],
			'key' => $field['key'],
		];

		if( ! empty( $placeholder ) ) {
			$settings['placeholder'] = $placeholder;
		}

		$attributes = [];

		foreach($settings as $key => $value) {
			$attributes[] = sprintf('data-%s="%s"', esc_attr($key), esc_attr($value));
		}

		return ' ' . implode(' ', $attributes) . ' ';
	}
}
