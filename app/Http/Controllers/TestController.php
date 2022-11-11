<?php

namespace App\Http\Controllers;

use GoogleSearchResults;
use Illuminate\Routing\Controller as BaseController;

class TestController extends BaseController
{
    public function show()
    {
        $client = new GoogleSearchResults("020d81e9965433510aa83ca17a15dc3dd7af03c71218a56c9ba214587659e659");
        $query = [
            "engine" => "google_scholar",
            "q" => "10.1103/PhysRevE.98.012405"
        ];
        $response = $client->get_json($query);

        $result = [];

        foreach ($response->organic_results as $value) {
            array_push($result, [$value->title, $value->inline_links->cited_by->total]);
        }
        dd($result);
    }
}
