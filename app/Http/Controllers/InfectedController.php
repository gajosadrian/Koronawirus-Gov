<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InfectedController extends Controller
{
    public function index()
    {
        $date_string = now()->toDateString();
        $page = file_get_contents('https://www.gov.pl/web/koronawirus/wykaz-zarazen-koronawirusem-sars-cov-2');
        $data = json_decode(json_decode(get_string_between($page, '<pre id="registerData" class="hide">', '</pre>'))->parsedData);

        // return response()->json($data, 200);

        return Inertia::render('Infected/Index', compact('data', 'date_string'));
    }
}
