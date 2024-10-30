<?php
/*
Plugin Name: Khoyaa Quotes
Plugin URI: http://khoyaa.com/quotes/
Description: Best quotes feed on your siderbar.
Author: khoyaa
Author URI: https://profiles.wordpress.org/khoyaa
Version: 1.0
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if(!class_exists('Ky_Quotes'))
{
  
  class Ky_Quotes
  {
    private $plugin_url;
    
    public function __construct()
    {
      add_action( 'widgets_init',         array($this,'register_quotes_widget'));
      add_action( 'wp_enqueue_scripts',   array($this,'quotes_assests') );
      register_activation_hook( __FILE__, array($this,'Ky_activate') );
      
      $this->plugin_url                   = plugins_url('/',__FILE__);
    }
    
    public function register_quotes_widget()
    {
      include 'quotes-widget.php';
      register_widget( 'KyQuotes_Widget' );
    }
    
    public function quotes_assests()
    {
      wp_enqueue_style( 'quotes-style', $this->plugin_url . 'style.css' );
    }
    
    public function Ky_activate(){}

  }
  
  new Ky_Quotes;
  
}
