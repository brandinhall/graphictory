<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $my_meta_box = array(
    'id'          => 'demo_meta_box',
    'title'       => __( 'Demo Meta Box', 'squarecode' ),
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Conditions', 'squarecode' ),
        'id'          => 'demo_conditions',
        'type'        => 'tab'
      ),
      array(
        'label'       => __( 'Show Gallery', 'squarecode' ),
        'id'          => 'demo_show_gallery',
        'type'        => 'on-off',
        'desc'        => sprintf( __( 'Shows the Gallery when set to %s.', 'squarecode' ), '<code>on</code>' ),
        'std'         => 'off'
      ),
      array(
        'label'       => '',
        'id'          => 'demo_textblock',
        'type'        => 'textblock',
        'desc'        => __( 'Congratulations, you created a gallery!', 'squarecode' ),
        'operator'    => 'and',
        'condition'   => 'demo_show_gallery:is(on),demo_gallery:not()'
      ),
      array(
        'label'       => __( 'Gallery', 'squarecode' ),
        'id'          => 'demo_gallery',
        'type'        => 'gallery',
        'desc'        => sprintf( __( 'This is a Gallery option type. It displays when %s.', 'squarecode' ), '<code>demo_show_gallery:is(on)</code>' ),
        'condition'   => 'demo_show_gallery:is(on)'
      ),
      array(
        'label'       => __( 'More Options', 'squarecode' ),
        'id'          => 'demo_more_options',
        'type'        => 'tab'
      ),
      array(
        'label'       => __( 'Text', 'squarecode' ),
        'id'          => 'demo_text',
        'type'        => 'text',
        'desc'        => __( 'This is a demo Text field.', 'squarecode' )
      ),
      array(
        'label'       => __( 'Textarea', 'squarecode' ),
        'id'          => 'demo_textarea',
        'type'        => 'textarea',
        'desc'        => __( 'This is a demo Textarea field.', 'squarecode' )
      )
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box );

}