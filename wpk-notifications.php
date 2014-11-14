<?php if(!defined('ABSPATH')) return; //#!-- Do not allow this file to be loaded unless in WP context
/*
Plugin Name: WPK Notifications
Plugin URI: https://github.com/wp-kitten/WPK-Notifications/
Description: Provides an easy way for theme & plugin developers to use admin notifications
Version: 1.0.0
Author: wp-kitten
Author URI: http://wp-kitten.github.io/
License: GPL v2
*/


/**
 * Class WpkNotifications
 * General singleton
 */
class WpkNotifications
{
    private static $_instance = null;

    private function __construct(){}

    public static function GetInstance(){
        if(is_null(self::$_instance) || !(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * Register hooks
     */
    public function RegisterHooks(){
        //#!-- Custom hooks
        add_action('wpk_notice_error', array($this, 'ShowErrorNotification'), 10, 1);
        add_action('wpk_notice_success', array($this, 'ShowSuccessNotification'), 10, 1);
    }

    public function ShowSuccessNotification($message=''){ ?>
        <div class="updated">
            <p><?php echo $message; ?></p>
        </div>
    <?php
    }

    public function ShowErrorNotification($message=''){ ?>
        <div class="error">
            <p><?php echo $message; ?></p>
        </div>
    <?php
    }
}
add_action('init', WpkNotifications::GetInstance()->RegisterHooks());
