<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MobileController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
