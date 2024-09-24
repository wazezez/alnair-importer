<?php

namespace Wazezez\AlnairImporter\Parsers;

use XMLReader;
use Exception;
use RuntimeException;

abstract class AbstractParser
{
    /**
     * @return string
     */
    abstract protected function getXmlUrl(): string;

    /**
     * @return string
     */
    abstract protected function getNodeNameToParse(): string;

    /**
     * @param string $node
     * @return mixed
     * @throws Exception
     */
    protected function deserialize(string $node): mixed
    {
        throw new Exception("Deserialization must be implemented in child class.");
    }

    /**
     * @throws Exception
     */
    public function parse(): array
    {
        $xml = $this->getXml($this->getXmlUrl());
        $data = [];

        while ($xml->read() && $xml->name !== $this->getNodeNameToParse());

        while ($xml->name === $this->getNodeNameToParse()) {
            $node = $xml->readOuterXML();
            $data[] = $this->deserialize($node);
            $xml->next($this->getNodeNameToParse());
        }

        return $data;
    }

    /**
     * @param string $url
     * @return XMLReader
     */
    private function getXml(string $url): XMLReader
    {
        $reader = new XMLReader;
        $param = [
            'https' => [
                'method' => 'GET',
                'header' => "Content-type: application/x-www-form-urlencoded",
            ]
        ];

        libxml_set_streams_context(stream_context_create($param));

        if (!$reader->open($url)) {
            throw new RuntimeException('Unable to open file.');
        }

        $reader->open($url);

        return $reader;
    }
}
