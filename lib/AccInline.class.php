<?php

class AccInline{


  function __construct(){

    if ( is_admin() ) {
    	add_action( 'init', array( &$this, 'setup_tinymce_plugin' ) );
    }


    add_shortcode( 'acc_inline_title',  array( &$this, 'acc_inline_title_func' ) );
    add_shortcode( 'acc_inline_content',  array( &$this, 'acc_inline_content_func' ) );
    add_shortcode( 'acc_inline',  array( &$this, 'acc_inline_func' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'acc_line_script' ) );

  }

  function acc_inline_title_func( $atts, $content = null  ) {
    return '<h3 class="accinlineTitle"><a href="#">'.$content.'</a></h3>';
  }

  function acc_inline_content_func( $atts, $content = null  ) {
    return '<div class="accinlineContent" style="display:none">'.$content.'</a></div>';
  }

  function acc_inline_func( $atts, $content = null  ) {
    return '<div>'.do_shortcode($content).'</div>';
  }

  function acc_line_script(){
    wp_enqueue_script( 'acc-inline-script', ACCINLINEURL.'lib/js/acc-inline.js', array(), '1.0.0', true );
  }

  function setup_tinymce_plugin() {

    // Check if the logged in WordPress User can edit Posts or Pages
    // If not, don't register our TinyMCE plugin
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
        return;
    }

    // Check if the logged in WordPress User has the Visual Editor enabled
    // If not, don't register our TinyMCE plugin
    if ( get_user_option( 'rich_editing' ) !== 'true' ) {
        return;
    }

    // Setup some filters
    add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_plugin' ) );
    add_filter( 'mce_buttons', array( &$this, 'add_tinymce_toolbar_button' ) );

    add_thickbox();
  }

  function add_tinymce_plugin( $plugin_array ) {

      $plugin_array['acc_inline'] = plugin_dir_url( __FILE__ ) . 'js/tinymce-acc_inline-class.js';
      return $plugin_array;

  }

  function add_tinymce_toolbar_button( $buttons ) {

      array_push( $buttons, 'acc_inline' );
      return $buttons;

  }

  function log($info){
    $h = fopen(dirname(__FILE__)."/log.txt","w");
    fwrite($h,$info);
    fclose($h);
  }

}
