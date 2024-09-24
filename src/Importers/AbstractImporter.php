<?php

namespace Wazezez\AlnairImporter\Importers;

use Wazezez\AlnairImporter\SingleImporters\EntityInterface;

abstract class AbstractImporter
{
    /**
     * @param EntityInterface[] $data
     * @return void
     */
    abstract protected function import(array $data): void;
}
