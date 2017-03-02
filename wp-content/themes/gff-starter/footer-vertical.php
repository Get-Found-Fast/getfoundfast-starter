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

	
    <!-- Global widget sections -->
<section class="global-widget1 global-widgets"><div class="container-fluid"><div class="row"><?php dynamic_sidebar('global-widget-1');?></div></div></section>
<section class="global-widget2 global-widgets"><div class="container-fluid"><div class="row"><?php dynamic_sidebar('global-widget-2');?></div></div></section>
<section class="global-widget3 global-widgets"><div class="container-fluid"><div class="row"><?php dynamic_sidebar('global-widget-3');?></div></div></section>
<section class="global-widget4 global-widgets"><div class="container-fluid"><div class="row"><?php dynamic_sidebar('global-widget-4');?></div></div></section>
<section class="global-widget5 global-widgets"><div class="container-fluid"><div class="row"><?php dynamic_sidebar('global-widget-5');?></div></div></section>
	<footer id="colophon" class="site-footer " role="contentinfo">
    <div class="container-fluid">
		<div class="site-info">
			<div class="row"><?php dynamic_sidebar('footer-widget-1');?></div>
            <div class="row"><?php dynamic_sidebar('copyright-widget');?></div>
        
		</div><!-- .site-info -->
        </div><!-- .container -->
	</footer><!-- #colophon -->
    </div><!-- #content -->
</div><!-- #page -->


<!-- CSS slideout form --> 
     <?php if (is_active_sidebar('slideout-widget')) {
     ?>
     <?php dynamic_sidebar('slideout-widget');?>
   
 <?php
     }
 ?>  

<script type="text/javascript">jQuery(document).ready(function($){
	//open the lateral panel
	$('.cd-btn').on('click', function(event){
		event.preventDefault();
		$('.cd-panel').addClass('is-visible');
	});
	//clode the lateral panel
	$('.cd-panel').on('click', function(event){
		if( $(event.target).is('.cd-panel') || $(event.target).is('.cd-panel-close') ) { 
			$('.cd-panel').removeClass('is-visible');
			event.preventDefault();
		}
	});
});</script>


<script>
	$(function(){
		$('#menu').slicknav();
	});
</script>
<script>
$(function() {
 $("img.lazy").lazyload({
    effect : "fadeIn",
	effectspeed: 1000,
});
});

</script>
<script>
$(function() {$(".global-widgets, .entry-content, .entry-header").flowtype({
   minimum   : 360,
   maximum   : 1500,
   minFont   : 13,
   maxFont   : 18,
   fontRatio : 30
});});

</script>
<?php wp_footer(); ?>
<?php the_field('google_code', 'option');?>
</body>
</html>
