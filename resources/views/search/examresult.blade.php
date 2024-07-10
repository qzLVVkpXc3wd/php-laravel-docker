<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1></h1>
    @if (empty($result))
        <details>
            <summary>該当する結果はありません。</summary>
        </details>
    @elseif($result->gohi_sbt_cd == '01')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center">合 格 通 知 書</h1>
                    <div class="mt-5">
                        <div class="row mb-3 justify-content-end">
                            <div class="col-5 text-right">{{ '受 験 番 号   ' . $result->juken_cd }}</div>
                        </div>
                        <div class="row mb-3 justify-content-end">
                            <div class="col-5 text-right">
                                {{ '氏　　　名   ' . $result->shigansya_sei_kanji . '　' . $result->shigansya_mei_kanji }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-right">
                        <p>{{ $result->nyushi_nendo }}年度{{ $result->nys_sbt_name }}の結果、{{ $result->print_gakka_name }}に{{ $result->gohi_sbt_disp_name }}したことを通知いたします。
                        </p>
                    </div>
                    <div class="mt-5">
                        <div class="row mb-3 justify-content-end">
                            <div class="col-8 text-right">
                                {{ date('Y年m月d日', strtotime($result->gohi_date)) }}
                            </div>
                            <div class="col-4 text-left">天使大学</div>
                        </div>
                        <div class="row mb-3 justify-content-end">
                            <div class="col-4 text-left">学長　田畑 邦治</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center">不 合 格 通 知 書</h1>
                    <div class="mt-5">
                        <div class="row mb-3 justify-content-end">
                            <div class="col-5 text-right">{{ '受 験 番 号   ' . $result->juken_cd }}</div>
                        </div>
                        <div class="row mb-3 justify-content-end">
                            <div class="col-5 text-right">
                                {{ '氏　　　名   ' . $result->shigansya_sei_kanji . '　' . $result->shigansya_mei_kanji }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-right">
                        <p>{{ $result->nyushi_nendo }}年度{{ $result->nys_sbt_name }}の結果、{{ $result->print_gakka_name }}に{{ $result->gohi_sbt_disp_name }}したことを通知いたします。
                        </p>
                    </div>
                    <div class="mt-5">
                        <div class="row mb-3 justify-content-end">
                            <div class="col-8 text-right">
                                {{ date('Y年m月d日', strtotime($result->gohi_date)) }}
                            </div>
                            <div class="col-4 text-left">天使大学</div>
                        </div>
                        <div class="row mb-3 justify-content-end">
                            <div class="col-4 text-left">学長　田畑 邦治</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</body>
