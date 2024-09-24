<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';

use Wazezez\AlnairImporter\AlnairImporter;
use Wazezez\AlnairImporter\Parsers\ProjectsParser;
use Wazezez\AlnairImporter\Importers\ProjectsImporter;

class SingleProjectImporter implements \Wazezez\AlnairImporter\SingleImporters\SingleProjectImporterInterface
{
    public function import(\Wazezez\AlnairImporter\DTO\ProjectDto $projectDto): void
    {
        echo '<pre>';
        print_r($projectDto);
        echo '</pre>';
    }
}


$import = new AlnairImporter(
    new ProjectsParser('/project.xml', (new \Wazezez\AlnairImporter\Serializers\SerializerFactory())->create()),
    new ProjectsImporter(new SingleProjectImporter())
);

try {
    $import->process();
} catch (Exception $e) {
    print_r($e->getMessage());
}

