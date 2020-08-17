<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
  <h1>TOPページ</h1>
  <div class="area_list">
    <p>都道府県リスト</p>
  <?php
    include('prefecture.php');
    $number = 0;

    foreach($areas as $area) { ?>
      <div><?= $area; ?>
        <?
          foreach($per_district_records[$number] as $record) { ?>
            <a href="shop_list.php#<?= $record[1]; ?>"><?= $record[0]; ?></a>
          <? }
          $number++; ?>
      </div>
    <?}
  ?>
  </div>
</body>
</html>
