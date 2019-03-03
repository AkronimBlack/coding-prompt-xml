<?php
/**
 * Created by PhpStorm.
 * User: BlackBit
 * Date: 28-Feb-19
 * Time: 22:52
 */

namespace src\Infrastructure\Controllers\http;

use src\sys\Entity\Request;

class IndexController
{
    public function index(Request $request)
    {
        echo 'here';
    }
}
