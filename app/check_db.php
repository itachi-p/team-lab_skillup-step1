<?php echo '<p>PHP画面</p>'; ?>
<?php
echo '<p>Postgresへの接続テストコード</p>';
$dsn = 'pgsql:dbname=postgres;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';
try {
    $dbh = new PDO($dsn, $user, $pass);
    $sql = 'SELECT CURRENT_TIMESTAMP';
    foreach ($dbh->query($sql) as $row) {
        print "接続できている。<br/>現在時間は" . $row[0] . "です。\n";
    }
    $dbh = null;
} catch (PDOException $e){
    print('接続できていない。理由は以下<br/>[ERROR] ' . $e->getMessage() . "\n");
    die();
}
?>
