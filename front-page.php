<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
					<?php edit_post_link(); ?>
				</div>
			<?php endwhile; ?>

			<?php
			if (get_next_posts_link()) {
				next_posts_link();
			}
			?>

			<?php
			if (get_previous_posts_link()) {
				previous_posts_link();
			}
			?>

		<?php else: ?>
			<p><?php esc_html_e('No posts found.', 'snoozle-wordpress-vite'); ?></p>
		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
