<?php

namespace Wazezez\AlnairImporter;

use Exception;
use Wazezez\AlnairImporter\Importers\AbstractImporter;
use Wazezez\AlnairImporter\Parsers\AbstractParser;

readonly class AlnairImporter
{
    public function __construct(
        private AbstractParser   $parser,
        private AbstractImporter $importer,
    ) {
    }

    /**
     * @throws Exception
     */
    public function process(): void
    {
        $data = $this->parser->parse();
        $this->importer->import($data);
    }
}
