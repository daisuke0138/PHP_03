<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/top.css">
    <title>社員情報登録・編集</title>
</head>
<body>
    <button class="button" type="button" id="logoutbt" onclick="window.location.href='menu.php'">Menuへ</button>

<!-- 社員情報の検索 -->
<div class="editbt">
    <form id="searchForm">
        <label for="searchNo">社員番号検索</label>
        <input type="text" id="searchNo" name="searchNo" required>
        <button type="submit">検索</button>
    </form>
</div>
<!-- 社員情報の表示、編集 -->
    <form id="logindata" class="logindata" action="edit_update.php" method="POST">
        <fieldset id="first_login" class="result_table">
            <legend >情報登録・編集</legend>
            <div id="result"></div>
        </fieldset>
        <button type="submit">更新</button>
    </form>
    <form id="edit_delete" class="edit_delete" action="edit_delete.php" method="GET">
        <button type="submit">削除</button>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(event) {
                event.preventDefault();
                let searchNo = $('#searchNo').val();
                axios.get('edit_search.php', {
                    params: {
                    searchNo: searchNo
                    }
                })
                .then(function(response) {
                    $('#result').html(response.data);
                })
                .catch(function(error) {
                    $('#result').html('データの取得に失敗しました。');
                    console.error(error);
                });
            });
        });

        $('#logindata').on('submit', function(event) {
            event.preventDefault();
            let formData = {};
                $('#result input , #result textarea').each(function() {
                    formData[this.name] = $(this).val();
                });
                axios.post('edit_update.php', formData)
                .then(function(response) {
                    alert('データが更新されました。');
                    console.log(formData);
                    // window.location.href = 'edit_update.php';
                })
                .catch(function(error) {
                    alert('データの更新に失敗しました。');
                    console.error(error);
                });
            });

        $('#edit_delete').on('submit', function(event) {
            event.preventDefault();
            let formDelet = $(this);
            let NoValue = $('#result input[name="No"]').val();

            if(NoValue) {
                $('<input>').attr({
                    name: 'No',
                    value: NoValue
                }).appendTo(formDelet);

                this.submit();
                alert('データが削除されました。');
            } else {
                alert('削除するデータが選択されていません。');
            }
        });
    </script>
</body>
</html>