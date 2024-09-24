<?php

namespace Wazezez\AlnairImporter\Serializers;

use Symfony\Component\Serializer\SerializerInterface;

interface SerializerFactoryInterface
{
    public function create(): SerializerInterface;
}
