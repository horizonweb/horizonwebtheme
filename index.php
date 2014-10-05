<?php
/**
 * The main template file.
 * This is the most generic template file in a WordPress theme
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package horizonweb
 */

get_header(); ?>

<div id="content" class="site-content container">
 
    <?php get_template_part( 'template/template' , 'services' ); ?>

</div><!-- #content -->


<section id="banner-2nd" class="col-lg-12">
	<h2 class="banner2-text">Get the Wordpress theme that design for your business!</h2>
	<h4>Convert your existing website to dynamic using Wordpress CMS.</h4>
	<a href="<?php echo site_url(); ?>/wordpress-themes/" class="buy-now-btn1">Buy Now</a>
</section>

	


<div id="content2" class="container">

		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'horizonweb_quotetext_sidebar' ); ?>
				
			<?php get_template_part( 'template/template' , 'portfolio' ); ?>

		</div><!-- #secondary -->

</div><!-- #page - section2 -->



<section id="banner-3rd" class="col-lg-12">
		<div class="maxwidth-1170">
			<div class="col-xs-6 wordpress-price">get Wordpress theme at amazing price</div>
					
				<div class="col-xs-6 pricetag">
					<img src="images/wp-theme-price.png" alt="300 Rupees only">
					<a href="<?php echo site_url(); ?>/wordpress-themes/" class="banner-readmore">Read More</a>
				</div>

			</div>
</section>



<div id="content3" class="container">

		<div id="tertiary" class="widget-area" role="complementary">
			<h3 class="headings">Latest Blog Posts</h3>
			<div class="devider"></div>

				<div class="latest-posts">

						<?php get_template_part( 'template/template' , 'blogpost' ); ?>
						
				</div>
				<a href="<?php echo site_url(); ?>/blog/" class="readmore-btn1">Read More</a>

		</div><!-- #tertiary -->

</div><!-- #page - section3 -->



<section id="banner-4th" class="col-lg-12">
	<span class="contact-number">+91-9769495982</span>
	<span class="contact-horizonweb">HORIZON WEB</span>
	<address class="contact-address">B-57/101, Chaitra Soc., Anand Nagar, Dahisar (E),<br> Mumbai (MH), INDIA</address>
	<a href="mailto:info@horizonweb.in" class="contact-mail">info@horizonweb.in</a>
	<a href="<?php echo site_url(); ?>/hire/" class="inquire-now">Inquire Now</a>
</section>


<?php get_footer(); ?>
