<?php

if ( ! function_exists( 'playerx_edge_like' ) ) {
	/**
	 * Returns PlayerxEdgeClassLike instance
	 *
	 * @return PlayerxEdgeClassLike
	 */
	function playerx_edge_like() {
		return PlayerxEdgeClassLike::get_instance();
	}
}

function playerx_edge_get_like() {
	echo wp_kses( playerx_edge_like()->add_like(), array(
		'span'  => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'     => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'     => array(
			'href'         => true,
			'class'        => true,
			'id'           => true,
			'title'        => true,
			'style'        => true,
			'data-post-id' => true
		),
		'input' => array(
			'type'  => true,
			'name'  => true,
			'id'    => true,
			'value' => true
		)
	) );
}