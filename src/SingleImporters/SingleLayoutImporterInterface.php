<?php

namespace Wazezez\AlnairImporter\SingleImporters;

use Wazezez\AlnairImporter\DTO\LayoutDto;

interface SingleLayoutImporterInterface
{
    public function import(LayoutDto $layoutDto): void;
}
