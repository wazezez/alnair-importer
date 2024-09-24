<?php

namespace Wazezez\AlnairImporter\Importers;

use Wazezez\AlnairImporter\DTO\ProjectDto;
use Wazezez\AlnairImporter\SingleImporters\SingleProjectImporterInterface;

class ProjectsImporter extends AbstractImporter
{
    /**
     * @param SingleProjectImporterInterface $singleImporter
     */
    public function __construct(private readonly SingleProjectImporterInterface $singleImporter)
    {
    }

    /**
     * @param ProjectDto[] $data
     * @return void
     */
    public function import(array $data): void
    {
        foreach ($data as $project) {
            $this->singleImporter->import($project);
        }
    }
}
