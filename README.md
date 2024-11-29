### Allows you to center the photo on a given area, such as the coordinates of the face. You can specify the percentage of face filling in the final photo, which you can set yourself.

## Installation
 ```bash	
 composer require addequatte/photo-box-centering
 ```

## For example

```php
/**
 * public/index.php
 */
use Addequatte\PhotoBoxCentering\Data\TranslatePlan;

$photoUrl = 'data:image/png;base64, ' . base64_encode(file_get_contents(__DIR__ . '/pic.jpg'));
$photoWidth = 1280;
$photoHeight = 720;

$targetWidth = 200;
$targetHeight = 200;

$targetBoxPercent = 40;

$translatePlan = new TranslatePlan($photoWidth, $photoHeight, $targetWidth, $targetHeight, $targetBoxPercent);

// Face coordinates on photo
$positionedBox = new PositionedBox(635, 100, 785, 315);

$photoTranslater = new PhotoTranslater();

$translatePhoto = $photoTranslater->center($translatePlan, $positionedBox);

$translateX = $translatePhoto->translateX();
$translateY = $translatePhoto->translateY();

$scale = $translatePhoto->scale();

```
```html
<div class="photo_box" 
     style="overflow: hidden;
        width:{{ targetBoxWidth }}px;
        height:{{ targetBoxHeight }}px;" >
    <img 
            src="{{ photoUrl }}" 
            style="min-width:100%; 
            min-height:100%; 
            width:{{ scale }}%;
            transform:translate({{ translateX }}%, {{ translateY }}%)">
</div>
```