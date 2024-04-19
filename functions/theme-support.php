<?php

function dragon_theme_support(){
    //dynamically add title tag to header
    add_theme_support('title-tag');
    //dynamically add logo to header
    add_theme_support('custom-logo');
    //dynamically add thumbnails and featured images to posts
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'dragon_theme_support');


// custom web form
add_action('wp_ajax_nlf-form', 'dragon_enquiry');
add_action('wp_ajax_nopriv_nlf-form', 'dragon_enquiry');

function dragon_enquiry(){

    $form_data = [];

    wp_parse_str($_POST['nlf-form'], $form_data);

    //admin email
    $admin_email = get_option('admin_email');

    // email headers
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: Template Argon Website < ' . $admin_email . ' >';
    $headers[] = 'Reply to: ' . $form_data['form-email'];
    $headers[] = 'BCC: marvinoka4@gmail.com';

    //email recipient
    $send_to = $admin_email;

    // subject
    $subject = "Template Argon [Website] - " . $form_data['form-enquiry'] . " Enquiry - " . $form_data['form-name'];

    // message
    $message = '';

    foreach ($form_data as $index => $field) {
        $message .= '<strong>' . $index . '</strong>: ' . $field . '<br />';
    }

    try {
        if ( wp_mail($send_to, $subject, $message, $headers) ) {

            wp_send_json_success('Thank you for contacting us, a member of our team would get back to you shortly!');

        } else {

            wp_send_json_error('There was an error, please check servers and try again!');

        }
    } catch (Exception $e) {

        wp_send_json_error($e->getMessage());
    }

}