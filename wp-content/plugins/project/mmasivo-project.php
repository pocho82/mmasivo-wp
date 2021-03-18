<?php
/*
Plugin Name: Agathos Technology SAS WP Project
Plugin URI: http://mmasivo.technology
Description: Main Plugin
Author: Agathos Technology SAS
Version: 1.0
Author URI: http://mmasivo.technology
Text Domain: mmasivo.technology
Domain Path: /languages
*/

spl_autoload_register('project_autoloader');

function project_autoloader( $class_name ) {

    $class_components = explode( "_", $class_name );

    if ( isset( $class_components[0] ) && $class_components[0] == "Project" &&
        isset( $class_components[1] )) {

        $class_directory = $class_components[1];

        unset( $class_components[0], $class_components[1] );

        $file_name = implode( "_", $class_components );

        $base_path = plugin_dir_path(__FILE__);

        switch ( $class_directory ) {
            case 'Model':

                $file_path = $base_path . "models/class-project-model-".lcfirst( $file_name ) . '.php';
                if ( file_exists( $file_path ) && is_readable( $file_path ) ) {
                    include $file_path;
                }

                break;
        }
    }
}

if ( ! class_exists('Twig_Autoloader') ){
    $base_path_badges = plugin_dir_path(__FILE__);

    require_once $base_path_badges.'Twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
}

class Agathos_Project_Manager{
    public $base_path;

    function __construct(){
        global $project_options;

        if( !$project_options ){
            //return;
        }

        $this->base_path = plugin_dir_path(__FILE__);
        require_once $this->base_path . 'class-twig-initializer.php';
        $this->template_parser = Twig_Initializer_Agathos_Project::initialize_templates();
        $this->model_clients = new Project_Model_Clients( $this->template_parser );
        $this->model_projects = new Project_Model_Projects( $this->template_parser );
        $this->model_members = new Project_Model_Members( $this->template_parser );
        $this->model_services = new Project_Model_Services( $this->template_parser );
        $this->model_testimonials = new Project_Model_Testimonials( $this->template_parser );

        add_action( 'cmb2_admin_init', array( $this, 'add_metaboxes' ) );
        // add_action( 'init', array( $this, 'mmasivo' ) );
    }

    // Function get id page from options project
    function get_page_id_from_project_options( $option = false ){

        global $project_options;

        if( $option === false ){
            return false;
        }

        $pageID = $project_options[$option] ? (int)$project_options[$option]: false;

        $currentLanguagePageID = apply_filters( 'wpml_object_id', $pageID, 'page' );
        return $currentLanguagePageID;

    }

    function ms_get_posttype_options($argument) {
        $get_post_args = array(
            'post_type' => $argument,
            'posts_per_page'   => -1,
            'orderby' => 'type',
            'order' => 'ASC'
        );

        $options = [];
        $options['null'] = 'Please select an option';

        foreach ( get_posts( $get_post_args ) as $post ) {
            $post_type = get_post_type( $post->ID);
            $title = get_the_title( $post->ID );
            $permalink = get_permalink( $post->ID);

            $options[$post->ID] = $title;
        }

        return $options;
    }

    function get_homepage_id(){
        return $this->get_page_id_from_project_options('general_settings_homepage');
    }

    function get_about_us_id(){
      return $this->get_page_id_from_project_options('general_settings_about-us');
    }

    function get_services_id(){
      return $this->get_page_id_from_project_options('general_settings_services');
    }

