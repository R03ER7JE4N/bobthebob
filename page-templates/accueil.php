<?php
/**
 * Template Name: Page d'accueil
 */

get_header(); ?>

  <section class="slider_accueil">
    
    <?php if(get_field('sliders')): ?>
    <?php while(has_sub_field('sliders')): ?>

      <div class="slide flex relative" style="background-image: url('<?php the_sub_field('bg_image'); ?>');  background-position: <?php the_sub_field('position'); ?> center;">
        <div class="overlay absolute"></div>

        <div class="container">
          <div class="row">
            <div class="offset-md-2 col-md-8 citation align-center">
              <blockquote class="white playfair"><?php the_sub_field('texte'); ?></blockquote>
              <cite class="white align-right block">- <?php the_sub_field('auteur'); ?></cite>
            </div>
          </div>
        </div>

      </div>    

    <?php endwhile; ?>
    <?php endif; ?>

  </section>

  <section  class="articles">
    <div class="container-fluid padtop80">

      <?php 

        $args= array(
            'showposts' => -1,
            'post_type' => 'post',
            'orderby' => 'title',
            'order' => 'asc'
        );
        $the_query = new WP_Query($args);

        while ($the_query->have_posts()) : 
        $the_query->the_post();

      ?>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 brik padbot20">
          <a class="block" href="<?php the_permalink(); ?>">

            <?php if ( get_field('image_principale') ) { ?>
              <img class="w100" src="<?php the_field('image_principale'); ?>" alt="">
            <?php } ?>
            
            <div class="frame_content">
              <h2 class="bold"><?php the_title(); ?></h2>
              <p class="date bold"><?php the_date(); ?></p>
              <?php the_excerpt(); ?>
              <p class="more">Lire la suite</p>
            </div>
            
          </a>
        </div>
        
      <?php
          endwhile;
          wp_reset_query();
      ?>

    </div>
  </section>

<?php get_footer(); ?>