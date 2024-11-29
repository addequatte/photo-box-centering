<?php

namespace Addequatte\PhotoBoxCentraze\Data;

class PositionedBox
{

    /**
     * @var int Positioned box width.
     */
    private int $width;

    /**
     * @var int Positioned box height.
     */
    private int $height;

    /**
     * @var int X coordinate of positioned box center.
     */
    private int $centerX;

    /**
     * @var int Y coordinate of positioned box center.
     */
    private int $centerY;

    /**
     * @param int $ltx Left top x coordinate.
     * @param int $lty Left top y coordinate.
     * @param int $rbx Right bottom x coordinate.
     * @param int $rby Right bottom y coordinate.
     */
    public function __construct(
        private readonly int $ltx,
        private readonly int $lty,
        private readonly int $rbx,
        private readonly int $rby
    ) {
        $this->width = $this->rbx - $this->ltx;
        $this->height = $this->rby - $this->lty;

        $this->centerX = (int)($this->ltx + $this->width / 2);
        $this->centerY = (int)($this->lty + $this->height / 2);
    }

    /**
     * @return int
     */
    public function ltx(): int
    {
        return $this->ltx;
    }

    /**
     * @return int
     */
    public function lty(): int
    {
        return $this->lty;
    }

    /**
     * @return int
     */
    public function rbx(): int
    {
        return $this->rbx;
    }

    /**
     * @return int
     */
    public function rby(): int
    {
        return $this->rby;
    }

    /**
     * @return int
     */
    public function width(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function height(): int
    {
        return $this->height;
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
}