<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Setting;
use App\InfectedData;

class InfectedController extends Controller
{
    public function index()
    {
        $date_string = now()->toDateString();

        $data = getInfectedData();
        $info = getInfoData();

        $infected_database = InfectedData::latest('date')->limit(21)->get();

        return Inertia::render('Infected/Index', compact('date_string', 'data', 'info', 'infected_database'));
    }

    public function setRecovered(int $val)
    {
        $s_recovered = Setting::get('recovered');
        $s_recovered->val = $val;
        $s_recovered->save();

        return redirect()->back();
    }
}
