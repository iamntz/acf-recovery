<?php
if( isset( $_GET['recover-acf-fields'] ) ){
  require_once( plugin_dir_path(__FILE__) . '../acf_export_recover.php' );
  die();
}


function re_register_field_group( $fields ){
  $acf_post = array(
    "post_type"   => "acf",
    "post_title"  => $fields['title'] . apply_filters( 'acf/import/title_suffix', " (recover)" ),
    "menu_order"  => $fields['menu_order'],
    "post_status" => apply_filters( 'acf/import/post_status', "draft" ),
  );
  $post_id = wp_insert_post( $acf_post );

  $i = -1;

  foreach( $fields['fields'] as $key => $field ){
    $i++;
    $field['order_no'] = $i;
    do_action( 'acf/update_field', $field, $post_id );
  }

  $fields['location'] = array_values( $fields['location'] );

  foreach( $fields['location'] as $group_id => $group ){
    if( is_array( $group ) ) {
      $group = array_values( $group );
      foreach( $group as $rule_id => $rule ){
        $rule['order_no'] = $rule_id;
        $rule['group_no'] = $group_id;
        add_post_meta( $post_id, 'rule', $rule );
      }
    }
  }


  update_post_meta( $post_id, 'position', $fields['options']['position'] );
  update_post_meta( $post_id, 'layout', $fields['options']['layout'] );
  update_post_meta( $post_id, 'hide_on_screen', $fields['options']['hide_on_screen'] );

  echo "<li>Added <strong>{$fields['title']}</strong> with the ID of <strong>{$post_id}</strong></li>\n";
} // re_register_field_group

