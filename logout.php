<?php
// ログアウト処理
session_start();
session_destroy();
header('Location: top_input.php');
exit;