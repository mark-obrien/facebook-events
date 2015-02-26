<?php
/**
* @wordpress-plugin
* Plugin Name:       Facebook Events
* Version:           1.0.0
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:       facebook-events
*/


// Include initialization functions
require('session.php');

use Facebook\FacebookRequest;

if(empty($session)){
    return;
}

/**
 * Retrieve User’s Profile Information
 */
// Graph API to request user data
$request = ( new FacebookRequest( $session, 'GET', '/me' ) )->execute();

// Get response as an array
$user = $request->getGraphObject()->asArray();

//print_r( $user );


/**
 * Get User’s Profile Picture
 */
// Graph API to request profile picture
$request = (new FacebookRequest( $session, 'GET', '/me/picture?type=large&redirect=false' ))->execute();

// Get response as an array
$picture = $request->getGraphObject();

//print_r( $picture );

$request = (new FacebookRequest( $session, 'GET', '/me/permissions' ))->execute();

$permissions = $request->getGraphObject()->asArray();

//print_r( $permissions );

//$request = (new FacebookRequest( $session, 'GET', '/1791508274407110' ))->execute();

$request = (new FacebookRequest( $session, 'GET', '/me/events' ))->execute();

$events = $request->getGraphObject()->asArray();

var_dump($events['data']);

foreach($events['data'] as $event){

}


/**
 * Publish to User’s Timeline
 */
// Graph API to publish to timeline
//$request = (new FacebookRequest( $session, 'POST', '/me/feed', array(
//    'message' => 'I love articles on benmarshall.me!'
//)))->execute();
//
//// Get response as an array, returns ID of post
//$response = $request->getGraphObject()->asArray();
//
//print_r( $response );

//// Graph API to publish to timeline with additional parameters
//$request = (new FacebookRequest( $session, 'POST', '/me/feed', array(
//    'name' => 'Facebook SDK PHP v4 — a complete guide!',
//    'caption' => 'Learn how to easily use the Facebook SDK PHP v4 library.',
//    'link' => 'http://www.benmarshall.me/facebook-sdk-php-v4',
//    'message' => 'Check out how to integrate Facebook with your website.'
//)))->execute();
//
//// Get response as an array, returns ID of post
//$response = $request->getGraphObject()->asArray();
//
//print_r( $response );
