<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SSMRepository;
use Illuminate\Http\Request;

class SSMController extends Controller
{
    public function index()
    {
        return (new SSMRepository())->index();
    }
}
