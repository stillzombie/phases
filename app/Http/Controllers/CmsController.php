<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Wink\WinkPost;

class CmsController extends Controller
{
    public function index()
    {
        $w = WinkPost::first();
        dd($w->toArray(), 'sdfs');
    }
}