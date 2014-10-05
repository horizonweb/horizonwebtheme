<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package horizonweb
 */
?>

<footer id="colophon" class="site-footer col-lg-12" role="contentinfo">
		<img src="<?php bloginfo('template_directory'); ?>/images/horizonweb-logo-hologram.svg" width="116px" height="116px" alt="HorizonWeb" title="HorionWeb" onerror="this.onerror=null; this.src='<?php bloginfo('template_directory'); ?>/images/horizonweb-logo-hologram.png'" class="footer-logo">

		<ul class="footer-social">
			<li><a href="#" title="Facebook" class="fb"></a></li>
			<li><a href="#" title="Twitter" class="tt"></a></li>
			<li><a href="#" title="Pinterest" class="pt"></a></li>
	 	</ul>

	 	<div class="devider"></div>

		<div class="site-info">
		<span>&#169; 2014 <a href="<?php echo esc_url( __( 'http://www.horizonweb.in', 'horizonweb' ) ); ?>" target="_blank"><?php printf( __( 'Horizon web', 'horizonweb' ), 'horizonweb' ); ?></a>, All Rights Reserved.</span>
			
			
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
