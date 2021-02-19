<?php // register theme support for languages, menus, post-thumbnails, post-formats etc.

	// filter hook for directory column
	add_filter( 'manage_page_posts_columns', 'directory_group_ID_column' );

	// define directory column
	function directory_group_ID_column ( $columns ) {

		return array_merge( $columns, [

			'directory_ID' => __( 'Group ID' )

		]);

	}

	// action reference for status column
	add_action( 'manage_page_posts_custom_column', 'render_directory_column', 10, 2 );

	// get metatdata for custom status column
	function render_directory_column ( $column_key, $post_id ) {

		if ( $column_key == 'directory_ID' ) {

			$group_ID = get_post_meta( $post_id, 'staff_directory_group_id', true );

			if ( $group_ID ) {

				echo '<span style="color:#97CA3D;background:#003E46;font-family:monospace;">&nbsp;' . $group_ID . '&nbsp;</span>';

			}

		}

	}

	// action reference for column width
	add_action( 'admin_head', 'group_ID_column_width' );

	// custom status column width
	function group_ID_column_width () {

		echo '<style type="text/css">.column-directory_ID{width:64px;text-align:right;}</style>';

	}

?>
