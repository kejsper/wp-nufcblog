<?php
// SECURITY CHECK
if ( ! defined('ABSPATH')) {
  exit;
}

// CREATING LINKS POST TYPE
function nufcblog_links_post_type() {

  $singular = 'Link';
  $plural = 'Links';

  $labels = array(
    'name'                => $plural,
    'singular_name'       => $singular,
    'add_new'             => 'Add '.$singular,
    'add_new_item'        => 'Add '.$singular,
    'edit_item'           => 'Edit '.$singular,
    'new_item'            => 'New '.$singular,
    'view_item'           => 'View '.$singular,
    'search_item'         => 'Search '.$plural,
    'not_found'           => 'No '.$plural.' found',
    'not_found_in_trash'  => 'No '.$plural.' found in trash',
    'parent_item_colon'   => 'Parent '.$singular,
  );

  $args = array(
    'labels'               => $labels,
    'public'               => true,
    'has_archive'          => false,
    'publicly_queryable'   => true,
    'query_var'            => true,
    'rewrite'              => true,
    'capability_type'      => 'post',
    'hierarchical'         => false,
    'supports'             => array(
                                'title',
                              ),
    'menu_icon'            => 'dashicons-admin-links',
    'menu_position'        => 6,
    'show_in_admin_bar'    => true,
    'show_in_menu'         => true,
    'show_in_nav_menus'    => true,
    'show_ui'              => true,
    'can_export'           => true,
    'delete_with_user'     => false,
    'exclude_from_search'  => true,
    );

  register_post_type('links', $args);
}
// INITIALIZATION OF LINKS POST TYPE
add_action('init', 'nufcblog_links_post_type');


// HREF META BOX CREATION
function nufcblg_href_add_meta_box() {

  add_meta_box('href', 'Website Address', 'nufcblog_href_callback', 'links', 'normal', 'high');

}
add_action('add_meta_boxes', 'nufcblg_href_add_meta_box');


// CHANGING TITLE PLACEHOLDER FOR LINKS
function nufcblog_links_title($title_placeholder) {
  $screen = get_current_screen();
  if ($screen->post_type == 'links') {
    $title_placeholder = 'Enter name of the website (displayed in links)';
  }
  return $title_placeholder;
}
add_filter('enter_title_here', 'nufcblog_links_title');


// DISPLAYING LINKS IN ADMIN PAGE
function nufcblog_set_links_columns($columns) {
  $newColumns = array();
  $newColumns['title'] = 'Website Name';
  $newColumns['href'] = 'Website Address';
  return $newColumns;
}
function nufcblog_links_custom_column($column, $post_id) {
  switch ( $column ) {
    case 'href':
      $address = get_post_meta($post_id, '_href_value_key', true);
      echo $address;
      break;
  }
}
add_filter('manage_links_posts_columns', 'nufcblog_set_links_columns');
add_action('manage_links_posts_custom_column', 'nufcblog_links_custom_column', 10, 2);


// DISPLAYING LINK (HREF) META BOX
function nufcblog_href_callback($post) {

  wp_nonce_field('nufcblog_save_href_data', 'nufcblog_href_meta_box_nonce');

  $value = get_post_meta($post->ID, '_href_value_key', true);
  // INPUT FOR HREF META BOX
  ?>

    <label for="nufcblog_href_field">Website address: </label>
    <input type="text" id="nufcblog_href_field" name="nufcblog_href_field" value="<?php echo esc_attr($value); ?>" size="30" />

  <?php
}


// SAVE DATA FUNCTION
function nufcblog_save_href_data($post_id) {
  // SECURITY TASKS
  if ( ! isset( $_POST['nufcblog_href_meta_box_nonce'])) {
    return;
  }
  if ( ! wp_verify_nonce($_POST['nufcblog_href_meta_box_nonce'], 'nufcblog_save_href_data')) {
    return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
    return;
  }
  if ( ! isset($_POST['nufcblog_href_field'])) {
    return;
  }
  // SAVING DATA
  $my_data = sanitize_text_field($_POST['nufcblog_href_field']);
  update_post_meta($post_id, '_href_value_key', $my_data);
}
add_action('save_post', 'nufcblog_save_href_data');
