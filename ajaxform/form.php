<?php

// エスケープ処理
// htmlspecialchars($s, ENT_QUOTES, "UTF-8");

function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

// エラーメッセージ
$err_msg = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  // エラー
  if ($_POST["name"] == "") {
    $err_msg['name'] = "お名前を入力してください｡";
  }


  if ($_POST["comment"] == "") {
    $err_msg['comment'] = "コメントを入力してください｡";
  }

  // エラーが無ければ送信
  if (count($err_msg) == 0) {


  }
}
    // echo '成功しました！';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap.min.css">
      <title>コメントフォーム</title>
  </head>
  <body>
    <div class="container">
      <div class="col-md-4">
        <h3>コメント</h3>
<!--         <form action="post.php" method="post">
 -->          <div class="form-group">
           お名前:<br>
           <input type="text" class="form-control" name="name" value="<?php if(isset($_POST["name"])){ echo h($_POST['name']);}?>">
          <?php // エラーメッセージがある場合
          if (isset($err_msg['name'])): ?>
          <p style="color:red;">
          <?php echo $err_msg['name'] ?>
          </p>
          <?php endif ?>
           コメント:<br>
           <textarea class="form-control" name="comment"><?php if(isset($_POST["comment"])){ echo h($_POST["comment"]);} ?></textarea>
          <?php // エラーメッセージがある場合
          if (isset($err_msg['comment'])): ?>
          <p style="color:red;">
          <?php echo $err_msg['comment'] ?>
          </p>
          <?php endif ?>
          </div> <!-- end of form -->
        <button type="submit" class="btn" name="submit">送信</button>
        <!-- </form> -->

        <hr>
        <h3>コメント一覧</h3>
        <div id="no-comment" style="display: none;">
        コメントはありません｡
        </div>
        <div class="" id="commentslist">

        </div>


      </div><!-- end of column -->
    </div>
    <script>
      // ドキュメントが読み込まれた際
      $(document).ready(function(){
          // 送信ボタンを押したら sendComment() を実行
          $('input#send-comment').click(function(){
              sendComment();
          });
          // 既存のコメントを読み込んで表示
          getComment();
      });
      // コメント送信（書き込み）
      function sendComment() {
          $.post(
              'post.php',
              {
                  'name': $('input[name=name]').val(),
                  'comment': $('input[name=comment]').val()
              },
              function(data){
                  // 書き込みが完了したら再度コメント一覧を読み込む
                  getComment();
                  $('#no-comment').hide('slow');
                  $('#commentslist').show('slow');
              }
          );
      }
      // コメント一覧受信・表示
      function getComment() {
          $.get(
              'comment.php',
              null,
              function(data){
                  // コメントリスト
                  $('#commentslist').html('');
                  var json = JSON.parse(data);
                  if (json.length >= 1) {
                      var str;
                      for (var i = 0, len = json.length; i < len; i++) {
                          str = json[i]['name'] + 'さん　' + json[i]['comment'];
                          $('#commentslist').append($('<p/>').text(str));
                      }
                      $('#commentslist').show();
                  }
              }
          );
      }
    </script>
  </body>
</html>