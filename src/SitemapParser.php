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

        $website = '';
        $pages = [];
        foreach ($xml->url as $url) {
            if (!$url->loc) {
                continue;
            }

            $urlArray = parse_url($url->loc->__toString());

            $pageUrl = $urlArray['path'];
            if (isset($urlArray['query'])) {
                $pageUrl .= '?'.$urlArray['query'];
            }
            $pages[] = $pageUrl;

            if (!$website) {
                $website = $urlArray['host'];
            }
        }

        return ['website' => $website, 'pages' => $pages];
    }
}