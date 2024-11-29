<?php

declare(strict_types=1);

namespace Addequatte\PhotoBoxCentraze\Service;

use Addequatte\PhotoBoxCentraze\Data\TranslatePlan;
use Addequatte\PhotoBoxCentraze\Data\PositionedBox;
use Addequatte\PhotoBoxCentraze\Data\TranslatePhoto;

class CenterPhoto
{
    /**
     * @param TranslatePlan $plan
     * @param PositionedBox $positionedBox
     *
     * @return TranslatePhoto
     */
    public function center(TranslatePlan $plan, PositionedBox $positionedBox): TranslatePhoto
    {
        $photoW = $plan->photoWidth();
        $photoH = $plan->photoHeight();
        $centerX = $positionedBox->centerX();
        $centerY = $positionedBox->centerY();
        $boxWidth = $positionedBox->width();
        $boxHeight = $positionedBox->height();

        $boxPercent = max(($boxWidth / $plan->targetWidth()) * 100, ($boxHeight / $plan->targetHeight()) * 100);

        $targetBoxPercent = min($plan->targetBoxPercent(), $boxPercent);

        if ($photoW < $plan->targetWidth() || $photoH < $plan->targetHeight()) {
            $targetBoxPercent *= min($photoW / $plan->targetWidth(), $photoH / $plan->targetHeight());
        }

        $photoW *= $targetBoxPercent / $boxPercent;
        $photoH *= $targetBoxPercent / $boxPercent;

        $correction = max($photoH / $plan->photoHeight(), $photoW / $plan->photoWidth());

        $targetWidth = $plan->targetWidth();
        $targetHeight = $plan->targetHeight();

        $this->recalculateTarget($photoW, $photoH, $targetWidth, $targetHeight);

        $translateX = $this->calculateTranslate($centerX * $correction, $targetWidth, $photoW);
        $translateY = $this->calculateTranslate($centerY * $correction, $targetHeight, $photoH);

        return new TranslatePhoto(
            $translateX,
            $translateY,
            $centerX,
            $centerY,
            ($photoW / $targetWidth) * 100
        );
    }

    /**
     * @param float $centerFace
     * @param float $targetSize
     * @param float $photoSize
     *
     * @return float
     */
    private function calculateTranslate(float $centerFace, float $targetSize, float $photoSize): float
    {
        if ($centerFace - ($targetSize / 2) < 0 || $photoSize === $targetSize) {
            $translate = 0;
        } elseif ($centerFace + ($targetSize / 2) > $photoSize) {
            $translate = -((($photoSize - $targetSize) / $photoSize) * 100);
        } else {
            $translate = -((($centerFace - ($targetSize / 2)) / $photoSize) * 100);
        }

        return $translate;
    }

    /**
     * @param float $photoW
     * @param float $photoH
     * @param float $targetWidth
     * @param float $targetHeight
     *
     * @return void
     */
    private function recalculateTarget(float $photoW, float $photoH, float &$targetWidth, float &$targetHeight): void
    {
        if ($targetWidth > $photoW) {
            $targetHeight *= ($photoW / $targetWidth);
            $targetWidth = $photoW;
        }

        if ($targetHeight > $photoH) {
            $targetWidth *= ($photoH / $targetHeight);
            $targetHeight = $photoH;
        }
    }
}
