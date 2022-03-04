<?php

if ( ! function_exists( 'cirand' ) ) {
	function cirand( $length = 10 ) {
		$length = intval( $length );
		$characters = '0123456789abcdefghijklmnopqrstuvxzwyABCDEFGHIJKLMNOPQRSTUVXZWY';
		$charactersLength = strlen( $characters );
		$response = '';

		for( $i = 0; $i < $length; $i++ ) {
			$response .= $characters[ rand( 0, $charactersLength - 1 ) ];
		}

		return $response;
	}
}