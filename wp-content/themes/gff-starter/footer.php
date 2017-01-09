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
	<footer id="colophon" class="site-footer " role="contentinfo">
    <div class="container">
		<div class="site-info">
			<div class="row"><?php dynamic_sidebar('footer-widget-1');?></div>
            <div class="row"><?php dynamic_sidebar('copyright-widget');?></div>
		</div><!-- .site-info -->
        </div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
	$(function(){
		$('#menu').slicknav();
	});
</script>
<?php wp_footer(); ?>

</body>
</html>
