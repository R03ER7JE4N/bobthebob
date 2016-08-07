<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section id="post-<?php the_ID(); ?>" class="articles relative align-center parallax-window <?php post_class() ?>" data-position-y="<?php the_field('alignement'); ?>" data-parallax="scroll" data-image-src="<?php echo the_field('image_principale'); ?>">
			<div class="overlay absolute"></div>
			<div class="container">
			
				<h1 class="white uppercase"><?php the_title(); ?></h1>
				
				<ul class="date-cat-author">
					<li class="inline white uppercase">publié le <?php the_date(); ?></li>
					<li class="inline white uppercase">dans la catégorie <?php the_category(); ?></li>
					<li class="inline white uppercase">par <?php the_author(); ?></li>
				</ul>

			</div>
		</section>

		<section>
			<div class="content-articles container padtop80 padbot80">
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<?php the_field('content'); ?>
					</div>
				</div>
				
			</div>
		</section>

	<?php endwhile; endif; ?>
	

<?php get_footer(); ?>

