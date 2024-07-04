<?php

// DB接続
include('functions.php');
$pdo = connect_to_db();

// SQL作成処理
$sql = 'SELECT * FROM menber_list WHERE deleted_at IS NULL';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
};

// SQL実行の処理
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["No"]}</td>
      <td>{$record["name"]}</td>
      <td>{$record["department"]}</td>
      <td>{$record["class"]}</td>
      <td>{$record["skill"]}</td>
      <td>{$record["hobby"]}</td>
      <td>{$record["photo"]}</td>
    </tr>
  ";
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/menberlist.css">
  <title>menberlist</title>
</head>

<body>
  <fieldset>
    <legend>menberlist</legend>
    <a href="menu.php">menu画面へ</a>
    <table border='3'>
      <thead>
        <tr>
          <th>社員No.</th>
          <th>氏名</th>
          <th>所属</th>
          <th>職能</th>
          <th>業務経歴</th>
          <th>趣味</th>
          <th>写真</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>
</html>