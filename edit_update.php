<?php
// DB接続
include("functions.php");
$pdo = connect_to_db();

// var_dump($_POST);
// exit();

// データ検証
if (
  !isset($_POST['No']) || $_POST['No'] === '' ||
  !isset($_POST['name']) || $_POST['name'] === '' ||
  !isset($_POST['department']) || $_POST['department'] === '' ||
  !isset($_POST['class']) || $_POST['class'] === '' ||
  !isset($_POST['skill']) || $_POST['skill'] === '' ||
  !isset($_POST['hobby']) || $_POST['hobby'] === ''
) {
  exit('paramError');
}

// POSTデータの取得
$No = $_POST['No'];
$name = $_POST['name'];
$department = $_POST['department'];
$class = $_POST['class'];
$skill = $_POST['skill'];
$hobby = $_POST['hobby'];

// SQL作成処理
$sql = 'UPDATE menber_list SET name = :name, department = :department, class = :class, skill = :skill, hobby = :hobby, updated_at=now() WHERE No = :No';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':No', $No, PDO::PARAM_INT);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':department', $department, PDO::PARAM_STR);
$stmt->bindParam(':class', $class, PDO::PARAM_STR);
$stmt->bindParam(':skill', $skill, PDO::PARAM_STR);
$stmt->bindParam(':hobby', $hobby, PDO::PARAM_STR);

try {
  $stmt->execute();
  echo json_encode(["status" => "success"]);
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:menberlist.php");
exit();

// echo "<pre>";
// var_dump($record);
// echo "</pre>";
// exit();