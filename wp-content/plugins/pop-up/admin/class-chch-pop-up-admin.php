<?php

/**
 * CC Pop-Up
 *
 * @package   CcPopUpAdmin
 * @author    Chop-Chop.org <shop@chop-chop.org>
 * @license   GPL-2.0+
 * @link      https://shop.chop-chop.org
 * @copyright 2014
 */

if ( file_exists( CC_PU_PLUGIN_DIR . 'admin/includes/CMB2/init.php' ) ) {
  require_once CC_PU_PLUGIN_DIR . 'admin/includes/CMB2/init.php';
}

/**
 * @package CcPopUpAdmin
 * @author 	Chop-Chop.org <shop@chop-chop.org>
 */

class CcPopUpAdmin {

  /**
   * Instance of this class.
   *
   * @since    1.0.0
   *
   * @var      object
   */
  protected static $instance = null;

  function __construct() {
    $this->plugin = CcPopUp::get_instance();
    $this->plugin_slug = $this->plugin->get_plugin_slug();

    // Register Post Type
    add_action( 'init', array( $this, 'chch_pu_register_post_type' ) );

    // Register Post Type Messages
    add_filter( 'post_updated_messages', array( $this, 'chch_pu_post_type_messages' ) );

    // Register Post Type Meta Boxes and fields
    add_action( 'cmb2_init', array( $this, 'chch_pu_initialize_cmb_meta_boxes' ) );
    add_action( 'add_meta_boxes_chch-pop-up', array( $this, 'chch_pu_metabox' ) );
    add_filter( 'cmb2_render_chch_pu_pages_select', array( $this, 'chch_pu_render_pages_select' ), 10, 5 );
    add_filter( 'cmb2_render_chch_pu_cookie_select', array( $this, 'chch_pu_render_cookie_select' ), 10, 5 );

    add_action( 'save_post', array( $this, 'chch_pu_save_data' ), 10, 3 );

    // Customize the columns in the popup list.
    add_filter( 'manage_chch-pop-up_posts_columns', array( $this, 'chch_pu_custom_columns' ) );
    // Returns the content for the custom columns.
    add_action( 'manage_chch-pop-up_posts_custom_column', array( $this, 'chch_pu_manage_custom_columns' ), 10, 2 );
    add_action( 'admin_print_scripts', array( $this, 'chch_pu_enqueue_admin_scripts' ) );
    add_action( 'admin_head', array( $this, 'chch_pu_admin_head_scripts' ) );

  }

  /**
   * Return an instance of this class.
   *
   * @since     1.0.0
   *
   * @return    object    A single instance of this class.
   */
  public static function get_instance() {

    // If the single instance hasn't been set, set it now.
    if ( null == self::$instance ) {
      self::$instance = new self;
    }

    return self::$instance;
  }

  /**
   * Return a pages_select field for CMB
   *
   * @since     1.0.0
   *
   */
  function chch_pu_custom_columns( $defaults ) {
    $defaults['chch_pu_status'] = __( 'Active', $this->plugin_slug );
    $defaults['chch_pu_clicks'] = __( 'Clicks', $this->plugin_slug );
    $defaults['chch_pu_template'] = __( 'Template', $this->plugin_slug );
    return $defaults;
  }

  /**
   * Create columns in Pop-ups list
   *
   * @since     1.0.0
   */
  function chch_pu_manage_custom_columns( $column, $post_id ) {
    global $post;
    if ( $column === 'chch_pu_status' ) {
      echo ucfirst( get_post_meta( $post_id, '_chch_pop_up_status', true ) );
    }

    if ( $column === 'chch_pu_clicks' ) {
      echo '<a href="http://ch-ch.org/pupro" target="_blank">AVAILABLE IN PRO</a>';
    }

    if ( $column === 'chch_pu_template' ) {
      echo ucfirst( get_post_meta( $post_id, '_chch_pop_up_template', true ) );
    }
  }

