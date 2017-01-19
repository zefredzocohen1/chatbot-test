<?php

namespace App\Http\Controllers;

use App\Http\Traits\BasicVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    use BasicVideo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Log::info($this->kiloAudioBitRate.', '.$this->sizeWidth.', '.$this->sizeHeight.', '.$this->kiloBitRate);
        Log::info($this->saveVideo(1,2,3,4));
        return view('home');
    }
}
