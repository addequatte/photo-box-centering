<?php

namespace Addequatte\PhotoBoxCentraze\Data;

class TranslatePlan
{

    /**
     * @param int $photoWidth Original photo width.
     * @param int $photoHeight Original photo height.
     * @param int $targetWidth Target photo box width.
     * @param int $targetHeight Target photo box height.
     * @param int $targetBoxPercent Positioned box size in percentage inside target photo.
     */
    public function __construct(
        private readonly int $photoWidth,
        private readonly int $photoHeight,
        private readonly int $targetWidth,
        private readonly int $targetHeight,
        private readonly int $targetBoxPercent = 40
    ) {
    }

    /**
     * @return int
     */
    public function photoWidth(): int
    {
        return $this->photoWidth;
    }

    /**
     * @return int
     */
    public function photoHeight(): int
    {
        return $this->photoHeight;
    }

    /**
     * @return int
     */
    public function targetWidth(): int
    {
        return $this->targetWidth;
    }

    /**
     * @return int
     */
    public function targetHeight(): int
    {
        return $this->targetHeight;
    }

    /**
     * @return int
     */
    public function targetBoxPercent(): int
    {
        return $this->targetBoxPercent;
    }
}