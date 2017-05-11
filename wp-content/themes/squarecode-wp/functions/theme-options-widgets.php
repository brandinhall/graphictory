<?php
function cr3ativ_squarecode_theme_slug_widgets_init() {
register_sidebar(array(
	'name' => __( 'Home Top', 'squarecode' ),
	'id' => 'home',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => __( 'Blog', 'squarecode' ),
	'id' => 'blog',
    'before_widget' => '<div class="widget-area">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => __( 'Page', 'squarecode' ),
	'id' => 'page',
    'before_widget' => '<div class="widget-area">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => __( 'EDD Single Page Sidebar', 'squarecode' ),
	'id' => 'cr3ativ-edd',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => __( 'Footer', 'squarecode' ),
	'id' => 'footer',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => __( 'Error Page', 'squarecode' ),
	'id' => 'error_page',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
}
add_action( 'widgets_init', 'cr3ativ_squarecode_theme_slug_widgets_init' );
?>