# Alnair API projects and layouts importer

Importer for [Alnair.ae](https://alnair.ae/).

## Requirements

- PHP 8.2+
- Composer

## Setup

```bash
composer require wazezez/alnair-importer
```

## Using

Make your own importing classes for projects and layouts like this:

```php
class SingleLayoutImporter implements \Wazezez\AlnairImporter\SingleImporters\SingleLayoutImporterInterface
{
    public function import(\Wazezez\AlnairImporter\DTO\LayoutDto $layoutDto): void
    {
        // Your layout import actions
    }
}
```

```php
class SingleProjectImporter implements \Wazezez\AlnairImporter\SingleImporters\SingleProjectImporterInterface
{
    public function import(\Wazezez\AlnairImporter\DTO\ProjectDto $projectDto): void
    {
        // Your project import actions
    }
}
```

Then make Alnair Importer for projects:

```php
use Wazezez\AlnairImporter\SingleImporters\EntityInterface;
use Wazezez\AlnairImporter\AlnairImporter;
use Wazezez\AlnairImporter\Parsers\ProjectsParser;
use Wazezez\AlnairImporter\Importers\ProjectsImporter;

$url = 'YOUR_ALNAIR_PROJECTS_URL';

$import = new AlnairImporter(
    new ProjectsParser($url, , (new \Wazezez\AlnairImporter\Serializers\SerializerFactory())->create()),
    new ProjectsImporter(new SingleLayoutImporter()) // your custom project importer
);

try {
    $import->process();
} catch (Exception $e) {
    print_r($e->getMessage());
}
```

And for layouts:

```php
use Wazezez\AlnairImporter\SingleImporters\EntityInterface;
use Wazezez\AlnairImporter\AlnairImporter;
use Wazezez\AlnairImporter\Parsers\LayoutsParser;
use Wazezez\AlnairImporter\Importers\LayoutsImporter;

$url = 'YOUR_ALNAIR_PROJECTS_URL';

$import = new AlnairImporter(
    new LayoutsParser($url, , (new \Wazezez\AlnairImporter\Serializers\SerializerFactory())->create()),
    new LayoutsImporter(new SingleLayoutImporter()) // your custom layout importer
);

try {
    $import->process();
} catch (Exception $e) {
    print_r($e->getMessage());
}
```
