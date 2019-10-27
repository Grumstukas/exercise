<?php


namespace Controller;

use controller\Read;
use DOMDocument;
use SimpleXMLElement;

class Write
{
    public function writeToFile($_fileName, $extension, $content)
    {
        $content_array = $this->textToArray($content);
        switch ($extension)
        {
            case 'xml':
                return $this->writeXML($_fileName, $content_array);
            case 'json':
                return $this->writeJSON($_fileName, $content_array);
            case 'csv':
                return $this->writeCSV($_fileName, $content_array);
        }
    }

    public function textToArray($content){

        $primaryArr = explode('],', $content);

        for($i = 0; $i < count($primaryArr); $i++){

            if ($i == (count($primaryArr)-1)){
                $primaryArr[$i] = substr(trim($primaryArr[$i]), 1, -1);
            }else{
                $primaryArr[$i] = substr(trim($primaryArr[$i]), 1);
            }

            $x = explode(',', $primaryArr[$i]);

            unset($primaryArr[$i]);
            foreach ($x as $item){
                $item = explode('=>', $item);
                $primaryArr[$i][substr(trim($item[0]),1,-1)] = trim($item[1]);
            }
        }
        return $primaryArr;
    } //veikia

    public function writeCSV($_fileName, $_content_array)
    {
        $out = fopen($_fileName, 'a');
        foreach ($_content_array as $line){
            fputcsv($out, $line);
        }
        fclose($out);
    } //veikia

    public function writeJSON($_fileName, $_content_array)
    {
        if (file_exists($_fileName)){
            $jsondata = file_get_contents($_fileName);
            $arr_data = json_decode($jsondata, true);
        } else {
            $arr_data = [];
        }

        foreach ($_content_array as $line){
            array_push($arr_data,$line);
        }

        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

        if(file_put_contents($_fileName, $jsondata)) {
            echo 'Data successfully saved';
        }
    } //veikia

    public function writeXML($_fileName, $_content_array)
    {

        if (file_exists($_fileName)) {

            $fileInfo = json_decode(json_encode(simplexml_load_file($_fileName)), true);

            $firstKey = array_key_first($fileInfo);

            echo $firstKey.'<br>';
            foreach ($_content_array as $content){
                $fileInfo[$firstKey][] = $content;
            }

        } else {
            $fileInfo['item'] = $_content_array;
        }

        $xml = new DOMDocument("1.0");
        $xml->formatOutput = true;

        $items = $xml->createElement('items');
        $xml->appendChild($items);

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
        return $xml->save($_fileName);
    } //veikia
}