<?php
/**
 * CMB Theme Options
 * @version 0.1.0
 */
class theme_base_admin {

    /**
     * Option key, and option page slug
     * @var string
     */
    private $key = 'theme_base_options';

    /**
     * Array of metaboxes/fields
     * @var array
     */
    protected $option_metabox = array();

    /**
     * Options Page title
     * @var string
     */
    protected $title = '';

    /**
     * Options Page hook
     * @var string
     */
    protected $options_page = '';

    /**
     * Constructor
     * @since 0.1.0
     */
    public function __construct() {
        // Set our title
        $this->title = __( 'Theme Options' );

        $prefix = 'theme_';

        // Set our CMB fields
        $this->fields = array(
            array(
                'name' => __( 'Font color' ),
                'desc' => __( 'Font color (general text, parragrafs, list)' ),
                'id'   => $prefix.'general_color',
                'type' => 'colorpicker',
                'default' => '#ccc'
            ),
           array(
                'name' => __( 'Link color' ),
                'desc' => __( 'Link color (links, headlines, icons)' ),
                'id'   => $prefix.'link_color',
                'type' => 'colorpicker',
                'default' => '#0783B9'
            ),


        );
    }

    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    }

    /**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( $this->key, $this->key );
    }

    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
        $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
    }

    /**
     * Admin page markup. Mostly handled by CMB
     * @since  0.1.0
     */
    public function admin_page_display() {
        ?>
        <div class="wrap cmb_options_page <?php echo $this->key; ?>">
            <h2 class="headline"><?php echo esc_html( get_admin_page_title() ); ?></h2>
            <?php cmb_metabox_form( $this->option_metabox(), $this->key ); ?>
        </div>
        <?php
    }

    /**
     * Defines the theme option metabox and field configuration
     * @since  0.1.0
     * @return array
     */
    public function option_metabox() {
        return array(
            'id'         => 'option_metabox',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( $this->key, ), ),
            'show_names' => true,
            'fields'     => $this->fields,
        );
    }

    /**
     * Public getter method for retrieving protected/private variables
     * @since  0.1.0
     * @param  string  $field Field to retrieve
     * @return mixed          Field value or exception is thrown
     */
    public function __get( $field ) {

        // Allowed fields to retrieve
        if ( in_array( $field, array( 'key', 'fields', 'title', 'options_page' ), true ) ) {
            return $this->{$field};
        }
        if ( 'option_metabox' === $field ) {
            return $this->option_metabox();
        }

        throw new Exception( 'Invalid property: ' . $field );
    }

}

// Get it started
$admin = new theme_base_admin();
$admin->hooks();

/**
 * Wrapper function around cmb_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function theme_base_get_option( $key = '' ) {
    global $myprefix_Admin;
    return cmb_get_option( $myprefix_Admin->key, $key );
}