<!DOCTYPE html>
<html>
    <body>
    @if ($_POST['text'] == '') 
        本文を入力してください。<br>
        <a href="/input">入力画面はこちら</a>
    @else
        <p>保存しました</p><br>
        <a href="/input">入力画面はこちら</a><br>
        <a href="/list">一覧はこちら</a>
    @elseend
    @endif
    </body>
    </html>