    public function custom_metaboxes(){
        global $project_options;

        $homePage = $this-> get_homepage_id();
        if ( $homePage ) {
            $prefix = 'homepage';
            $cmb = new_cmb2_box(array(
                'id'        => $prefix,
                'title'     => 'Configuraciones del Homepage',
                'object_types' => array( 'page' ),
                'show_on'      => array( 'key' => 'id', 'value' => array( $homePage ) ),
                'context' => 'normal',
                'priority' => 'high',
                'show_names' => true
            ) );

            // Header
            $cmb->add_field( array(
                'name' => __( 'HEADER', 'mmasivo' ),
                'type' => 'title',
                'id'   => $prefix . '_header_title-section',
            ) );
            $group_slides_field_id = $cmb->add_field( array(
                'id'          => $prefix . '_slides',
                'type'        => 'group',
                'options'     => array(
                    'group_title'   => __( 'Slide {#}', 'mmasivo' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Slide', 'mmasivo' ),
                    'remove_button' => __( 'Remove Slide', 'mmasivo' ),
                    'sortable'      => false, // beta
                    'closed'     => true, // true to have the groups closed by default
                ),
            ) );
            $cmb->add_group_field( $group_slides_field_id, array(
                'name'    => __( 'Title First Line', 'mmasivo' ),
                'id'      => $prefix . '_slides_title_first_line',
                'type'    => 'text',
            ) );
            $cmb->add_group_field( $group_slides_field_id, array(
              'name'    => __( 'Title Second Line', 'mmasivo' ),
              'id'      => $prefix . '_slides_title_second_line',
              'type'    => 'text',
            ) );
            $cmb->add_group_field( $group_slides_field_id, array(
              'name'    => __( 'Title Third Line', 'mmasivo' ),
              'id'      => $prefix . '_slides_title_third_line',
              'type'    => 'text',
            ) );
            $cmb->add_group_field( $group_slides_field_id, array(
              'name'    => __( 'Subtitle', 'mmasivo' ),
              'id'      => $prefix . '_slides_subtitle',
              'type'    => 'text',
            ) );
            $cmb->add_group_field( $group_slides_field_id, array(
                'name'    => __( 'Thumbnail', 'mmasivo' ),
                'id'      => $prefix . '_slides_thumbnail',
                'type'    => 'file',
            ) );

            // About Us
            $cmb->add_field( array(
                'name' => __( 'ABOUT US', 'mmasivo' ),
                'type' => 'title',
                'id'   => $prefix . '_about-us_title-section',
            ) );
            $cmb->add_field( array(
                'name'    => __( 'Title', 'mmasivo' ),
                'id'      => $prefix . '_about-us_title',
                'type'    => 'text',
            ) );
            $cmb->add_field( array(
                'name'    => __( 'Content', 'mmasivo' ),
                'id'      => $prefix . '_about-us_content',
                'type'    => 'wysiwyg',
            ) );
            $cmb->add_field( array(
                'name'    => __( 'Thumbnail', 'mmasivo' ),
                'id'      => $prefix . '_about-us_thumbnail',
                'type'    => 'file',
            ) );
            $cmb->add_field( array(
                'name'    => __( 'Page', 'mmasivo' ),
                'id'      => $prefix . '_about-us_page',
                'type'    => 'select',
                'options' => $this->ms_get_posttype_options('page')
            ) );

            // What we do
            $cmb->add_field( array(
                'name' => __( 'WHAT WE DO', 'mmasivo' ),
                'type' => 'title',
                'id'   => $prefix . '_what-we-do_title-section',
            ) );
            $cmb->add_field( array(
                'name'    => __( 'Title', 'mmasivo' ),
                'id'      => $prefix . '_what-we-do_title',
                'type'    => 'text',
            ) );
            $cmb->add_field( array(
                'name'    => __( 'Content', 'mmasivo' ),
                'id'      => $prefix . '_what-we-do_content',
                'type'    => 'textarea_small',
            ) );
            $cmb->add_field( array(
              'name'    => __( 'Services Page', 'mmasivo' ),
              'id'      => $prefix . '_services_page',
              'type'    => 'select',
              'options' => $this->ms_get_posttype_options('page')
          ) );

            // Projects
            $cmb->add_field( array(
                'name' => __( 'PROJECTS', 'mmasivo' ),
                'type' => 'title',
                'id'   => $prefix . '_projects_title-section',
            ) );
            $group_projects_field_id = $cmb->add_field( array(
                'id'          => $prefix . '_projects',
                'type'        => 'group',
                'options'     => array(
                    'group_title'   => __( 'Project {#}', 'mmasivo' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add project', 'mmasivo' ),
                    'remove_button' => __( 'Remove project', 'mmasivo' ),
                    'sortable'      => false, // beta
                    'closed'     => true, // true to have the groups closed by default
                ),
            ) );
            $cmb->add_group_field( $group_projects_field_id, array(
                'name'    => __( 'Project', 'mmasivo' ),
                'id'      => $prefix . '_projects' . '_id',
                'type'    => 'select',
                'options' => $this->ms_get_posttype_options('mmasivo-projects')
            ) );
            $cmb->add_group_field( $group_projects_field_id, array(
                'name' => 'Is full?',
                'id'   => $prefix . '_projects' . '_is_full',
                'type' => 'checkbox',
            ) );

            $cmb->add_field( array(
                'name' => __( 'FLOW CHART', 'mmasivo' ),
                'type' => 'title',
                'id'   => $prefix . '_flow-chart_title-section',
            ) );
            $group_flow_field_id = $cmb->add_field( array(
                'id'          => $prefix . '_group_flow',
                'type'        => 'group',
                'options'     => array(
                    'group_title'   => __( 'Flow item {#}', 'mmasivo' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add item', 'mmasivo' ),
                    'remove_button' => __( 'Remove item', 'mmasivo' ),
                    'sortable'      => false, // beta
                    'closed'     => true, // true to have the groups closed by default
                ),
            ) );
            $cmb->add_group_field( $group_flow_field_id, array(
                'name' => 'Icon',
                'id'   => $prefix . '_group_flow' . '_icon',
                'type' => 'file',
            ) );
            $cmb->add_group_field( $group_flow_field_id, array(
                'name' => 'Title',
                'id'   => $prefix . '_group_flow' . '_title',
                'type' => 'text',
                // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
            ) );
            $cmb->add_group_field( $group_flow_field_id, array(
                'name' => 'Description',
                'id'   => $prefix . '_group_flow' . '_description',
                'type' => 'wysiwyg',
            ) );
        }

        $aboutUsPage = $this->get_about_us_id();
        if ( $aboutUsPage ) {
          $prefix = 'about-us';
          $cmb = new_cmb2_box(array(
            'id'        => $prefix,
            'title'     => 'About Us Configuration',
            'object_types' => array( 'page' ),
            'show_on'      => array( 'key' => 'id', 'value' => array( $aboutUsPage ) ),
            'context' => 'normal',
            'priority' => 'high',
            'show_names' => true
          ) );

          $cmb->add_field( array(
            'name' => __( 'CONTENT', 'mmasivo' ),
            'type' => 'title',
            'id'   => $prefix . '_content_title-section',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Subtitle', 'mmasivo' ),
            'id'      => $prefix . '_content_subtitle',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Title', 'mmasivo' ),
            'id'      => $prefix . '_content_title',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name' => __( 'Image content', 'mmasivo' ),
            'id'   => $prefix . '_content_image',
            'type' => 'file',
          ) );

          $cmb->add_field( array(
            'name' => __( 'ITEMS', 'mmasivo' ),
            'type' => 'title',
            'id'   => $prefix . '_items_title-section',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Subtitle', 'mmasivo' ),
            'id'      => $prefix . '_items_subtitle',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Title', 'mmasivo' ),
            'id'      => $prefix . '_items_title',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name' => __( 'Central image', 'mmasivo' ),
            'id'   => $prefix . '_items_image',
            'type' => 'file',
          ) );

          $group_items_field_id = $cmb->add_field( array(
            'id'          => $prefix . '_group_items',
            'type'        => 'group',
            'options'     => array(
              'group_title'   => __( 'Feature item {#}', 'mmasivo' ), // since version 1.1.4, {#} gets replaced by row number
              'add_button'    => __( 'Add item', 'mmasivo' ),
              'remove_button' => __( 'Remove item', 'mmasivo' ),
              'sortable'      => false, // beta
              'closed'     => true, // true to have the groups closed by default
            ),
          ) );
          $cmb->add_group_field( $group_items_field_id, array(
            'name' => __( 'Icon', 'mmasivo' ),
            'id'   => $prefix . '_group_items_icon',
            'type' => 'file',
          ) );
          $cmb->add_group_field( $group_items_field_id, array(
            'name' => __( 'Title', 'mmasivo' ),
            'id'   => $prefix . '_group_items_title',
            'type' => 'text',
          ) );
          $cmb->add_group_field( $group_items_field_id, array(
            'name' => __( 'Content', 'mmasivo' ),
            'id'   => $prefix . '_group_items_content',
            'type' => 'text_medium',
          ) );

          $cmb->add_field( array(
            'name' => __( 'OUR TEAM', 'mmasivo' ),
            'type' => 'title',
            'id'   => $prefix . '_our-team_title-section',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Subtitle', 'mmasivo' ),
            'id'      => $prefix . '_our-team_subtitle',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Title', 'mmasivo' ),
            'id'      => $prefix . '_our-team_title',
            'type'    => 'text',
          ) );

          $cmb->add_field( array(
            'name' => __( 'TESTIMONIALS', 'mmasivo' ),
            'type' => 'title',
            'id'   => $prefix . '_testimonials_title-section',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Subtitle', 'mmasivo' ),
            'id'      => $prefix . '_testimonials_subtitle',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Title', 'mmasivo' ),
            'id'      => $prefix . '_testimonials_title',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Content', 'mmasivo' ),
            'id'      => $prefix . '_testimonials_content',
            'type'    => 'text',
          ) );
        }

        $servicesPage = $this->get_services_id();
        if ( $servicesPage ) {
          $prefix = 'services';
          $cmb = new_cmb2_box(array(
            'id'        => $prefix,
            'title'     => 'Services Configuration',
            'object_types' => array( 'page' ),
            'show_on'      => array( 'key' => 'id', 'value' => array( $servicesPage ) ),
            'context' => 'normal',
            'priority' => 'high',
            'show_names' => true
          ) );

          $cmb->add_field( array(
            'name' => __( 'CONTENT', 'mmasivo' ),
            'type' => 'title',
            'id'   => $prefix . '_content_title-section',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Subtitle', 'mmasivo' ),
            'id'      => $prefix . '_content_subtitle',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name'    => __( 'Title', 'mmasivo' ),
            'id'      => $prefix . '_content_title',
            'type'    => 'text',
          ) );
          $cmb->add_field( array(
            'name' => __( 'Image content', 'mmasivo' ),
            'id'   => $prefix . '_content_image',
            'type' => 'file',
          ) );
        }
    }

    public function add_metaboxes(){
        $this->custom_metaboxes();
    }

}
global $mmasivoProject;

$mmasivoProject = new Agathos_Project_Manager();

do_action('mmasivo_project_initialized');
