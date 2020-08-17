<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>csv_php_study</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css" type='text/css'>
</head>
<body>
  <div class="area">
  <?php
    include('prefecture.php');
    include('shop.php');

    $number = 1;
    foreach($areas as $area) { ?>
      <input type="radio" name="tab_name" id="tab<?php echo $number; ?>" <?php if ($number == 1) {echo "checked";} ?> >
      <label class="tab_class" for="tab<?php echo $number; ?>"><?php echo $area ?></label>
      <div class="content_class">
        <?php
          // 店舗ごとの情報出力
          foreach($per_district_shops[$number-1] as $shop) {
              $shop = array_diff($shop, array(""));
              foreach($shop as $v) {
                  echo $v . "<br/>";
              }
              if ($shop[8] != "") {
                  echo "<a href='" . $shop[8] . "' target='_blank'>MAP</a><br/>";
              } ?>
              <p>--------------------</p>
          <?php } ?>
      </div>
      <? $number++;
      next($areas);
    } ?>
  </div>
</body>
</html>
