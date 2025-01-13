<?php


use Addequatte\PhotoBoxCentering\Data\PositionedBox;
use Addequatte\PhotoBoxCentering\Data\TranslatePlan;
use Addequatte\PhotoBoxCentering\Service\PhotoTranslator;

require_once __DIR__ . '/../vendor/autoload.php';

$photoUrl = 'data:image/png;base64, ' . base64_encode(file_get_contents(__DIR__ . '/pic.jpg'));
$photoWidth = 1280;
$photoHeight = 720;

$targetWidth = $_GET['w'] ?? 200;
$targetHeight = $_GET['h'] ?? 200;

$targetBoxPercent = $_GET['p'] ?? 40;

$translatePlan = new TranslatePlan($photoWidth, $photoHeight, $targetWidth, $targetHeight, $targetBoxPercent);

// Face coordinates on photo
$positionedBox = new PositionedBox(635, 100, 785, 315);

$photoTranslator = new PhotoTranslator();

$translatePhoto = $photoTranslator->center($translatePlan, $positionedBox);

$translateX = $translatePhoto->translateX();
$translateY = $translatePhoto->translateY();

$scale = $translatePhoto->scale();

include(__DIR__ . '/index.phtml');
