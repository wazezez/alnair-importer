<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';

use Wazezez\AlnairImporter\AlnairImporter;
use Wazezez\AlnairImporter\Parsers\LayoutsParser;
use Wazezez\AlnairImporter\Importers\LayoutsImporter;

class SingleLayoutImporter implements \Wazezez\AlnairImporter\SingleImporters\SingleLayoutImporterInterface
{
    public function import(\Wazezez\AlnairImporter\DTO\LayoutDto $layoutDto): void
    {

    }
}


$import = new AlnairImporter(
    new LayoutsParser('/layout.xml', (new \Wazezez\AlnairImporter\Serializers\SerializerFactory())->create()),
    new LayoutsImporter(new SingleLayoutImporter())
);

try {
    $import->process();
} catch (Exception $e) {

}
