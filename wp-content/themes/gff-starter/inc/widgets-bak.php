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
		'before_widget' => '<section id="%1$s" class="widget header-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title header-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Slider', 'gff-starter' ),
		'id'            => 'slider-widget-1',
		'description'   => esc_html__( 'Widget Area for Slider.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget slider-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title slider-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Section 1', 'gff-starter' ),
		'id'            => 'home-widget-1',
		'description'   => esc_html__( 'Widget Section 1 for Home Page.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget home-section1-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title home-section1-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Section 2', 'gff-starter' ),
		'id'            => 'home-widget-2',
		'description'   => esc_html__( 'Widget Section 2 for Home Page.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget home-section2-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title home-section2-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Section 3', 'gff-starter' ),
		'id'            => 'home-widget-3',
		'description'   => esc_html__( 'Widget Section 3 for Home Page.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget home-section3-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title home-section3-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'gff-starter' ),
		'id'            => 'footer-widget-1',
		'description'   => esc_html__( 'Widget Area for Global Footer.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget footer-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title footer-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'gff-starter' ),
		'id'            => 'copyright-widget',
		'description'   => esc_html__( 'Widget Area for Global Copyright.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget copyright-widget row %2$s">',
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
			'classname' => 'col-block',
			'description' => __( 'Bootstrap responsive block.' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'col-block', __( 'Column Block' ), $widget_ops, $control_ops );
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
		$collg = apply_filters( 'widget_title', empty( $instance['collg'] ) ? '' : $instance['collg'], $instance, $this->id_base );

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

	 ?> 
			<div class="textwidget <?php echo $collg ?> col-md-4 col-sm-12 col-xs-12"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		
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
		$instance['collg'] = sanitize_text_field( $new_instance['collg'] );
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
		$instance = wp_parse_args( (array) $instance, array( 'collg' => '', 'text' => '', 'colmd' => '', 'collg' => '', 'collg' => '' ) );
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$collg = sanitize_text_field( $instance['collg'] );
		$colmd = sanitize_text_field( $instance['colmd'] );
		$colsm = sanitize_text_field( $instance['colsm'] );
		$colxs = sanitize_text_field( $instance['colxs'] );
		?>
		<p><label for="<?php echo $this->get_field_id('collg'); ?>"><?php _e('Column Large Classes:'); ?></label>
		<select class='widefat' id="<?php echo $this->get_field_id('collg'); ?>"
                name="<?php echo $this->get_field_name('collg'); ?>" type="text">
          <option value='col-lg-1'<?php echo ($collg=='col-lg-1')?'selected':''; ?>>
            Col-1
          </option>
          <option value='col-lg-2'<?php echo ($collg=='col-lg-2')?'selected':''; ?>>
            Col-2
          </option> 
          <option value='col-lg-3'<?php echo ($collg=='col-lg-3')?'selected':''; ?>>
            Col-3
          </option> 
           <option value='col-lg-4'<?php echo ($collg=='col-lg-4')?'selected':''; ?>>
            Col-4
          </option>
          <option value='col-lg-5'<?php echo ($collg=='col-lg-5')?'selected':''; ?>>
            Col-5
          </option> 
          <option value='col-lg-6'<?php echo ($collg=='col-lg-6')?'selected':''; ?>>
            Col-6
          </option> 
           <option value='col-lg-7'<?php echo ($collg=='col-lg-8')?'selected':''; ?>>
            Col-7
          </option>
          <option value='col-lg-8'<?php echo ($collg=='col-lg-8')?'selected':''; ?>>
            Col-8
          </option> 
          <option value='col-lg-9'<?php echo ($collg=='col-lg-9')?'selected':''; ?>>
            Col-9
          </option> 
           <option value='col-lg-10'<?php echo ($collg=='col-lg-10')?'selected':''; ?>>
            Col-10
          </option> 
           <option value='col-lg-11'<?php echo ($collg=='col-lg-11')?'selected':''; ?>>
            Col-11
          </option> 
           <option value='col-lg-12'<?php echo ($collg=='col-lg-12')?'selected':''; ?>>
            Col-12
          </option> 
        </select>                </p>
        

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