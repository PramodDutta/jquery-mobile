<?php
$img_base_url = "https://github.com/JeffreyWay/Tuts----jQuery-Mobile-RSS-Reader/tree/master/img";
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo isset($siteName) ? ucWords($siteName) : 'Tuts+'; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="<?php print $img_base_url;?>/tutsTouchIcon.png" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0-rc.1/jquery.mobile-1.1.0-rc.1.min.css" />
  <link rel="stylesheet" href="custom.css" />
  <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.1.0-rc.1/jquery.mobile-1.1.0-rc.1.min.js"></script>
</head>