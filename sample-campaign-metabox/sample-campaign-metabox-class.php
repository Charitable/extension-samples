<?php
/**
 * This class demonstrates how to add a custom metabox to campaigns. 
 *
 * Adding a 
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Charitable_Sample_Campaign_Metabox' ) ) : 

/**
 * Charitable_Sample_Campaign_Metabox
 *
 * @since       1.0.0
 */
class Charitable_Sample_Campaign_Metabox {

    /**
     * Set up the class. 
     * 
     * This sets up the three filters that are required to add the meta boxes.  
     *
     * @access  public
     * @since   1.0.0
     */
    public function __construct() {
        add_filter( 'charitable_campaign_meta_boxes', array( $this, 'register_sample_key_meta_box' ) );        
        add_filter( 'charitable_admin_view_path', array( $this, 'admin_view_path' ), 10, 3 );
        add_filter( 'charitable_campaign_meta_keys', array( $this, 'save_sample_key' ) );
    }

    /**
     * Register campaign updates section in campaign metabox.
     *
     * Options for the meta box: 
     *
     * `id` - The unique ID given to your metabox. 
     * `title` - The title displayed as a heading for your metabox. 
     * `context` - Where to display the metabox. Should be set to either `campaign-top` or `campaign-advanced`.
     * `priority` - The priority of the metabox. Should be set to `high`, `core`, `default` or `low`. 
     * `view` - The view file that displays the metabox contents. This is where your HTML is placed.
     * `view_source` - The source of the view. This is used to tell Charitable where to find the view. 
     *
     * @param   array[] $meta_boxes
     * @return  array[]
     * @access  public
     * @since   1.0.0
     */
    public function register_sample_key_meta_box( $meta_boxes ) {
        $meta_boxes[] = array(
            'id'                => 'sample-metabox', 
            'title'             => __( 'Sample Metabox', 'charitable-sample' ), 
            'context'           => 'campaign-advanced', 
            'priority'          => 'high', 
            'view'              => 'metaboxes/sample-view', 
            'view_source'       => 'charitable-sample'
        );

        return $meta_boxes;
    }

    /**
     * Set the admin view path to our views folder for any of our views.  
     *
     * @param   string  $path
     * @param   string  $view
     * @param   array   $view_args
     * @return  string
     * @access  public
     * @since   1.0.0
     */
    public function admin_view_path( $path, $view, $view_args ) {
        /**
         * This will checks if the `view_source` parameter is set for
         * the metabox AND if it equals `charitable-sample`. If so, 
         * the $path variable is set to the location of our custom 
         * view file.
         */
        if ( isset( $view_args[ 'view_source' ] ) && 'charitable-sample' == $view_args[ 'view_source' ] ) {

            $path = 'path/to/view/' . $view . '.php';

        }

        return $path;
    }

    /**
     * Add the key of the metabox field to the list of keys to be saved when a campaign is saved.
     *
     * @param   string[] $meta_keys
     * @return  string[]
     * @access  public
     * @since   1.0.0
     */
    public function save_sample_key( $meta_keys ) {
        $meta_keys[] = '_sample_key';
        return $meta_keys;
    }
}

endif; // End class_exists check