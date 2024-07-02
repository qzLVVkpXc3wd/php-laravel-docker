<x-layout>

    <head>
        <title>検索フォーム</title>
    </head>

    <body>
        <form action="/search" method="POST">
            @csrf
            <input type="google_account" name="param" placeholder="検索条件を入力">
            <button type="submit">検索</button>
        </form>
    </body>
</x-layout>
