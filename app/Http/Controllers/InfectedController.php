<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Setting;

class InfectedController extends Controller
{
    public function index()
    {
        $date_string = now()->toDateString();

        $data = getInfectedData();
        $info = getInfoData();

        return Inertia::render('Infected/Index', compact('date_string', 'data', 'info'));
    }

    public function setRecovered(int $val)
    {
        $s_recovered = Setting::get('recovered');
        $s_recovered->val = $val;
        $s_recovered->save();

        return redirect()->back();
    }
}
