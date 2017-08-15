<?php

// Include parent stylesheet
function theme_enqueue_styles() {
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Selective category display
 */
Class My_Categories_Widget extends WP_Widget_Categories {

  /**
  * Handle category display in widget
  *
  * @param array $args
  * @param array $instance
  */
  function widget($args, $instance) {
    $categories = get_categories(array("include" => "35, 9", "hide_empty" => 0));
    // if there are any categories (!)
    if ($categories) {
      // Loop through them and display
      foreach ($categories as $category) {
        echo '<div class = "maincats"><a href = ' . home_url() . '/category/' . $category->category_nicename . '>'
        . $category->name . '</a></div>';
      }
    }
  }
}

/**
 * Replace default widget behaviour with custom one
 */
function my_categories_widget_register() {
    unregister_widget('WP_Widget_Categories');
    register_widget('My_Categories_Widget');
}

add_action('widgets_init', 'my_categories_widget_register');

/**
 * Copyright notice
 */
function ra_copyright() {
  global $wpdb;
  $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
  $output = '';
  if ($copyright_dates) {
      $copyright = "&copy; " . $copyright_dates[0]->firstdate;
      if ($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
          $copyright .= '-' . $copyright_dates[0]->lastdate;
      }
      $output = $copyright;
  }
  return $output;
}