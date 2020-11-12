<?php
/**
 * Request jobs from Indeed API
 *
 * Split the request into smaller request chunks (25 results each)
 * and then consolidate them into a single array to meet the API
 * requirements.
 * @param int $split
 * @param string $search
 * @param string $apikey
 * @return array|false
 */
function indeed_api_request( $split = 50, $search = 'company:("Google")', $apikey = 'XXXXXXXXXXXXXXXX' ) {

    // Get the goods for making the API request to Indeed
    $search = urlencode($search);
    $split = intval($split);
    $user_agent = urlencode( $_SERVER['HTTP_USER_AGENT'] );
    $server_ip = filter_var( $_SERVER['SERVER_ADDR'], FILTER_VALIDATE_IP );

    // Split API request into multiple queries, requesting "$split" results per request
    $xmlrpc = "http://api.indeed.com/ads/apisearch?publisher=$apikey&q=$search&userip=$server_ip&useragent=$user_agent&v=2&limit=$split";
    $fullxml = simplexml_load_file( $xmlrpc );
    $totalresults = intval( $fullxml->totalresults );
    $loop_size = $totalresults / $split;
    $feeds = array();
    for ( $i = 0; $i <= $loop_size; $i++ ) {
        $offset = $split * $i;
        $feeds[] = ( $i === 0 ) ? $xmlrpc : "$xmlrpc&start=$offset";
    }

    // For each feed, store the results as an array
    $grouped_results = array();
    foreach ( $feeds as $feed ) {
        $xml = simplexml_load_file($feed);
        if( !$xml ) return false;
        $json = json_encode($xml);
        $grouped_results[] = json_decode($json, TRUE);
    }

    // Consolidate all grouped requests into a single, final results array
    $jobs = array();
    foreach ( $grouped_results as $job ) {
        $jobs = array_merge( (array) $jobs, (array) $job['results']['result'] );
    }

    return $jobs;
}