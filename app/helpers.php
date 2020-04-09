<?php

function getInfectedDataRaw()
{
    return \Illuminate\Support\Facades\Cache::remember('infected_data', 60, function () {
        $page = file_get_contents('https://www.gov.pl/web/koronawirus/wykaz-zarazen-koronawirusem-sars-cov-2');
        return collect(json_decode(json_decode(html_entity_decode(get_string_between($page, '<pre id="registerData" class="hide">', '</pre>')))->parsedData));
    });
}

function getInfectedData()
{
    $data = getInfectedDataRaw();
    $data->shift();
    return $data;
}

function getInfoData()
{
    $info = getInfectedDataRaw()->shift();
    $info->recovered = \App\Setting::get('recovered')->val;
    return $info;
}

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
