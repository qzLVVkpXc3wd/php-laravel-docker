<head>
    @include('includeHead')
</head>

<body>
    <div class="container">
        @if (empty($results))
            <h2>
                該当する結果はありません。
            </h2>
        @else
            <div class="container-fluid">
                @php
                    $flg = false;
                @endphp
                @foreach ($results as $index => $result)
                    @if ($result->gohi_sbt_cd == '01')
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <h1 class="text-center">入 学 許 可 書</h1>
                                    <div class="mt-5">
                                        <div class="row mb-3 justify-content-end">
                                            <div class="col-5 text-right">
                                                {{ '受 験 番 号   ' . $result->juken_cd }}
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-end">
                                            <div class="col-5 text-right">
                                                {{ '氏　　　名   ' . $result->shigansya_sei_kanji . '　' . $result->shigansya_mei_kanji }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 text-right">
                                        <p>{{ $result->nyushi_nendo }}年度 {{ $result->print_gakka_name }}に入学を許可いたします。
                                        </p>
                                    </div>
                                    <div class="mt-5">
                                        <div class="row mb-3 justify-content-end">
                                            <div class="col-8 text-right">
                                                {{ date('Y年m月d日', strtotime($result->gohi_date)) }}
                                            </div>
                                            <div class="col-4 text-left">
                                                天使大学
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-end">
                                            <div class="col-4 text-left">学長　田畑 邦治</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $flg = true;
                        @endphp
                    @break
                @endif
            @endforeach
            @if ($flg == false)
                <h2>
                    該当する結果はありません。
                </h2>
            @endif
            </div>
        @endif
    </div>
</body>
