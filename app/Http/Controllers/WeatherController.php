<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $city = $request->input('city', 'Karachi'); 
        $apiKey = env('WEATHER_API_KEY');
        $apiUrl = env('WEATHER_API_URL') . "/weather?q={$city}&appid={$apiKey}&units=metric";

        $response = Http::get($apiUrl);
        $localTime = null;


        if ($response->successful()) {
            $weather = $response->json();
            if (isset($weather['timezone'])) {
                $timezoneOffset = $weather['timezone'];
                $gmtTime = gmdate('H:i:s', time() + $timezoneOffset);
            } else {
                $gmtTime = 'Timezone data not available';
            }
            return view('weather', compact('weather', 'city', 'gmtTime'));        }

        return view('weather', ['error' => 'Please type correct name of the City.']);
    }
}
