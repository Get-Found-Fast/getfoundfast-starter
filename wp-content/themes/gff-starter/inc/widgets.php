<?php
/**
 * Register custom widgets and areas here
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gff_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gff-starter' ),
		'id'            => 'sidebar-1',
		'class'         => 'subpage-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget sidebar-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'gff-starter' ),
		'id'            => 'header-widget-1',
		'class'         => 'header-widget-section',
		'description'   => esc_html__( 'Widget Area for Global Header.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget header-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title header-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Slider', 'gff-starter' ),
		'id'            => 'slider-widget-1',
		'class'         => 'slider-widget-section1',
		'description'   => esc_html__( 'Widget Area for Slider.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget slider-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title slider-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Global Section 1', 'gff-starter' ),
		'id'            => 'global-widget-1',
		'class'         => 'global-widget-section1',
		'description'   => esc_html__( 'Global widget section under main content 1.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget global-section1-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title global-section1-widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Global Section 2', 'gff-starter' ),
		'id'            => 'global-widget-2',
		'class'         => 'global-widget-section2',
		'description'   => esc_html__( 'Global widget section under main content 2.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget global-section2-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title global-section2-widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Global Section 3', 'gff-starter' ),
		'id'            => 'global-widget-3',
		'class'         => 'global-widget-section3',
		'description'   => esc_html__( 'Global widget section under main content 3.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget global-section3-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title global-section3-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'gff-starter' ),
		'id'            => 'footer-widget-1',
		'class'         => 'footer-widget-section1',
		'description'   => esc_html__( 'Widget Area for Global Footer.', 'gff-starter' ),
		'before_widget' => '<section id="%1$s" class="widget footer-widget row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title footer-widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'gff-starter' ),
		'id'            => 'copyright-widget',
		'class'         => 'copyright-widget-section',
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
 
class GFF_Custom_Block extends WP_Widget {

	
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

public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$classes = apply_filters( 'widget_title', empty( $instance['classes'] ) ? '' : $instance['classes'], $instance, $this->id_base );

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
			<div class="textwidget <?php echo $classes, ' ' , $args['class']; ?>"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
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
		$instance['classes'] = sanitize_text_field( $new_instance['classes'] );
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
		$instance = wp_parse_args( (array) $instance, array( 'classes' => '', 'text' => '' ) );
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$classes = sanitize_text_field( $instance['classes'] );
		?>
		<p><label for="<?php echo $this->get_field_id('classes'); ?>"><?php _e('Classes (Insert CSS classes separated by a space):'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('classes'); ?>" name="<?php echo $this->get_field_name('classes'); ?>" type="text" value="<?php echo esc_attr($classes); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
		<?php
	}
}



/**
	 * Adds class field to custom menu widget
	 */

class WP_Nav_Menu_With_Class extends WP_Widget {

	/**
	 * Sets up a new Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'description' => __( 'Add a custom menu to your sidebar that uses CSS classes' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'nav_menu_custom', __('Custom Menu w/ CSS Classes'), $widget_ops );
	}

	/**
	 * Outputs the content for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Custom Menu widget instance.
	 */
	public function widget( $args, $instance ) {
		$nav_class = apply_filters( 'widget_title', empty( $instance['nav_class'] ) ? '' : $instance['nav_class'], $instance, $this->id_base );
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( !$nav_menu )
			return;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */

		$nav_menu_args = array(
			'fallback_cb' => '',
			'menu'        => $nav_menu,
			'container' => 'div', 
			'container_class' => $nav_class,
		);

		/**
		 * Filters the arguments for the Custom Menu widget.
		 *
		 * @since 4.2.0
		 * @since 4.4.0 Added the `$instance` parameter.
		 *
		 * @param array    $nav_menu_args {
		 *     An array of arguments passed to wp_nav_menu() to retrieve a custom menu.
		 *
		 *     @type callable|bool $fallback_cb Callback to fire if the menu doesn't exist. Default empty.
		 *     @type mixed         $menu        Menu ID, slug, or name.
		 * }
		 * @param WP_Term  $nav_menu      Nav menu object for the current menu.
		 * @param array    $args          Display arguments for the current widget.
		 * @param array    $instance      Array of settings for the current widget.
		 */
		wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );

		
	}

	/**
	 * Handles updating settings for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['nav_class'] ) ) {
			$instance['nav_class'] = sanitize_text_field( $new_instance['nav_class'] );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}
		return $instance;
	}

	/**
	 * Outputs the settings form for the Custom Menu widget.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 * @global WP_Customize_Manager $wp_customize
	 */
	public function form( $instance ) {
		global $wp_customize;
		$nav_class = isset( $instance['nav_class'] ) ? $instance['nav_class'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		// Get menus
		$menus = wp_get_nav_menus();

		// If no menus exists, direct the user to go and create some.
		?>
		<p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus ) ) { echo ' style="display:none" '; } ?>>
			<?php
			if ( $wp_customize instanceof WP_Customize_Manager ) {
				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
			} else {
				$url = admin_url( 'nav-menus.php' );
			}
			?>
			<?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
		</p>
		<div class="nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) { echo ' style="display:none" '; } ?>>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_class' ); ?>"><?php _e( 'Classes (Insert CSS classes separated by a space):' ) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'nav_class' ); ?>" name="<?php echo $this->get_field_name( 'nav_class' ); ?>" value="<?php echo esc_attr( $nav_class ); ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
				<p class="edit-selected-nav-menu" style="<?php if ( ! $nav_menu ) { echo 'display: none;'; } ?>">
					<button type="button" class="button"><?php _e( 'Edit Menu' ) ?></button>
				</p>
			<?php endif; ?>
		</div>
		<?php
	}
}
function gff_widgets_init() {
    register_widget( 'GFF_Custom_Block' );
	register_widget('WP_Nav_Menu_With_Class');
}
add_action( 'widgets_init', 'gff_widgets_init' );