<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NewsController extends Controller
{
    //fetch news from an external API
    public function fetchNews()
    {
        // News API Authentication Key
        $apiKey = 'fccdd20471f34a299a420680abf60251';
        //End Point URL fetch News
        $url = 'https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $apiKey;

        //Send a request to the API endpoint using HTTP client
        $response = Http::get($url);

        // Check if the request was successful
        if ($response->successful()) {
            $newsData = $response->json();
            // Pass the data to the view
            return view('news.index', ['articles' => $newsData['articles']]);
        } else {
            // Handle error response
            return back()->with('error', 'Failed to fetch news');
        }
    }

}
