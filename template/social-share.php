<?php
/**
 * Social Share Buttons Output
 *
 * @package Ocean WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disabled if post is password protected or if disabled
if ( post_password_required() ) {
	return;
}

// Get sharing sites
$sites = oss_social_share_sites();

// Return if there aren't any sites enabled
if ( empty( $sites ) ) {
	return;
}

// Declare main vars
$heading 	= oceanwp_tm_translation( 'oss_social_share_heading', get_theme_mod( 'oss_social_share_heading', 'Please Share This' ) );
$post_id  	= get_the_ID();
$url      	= apply_filters( 'oss_social_share_url', get_permalink( $post_id ) );
$title    	= get_the_title(); ?>

<div class="entry-share clr">

	<h2 class="theme-heading social-share-title">
		<span class="text"><?php echo esc_attr( $heading ); ?></span>
	</h2>

	<ul class="oss-social-share clr">

		<?php
		// Loop through sites
		foreach ( $sites as $site ) :

			// Twitter
			if ( 'twitter' == $site ) {

				// Get SEO meta and use instead if they exist
				if ( defined( 'WPSEO_VERSION' ) ) {
					if ( $meta = get_post_meta( $post_id, '_yoast_wpseo_twitter-title', true ) ) {
						$title = $meta;
					}
					if ( $meta = get_post_meta( $post_id, '_yoast_wpseo_twitter-description', true ) ) {
						$title = $title .': '. $meta;
						$title = rawurlencode( $title );
					}
				}

				// Get twitter handle
				$handle = get_theme_mod( 'oss_social_share_twitter_handle' ); ?>

				<li class="twitter">
					<a href="https://twitter.com/share?text=<?php echo rawurlencode( $title ); ?>&amp;url=<?php echo rawurlencode( esc_url( $url ) ); ?><?php if ( $handle ) echo '&amp;via='. esc_attr( $handle ); ?>" title="<?php esc_html_e( 'Share on Twitter', 'ocean-social-sharing' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-twitter"></span>
					</a>
				</li>

			<?php }
			// Facebook
			if ( 'facebook' == $site ) { ?>

				<li class="facebook">
					<a href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode( esc_url( $url ) ); ?>" title="<?php esc_html_e( 'Share on Facebook', 'ocean-social-sharing' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-facebook"></span>
					</a>
				</li>

			<?php }
			// Google+
			if ( 'google_plus' == $site ) { ?>

				<li class="googleplus">
					<a href="https://plus.google.com/share?url=<?php echo rawurlencode( esc_url( $url ) ); ?>" title="<?php esc_html_e( 'Share on Google+', 'ocean-social-sharing' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-google-plus"></span>
					</a>
				</li>

			<?php }
			// Pinterest
			if ( 'pinterest' == $site ) { ?>

				<li class="pinterest">
					<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id ) ); ?>&amp;description=<?php echo wp_trim_words( strip_shortcodes( get_the_content( $post_id ) ), 40 ); ?>" title="<?php esc_html_e( 'Share on Pinterest', 'ocean-social-sharing' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-pinterest-p"></span>
					</a>
				</li>

			<?php }
			// LinkedIn
			if ( 'linkedin' == $site ) { ?>

				<li class="linkedin">
					<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;title=<?php echo rawurlencode( $title ); ?>&amp;summary=<?php echo wp_trim_words( strip_shortcodes( get_the_content( $post_id ) ), 40 ); ?>&amp;source=<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e( 'Share on LinkedIn', 'ocean-social-sharing' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-linkedin"></span>
					</a>
				</li>

			<?php } ?>

		<?php endforeach; ?>

	</ul>

</div><!-- .entry-share -->