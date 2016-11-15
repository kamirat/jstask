<?php

// 都道府県コード => 都道府県名
// 関東地方のみ
$prefectures = array(
  8  => "茨城県",
  9  => "栃木県",
  10 => "群馬県",
  11 => "埼玉県",
  12 => "千葉県",
  13 => "東京都",
  14 => "神奈川県",
);


// 観光スポットデータ
//   name   : スポットの名前
//   detail : スポットの説明
//   image  : スポットの画像ファイル名
//
// ここにデータが無い都道府県は、観光スポット無し、として処理してください。
$places = array(

  // 栃木県の観光スポット
  9 => array(
    array(
      'name'   => '西洋の邸宅',
      'detail' => '西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。',
      'image'  => 'place_4.jpg',
    ),
  ),

  // 群馬県の観光スポット
  10 => array(
    array(
      'name'   => '赤い門',
      'detail' => '赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。',
      'image'  => 'place_5.jpg',
    ),
  ),

  // 東京都の観光スポット
  13 => array(
    array(
      'name'   => '緑の階段',
      'detail' => '緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。',
      'image'  => 'place_1.jpg',
    ),
    array(
      'name'   => '雷門',
      'detail' => '雷門はとても良い所です。雷門はとても良い所です。雷門はとても良い所です。
                   雷門はとても良い所です。雷門はとても良い所です。雷門はとても良い所です。
                   雷門はとても良い所です。雷門はとても良い所です。',
      'image'  => 'place_6.jpg',
    ),
    array(
      'name'   => '東京タワー',
      'detail' => '東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。',
      'image'  => 'place_7.jpg',
    ),
  ),

  // 神奈川県の観光スポット
  14 => array(
    array(
      'name'   => '日本の城',
      'detail' => '日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。',
      'image'  => 'place_2.jpg',
    ),
    array(
      'name'   => '旅館の部屋',
      'detail' => '旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。',
      'image'  => 'place_3.jpg',
    ),
  ),
);

//選択された都道府県のコード
$pref ="";
if (isset($_POST["pref"]) && isset($prefectures[$_POST["pref"]])){
   $pref = $_POST['pref'];
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>関東地方の観光スポット検索</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

  <script>


  </script>

  <style>
    /*
      この課題では CSS を変更する必要はありません。
      デザインは支給されたものとして考えてください。
    */
    h1 {
      margin: 0 0 30px 0;
      padding: 20px 30px;
      border-bottom: 1px solid #ccc;
      background-color: #f8f8f8;
    }
    footer {
      text-align:center;
    }
    .search-result {
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <h1>関東地方の観光スポット検索</h1>
  <div class="container">
    <form class="form-inline" action="form2.php" method="post">
      <div class="form-group">
         <select name="pref" class="form-control">
          <OPTION value="">選択してください</OPTION>
          <?php foreach ($prefectures as $number => $prefecture): ?>
          <option value="<?php echo $number; ?>" <?php if ($pref == $number): ?> selected <?php endif ?> > <?php echo $prefecture; ?> </option>
          <?php endforeach ?>
          </select>
      </div>
      <input class="btn btn-primary btn-sm" type="button" value="検索">
    </form>

    <?php var_dump($_POST) ?>
  <?php if (isset($places[$pref])): ?>
      <p class="search-result"><?php echo $prefectures[$pref];?>の観光スポットは <?php echo count($places[$pref]);?> 件見つかりました。</p>

  <?php else: ?>
        <p class="search-result"><?php echo $prefecture[$pref];?>の観光スポットは見つかりませんでした｡</p>
  <?php endif ?>

    <?php foreach ($places as $place): ?>
      <?php foreach ($place as $name => $spot): ?>
        <div class="<?php echo $name ?>" style="display: none;">

        <div class="media">
          <div class="media-left">

            <img src="<?php echo $spot['image']; ?>" class="media-object img-thumbnail">
          </div>
          <div class="media-body">
            <h4 class="media-heading"><?php echo $spot['name']; ?></h4>
            <?php echo $spot['detail']; ?>

          </div>
        </div>

      <?php endforeach ?>
    <?php endforeach ?>

  </div>
  <hr>
  <footer>&copy; 観光スポット検索協会 </footer>
</body>


</html>
