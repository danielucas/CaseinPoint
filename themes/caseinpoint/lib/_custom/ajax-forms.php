<?php

//==============
// AJAX Login
//==============
function ajax_login_register_init()
{

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action('wp_ajax_nopriv_ajaxlogin', 'ajax_login');

    add_action('wp_ajax_nopriv_register_user', 'ajax_reg_new_user');

}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_register_init');
}

function ajax_login()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer('woocommerce-login', 'security');

    // Nonce is checked, get the POST data and sign user on
    $info                  = array();
    $info['user_login']    = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember']      = true;

    $user_signon = wp_signon($info, false);
    if (is_wp_error($user_signon)) {

        echo json_encode(array('loggedin' => false, 'message' => __('Whoops, wrong username or password.')));

    } else {

        echo json_encode(array('loggedin' => true, 'message' => __('Hooray, login successful, redirecting...')));
    }

    die();
}

//==============
// AJAX Register
//==============

/**
 * New User registration
 *
 */
function ajax_reg_new_user()
{

    // Verify nonce
    check_ajax_referer('woocommerce-register', 'security');

    // Nonce is checked, get the POST data and sign user on
    $info               = array();
    $info['user_login'] = $_POST['email'];
    $info['user_pass']  = $_POST['password'];
    $info['user_email'] = $_POST['email'];

    if (!$_POST['email']) {
        echo json_encode(array('registered' => false, 'message' => 'Whoops, Please enter an email address'));
        die();
    }

    if (!$_POST['password']) {
        echo json_encode(array('registered' => false, 'message' => 'Hmm... Please enter a password'));
        die();
    }

    $user_signup = wp_insert_user($info);

    if (is_wp_error($user_signup)) {

        echo json_encode(array('registered' => false, 'message' => 'Uh oh! ' . $user_signup->get_error_message()));

    } else {

        echo json_encode(array('registered' => true, 'message' => __('Hooray, login successful, redirecting...')));
    }

    die();
}
