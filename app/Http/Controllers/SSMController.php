<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Repositories\SSMRepository;
use Illuminate\Http\Request;

class SSMController extends Controller
{
    public function index($message = null )
    {
        return (new SSMRepository())->index($message);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('create')
                ->withErrors($validator)
                ->withInput();
        }

        return $this->index($request->message);
    }
}
