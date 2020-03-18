<!DOCTYPE html>
<html>
    <body>
        <form action='/list' method='POST'>
        @if (array_key_exists('search_file', $_POST)) 
            検索条件入力：<input type='text' name='search_file' value="{{$_POST['search_file']}}">
        @else 
            検索条件入力：<input type='text' name='search_file'>
        @endif
        <input type='submit' value='検索'><br>
        
        
        </form>
        <form action="/delete" method="post">
        <input type="submit" value="削除"></input><br>
        @if ($page > $maxpage) 
            <p>データがありません。</p>
        @endif
        @for ($index = 0; $index < $limit; $index++)
                @if (($start + $index + 1) <= $cnt)
                    <a href= "/contents?text={{basename($list[$index])}}">{{basename($list[$index])}}</a>
                    <input type="checkbox" name="filename[]" value="{{basename($list[$index])}}"></input><br>
                @endif
        @endfor
        </form>
        @if ($page > 1)
            <a href="/list?page=($page - 1)">前へ</a>
        @endif
            <a href="/list?page={{$page_num}}">{{$page_num}}</a>
        @if ($page < $maxpage)
            <a href="/list?page=($page + 1)">次へ</a>
        @endif
        <br>
        <input type="submit" onclick="location.href='./input'" value="追加">
        <input type="submit" onclick="location.href='./logout'" value="ログアウト">
    </body>
</html>