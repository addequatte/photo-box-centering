<?php

declare(strict_types=1);

namespace Addequatte\PhotoBoxCentraze\Data;

class TranslatePhoto
{
    /**
     * @param float $translateX
     * @param float $translateY
     * @param int $centerX
     * @param int $centerY
     * @param float $scale
     */
    public function __construct(
        private readonly float $translateX = 0.0,
        private readonly float $translateY = 0.0,
        private readonly int $centerX = 0,
        private readonly int $centerY = 0,
        private readonly float $scale = 100
    ) {
    }

    /**
     * @return float
     */
    public function translateX(): float
    {
        return $this->translateX;
    }

    /**
     * @return float
     */
    public function translateY(): float
    {
        return $this->translateY;
    }

    /**
     * @return int
     */
    public function centerX(): int
    {
        return $this->centerX;
    }

    /**
     * @return int
     */
    public function centerY(): int
    {
        return $this->centerY;
    }

    /**
     * @return float
     */
    public function scale(): float
    {
        return $this->scale;
    }
}
