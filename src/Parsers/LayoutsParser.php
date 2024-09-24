<?php

namespace Wazezez\AlnairImporter\Parsers;

use Symfony\Component\Serializer\SerializerInterface;
use Wazezez\AlnairImporter\DTO\LayoutDto;

class LayoutsParser extends AbstractParser
{
    /**
     * @param string $url
     * @param SerializerInterface $serializer
     */
    public function __construct(private readonly string $url, private readonly SerializerInterface $serializer)
    {
    }

    /**
     * @return string
     */
    protected function getNodeNameToParse(): string
    {
        return 'layouts';
    }

    /**
     * @return string
     */
    protected function getXmlUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $node
     * @return mixed
     */
    protected function deserialize(string $node): mixed
    {
        return $this->serializer->deserialize($node, LayoutDto::class, 'xml');
    }
}
