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

  <?php if (isset($places[$pref])): ?>
      <p class="search-result"><?php echo $prefectures[$pref];?>の観光スポットは <?php echo count($places[$pref]);?> 件見つかりました。</p>

  <?php else: ?>
        <p class="search-result"><?php echo $prefecture[$pref];?>の観光スポットは見つかりませんでした｡</p>

  <?php endif ?>

        <div class="spot_tochigi" style="display: none;">
          <div class="media">
            <div class="media-left">

            <img src="place_4.jpg" class="media-object img-thumbnail">
          </div>
          <div class="media-body">
            <h4 class="media-heading">西洋の邸宅</h4>
            西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
            </div>
          </div>
        </div>

        <div class="spot_gunma" style="display: none;">
        <div class="media">
          <div class="media-left">

            <img src="place_5.jpg" class="media-object img-thumbnail">
          </div>
          <div class="media-body">
            <h4 class="media-heading">赤い門</h4>
            赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。
              </div>
            </div>
          </div>

        <div class="spot_tokyo" style="display: none;">
        <div class="media">
          <div class="media-left">

            <img src="place_1.jpg" class="media-object img-thumbnail">
          </div>
          <div class="media-body">
            <h4 class="media-heading">緑の階段</h4>
            緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。
              </div>
            </div>

        <div class="media">
          <div class="media-left">

            <img src="place_6.jpg" class="media-object img-thumbnail">
          </div>
          <div class="media-body">
            <h4 class="media-heading">雷門</h4>
            雷門はとても良い所です。雷門はとても良い所です。雷門はとても良い所です。
                   雷門はとても良い所です。雷門はとても良い所です。雷門はとても良い所です。
                   雷門はとても良い所です。雷門はとても良い所です。
          </div>
        </div>

        <div class="media">
          <div class="media-left">

            <img src="place_7.jpg" class="media-object img-thumbnail">
          </div>
          <div class="media-body">
            <h4 class="media-heading">東京タワー</h4>
            東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。
          </div>
        </div>
      </div>

        <div class="spot_kanagawa" style="display: none;">
        <div class="media">
          <div class="media-left">

            <img src="place_2.jpg" class="media-object img-thumbnail">
          </div>
          <div class="media-body">
            <h4 class="media-heading">日本の城</h4>
            日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。
          </div>
        </div>

        <div class="media">
          <div class="media-left">

            <img src="place_3.jpg" class="media-object img-thumbnail">
          </div>
          <div class="media-body">
            <h4 class="media-heading">旅館の部屋</h4>
            旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
          </div>
        </div>
      </div>


  </div>
  <hr>
  <footer>&copy; 観光スポット検索協会 </footer>

    <script>
    // $(function(){
    //     $("input[type=button]").click(function(){
    //         $(".form-inline").submit();
    //     });
    // });
    $(".form-control").change(function() {
      // var form_val = $(".form-control").val();
      // if(form_val == "9") {
      //   $('.tochigi').css('display', 'block');
      // }else if(form_val == "10") {
      //   $('.gunma').css('display', 'block');
      // }else if(form_val == "13") {
      //   $('.tokyo').css('display', 'block');
      // }else if(form_val == "14") {
      //   $('.kanagawa').css('display', 'block');
      // }

      /* 選択したselectボックスのvalue値を取得して、変数valに入れる */
        var val = $(this).val();
        /* 変数valの値ごとに、処理をswichでふりわけ */
        switch (val) {
            case '9':
                /* #box1を表示 */
                $('.spot_tochigi').show();
                /* divのidに「box」を含むid名がついているもので、box1じゃないものは非表示 */
                $('div[class^="spot"]:not(".spot_tochigi")').hide();
            break;
            case '10':
                /* #box2を表示 */
                $('.spot_gunma').show();
                /* divのidに「box」を含むid名がついているもので、box2じゃないものは非表示 */
                $('div[class^="spot"]:not(".spot_gunma")').hide();
            break;
            case '13':
                /* #box2を表示 */
                $('.spot_tokyo').show();
                /* divのidに「box」を含むid名がついているもので、box2じゃないものは非表示 */
                $('div[class^="spot"]:not(".spot_tokyo")').hide();
            break;
            case '14':
                /* #box2を表示 */
                $('.spot_kanagawa').show();
                /* divのidに「box」を含むid名がついているもので、box2じゃないものは非表示 */
                $('div[class^="spot"]:not(".spot_kanagawa")').hide();
            break;
            /* caseで設定した以外の処理 */
            default:
                /* divのidに「box」を含むid名がついているものは非表示 */
                $('div[class^="spot"]').hide();
        }
    });

  </script>
</body>


</html>
