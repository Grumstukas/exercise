<?php


namespace Controller;

use controller\Write;
use DOMDocument;

class Display
{
    public function displayArray($extension, $content, $road)
    {
        $convertData = new Write;
        $content_array = $convertData->textToArray($content);

        switch ($extension)
        {
            case 'xml':
                return $this->displayXML($content_array);
            case 'json':
                return $this->displayJSON($content_array);
            case 'csv':
                return $this->displayCSV($content_array, $road);
        }
    }

    public function displayXML($content_array)
    {
        $xml = new DOMDocument("1.0");
        $xml->formatOutput = true;

        $items = $xml->createElement('items');
        $xml->appendChild($items);

        $fileInfo['item'] = $content_array;

        foreach ($fileInfo as $key => $element) {
            $firstKey = array_key_first($element);

            if (is_array($element[$firstKey])) {

                foreach ($fileInfo[$key] as $line => $item_content) {

                    $item = $xml->createElement($key);
                    $items->appendChild($item);

                    foreach ($item_content as $tag => $value) {

                        $tag = $xml->createElement($tag, $value);
                        $item->appendChild($tag);

                    }
                }
            } else {
                $item = $xml->createElement($key);
                $items->appendChild($item);

                foreach ($fileInfo[$key] as $line => $item_content) {
                    $tag = $xml->createElement($line, $item_content);
                    $item->appendChild($tag);
                }
            }
        }

        echo '<xmp>' . $xml->saveXML() . '</xmp>';

    } //veikia

    public function displayCSV($content_array, $road)
    {
        $write = new Write;
        $_fileName = $road.'/files/example.csv';
        $write->writeCSV($_fileName, $content_array);
        $file = file_get_contents($_fileName);
        unlink($_fileName);
        header('Content-type: text/javascript');
        echo $file;

    } //veikia

    public function displayJSON($content_array){
//
        $file = (json_encode($content_array, JSON_PRETTY_PRINT));
        header('Content-type: text/javascript');
        echo $file;
//
    } //veikia

}