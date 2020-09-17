<?php
function the_theme_file() {
  wp_enqueue_script('main_theme_js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, 1, true);//AFTER SCRIPT NULL IF IT IS NOT DEPENDING OF OTHER SCRIPTS, VERSION,LOAD BEHIND CLOSING BODYTAG.
  wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i')
  wp_enqueue_style('theme_main_styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', '1st_theme_files');//tells to load files js or css
//title
function 1st_title() {
  add_theme_support('title-tag');
}
add_action('after_setup_theme', '1st_title');
?>
