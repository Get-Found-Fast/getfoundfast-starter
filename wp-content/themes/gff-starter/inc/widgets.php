<?php
/**
 * Register custom widget areas here
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gff_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gff-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'gff-starter' ),
		'id'            => 'header-widget-1',
		'description'   => esc_html__( 'Widget Area for Global Header.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget header-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title header-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Slider', 'gff-starter' ),
		'id'            => 'slider-widget-1',
		'description'   => esc_html__( 'Widget Area for Slider.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget slider-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title slider-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Section 1', 'gff-starter' ),
		'id'            => 'home-widget-1',
		'description'   => esc_html__( 'Widget Section 1 for Home Page.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget home-section1-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title home-section1-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Section 2', 'gff-starter' ),
		'id'            => 'home-widget-2',
		'description'   => esc_html__( 'Widget Section 2 for Home Page.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget home-section2-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title home-section2-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Section 3', 'gff-starter' ),
		'id'            => 'home-widget-3',
		'description'   => esc_html__( 'Widget Section 3 for Home Page.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget home-section3-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title home-section3-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'gff-starter' ),
		'id'            => 'footer-widget-1',
		'description'   => esc_html__( 'Widget Area for Global Footer.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title footer-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'gff-starter' ),
		'id'            => 'copyright-widget',
		'description'   => esc_html__( 'Widget Area for Global Copyright.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget copyright-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title copyright-widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gff_starter_widgets_init' );


/**
 * Register custom widgets here
 */
 
class GFF_Header_Block extends WP_Widget {

	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'header-block',
			'description' => __( 'Header responsive block.' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'header-block', __( 'Header' ), $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Text widget instance.
	 */
	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';
		

		/**
		 * Filters the content of the Text widget.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 Added the `$this` parameter.
		 *
		 * @param string         $widget_text The widget content.
		 * @param array          $instance    Array of settings for the current widget.
		 * @param WP_Widget_Text $this        Current Text widget instance.
		 */
		$text = apply_filters( 'widget_text', $widget_text, $instance, $this );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
<link href="../css/flexboxgrid.css" rel="stylesheet" type="text/css">

<div class="textwidget col-lg-3"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = wp_kses_post( $new_instance['text'] );
		}
		$instance['filter'] = ! empty( $new_instance['filter'] );
		return $instance;
	}

	/**
	 * Outputs the Text widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$title = sanitize_text_field( $instance['title'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
		<?php
	}
}

function gff_widgets_init() {
    register_widget( 'GFF_Header_Block' );
}
add_action( 'widgets_init', 'gff_widgets_init' );