<?php
include 'httpcacheapi.php';

process_cache(5);   //cache 5秒钟，但过期后先返回同时异步更新。
echo time();
