<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
// get_template_part( 'template-parts/content' );
				?>
			<section class="quote-authors">
				<h2>Quote Authors</h2>
				<div class="author-names">
					<?php $args = array(
						'post_status' => 'publish'
					);
					$posts = get_posts($args);
					foreach($posts as $post):setup_postdata( $post );
						the_title();
				
					
					
					endforeach;wp_reset_postdata();
					?>




				</div>




			</section>







			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
