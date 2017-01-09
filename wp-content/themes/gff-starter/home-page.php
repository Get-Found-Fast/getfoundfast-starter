<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GFF_Starter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
     <!--Slider function-->  <?php 

$images = get_field('slider_portfolio');

if( $images ): ?>
<div class="slider" >        <?php foreach( $images as $image ): ?>
            <div class="slider-wrapper" >
               
                     <div class="slider-img" style="background-image: url('<?php echo $image['url'];?>')" alt="<?php echo $image['alt']; ?>" />
                </div>
                <div class="slider-caption"><?php echo $image['caption']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
        <div class="container">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'home' );

				
			endwhile; // End of the loop.
			?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
