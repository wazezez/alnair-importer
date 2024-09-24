<?php

namespace Wazezez\AlnairImporter\Parsers;

use Symfony\Component\Serializer\SerializerInterface;
use Wazezez\AlnairImporter\DTO\ProjectDto;

class ProjectsParser extends AbstractParser
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
    protected function getXmlUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    protected function getNodeNameToParse(): string
    {
        return 'offers';
    }

    /**
     * @param string $node
     * @return mixed
     */
    protected function deserialize(string $node): mixed
    {
        return $this->serializer->deserialize($node, ProjectDto::class, 'xml');
    }
}
