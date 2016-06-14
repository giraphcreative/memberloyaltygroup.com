<?php


// init cmb2
require_once( 'cmb2/init.php' );



// add metabox(es)
function page_metaboxes( $meta_boxes ) {



    // showcase metabox
    $title_metabox = new_cmb2_box( array(
        'id' => 'title_metabox',
        'title' => 'Large Title',
        'object_types' => array( 'page', 'product' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $title_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'large-title',
        'type' => 'text',
    ) );

    $title_metabox->add_field( array(
        'name' => 'Subtitle',
        'id'   => CMB_PREFIX . 'large-title-subtitle',
        'type' => 'textarea',
    ) );



    // showcase metabox
    $showcase_metabox = new_cmb2_box( array(
        'id' => 'showcase_metabox',
        'title' => 'Showcase',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( '', 'page-front' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $showcase_metabox_group = $showcase_metabox->add_field( array(
        'id' => CMB_PREFIX . 'showcase',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Slide', 'cmb2'),
            'remove_button' => __('Remove Slide', 'cmb2'),
            'group_title'   => __( 'Slide {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    /*
    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Subtitle',
        'id'   => 'subtitle',
        'type' => 'text',
    ) );
    */
    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 100 )
    ) );



    // showcase metabox
    $bubble_metabox = new_cmb2_box( array(
        'id' => 'bubble_metabox',
        'title' => 'Info Bubbles',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( '' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $bubble_metabox_group = $bubble_metabox->add_field( array(
        'id' => CMB_PREFIX . 'bubble',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Bubble', 'cmb2'),
            'remove_button' => __('Remove Bubble', 'cmb2'),
            'group_title'   => __( 'Bubble {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $bubble_metabox->add_group_field( $bubble_metabox_group, array(
        'name' => 'Image',
        'description' => 'Upload a square image and it will show up as a circle on the front end.',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 100 )
    ) );

    $bubble_metabox->add_group_field( $bubble_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $bubble_metabox->add_group_field( $bubble_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
    ) );

    $bubble_metabox->add_group_field( $bubble_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
    ) );



    // showcase metabox
    $left_metabox = new_cmb2_box( array(
        'id' => 'left_metabox',
        'title' => 'Left Column',
        'object_types' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
    ));

    $left_metabox->add_field( array(
        'name' => 'Left Column Content',
        'description' => 'Enter text or ads for the left column.',
        'id'   => CMB_PREFIX . 'left_content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );


}
add_filter( 'cmb2_init', 'page_metaboxes' );



// get CMB value
function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


// get CMB value
function has_cmb_value( $field ) {
    $cval = get_cmb_value( $field );
    return ( !empty( $cval ) ? true : false );
}


// get CMB value
function show_cmb_value( $field ) {
    print get_cmb_value( $field );
}


// get CMB value
function show_cmb_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}


function cmb2_metabox_show_on_template( $display, $meta_box ) {
    if ( isset( $meta_box['show_on']['key'] ) && isset( $meta_box['show_on']['value'] ) ) :
        if( 'template' !== $meta_box['show_on']['key'] )
            return $display;

        // Get the current ID
        if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
        elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
        if( !isset( $post_id ) ) return false;

        $template_name = get_page_template_slug( $post_id );
        if ( !empty( $template_name ) ) $template_name = substr($template_name, 0, -4);

        // If value isn't an array, turn it into one
        $meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];

        // See if there's a match
        return in_array( $template_name, $meta_box['show_on']['value'] );
    else:
        return $display;
    endif;
}
add_filter( 'cmb2_show_on', 'cmb2_metabox_show_on_template', 10, 2 );


// allow code in text fields by switching double squigly brackets
function cmb2_sanitize_text_callback( $override_value, $value ) {
    //convert square brackets to angle brackets
    $value = str_replace('{{', '<', $value);
    $value = str_replace('}}', '>', $value);
    return $value;
}
add_filter( 'cmb2_sanitize_text', 'cmb2_sanitize_text_callback', 10, 2 );



?>