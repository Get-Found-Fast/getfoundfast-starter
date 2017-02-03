<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GFF_Starter
 */

?>

	</div><!-- #content -->
    <!-- Global widget sections -->
<section class="global-widget1 global-widgets"><div class="container"><div class="row"><?php dynamic_sidebar('global-widget-1');?></div></div></section>
<section class="global-widget2 global-widgets"><div class="container"><div class="row"><?php dynamic_sidebar('global-widget-2');?></div></div></section>
<section class="global-widget3 global-widgets"><div class="container"><div class="row"><?php dynamic_sidebar('global-widget-3');?></div></div></section>
<section class="global-widget4 global-widgets"><div class="container"><div class="row"><?php dynamic_sidebar('global-widget-4');?></div></div></section>
<section class="global-widget5 global-widgets"><div class="container"><div class="row"><?php dynamic_sidebar('global-widget-5');?></div></div></section>
	<footer id="colophon" class="site-footer " role="contentinfo">
    <div class="container">
		<div class="site-info">
			<div class="row"><?php dynamic_sidebar('footer-widget-1');?></div>
            <div class="row"><?php dynamic_sidebar('copyright-widget');?></div>
             <!-- Contact information section w/ schema -->
             <div class="row"><div class="contact-information col-lg-12 col-md-12 col-sm-12 col-xs-12" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<span itemprop="streetAddress"><?php the_field('address_street','option');?></span>
			<?php the_field('address_street_2','option');?>
			<span itemprop="addressLocality"><?php the_field('address_city','option');?></span>
			 <span itemprop="addressRegion"><?php the_field('address_state','option');?></span>
			 <span itemprop="postalCode"><?php the_field('address_postcode','option');?></span>
			<span itemprop="telephone"><a href="tel:<?php the_field('phone_number','option');?>"><?php the_field('phone_number','option');?></a></span>
			<a href="mailto:<?php the_field('email','option');?>" itemprop="email"><?php the_field('email','option');?></a> </div></div>
		</div><!-- .site-info -->
        </div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
	$(function(){
		$('#menu').slicknav();
	});
</script>
<script>
$(document).ready(function() {
 $("img.lazy").lazyload({
    effect : "fadeIn",
	effectspeed: 500,
});
});

</script>
<script>
$(document).ready(function() {$('body').flowtype({
   minimum   : 500,
   maximum   : 1200,
   minFont   : 12,
   maxFont   : 16,
   fontRatio : 80
});});</script>
<?php wp_footer(); ?>
<?php the_field('google_code', 'option');?>
</body>
</html>
