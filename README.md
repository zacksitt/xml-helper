# Laravel XML Helper

The Laravel XML Helper package provides an easy and efficient way to work with XML data in your Laravel applications. It includes methods for converting arrays to XML, parsing XML to arrays, and extracting values using XPath queries.

## Installation

To install the package, you can use Composer:

```bash
composer require zacksitt/xml-helper dev-main

Usage
Converting Arrays to XML
Use the toXML() method to convert a PHP array to an XML string.

use Zacksitt\XmlHelper\XmlHelper;

$array = [
    'root' => [
        'element' => 'value',
        'anotherElement' => 'anotherValue'
    ]
];

$xmlHelper = new XmlHelper();
$xmlString = $xmlHelper->toXml($array);

echo $xmlString;

Parsing XML to Arrays

The toArray() method parses an XML string into a PHP array.

$xmlString = '<root><element>value</element><anotherElement>anotherValue</anotherElement></root>';
$xmlHelper = new XmlHelper();
$array = xmlHelper->toArray($xmlString);

print_r($array);

Extracting Values with XPath
Use the getValue() method to extract values from an XML string using an XPath query.

$xmlString = '<root><element>value</element><anotherElement>anotherValue</anotherElement></root>';
$xpath = '//element';

$xmlHelper = new XmlHelper();
$value = $xmlHelper->getValue($xmlString, $xpath);

echo $value; // Output: value

Methods
toXML(array $data): string
Converts a PHP array to an XML string.

toArray(string $xml): array
Parses an XML string into a PHP array.

getValue(string $xml, string $xpath): mixed
Extracts a value from an XML string using an XPath query.

License
This package is open-sourced software licensed under the MIT license.

