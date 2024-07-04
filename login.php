<?php
// DB接続
include('functions.php');
$pdo = connect_to_db();

// SQL作成処理
$sql = 'SELECT pass, No FROM menber_list';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
};

// SQL実行の処理
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <fieldset id="login_area" class="login">
        <legend >Company page login</legend>
        <table class="contact-table">
            <tr>
                <th >社員番号</th>
                <td >
                    <input type="number" id="No" name="No" placeholder="">
                </td>
            </tr>
            <tr>
                <th >Pass</th>
                <td >
                    <input id="inputpass" type="password" name="pass" placeholder="英数小,大文字8～12桁">
                </td>
            </tr>
        </table>
        <div class="submitarea">
            <button class="button1" type="button" id="tologinbt" href="">login</button>
        </div>
        <div id="errormesseage" style="display: none;" class="errormesseage">
            <p>パスワードが違います！</p>
        </div>
        <!-- <a href="todo_read.php">一覧画面</a> -->
    </fieldset>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('#tologinbt').on('click', function() {
// ユーザーの入力値を取得
        let userNo = $('#No').val();
        console.log("ユーザー入力No:", userNo);
        let userInputPass = $('#inputpass').val();
        console.log("ユーザー入力パスワード:", userInputPass);
        // サーバーからのデータを取得
        const resultArray = <?= json_encode($result) ?>;
        console.log("サーバーデータ:", resultArray);

        // ユーザーの入力を整数に変換（数値の場合）
        let inputNo = parseInt(userNo, 10);

        // データベースから取得した"No"の値とユーザー入力した"No"の値が一致するものを探す
        let match = resultArray.find(item => item.No === inputNo);

        if (match) {
            console.log("一致するNoのpassが見つかりました:", match.pass);
            // ユーザー入力したパスワードとデータベースのパスワードが一致するか検証
            if (match.pass === userInputPass) {
                alert("ようこそ！");
                // 一致した場合、menu.phpへリダイレクト
                window.location.href = 'menu.php';
            } else {
             // Values don't match
            $('.errormesseage').show();
            setTimeout(function () {
                $('.errormesseage').hide();
            }, 2000); // Show error message div
            return false; // Prevent form submission
            }
        } else {
            console.log("一致するNoが見つかりませんでした:", inputNo);
            // Values don't match
            $('.errormesseage').show();
            setTimeout(function () {
                $('.errormesseage').hide();
            }, 2000); // Show error message div
            return false; // Prevent form submission
        }
    });
});
</script>
</body>
</html>

<!-- var_dump($result);
exit(); -->
