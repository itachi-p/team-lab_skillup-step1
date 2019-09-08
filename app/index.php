<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>POSTのサンプル</title>
  </head>
  <body>
    <?php
      //commentがPOSTされているなら
      if(isset($_POST["comment"])){
        //エスケープしてから表示
        $comment = htmlspecialchars($_POST["comment"]);
        $name = htmlspecialchars($_POST["name"]);
        print("こんにちは、$name さん。　あなたのコメントは「 ${comment} 」です。");
      } else {
    ?>
        <p>コメントしてください。</p>
        <form method="POST" action="index.php">
          <input name="comment" />
          <input name="name" />
          <input type="submit" value="送信" />
        </form>
    <?php
      }
    ?>
  </body>
</html>