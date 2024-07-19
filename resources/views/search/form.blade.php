<head>
    @include('includeHead')
</head>

<body>
    <div class="container bg-primary-subtle">
        <h1>
            検索フォーム
        </h1>
    </div>

    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="row">
                <label>登録情報の確認</label>
                <form action="/search" method="POST">
                    @csrf
                    <input type="google_account" name="param" placeholder="検索条件を入力">
                    <button type="submit">POST</button>
                </form>
            </div>
            <div class="row">
                <label>受験票</label>
                <form action="/exam" method="POST">
                    @csrf
                    <input type="google_account" name="param" placeholder="検索条件を入力">
                    <button type="submit">POST</button>
                </form>
            </div>
            <div class="row">
                <label>合否</label>
                <form action="/examresult" method="POST">
                    @csrf
                    <input type="google_account" name="param" placeholder="検索条件を入力">
                    <button type="submit">POST</button>
                </form>
            </div>
        </div>
    </div>
</body>
