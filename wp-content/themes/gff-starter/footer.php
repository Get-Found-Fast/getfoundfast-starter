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
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'gff-starter' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'gff-starter' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'gff-starter' ), 'gff-starter', '<a href="https://automattic.com/" rel="designer">Get Found Fast</a>' ); ?>
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
