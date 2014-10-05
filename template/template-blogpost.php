<?php
/**
 * @package horizonweb
 */
?>


<?php if ( have_posts() ) : ?>
	
	<?php query_posts(array( 'posts_per_page' => 3, 'order' => 'ASC')); ?>
	<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-4 ' . ''); ?>>
	<span class="category-name"><?php the_category(', ') ?></span>
	<?php the_title( sprintf( '<h4><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

	
		<span class="date">
			<?php horizonweb_posted_on(); ?>
		</span><!-- .entry-meta -->

	
	<p><?php echo wp_trim_words( get_the_content(), 130); ?></p>
	<a href="<?php the_permalink(); ?>" class="readmore-blog">read more</a>
</article>
	<?php endwhile; ?>
	<?php endif; ?>