  /**
   * Register Custom Post Type
   *
   * @since    1.0.0
   */
  public function chch_pu_register_post_type() {

    $domain = $this->plugin_slug;

    $labels = array(
      'name' => _x( 'Pop-Up CC', 'Post Type General Name', $domain ),
      'singular_name' => _x( 'Pop-Up', 'Post Type Singular Name', $domain ),
      'menu_name' => __( 'Pop-Up CC', $domain ),
      'parent_item_colon' => __( 'Parent Item:', $domain ),
      'all_items' => __( 'Pop-Ups CC', $domain ),
      'view_item' => __( 'View Item', $domain ),
      'add_new_item' => __( 'Add New Pop-Up', $domain ),
      'add_new' => __( 'Add New Pop-Up', $domain ),
      'edit_item' => __( 'Edit Pop-Up', $domain ),
      'update_item' => __( 'Update Pop-Up', $domain ),
      'search_items' => __( 'Search Pop-Up', $domain ),
      'not_found' => __( 'Not found', $domain ),
      'not_found_in_trash' => __( 'No Pop-Up found in Trash', $domain ),
      );

    $args = array(
      'label' => __( 'Pop-Up', $domain ),
      'description' => __( '', $domain ),
      'labels' => $labels,
      'supports' => array( 'title' ),
      'hierarchical' => false,
      'public' => false,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => false,
      'menu_position' => 65,
      'can_export' => true,
      'has_archive' => false,
      'exclude_from_search' => true,
      'publicly_queryable' => false,
      'menu_icon'           => 'dashicons-editor-table',
      'rewrite' => false );
    register_post_type( 'chch-pop-up', $args );
  }

  /**
   * Pop-Ups update messages.
   *
   * @param array $messages Existing post update messages.
   *
   * @return array Amended post update messages with new CPT update messages.
   */
  function chch_pu_post_type_messages( $messages ) {
    $post = get_post();
    $post_type = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['chch-pop-up'] = array(
      0 => '', // Unused. Messages start at index 1.
      1 => __( 'Pop-Up updated.', $this->plugin_slug ),
      2 => __( 'Custom field updated.', $this->plugin_slug ),
      3 => __( 'Custom field deleted.', $this->plugin_slug ),
      4 => __( 'Pop-Up updated.', $this->plugin_slug ),
      5 => isset( $_GET['revision'] ) ? sprintf( __( 'Pop-Up restored to revision from %s', $this->plugin_slug ), wp_post_revision_title( ( int )$_GET['revision'], false ) ) : false,
      6 => __( 'Pop-Up published.', $this->plugin_slug ),
      7 => __( 'Pop-Up saved.', $this->plugin_slug ),
      8 => __( 'Pop-Up submitted.', $this->plugin_slug ),
      9 => sprintf( __( 'Pop-Up scheduled for: <strong>%1$s</strong>.', $this->plugin_slug ), date_i18n( __( 'M j, Y @ G:i', $this->plugin_slug ), strtotime( $post->post_date ) ) ),
      10 => __( 'Pop-Up draft updated.', $this->plugin_slug ) );

    return $messages;
  }

  /**
   * Initialize Custom Metaboxes Class
   *
   * @since  1.0.0
   */
  function chch_pu_initialize_cmb_meta_boxes() {
    $domain = $this->plugin_slug;
    $prefix = '_chch_pop_up_';

    /**
     * GENERAL OPTIONS
     */

    $general_metabox = new_cmb2_box( array(
      'id' => 'chch-puf-metabox-general',
      'title' => __( 'GENERAL', $domain ),
      'object_types' => array( 'chch-pop-up' ),
      ) );

    $general_metabox->add_field( array(
      'name' => __( 'Pop-up Status', $domain ),
      'desc' => __( 'Enable or disable the plugin.', $domain ),
      'id' => $prefix . 'status',
      'type' => 'radio_inline',
      'default' => 'yes',
      'options' => array(
        'yes' => __( 'Turned ON', $domain ),
        'no' => __( 'Turned OFF', $domain ),
        ),
      ) );

		$general_metabox->add_field( array(
			'name' => __( 'Always Center the Pop-Up?', $domain ),
			'desc' => __( 'The pop-up will be centered.', $domain ),
			'id'   => $prefix . 'always_center_pop_up',
			'type' => 'checkbox',
		) );

    $general_metabox->add_field( array(
      'name' => __( 'Show on mobile devices?', $domain ),
      'desc' => __( 'The pop-up will be visible on mobile devices.', $domain ),
      'id' => $prefix . 'show_on_mobile',
      'type' => 'checkbox',
      ) );

    $general_metabox->add_field( array(
      'name' => __( 'Show only on mobile devices?', $domain ),
      'desc' => __( 'The pop-up will be visible on mobile devices only.', $domain ),
      'id' => $prefix . 'show_only_on_mobile',
      'type' => 'checkbox',
      ) );

    $general_metabox->add_field( array(
      'name' => __( 'Show after', $domain ),
      'desc' => __( 'seconds', $domain ),
      'id' => $prefix . 'timer',
      'type' => 'text_small',
      'default' => '0' ) );

    $general_metabox->add_field( array(
      'name' => __( 'Show once per', $domain ),
      'desc' => __( '', $domain ),
      'id' => $prefix . 'show_once_per',
      'type' => 'chch_pu_cookie_select',
      ) );

    $general_metabox->add_field( array(
      'name' => __( 'Auto close the pop-up after the sign-up', $domain ),
      'desc' => __( '', $domain ),
      'id' => $prefix . 'auto_closed',
      'type' => 'checkbox',
      ) );

    $general_metabox->add_field( array(
      'name' => __( 'Close after:', $domain ),
      'desc' => __( 'seconds', $domain ),
      'id' => $prefix . 'close_timer',
      'type' => 'text_small',
      'default' => '0' ) );
    /**
     * DISPLAY CONTROL
     */
    $display_metabox = new_cmb2_box( array(
      'id' => 'chch-puf-metabox-control',
      'title' => __( 'Display Control', $domain ),
      'object_types' => array( 'chch-pop-up' ),
      ) );

    $display_metabox->add_field( array(
      'name' => __( 'By Role:', $domain ),
      'desc' => __( 'Decide who will see the pop-up.', $domain ),
      'id' => $prefix . 'role',
      'type' => 'radio',
      'options' => array(
        'all' => __( 'All', $domain ),
        'unlogged' => __( 'Show to unlogged users', $domain ),
        'logged' => __( 'Show to logged in users', $domain ),
        ),
      'default' => 'all' ) );

    $display_metabox->add_field( array(
      'name' => __( 'Disable on:', $domain ),
      'desc' => __( 'Decide on which pages the pop-up will not be visible. <br> Hold the ctrl key and click to select the pages which should not display the pop-up.', $domain ),
      'id' => $prefix . 'page',
      'type' => 'chch_pu_pages_select',
      ) );

    $display_metabox = new_cmb2_box( array(
      'id' => 'chch-puf-metabox-control',
      'title' => __( 'Display Control', $domain ),
      'object_types' => array( 'chch-pop-up' ),
      ) );

    /**
     * Newsletter
     */

  }

