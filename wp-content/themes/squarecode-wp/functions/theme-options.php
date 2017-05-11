<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array(
      
      'sidebar'       => ''
    ),
    'sections'        => array( 
        array(
        'id'          => 'general_setup',
        'title'       => __( 'Setup', 'squarecode' )
      ),
        array(
        'id'          => 'color_picker',
        'title'       => __('Color and Image Sets', 'squarecode')
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'vn_toplogo',
        'label'       => __( 'Top Logo', 'squarecode' ),
        'desc'        => __( 'Upload your top logo.', 'squarecode' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_bottomlogo',
        'label'       => __( 'Bottom Logo', 'squarecode' ),
        'desc'        => __( 'Upload your bottom logo.', 'squarecode' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_favicon',
        'label'       => __( 'Favicon', 'squarecode' ),
        'desc'        => __( 'Upload your favicon.  Recommended size is 512px X 512px square image.', 'squarecode' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_readmore_button_text',
        'label'       => __( 'Read More Button Text', 'squarecode' ),
        'desc'        => __( 'Enter the text you wish to appear on all your \'more\' buttons. Standard text used generally is "Read More".', 'squarecode' ),
        'std'         => __( 'Read More', 'squarecode' ),
        'type'        => 'text',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_analytics',
        'label'       => __( 'Tracking Code', 'squarecode' ),
        'desc'        => __( 'Enter the tracking code here that will go in the footer of every page for your analytic reporting.', 'squarecode' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_custom_css',
        'label'       => __( 'Custom CSS', 'squarecode' ),
        'desc'        => __( 'Enter your custom css here that will override the stylesheet.', 'squarecode' ),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_copyright',
        'label'       => __( 'Copyright Information', 'squarecode' ),
        'desc'        => __( 'HTML is allowed here. Enter your copyright information that will appear in the footer of every page. You do not need to enter the copyright symbol - this is done automatically for you.', 'squarecode' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_boxed',
        'label'       => __('Boxed?', 'squarecode'),
        'desc'        => __('Choose yes or no if you would like a boxed layout.', 'squarecode'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => __('Yes', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => __('No', 'squarecode'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'vn_homefeaturedtitle',
        'label'       => __('Homepage Featured Products Title', 'squarecode'),
        'desc'        => __('Enter the text you wish to appear above the loop on the homepage that displays 3 downloads from the EDD plugin that were given the category of Featured. Example: Our Featured Products', 'squarecode'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_homefeaturedtext',
        'label'       => __( 'Homepage Featured Products Text', 'squarecode' ),
        'desc'        => __( 'HTML is allowed here. Enter the text that you wish appear directly under the above title.', 'squarecode' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_homerecenttitle',
        'label'       => __('Homepage Recent Products Title', 'squarecode'),
        'desc'        => __('Enter the text you wish to appear above the loop on the homepage that displays the latest 9 downloads from the EDD plugin. Example: Our Latest Products', 'squarecode'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_homerecenttext',
        'label'       => __( 'Homepage Recent Products Text', 'squarecode' ),
        'desc'        => __( 'HTML is allowed here. Enter the text that you wish appear directly under the above title.', 'squarecode' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_menuchoice',
        'label'       => __('Menu Style', 'squarecode'),
        'desc'        => __('Choose your menu style.  If you choose to have both the pop out and horizontal menu, you will need to make sure that you go to Appearance > Menu and create/assign a menu for each menu location or nothing will show.  The menu name for the horizontal menu MUST BE NAMED <b>\'Horizontal\'</b> in order for the responsive select to work automatically.', 'squarecode'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'general_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'popout',
            'label'       => __('Pop Out Only', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'horizontal',
            'label'       => __('Horizontal Only', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'both',
            'label'       => __('Both Pop Out and Horizontal', 'squarecode'),
            'src'         => ''
          )
        ),
      ),
    array(
        'id'          => 'vn_bodyimg',
        'label'       => __('Body Background Image', 'squarecode'),
        'desc'        => __('Upload the image you have selected for your background image of your body.', 'squarecode'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_bodyrepeat',
        'label'       => __('Body Image Repeat', 'squarecode'),
        'desc'        => __('Choose how to display your body background image. Repeat option will repeat your image both horizontally and vertically.  Repeat-x will ONLY repeat horizontally.  Repeat-y will ONLY repeat vertically. Cover option will make your image fill the full space retaining the aspect ratio.', 'squarecode'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'repeat',
            'label'       => __('repeat', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __('repeat-x', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __('repeat-y', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'cover',
            'label'       => __('cover', 'squarecode'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'vn_bodybackgroundcolor',
        'label'       => __('Body Background Color', 'squarecode'),
        'desc'        => __('Choose the background color you wish for your body. This color will also be used for your horizontal rules', 'squarecode'),
        'std'         => '#f6f6f6',
        'type'        => 'colorpicker',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
    array(
        'id'          => 'vn_footerimg',
        'label'       => __('Footer Background Image', 'squarecode'),
        'desc'        => __('Upload the image you have selected for your background image of your footer.', 'squarecode'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_footerrepeat',
        'label'       => __('Footer Image Repeat', 'squarecode'),
        'desc'        => __('Choose how to display your footer background image. Repeat option will repeat your image both horizontally and vertically.  Repeat-x will ONLY repeat horizontally.  Repeat-y will ONLY repeat vertically. Cover option will make your image fill the full space retaining the aspect ratio.', 'squarecode'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'repeat',
            'label'       => __('repeat', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __('repeat-x', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __('repeat-y', 'squarecode'),
            'src'         => ''
          ),
          array(
            'value'       => 'cover',
            'label'       => __('cover', 'squarecode'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'vn_color1',
        'label'       => __('Color Option 1', 'squarecode'),
        'desc'        => __('This color will be used for the breadcrumb wrapper background-color and links.  It will also be the background color of the footer area if you did not choose the image upload option above.', 'squarecode'),
        'std'         => '#ABC261',
        'type'        => 'colorpicker',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color2',
        'label'       => __('Color Option 2', 'squarecode'),
        'desc'        => __('This color will be used for header wrapper background-color, all headings that are not links, footer wrapper  background-color, input submit background-color, input submit text color, breadcrumb text color, the search input box in the header menu  background-color, all input border colors - including submits, pull down menu side  background-color, header post meta text color and caption  background-color. ', 'squarecode'),
        'std'         => '#363F48',
        'type'        => 'colorpicker',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color3',
        'label'       => __('Color Option 3', 'squarecode'),
        'desc'        => __('This color will be used for the headings in the sidebar, all input borders and colors for contact page and comment forms, placeholder text color, all navigation items - top and bottom and the copyright.', 'squarecode'),
        'std'         => '#AFB2B6',
        'type'        => 'colorpicker',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color4',
        'label'       => __('Color Option 4', 'squarecode'),
        'desc'        => __('This color will be used for the page wrapper  background-color, the footer widget text and links, the footer widget input, breadcrumb links and caption text color.', 'squarecode'),
        'std'         => '#FFFFFF',
        'type'        => 'colorpicker',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color5',
        'label'       => __('Color Option 5', 'squarecode'),
        'desc'        => __('This color will be used for list items and all text.', 'squarecode'),
        'std'         => '#696969',
        'type'        => 'colorpicker',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color7',
        'label'       => __('Color Option 6', 'squarecode'),
        'desc'        => __('This color will be used as the  background-color for the left side of the pull down menu and the homepage top widget section.', 'squarecode'),
        'std'         => '#86B4CC',
        'type'        => 'colorpicker',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color8',
        'label'       => __('Color Option 7', 'squarecode'),
        'desc'        => __('This color will be used as the  background-color for the horizontal menu items on active and hover and the background-color for the select when horizontal menu goes responsive.', 'squarecode'),
        'std'         => '#262d33',
        'type'        => 'colorpicker',
        'section'     => 'color_picker',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ) 
    )
  );
      
   
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}