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
	
	register_sidebar( array(
		'name'          => esc_html__( 'Slideout Container', 'gff-starter' ),
		'id'            => 'slideout-widget',
		'class'         => 'slideout-widget-section',
		'description'   => esc_html__( 'Widget for Slide Out Form.', 'gff-starter' ),
		'before_widget' => '<div id="slideout">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title slideout-widget-title">',
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
			'description' => __( 'Bootstrap responsive block.','gff-starter' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'col-block', __( 'Column Block','gff-starter' ), $widget_ops, $control_ops );
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
			<div class="textwidget <?php echo $classes; ?>"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
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
		<p><label for="<?php echo $this->get_field_id('classes'); ?>"><?php _e('Classes (Insert CSS classes separated by a space):','gff-starter'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('classes'); ?>" name="<?php echo $this->get_field_name('classes'); ?>" type="text" value="<?php echo esc_attr($classes); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:','gff-starter' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs','gff-starter'); ?></label></p>
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
			'description' => __( 'Add a custom menu to your sidebar that uses CSS classes','gff-starter' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'nav_menu_custom', __('Custom Menu w/ CSS Classes','gff-starter'), $widget_ops );
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
			<?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.','gff-starter' ), esc_attr( $url ) ); ?>
		</p>
		<div class="nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) { echo ' style="display:none" '; } ?>>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_class' ); ?>"><?php _e( 'Classes (Insert CSS classes separated by a space):','gff-starter' ) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'nav_class' ); ?>" name="<?php echo $this->get_field_name( 'nav_class' ); ?>" value="<?php echo esc_attr( $nav_class ); ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:','gff-starter' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;','gff-starter' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
				<p class="edit-selected-nav-menu" style="<?php if ( ! $nav_menu ) { echo 'display: none;'; } ?>">
					<button type="button" class="button"><?php _e( 'Edit Menu','gff-starter' ) ?></button>
				</p>
			<?php endif; ?>
		</div>
		<?php
	}
}

/**
	 * Adds font awesome slideout form
	 */
 
class GFF_FA_slideout extends WP_Widget {

	
	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'fa-slideout',
			'description' => __( 'Slideout Form with Font Awesome.','gff-starter' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'fa-slideout', __( 'Slideout Form w/ Font Awesome','gff-starter' ), $widget_ops, $control_ops );
	}

public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$fa_class = apply_filters( 'fa_class', empty( $instance['fa_class'] ) ? '' : $instance['fa_class'], $instance, $this->id_base );

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

		?>	<?php echo $args['before_widget'];?>
			<i class="<?php echo $fa_class; ?>"></i><div id="slideout_inner"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div><?php echo $args['after_widget'];?>
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
		$instance['fa_class'] = sanitize_text_field( $new_instance['fa_class'] );
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
		$instance = wp_parse_args( (array) $instance, array( 'fa_class' => '', 'text' => '' ) );
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$fa_class = sanitize_text_field( $instance['fa_class'] );
		?>
		<p><label for="<?php echo $this->get_field_id('fa_class'); ?>"><?php _e('FA Classes (Insert Font Awesome classes separated by a space):','gff-starter'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('fa_class'); ?>" name="<?php echo $this->get_field_name('fa_class'); ?>" type="text" value="<?php echo esc_attr($fa_class); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:','gff-starter' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs','gff-starter'); ?></label></p>
		<?php
	}
}

/**
	 * Adds social media icons widget
	 */
 
class GFF_social_icons extends WP_Widget {

	
	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'social-icons',
			'description' => __( 'Add social media icons to the website. Change these under "options".','gff-starter' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'social-icons', __( 'Social Media Icons','gff-starter' ), $widget_ops, $control_ops );
	}

