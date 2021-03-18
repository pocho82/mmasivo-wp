<?php

class Project_Model_Testimonials{

    private $post_type_name;
    private $post_type_singular;
    private $post_type_plural;
    private $template_parser;
    private $menu_icon;

    function __construct( $template_parser ) {
        $this->template_parser = $template_parser;
        $this->post_type_name = 'mmasivo-testimonials';
        $this->post_type_singular = __('Testimonial', 'mmasivo');
        $this->post_type_plural = __('Testimonials', 'mmasivo');
        $this->menu_icon = 'dashicons-editor-quote';

        add_action( 'init', array( $this, 'create_post_type' ) );
        add_action( 'cmb2_admin_init', array( $this, 'add_meta_boxes' ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'load_frontend_scripts' )  );
        add_action( 'wp_enqueue_scripts', array( $this, 'load_frontend_styles' )  );

        add_action( 'admin_print_styles-post.php', array( $this, 'load_admin_styles' ), 1000 );
        add_action( 'admin_print_styles-post-new.php', array( $this, 'load_admin_styles' ), 1000 );

        add_action( 'admin_print_scripts-post.php', array( $this, 'load_admin_scripts' ), 1000 );
        add_action( 'admin_print_scripts-post-new.php', array( $this, 'load_admin_scripts' ), 1000 );
    }

    function create_post_type(){

        $labels = array(
            'name' => sprintf( _x( '%s', 'post type general name', 'mmasivo' ), $this->post_type_plural ),
            'singular_name' => sprintf( _x( '%s', 'post type singular name', 'mmasivo' ), $this->post_type_singular ),
            'add_new' => _x( 'Agregar Nuevo', $this->post_type_singular, 'mmasivo' ),
            'add_new_item' => sprintf( __( 'Nuevo %s', 'mmasivo' ), $this->post_type_singular ),
            'edit_item' => sprintf( __( 'Editar %s', 'mmasivo' ), $this->post_type_singular ),
            'new_item' => sprintf( __( 'Agregar %s', 'mmasivo' ), $this->post_type_singular ),
            'all_items' => sprintf( __( '%s', 'mmasivo' ), $this->post_type_plural ),
            'view_item' => sprintf( __( 'Ver %s', 'mmasivo' ), $this->post_type_singular ),
            'search_items' => sprintf( __( 'Buscar %a', 'mmasivo' ), $this->post_type_plural ),
            'not_found' => sprintf( __( 'No %s Encontrados', 'mmasivo' ), $this->post_type_plural ),
            'not_found_in_trash' => sprintf( __( 'No %s Encontrados en la Papelera', 'mmasivo' ), $this->post_type_plural ),
            'parent_item_colon' => '',
            'menu_name' => $this->post_type_plural,
        );

        $args = array(
            'labels' => $labels,
            'description'         => __( 'Testimonials by your clients', 'mmasivo'),
            'supports'            => array( 'title', 'editor', 'thumbnail' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 4,
            'menu_icon'           =>  $this->menu_icon,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
        );

        register_post_type( $this->post_type_name, $args );
    }

    function metabox_projects(){
        $prefix = 'testimonials_'; 
        $cmb = new_cmb2_box( array(
            'id'           => $prefix . 'settings',
            'title'        => __( 'Settings', 'mmasivo' ),
            'object_types' => array( $this->post_type_name, ), // Post type
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true, // Show field names on the left
        ) );
        // $cmb->add_field( array(
        //     'name'    => __( 'Client', 'mmasivo' ),
        //     'id'      => $prefix . 'client',
        //     'type'    => 'select',
        //     'options' => $this->ms_get_posttype_options('mmasivo-clients')
        // ) );
        $cmb->add_field( array(
            'name'    => __( 'Client', 'mmasivo' ),
            'id'      => $prefix . 'client',
            'type'    => 'text',
            // 'options' => $this->ms_get_posttype_options('mmasivo-clients')
        ) );
        $cmb->add_field( array(
            'name'    => __( 'From', 'mmasivo' ),
            'id'      => $prefix . 'from',
            'type'    => 'text',
        ) );
    }

    function add_meta_boxes(){
        $this->metabox_projects();
    }

    function ms_get_posttype_options($argument) {
        $get_post_args = array(
            'post_type' => $argument,
            'posts_per_page'   => -1,
            'orderby' => 'type',
            'order' => ASC
        );

        $options = array();
        foreach ( get_posts( $get_post_args ) as $post ) {
            $post_type = get_post_type( $post->ID);
            $title = get_the_title( $post->ID );
            $permalink = get_permalink( $post->ID);
    
            $options[] = array(
                'name'  => $title . ' : ' . $post_type,
                'value' => $permalink,
            );
        }
        $empty_option[] = array(
            'name' => 'Please select an option',
            'value' => '',
        );
        $options = array_merge($empty_option, $options);
       
        return $options;
    }

    function load_admin_styles(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }
    }

    function load_frontend_styles(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }
    }

    function load_admin_scripts(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }
    }

    function load_frontend_scripts(){

        global $post_type;

        if($this->post_type_name != $post_type){
            return;
        }
    }
}