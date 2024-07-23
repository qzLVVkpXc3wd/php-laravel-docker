<head>
    @include('includeHead')
    <style>
        .bg-image {
            background-image: url("{{ asset('/img/emblem.png') }}");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
            padding: 1px;
            border-radius: 5px;
        }

        .bg-cover {
            background-color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>

<body>
    <div class="container bg-primary-subtle">
        <h1>
            合否結果
        </h1>
    </div>

    <div class="container">
        @if (empty($results))
            <details>
                <summary>該当する結果はありません。</summary>
            </details>
        @else
            <div class="container-fluid">
                <div class="accordion" id="examresult">
                    @foreach ($results as $index => $result)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="{{ '#' . $result->nys_sbt_cd }}" aria-expanded="false"
                                    aria-controls="{{ $result->nys_sbt_cd }}">
                                    {{ $result->nys_sbt_name }}
                                </button>
                            </h2>
                            <div id="{{ $result->nys_sbt_cd }}" class="accordion-collapse collapse"
                                data-bs-parent="#examresult">
                                <div class="accordion-body">
                                    @switch ($result->gohi_sbt_cd)
                                        @case('01')
                                            <div class="container mt-5 bg-image">
                                                <div class="bg-cover">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 col-md-8">
                                                            <h1 class="text-center">合 格 通 知</h1>
                                                            <div class="mt-5">
                                                                <div class="row mb-3 justify-content-end">
                                                                    <div class="col-12 col-md-5 text-right">
                                                                        {{ '受 験 番 号   ' . $result->juken_cd }}</div>
                                                                </div>
                                                                <div class="row mb-3 justify-content-end">
                                                                    <div class="col-12 col-md-5 text-right">
                                                                        {{ '氏　　　名   ' . $result->shigansya_sei_kanji . '　' . $result->shigansya_mei_kanji }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-5 text-right">
                                                                <p>{{ $result->nyushi_nendo }}年度{{ $result->nys_sbt_name }}の結果、{{ $result->print_gakka_name }}に{{ $result->gohi_sbt_disp_name }}したことを通知いたします。
                                                                </p>
                                                            </div>
                                                            <div class="mt-5">
                                                                <div class="row  justify-content-end">
                                                                    <div class="col-12 col-md-8 text-left">
                                                                        {{ date('Y年m月d日', strtotime($result->gohi_date)) }}
                                                                    </div>
                                                                    <div class="col-12 col-md-4 text-left">天使大学</div>
                                                                </div>
                                                                <div class="row justify-content-end">
                                                                    <div class="col-12 col-md-4 text-left">学長　田畑 邦治</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @break

                                        @case('02')
                                            <div class="container mt-5">
                                                <div class="bg-cover">
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 col-md-8">
                                                            <h1 class="text-center"><img src="{{ asset('/img/emblem.png') }}"
                                                                    width="70" height="70">不 合 格 通 知</h1>
                                                            <div class="mt-5">
                                                                <div class="row mb-3 justify-content-end">
                                                                    <div class="col-12 col-md-5 text-right">
                                                                        {{ '受 験 番 号   ' . $result->juken_cd }}</div>
                                                                </div>
                                                                <div class="row mb-3 justify-content-end">
                                                                    <div class="col-12 col-md-5 text-right">
                                                                        {{ '氏　　　名   ' . $result->shigansya_sei_kanji . '　' . $result->shigansya_mei_kanji }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-5 text-right">
                                                                <p>{{ $result->nyushi_nendo }}年度{{ $result->nys_sbt_name }}の結果、{{ $result->print_gakka_name }}に{{ $result->gohi_sbt_disp_name }}したことを通知いたします。
                                                                </p>
                                                            </div>
                                                            <div class="mt-5">
                                                                <div class="row  justify-content-end">
                                                                    <div class="col-12 col-md-8 text-left">
                                                                        {{ date('Y年m月d日', strtotime($result->gohi_date)) }}
                                                                    </div>
                                                                    <div class="col-12 col-md-4 text-left">天使大学</div>
                                                                </div>
                                                                <div class="row justify-content-end">
                                                                    <div class="col-12 col-md-4 text-left">学長　田畑 邦治</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @break

                                        @default
                                            <div class="container mt-5">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8">
                                                        <h3 class="text-center">合否発表前</h3>
                                                    </div>
                                                </div>
                                            </div>
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</body>