// display widget
public function widget($args, $instance) {
	$facebook = get_field('facebook', 'option');
	$facebook_url = get_field('facebook_url', 'option');
	$googleplus = get_field('google_plus', 'option');
	$googleplus_url = get_field('google_plus_url', 'option');
	$twitter = get_field('twitter', 'option');
	$twitter_url = get_field('twitter_url', 'option');
	$youtube = get_field('youtube', 'option');
	$youtube_url = get_field('youtube_url', 'option');
	$checkbox = $instance['checkbox'];
	$checkbox2 = $instance['checkbox2'];
	$checkbox3 = $instance['checkbox3'];
	$checkbox4 = $instance['checkbox4'];
	$smi_class = $instance['smi_class'];
   extract( $args );
   // these are the widget options
  
  
  
   // Display the widget
   echo "<div itemscope itemtype='http://schema.org/Organization' itemref='social-links' class='{$smi_class}'><div id='social-links'> ";
   // Check if title is set
  
   // Check if checkbox is checked
   if( $checkbox AND $checkbox == '1' ) {
   echo "<a itemprop='sameAs' href='{$facebook_url}' target='_blank' >$facebook</a>";
   }
    if( $checkbox2 AND $checkbox2 == '1' ) {
   echo "<a itemprop='sameAs' href='{$googleplus_url}' target='_blank' >$googleplus</a>";
   }
    if( $checkbox3 AND $checkbox3 == '1' ) {
    echo "<a itemprop='sameAs' href='{$twitter_url}' target='_blank' >$twitter</a>";
   }
    if( $checkbox4 AND $checkbox4 == '1' ) {
    echo "<a itemprop='sameAs' href='{$youtube_url}' target='_blank' >$youtube</a>";
   }
   echo '</div></div>';
  
}
public function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
       $instance['checkbox'] = strip_tags($new_instance['checkbox']);
	     $instance['checkbox2'] = strip_tags($new_instance['checkbox2']);
		   $instance['checkbox3'] = strip_tags($new_instance['checkbox3']);
      $instance['checkbox4'] = strip_tags($new_instance['checkbox4']);
	  $instance['smi_class'] = strip_tags($new_instance['smi_class']);
     return $instance;
}
public function form( $instance ) { 
// Check values 
if( $instance ) { 
	$checkbox = esc_attr( $instance['checkbox'] ); // Added this
	$checkbox2 = esc_attr( $instance['checkbox2'] ); // Added this
	$checkbox3 = esc_attr( $instance['checkbox3'] ); // Added this
	$checkbox4 = esc_attr( $instance['checkbox4'] ); // Added this
	$smi_class = esc_attr( $instance['smi_class'] ); // Added this
} else { 
	
	$checkbox = ''; // Added this
	$checkbox2 = ''; // Added this
	$checkbox3 = ''; // Added this
	$checkbox4 = ''; // Added this
	$smi_class = ''; // Added this
} ?>

<p><label for="<?php echo $this->get_field_id('smi_class'); ?>"><?php _e('CSS Classes (Insert CSS classes separated by a space):','gff-starter'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('smi_class'); ?>" name="<?php echo $this->get_field_name('smi_class'); ?>" type="text" value="<?php echo esc_attr($smi_class); ?>" /></p>

<p>
<input id="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'checkbox' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?> />
<label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php _e( 'Facebook', 'gff-starter' ); ?></label>
</p>

<p>
<input id="<?php echo esc_attr( $this->get_field_id( 'checkbox2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'checkbox2' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox2 ); ?> />
<label for="<?php echo esc_attr( $this->get_field_id( 'checkbox2' ) ); ?>"><?php _e( 'Google+', 'gff-starter' ); ?></label>
</p>

<p>
<input id="<?php echo esc_attr( $this->get_field_id( 'checkbox3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'checkbox3' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox3 ); ?> />
<label for="<?php echo esc_attr( $this->get_field_id( 'checkbox3' ) ); ?>"><?php _e( 'Twitter', 'gff-starter' ); ?></label>
</p>
<p>
<input id="<?php echo esc_attr( $this->get_field_id( 'checkbox4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'checkbox4' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox4 ); ?> />
<label for="<?php echo esc_attr( $this->get_field_id( 'checkbox4' ) ); ?>"><?php _e( 'Youtube', 'gff-starter' ); ?></label>
</p>
		<?php
	}
}




function gff_widgets_init() {
	register_widget('GFF_social_icons');
    register_widget( 'GFF_Custom_Block' );
	register_widget('WP_Nav_Menu_With_Class');
	 register_widget( 'GFF_FA_slideout' );
}
add_action( 'widgets_init', 'gff_widgets_init' );