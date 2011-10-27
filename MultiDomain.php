<?php
/*
Plugin Name: MultiDomain
Plugin URI: http://github.com/nathancarnes/MultiDomain
Description: Allows WordPress to be used with mirrored domains, allowing title, description, and theme switching based on domain. Also provides conditional shortags. Inspired by Domain Mirror (http://mcaleavy.org/code/domain-mirror/).
Author: Nathan Carnes
Version: 1.0
Author URI: http://carnesmedia.com
*/

class MultiDomain{
  static $instance;

  public $domains, $domain, $conditional_fired;

  function __construct($config) {
    self::$instance = $this;

    $this->domains = $config;

    $this->get_domain();

    // Register Filters
    if($this->domain){
      $properties = array('blogname', 'siteurl', 'home', 'blogdescription', 'template');

      foreach($properties as $property) {
        if($this->domain[$property]){
          add_filter("option_$property", array( $this, $property ), 1);

          if($property == 'template') {
              add_filter("template", array( $this, "template" ), 1);
              add_filter("option_stylesheet", array( $this, "template" ), 1);
          }
        }
      }
    }

    // Register Shortcodes
    add_shortcode('MultiDomain_if', array( $this, 'if_domain' ) );
    add_shortcode('MultiDomain_else', array( $this, 'else_domain' ) );
    add_shortcode('MultiDomain_default', array( $this, 'else_domain' ) );
  }

  function current_domain() {
    return $_SERVER[SERVER_NAME];
  }

  function get_domain() {
    $domains = $this->domains;

    if($domains) {
      foreach($domains as $domain) {
        if($this->current_domain() == $domain[domain]){
          $this->domain = $domain;
        }
      }
    }
  }

  /* Set Site Properties */
  function blogname() {
    return $this->domain[blogname];
  }

  function siteurl() {
    return $this->domain[siteurl];
  }

  function home() {
    return $this->domain[home];
  }

  function blogdescription() {
    return $this->domain[blogdescription];
  }

  function stylesheet() {
    return $this->domain[stylesheet];
  }

  function template() {
    return $this->domain[template];
  }

  /* Conditional Shortcodes */
  function if_domain( $attributes, $content = null ) {
    extract( shortcode_atts( array( 'domain' => null ), $attributes ) );

    if( $domain == $this->domain[domain] ) {
      $this->conditional_fired = true;
      return do_shortcode( $content );
    }
  }

  function else_domain( $attributes, $content = null ) {
    if( !$this->conditional_fired ) {
      return do_shortcode( $content );
    }
  }
}

include_once('config.php');
new MultiDomain($domains);
?>