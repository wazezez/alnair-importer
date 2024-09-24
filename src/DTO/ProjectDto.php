<?php

namespace Wazezez\AlnairImporter\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;
use DateTime;

final class ProjectDto
{
    #[SerializedName('complex-id')]
    public int $id;
    public TranslationDto $title;
    public TranslationDto $description;
    public TranslationDto $status;
    public DeveloperDto $developer;

    public PriceDto $price;
    public string $type;

    #[SerializedName('sales_status')]
    public TranslationDto $salesStatus;

    #[SerializedName('construction_start_at')]
    public ?Datetime $constructionStartAt = null;

    #[SerializedName('planned_completion_at')]
    public ?Datetime $plannedCompletionAt = null;

    #[SerializedName('predicted_completion_at')]
    public ?Datetime $predictedCompletionAt = null;

    #[SerializedName('construction_progress')]
    public ?float $constructionProgress = null;

    /**
     * @var ProjectBasedPrice[]
     */
    #[SerializedName('br_prices')]
    public ?array $brPrices = [];
}