  /**
   * Register custom metaboxes
   *
   * @since  0.1.0
   */
  public function chch_pu_metabox( $post ) {
    remove_meta_box( 'slugdiv', 'chch-pop-up', 'normal' );

    add_meta_box( 'chch-puf-metabox-newsletter', __( 'Newsletter', $this->plugin_slug ), array( $this, 'chch_pu_render_newsletter_metabox' ), 'chch-pop-up', 'normal', 'low' );

    $post_boxes = array(
      'chch-puf-metabox-general',
      'chch-puf-metabox-control',
      'chch-puf-metabox-newsletter',
      );

    foreach ( $post_boxes as $post_box ) {
      add_filter( 'postbox_classes_chch-pop-up_' . $post_box, array( $this, 'chch_pu_add_metabox_classes' ) );
    }
  }

  /**
   * View for Newsletter Metabox
   *
   * @since  1.0.0
   */
  function chch_pu_render_newsletter_metabox( $post ) {
    require_once ( CC_PU_PLUGIN_DIR . 'admin/views/newsletter-metabox.php' );
  }

  /**
   * Add metabox class for tabs
   *
   * @since  0.1.0
   */
  function chch_pu_add_metabox_classes( $classes ) {
    array_push( $classes, "chch-lpf-tab-2 chch-lpf-tab" );
    return $classes;
  }

  /**
   * Return a pages_select field for CMB
   *
   * @since     1.0.0
   *
   */
  function chch_pu_render_pages_select( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
    $all_pages = $this->get_all_pages();

    printf( "<select class=\"cmb_select\" name=\"%s[]\" id=\"%s\" multiple=\"multiple\">", $field->args( '_name' ), $field->args( '_name' ) );
    $custom_pages = array(
      'chch_home' => 'Home (Latest Posts)',
      'chch_woocommerce_shop' => 'Woocommerce (Shop Page)',
      'chch_woocommerce_category' => 'Woocommerce (Category Page)',
      'chch_woocommerce_products' => 'Woocommerce (Single Product)',
      );

    foreach ( $custom_pages as $value => $title ):
      $selected = '';
      if ( !empty( $escaped_value ) && is_array( $escaped_value ) ) {
        if ( in_array( $value, $escaped_value ) ) {
          $selected = 'selected';
        }
      }
      echo '<option value="' . $value . '" ' . $selected . '>' . $title . '</option>	';
    endforeach;

    foreach ( $all_pages as $value => $title ):
      $selected = '';
      if ( !empty( $escaped_value ) ) {
        if ( in_array( $value, $escaped_value ) ) {
          $selected = 'selected';
        }
      }
      echo '<option value="' . $value . '" ' . $selected . '>' . $title . '</option>	';
    endforeach;
    echo '</select>';
    echo '<p class="cmb_metabox_description">Decide on which pages the pop-up will not be visible. <br> Hold the ctrl key and click to select the pages which should not display the pop-up.</p>';
  }

