<?php


use Addequatte\PhotoBoxCentering\Data\PositionedBox;
use Addequatte\PhotoBoxCentering\Data\TranslatePlan;
use Addequatte\PhotoBoxCentering\Service\CenterPhoto;

require_once __DIR__ . '/../vendor/autoload.php';

$photoUrl = 'data:image/png;base64, ' . base64_encode(file_get_contents(__DIR__ . '/pic.jpg'));
$photoWidth = 1280;
$photoHeight = 720;

$targetWidth = 200;
$targetHeight = 200;

$targetBoxPercent = 40;

$translatePlan = new TranslatePlan($photoWidth, $photoHeight, $targetWidth, $targetHeight, $targetBoxPercent);

// Face coordinates on photo
$positionedBox = new PositionedBox(635, 100, 785, 315);

$photoTranslater = new CenterPhoto();

$translatePhoto = $photoTranslater->center($translatePlan, $positionedBox);

$translateX = $translatePhoto->translateX();
$translateY = $translatePhoto->translateY();

$scale = $translatePhoto->scale();

include(__DIR__ . '/index.phtml');
