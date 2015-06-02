<?php
/**
 * Created by PhpStorm.
 * User: prog3
 * Date: 15.05.15
 * Time: 18:45
 */

require_once '../vendor/autoload.php';



\cs\services\VarDumper::dump(new \app\services\GetArticle\YouTube('http://www.youtube.com/watch?v=BwEmHlfTwv0'));
