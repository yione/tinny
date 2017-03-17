<?php
/**
 * Created by PhpStorm.
 * User: xiangjie
 * Date: 17/2/27
 * Time: 下午1:46
 */

namespace App\Http\Controllers;

use App\Models\Menues;
use App\Repositories\MenuesRepository;
use App\Http\Controllers\Controller as LaravelController;


class AppBaseController extends LaravelController
{
    public function __construct()
    {

        $menues=Menues::getMenus();
        view()->share('layout_menus', $menues);
    }
}