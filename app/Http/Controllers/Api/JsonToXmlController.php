<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\ArrayToXmlService;

class JsonToXmlController extends Controller
{
    public function index(
        ArrayToXmlService $arrayToXmlService
    ) {
        $url = 'https://jsonplaceholder.typicode.com/posts/10/comments';

        return response(
            $arrayToXmlService->getContentByUrl($url)
        )->header('Content-Type', 'application/xml');
    }
}
