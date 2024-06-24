<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function index(){
        Artisan::call('my-custom-cmd',[
            'userName' => User::select('userName')->get()->toArray(), 
        ]);

        SendEmailJob::dispatch(5);

    }
}
