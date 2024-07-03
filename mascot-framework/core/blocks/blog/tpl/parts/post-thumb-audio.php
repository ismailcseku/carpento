<?php
	$mp3_link = carpento_get_rwmb_group( 'carpento_' . "blog_mb_pf_audio_settings", 'mp3_link' );
	$ogg_link = carpento_get_rwmb_group( 'carpento_' . "blog_mb_pf_audio_settings", 'ogg_link' );
	$soundcloud_link = carpento_get_rwmb_group( 'carpento_' . "blog_mb_pf_audio_settings", 'soundcloud_link' );

?>
<div class="post-thumb lightgallery-lightbox">
	<?php carpento_get_blocks_template_part( 'thumb', null, 'blog/tpl/parts', $params ); ?>
	<?php
		if( $soundcloud_link ):
			echo wp_oembed_get( $soundcloud_link, array('width'=>1140) );
		endif;
	?>
	<?php if( $mp3_link && $ogg_link ): ?>
	<audio id="audio-player-post-<?php the_ID(); ?>" class="media-element-audio-player w-100" controls>
		<source src="<?php echo esc_url( $mp3_link );?>" type="audio/mp3" autoplay="true">
		<source src="<?php echo esc_url( $ogg_link );?>" type="audio/ogg" autoplay="true">
		<?php esc_html_e('Your browser does not support the audio element.', 'carpento' ); ?>
	</audio>
	<?php endif; ?>
</div>