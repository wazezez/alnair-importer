<?php

namespace Wazezez\AlnairImporter\Importers;

use Wazezez\AlnairImporter\DTO\LayoutDto;
use Wazezez\AlnairImporter\SingleImporters\SingleLayoutImporterInterface;

class LayoutsImporter extends AbstractImporter
{
    /**
     * @param SingleLayoutImporterInterface $singleImporter
     */
    public function __construct(private readonly SingleLayoutImporterInterface $singleImporter)
    {
    }

    /**
     * @param LayoutDto[] $data
     * @return void
     */
    public function import(array $data): void
    {
        foreach ($data as $layout) {
            $this->singleImporter->import($layout);
        }
    }
}

