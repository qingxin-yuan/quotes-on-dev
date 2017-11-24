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

			<section class="quote-authors">
				<h2>Quote Authors</h2>
				<p>
					<?php $args = array(
            // 'post_status' => 'publish'
            'posts_per_page'=>'500',
            // 'offset'=>0,

            'post_type'=>'post'
					);
					$posts = get_posts($args);
					foreach($posts as $post):setup_postdata( $post );?>
					<span><a href="<?php echo get_post_permalink()?>"><?php the_title();?></a></span>
					
					<?php endforeach;wp_reset_postdata();?>
        </p>
      </section>
      
      <section class="quote-cats">
				<h2>Categories</h2>
				<p>
					<?php $args = array(
            'orderby' => 'ASC'
					);
					$cats = get_categories($args);
          foreach($cats as $cat):setup_postdata( $cat );?>

          	<span><a href="<?php echo get_category_link(get_cat_ID($cat->name))?>">
					  <?php echo $cat->name;?></a>  </span>
					
					<?php endforeach;wp_reset_postdata();?>
        </p>
			</section>

      <section class="quote-tags">
				<h2>Tags</h2>
				<p>
					<?php $args = array(
            'orderby' => 'ASC'
					);
					$tags = get_tags($args);
          foreach($tags as $tag):setup_postdata( $tag );?>
						<span><a href="<?php echo get_tag_link($tag->term_id)?>"><?php echo $tag->name;?> </a> </span>
					
					<?php endforeach;wp_reset_postdata();?>
        </p>
			</section>


			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
