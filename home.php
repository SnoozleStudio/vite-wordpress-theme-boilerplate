<?php
/**
 * Relative path: home.php
 */
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php if (have_posts()) : ?>

      <header class="page-header">
        <h1 class="page-title"><?php single_post_title(); ?></h1>
      </header>

      <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
          </header>

          <div class="entry-summary">
            <?php the_excerpt(); ?>
          </div>
        </article>

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
