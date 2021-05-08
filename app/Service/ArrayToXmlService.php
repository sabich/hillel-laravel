<?php

namespace App\Service;

use Spatie\ArrayToXml\ArrayToXml;

class ArrayToXmlService
{
    public function getContentByUrl(string $url): string
    {
        $content = file_get_contents($url);
        $array = json_decode($content, true);
        return $this->convert($array);
    }

    private function convert(array $array): string
    {
        return ArrayToXml::convert(['__numeric' => $array]);
    }
}
