<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div>🐱🐱🐱ぬこ🐱🐱🐱ねこ🐱🐱🐱</div>
<?php
try {
    $dsn = sprintf(
        'mysql:dbname=%s;host=%s;charset=utf8mb4',
        getenv('MYSQL_DATABASE'),
        getenv('DATABASE_HOST')
    );

    $pdo = new \PDO(
        $dsn,
        getenv('MYSQL_USER'),
        getenv('MYSQL_PASSWORD')
    );

    $sql = 'INSERT INTO users (lock_version) VALUES(0)';

    $statement = $pdo->prepare($sql);
    $statement->execute();

    $sql = 'SELECT id FROM users';
    $statement = $pdo->prepare($sql);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo 'ぬこ🐱が' . implode(',', $row) . '匹' . PHP_EOL;
    }
} catch (\Exception $e) {
  var_dump($e->getMessage());
}
?>
<?php echo phpinfo(); ?>
</body>
</html>
