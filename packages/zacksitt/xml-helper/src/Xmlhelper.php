<?php 

namespace Zacksitt\XmlHelper;

use Exception;

class Xmlhelper
{
    function toArray($xml){

        $xml = str_replace(":", "", $xml);
        $xml = simplexml_load_string($xml);
        $stringArray = json_encode($xml);
        $arrayData = json_decode($stringArray, TRUE);
        return $arrayData;

    }

    function toXml($array){
        $xml = new \SimpleXMLElement('<response/>');

        array_walk_recursive($array, function($value, $key) use ($xml) {
            $xml->addChild($key, $value);
        });
        return $xml->asXML();
        
    }

    function getValue($data,$key){
        $arrayData = $this->toArray($data);
        return $this->searchKeyRecursive($arrayData, $key);
    }

    function searchKeyRecursive($array, $searchKey) {

        foreach ($array as $key => $value) {
            if ($key === $searchKey) {
                return $value; // Key found at current level, return its value
            }
            if (is_array($value)) {
                // Recursively search in the subarray
                $result = $this->searchKeyRecursive($value, $searchKey);
                if ($result !== false) {
                    return $result; // Key found in the subarray, return its value
                }
            }
        }
        return false; // Key not found
    }
}