<?php
$theme_css = get_template_directory_uri() . '/assets/bundle.css';
$theme_js  = get_template_directory_uri() . '/assets/bundle.js';

ob_start();
if ( is_active_sidebar('home_dashboard') ) {
  dynamic_sidebar('home_dashboard');
}
$dashboard_widget_content = ob_get_clean();

$renderer = include(get_template_directory() . '/templates_compiled/homepage.php');

echo $renderer(array(
  'theme_css' => $theme_css,
  'theme_js' => $theme_js,
  'widgets_content' => $dashboard_widget_content,
));

?>
