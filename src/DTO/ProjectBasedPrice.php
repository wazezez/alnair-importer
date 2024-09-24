<?php

namespace Wazezez\AlnairImporter\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class ProjectBasedPrice
{
    public string $key;

    #[SerializedName('min_price')]
    public int $minPrice = 0;


    #[SerializedName('max_price')]
    public int $maxPrice = 0;

    #[SerializedName('min_price_m2')]
    public ?int $minPriceM2 = 0;

    #[SerializedName('max_price_m2')]
    public ?int $maxPriceM2 = 0;

    public string $currency = '';

    #[SerializedName('min_area')]
    public ?AreaValueDto $minArea = null;

    #[SerializedName('max_area')]
    public ?AreaValueDto $maxArea = null;
}
