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
        $s_recovered = Setting::get('recovered');

        $data = Cache::remember('infected_data', 60, function () {
            $page = file_get_contents('https://www.gov.pl/web/koronawirus/wykaz-zarazen-koronawirusem-sars-cov-2');
            return collect(json_decode(json_decode(get_string_between($page, '<pre id="registerData" class="hide">', '</pre>'))->parsedData));
        });

        $info = $data->shift();
        $info->recovered = $s_recovered->val;

        return Inertia::render('Infected/Index', compact('data', 'info', 'date_string'));
    }

    public function setRecovered(int $val)
    {
        $s_recovered = Setting::get('recovered');
        $s_recovered->val = $val;
        $s_recovered->save();

        return redirect()->back();
    }
}
