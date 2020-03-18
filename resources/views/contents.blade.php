<!DOCTYPE html>
<html>
    <body>
    @if (array_key_exists('text', $_GET))
        ニックネーム：{{$filecontent[0]}}
        <hr>
        タイトル：{{$filecontent[1]}}
        <hr>
        コメント：{{$filecontent[2]}}<br>
        <a href="/list">一覧はこちら</a>
    @else
        データがありません。<br>
        <a href="/list">一覧はこちら</a>
    @endelse
    @endif
    </body>
</html>