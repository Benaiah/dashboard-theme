<?php

function dashboard_theme_register_widget_areas () {
  $widget_areas = array(
    array(
      'name' => 'Home Page Dashboard Widget Area',
      'id' => 'home_dashboard',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h2>',
      'after_title' => '</h2>'
    ),
  );

  array_map('register_sidebar', $widget_areas);
}
add_action(
  'widgets_init',
  'dashboard_theme_register_widget_areas' );
