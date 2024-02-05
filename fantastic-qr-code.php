<?php 
/**
 * Plugin Name: Fantastic QR Code
 * Description: This is Fantastic QR Code.
 * Version: 1.0.0
 * Author: Faridul Islam
 * Author URI: http://bddevfarid.com
 * Plugin URI: http://google.com
 */

class Fantastic_Qr_Code {
    public function __construct() {
        add_action('init', array($this, 'init'));
    }
    
    public function init() {
        add_filter('the_content', [$this, 'add_qr_code']);
    }

    public function add_qr_code($content) {
        $current_link = get_permalink();
        $title = get_the_title();
        $custom_content = '<div style="border: 1px solid #444; padding: 10px; margin: 20px 0;">';
        // $custom_content .= '<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' . $current_link . '" alt="'.$title.'" />';
        // $custom_content .="<img src='https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={$current_link}' alt='{$title}' />";
        $custom_content .= "<img src='https://api.qrserver.com/v1/create-qr-code/?data={$current_link}&amp;size=100x100' alt='{$title}' title='{$title}' />";
        $custom_content .= '</div>';

        $content .= $custom_content;

        return $content;
    }

}

New Fantastic_Qr_Code();
