<?php

namespace Wazezez\AlnairImporter\SingleImporters;

use Wazezez\AlnairImporter\DTO\ProjectDto;

interface SingleProjectImporterInterface
{
    public function import(ProjectDto $projectDto): void;
}
