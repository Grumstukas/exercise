<?php


namespace Controller;

class Read
{
    public function readTheFile($_fileName)
    {
        $pointIndex = strripos($_fileName, '.') + 1;
        $extension = substr($_fileName,$pointIndex);

        switch ($extension) {
            case 'xml':
                return $this->readXML($_fileName);
            case 'json':
                return $this->readJSON($_fileName);
            case 'csv':
                return $this->readCSV($_fileName);
        }
    }

    public function readXML($_fileName)
    {
            $xmlas = json_decode(json_encode(simplexml_load_file($_fileName)),true);

            $xmlArray = [];
            foreach ($xmlas as $line)
            {
                foreach ($line as $insideLine => $value)
                {
                    $xmlArray[$insideLine] = $value;
                }
            }
            return $xmlas;
    }

    public function readJSON($_fileName)
    {
        $json = file_get_contents($_fileName);
        $jsonArray = json_decode($json, true);

        $documentArray = [];

        foreach ($jsonArray as $line => $value)
        {
            $documentArray[$line] = $value;
        }

        return $documentArray;
    }

    public function readCSV($_fileName)
    {
        $csv = array_map('str_getcsv', file($_fileName));

        /********************* To Associative Array *********************/
        $csvArray = [];

        for($i = 1; $i < count($csv); $i++)
        {
            for($j = 0; $j < count($csv[0]); $j++)
            {
                $csvArray[$i-1][$csv[0][$j]] = $csv[$i][$j];
            }
        }

        return $csvArray;
    }
}