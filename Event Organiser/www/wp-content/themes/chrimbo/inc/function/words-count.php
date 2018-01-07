<?php
/**
* Returns word count of the sentences.
*
* @since @since Chrimbo 1.0.0
*/
if ( ! function_exists( 'chrimbo_words_count' ) ) :
	function chrimbo_words_count( $length = 25, $chrimbo_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $chrimbo_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;