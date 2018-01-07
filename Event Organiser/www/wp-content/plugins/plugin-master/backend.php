<?php
require_once 'Slim/Slim.php';
require_once 'SlimWpOptions.php';


\Slim\Slim::registerAutoloader();
new \Slim\SlimWpOptions();

add_filter('rewrite_rules_array', function ($rules) {
    $new_rules = array(
        '('.get_option('slim_base_path','slim/api/').')' => 'index.php',
    );
    $rules = $new_rules + $rules;
    return $rules;
});

add_action('init', function () {
    if (strstr($_SERVER['REQUEST_URI'], get_option('slim_base_path','slim/api/'))) {
        $slim = new \Slim\Slim();
        do_action('slim_mapping',$slim);
        $slim->get('/slim/api/user/:u',function($user){
            printf("User is %s",$user);            
        });
        $slim->get('/slim/api/test', function(){
            global $wpdb, $table_prefix;
            echo json_encode(
                $wpdb->get_results( 
                    $wpdb->prepare("SELECT * FROM " . 
                    $table_prefix . "test", null) ));
        });
        $slim->post('/slim/api/appointment', function(){
            global $wpdb, $table_prefix;
            $postdata = file_get_contents("php://input");
            $oInquiry = json_decode($postdata);
            $sSQL = "INSERT INTO " . $table_prefix . "inquiry(event, eventdate) VALUES(%s, %s)";
            $stmt = $wpdb->prepare($sSQL, 
                array($oInquiry->event, $oInquiry->eventdate));
            $wpdb->query($stmt);
            $oInquiry->id = $wpdb->insert_id;
            $sSQL = "INSERT INTO " . $table_prefix . 
            "inquirydetails(inquiryId, fullname, email, phoneNo, guests) VALUES(%s, %s, %s, %s, %s)";
            $stmt = $wpdb->prepare($sSQL,
                array($oInquiry->id, $oInquiry->fullname, $oInquiry->email, $oInquiry->phoneno, $oInquiry->guests ));
            $wpdb->query($stmt);
            echo json_encode($oInquiry);
        });
        $slim->run();
        exit;
    }
});