  /**
   * Return a cookie_select field for CMB
   *
   * @since     1.0.0
   *
   */
  function chch_pu_render_cookie_select( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
    $cookie_expire = array(
      'refresh' => 'Refresh',
      'session' => 'Session',
      'Day' => 'Day (Available in Pro)',
      'Week' => 'Week (Available in Pro)',
      'Month' => 'Month (Available in Pro)',
      'Year' => 'Year (Available in Pro)',
      );
    printf( "<select class=\"cmb_select\" name=\"%s\" id=\"%s\" >", $field->args( '_name' ), $field->args( '_name' ) );
    foreach ( $cookie_expire as $value => $title ):
      $selected = '';
      $disable = '';

      if ( !empty( $escaped_value ) ) {
        if ( $value == $escaped_value ) {
          $selected = 'selected';
        }
      }

      if ( $value != 'refresh' && $value != 'session' ) {
        $disable = 'disabled';
      }

      echo '<option value="' . $value . '" ' . $selected . ' ' . $disable . '>' . $title . '</option>';
    endforeach;

    echo '</select> <a href="http://ch-ch.org/pupro" target="_blank">Get Pro</a>';
  }

  /**
   * CcPopUpAdmin::chch_pu_save_data()
   *
   * @param mixed $post_id
   * @param mixed $post
   * @param mixed $update
   */
  function chch_pu_save_data( $post_id, $post, $update ) {

    if ( !isset( $_POST['chch-pu-newsletter-nonce'] ) || !wp_verify_nonce( $_POST['chch-pu-newsletter-nonce'], 'chch-pu-newsletter-nonce' ) ) {
      return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }

    $screen = get_current_screen();
    if ( 'post' == $screen->base && $post->post_type == 'chch-pop-up' ) {
      update_post_meta( $post_id, '_chch_pop_up_newsletter', sanitize_text_field( $_REQUEST['_chch_pu_newsletter'] ) );

      $email_data = array();
      $email_data['email'] = $_REQUEST['_chch_pu_email'];
      $email_data['email_message'] = $_REQUEST['_chch_pu_email_message'];

      if ( isset( $_POST['email-fields'] ) ) {
        $email_data['fields'] = $_POST['email-fields'];
      }
      update_post_meta( $post_id, '_Email_data', $email_data );

    }
  }

  /**
   * Get all pages for CMB select pages field
   *
   * @since  0.1.0
   */
  private function get_all_pages() {

    $args = array( 'public' => true, '_builtin' => true );

    $post_types = get_post_types( $args );

    $args = array(
      'post_type' => $post_types,
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC' );

    $post_list = get_posts( $args );

    $all_posts = array();

    if ( $post_list ):
      foreach ( $post_list as $post ):

        $all_posts[$post->ID] = get_the_title( $post->ID );
      endforeach;
    endif;

    return $all_posts;
  }

  /**
   * Include google fonts
   *
   * @since  0.1.0
   */
  public function chch_pu_admin_head_scripts() {
    $screen = get_current_screen();
    if ( 'post' == $screen->base && 'chch-pop-up' === $screen->post_type ) {

      $js = "<link href='//fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Lora:400,700|Open+Sans:400,300,700|Oswald:700,300|Roboto:400,700,300|Signika:400,700,300' rel='stylesheet' type='text/css'>";
      echo $js;
    }
  }

  /**
   * Register and enqueue admin-specific style sheet.
   *
   */
  public function chch_pu_enqueue_admin_scripts() {

    $screen = get_current_screen();
    if ( 'post' == $screen->base && 'chch-pop-up' === $screen->post_type ) {
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script( 'jquery-ui-core' );
      wp_enqueue_script( 'jquery-ui-slider' );

      wp_enqueue_media();

      wp_enqueue_style( $this->plugin_slug . '-admin-styles', plugins_url( 'assets/css/admin.css', __FILE__ ), array(), CcPopUp::VERSION );
      wp_enqueue_script( $this->plugin_slug . '-admin-js', plugins_url( 'assets/js/chch-admin.js', __FILE__ ), array( 'jquery' ), CcPopUp::VERSION );

      if ( file_exists( CC_PU_PLUGIN_DIR . 'public/templates/css/defaults.css' ) ) {
        wp_enqueue_style( $this->plugin_slug . '_template_defaults', CC_PU_PLUGIN_URL . 'public/templates/css/defaults.css', null, CcPopUp::VERSION, 'all' );
      }

      if ( file_exists( CC_PU_PLUGIN_DIR . 'public/templates/css/fonts.css' ) ) {
        wp_enqueue_style( $this->plugin_slug . '_template_fonts', CC_PU_PLUGIN_URL . 'public/templates/css/fonts.css', null, CcPopUp::VERSION, 'all' );
      }
    }

  }

}
