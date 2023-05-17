<?php
/**
 * Plugin Name: My Comments Plugin
 * Plugin URI: https://example.com/my-comments-plugin
 * Description: This plugin sends comments to the API
 * Version: 1.0.0
 * Author: Tlholo
 * Author URI: https://example.com
 */

function send_comment_to_api($comment_id) {
    $comment = get_comment($comment_id);
    $data = [
        'name' => $comment->comment_author,
        'email' => $comment->comment_author_email,
        'comment' => $comment->comment_content,
    ];
    $url = 'https://127.0.0.1:8000/api/comments';
    $options = [
        'body' => $data,
    ];
    wp_remote_post($url, $options);
}
add_action('comment_post', 'send_comment_to_api');
