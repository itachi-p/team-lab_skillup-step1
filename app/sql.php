<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try {
    // DBに接続する
    $dbh = new PDO($dsn, $user, $pass);

    // ここでクエリ実行する
    // queryメソッド(SELECT)
    $query_result = $dbh->query('SELECT * FROM test_comments');
    foreach($query_result as $row) {
        print $row["name"] . ": " . $row["text"] . "<br/>";
    }    

    // prepareメソッド(INSERT)
    $sth = $dbh->prepare('INSERT INTO test_comments (name, text) VALUES (?, ?)');
    $rand_num = strval(mt_rand(00, 99));
    $name = "John #$rand_num";
    $rand_str = chr(mt_rand(65,90)) . chr(mt_rand(65,90)) . chr(mt_rand(65,90));
    $text = "3-character random string: $rand_str";
    $sth->execute(array($name, $text));

    // prepareメソッド(SELECT)
    $sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name = ?');
    $name = "狐耳のおじさん";
    $sth_select->execute(array($name));
    $prepare_result = $sth_select->fetchAll();
    foreach($prepare_result as $row) {
        print $row["name"] . ": " . $row["text"] . "<br/>";
    }
    $sth_select->execute(array($name));

    // DBを切断する
    $dbh = null;

} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}

?>