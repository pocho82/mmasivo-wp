<?php

class Project_Model_Members{

    private $template_parser;
    private $post_type_name;
    private $post_type_singular;
    private $post_type_plural;
    private $request_type_taxonomy;
    private $request_type_taxonomy_singular;
    private $request_type_taxonomy_plural;
    private $menu_icon;

    function __construct( $template_parser ) {
        $this->template_parser = $template_parser;

        $this->post_type_name = 'mmasivo-members';
        $this->post_type_singular = __('Member', 'mmasivo');
        $this->post_type_plural = __('Members', 'mmasivo');

        $this->request_type_taxonomy = 'types_members';
        $this->request_type_taxonomy_singular = __('Position','mmasivo');
        $this->request_type_taxonomy_plural = __('Positions','mmasivo');

        $this->menu_icon = 'dashicons-groups';

        add_action( 'init', array( $this, 'create_post_type' ) );
        add_action( 'init', array( $this, 'create_taxonomies' ) );
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
            'description'         => __( 'Members done', 'mmasivo'),
            'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
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

    function types_taxonomy(){

        $labels = array(
            'name'              => $this->request_type_taxonomy_singular,
            'singular_name'     => $this->request_type_taxonomy_singular,
            'search_items'      => sprintf( __( 'Buscar %s', 'mmasivo' ), $this->request_type_taxonomy_plural ),
            'all_items'         => sprintf( __( 'Todos los %s', 'mmasivo' ), $this->request_type_taxonomy_plural ),
            /*'parent_item'       => __( 'Parent Genre', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),*/
            'edit_item'         => sprintf( __( 'Editar %s', 'mmasivo' ), $this->request_type_taxonomy_singular ),
            'update_item'       => sprintf( __( 'Actualizar %s', 'mmasivo' ), $this->request_type_taxonomy_singular ),
            'add_new_item'      => sprintf( __( 'Agregar nuevo %s', 'mmasivo' ), $this->request_type_taxonomy_singular ),
            'new_item_name'     => sprintf( __( 'Nuevo %s', 'mmasivo' ), $this->request_type_taxonomy_singular ),
            'menu_name'         => $this->request_type_taxonomy_plural,
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'query_var'         => true,
            'rewrite'       => array(
                'slug' => $this->request_type_taxonomy_singular
            ),
            'hierarchical'  => true
            // 'rewrite'           => array( 'slug' => $this->request_type_taxonomy_singular ),
        );

        register_taxonomy( $this->request_type_taxonomy, array( $this->post_type_name ), $args);
    }

    function create_taxonomies(){
        $this->types_taxonomy();
    }

    function metabox_members(){
        $prefix = 'members_';
    }

    function add_meta_boxes(){
        $this->metabox_members();
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
