<?php

namespace AlexSmith\SitemapParser;
use SimpleXMLElement;

/**
*
*  @author Alex Smith
*/
class SitemapParser {

    public function __construct(){
    }

    /**
     * @return string[]
     */
    public function parseFile($file) {
        if (!file_exists($file)) {
            return [];
        }

        $data = file_get_contents($file);
        $xml = new SimpleXMLElement($data);

        $pages = [];
        foreach ($xml->url as $url) {
            if ($url->loc) {
                $pages[] = $url->loc->__toString();
            }
        }

        return $pages;
    }
}