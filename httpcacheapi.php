<?php

/*
 * Cache in CDN ... by HyperText Transfer Protocol
 * Verion: 0.1
 * Author: MicroHuang
 * Date: 2014/06/11
 */if( !function_exists('apache_request_headers') ) {
///
function apache_request_headers() {
  $arh = array();
  $rx_http = '/\AHTTP_/';
  foreach($_SERVER as $key => $val) {
    if( preg_match($rx_http, $key) ) {
      $arh_key = preg_replace($rx_http, '', $key);
      $rx_matches = array();
      // do some nasty string manipulations to restore the original letter case
      // this should work in most cases
      $rx_matches = explode('_', $arh_key);
      if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
        foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
        $arh_key = implode('-', $rx_matches);
      }
      if($arh_key=='IF-MODIFIED-SINCE')$arh_key='If-Modified-Since';//debug
      $arh[$arh_key] = $val;
    }
  }
  return( $arh );
}
}

function process_cache($expire=300){
	$headers = apache_request_headers();
	$client_time = (isset($headers['If-Modified-Since']) ? strtotime($headers['If-Modified-Since']) : 0);
	$now=gmmktime();
	$now_list=gmmktime()-$expire;
	if ($client_time<$now and $client_time >$now_list){
		header('Last-Modified: '.gmdate('D, d M Y H:i:s', $client_time).' GMT', true, 304);
		exit(0);
	}else{
		header('Last-Modified: '.gmdate('D, d M Y H:i:s', $now).' GMT', true, 200);
	}
}

//if(is_cacheable()){process_cache(60*5);}
