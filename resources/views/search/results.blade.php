<head>
    @include('includeHead')
</head>

<body>
    <div class="container bg-primary-subtle">
        <h1>
            入力内容の確認
        </h1>
    </div>

    <div class="container">
        @if ($results->isEmpty())
            <details>
                <summary>該当する結果はありません。</summary>
            </details>
        @else
            <h2 class="mt-3">出願状況</h2>
            @foreach ($results as $result)
                <div class="accordion" id="status">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                data-bs-target={{ '#' . $result->nys_sbt_name }} aria-expanded="true"
                                aria-controls={{ $result->nys_sbt_name }}>
                                {{ $result->nys_sbt_name }}
                            </button>
                        </h2>
                        <div id="{{ $result->nys_sbt_name }}" class="accordion-collapse collapse"
                            data-bs-parent="#status">
                            <div class="accordion-body">
                                <p>決済ステータス：{{ $result->res_result }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <h2 class="mt-3">本人情報</h2>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto my-box">{{ $result->shigansya_sei_kana }}</div>
                    <div class="col-auto my-box">{{ $result->shigansya_mei_kana }}</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">{{ $result->shigansya_sei_kanji }}</div>
                    <div class="col-auto my-box">{{ $result->shigansya_mei_kanji }}</div>
                    <div class="col-1"></div>
                    <div class="col-auto my-box">{{ $result->honnin_birthday }}生</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">携帯：{{ $result->honnin_keitai_tel }}</div>
                    <div class="col-auto my-box">自宅：{{ $result->honnin_jitaku_tel }}</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">{{ $result->honnin_mailaddress }}</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">〒{{ $result->honnin_yubin }}</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">
                        {{ $result->honnin_address_kana_1 . '　' . $result->honnin_address_kana_2 }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">
                        {{ $result->honnin_address_1 . '　' . $result->honnin_address_2 }}
                    </div>
                </div>
            </div>
            <h2 class="mt-3">出身校情報</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-automy-box">{{ $result->shushinko_address }}
                        {{ $result->shushinko_name . '高等学校' }}
                        {{ $result->shushinko_katei }} {{ $result->shushinko_gakka }}
                    </div>
                    <div class="col-auto my-box">
                        {{ date('Y年m月d日', strtotime($result->shushinko_nyugak_nengetu)) }}　～　{{ date('Y年m月d日', strtotime($result->shushinko_sotugyo_nengetu)) }}
                    </div>
                </div>
            </div>
            <h2 class="mt-3">保護者情報</h2>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto my-box">{{ $result->hogosha_sei_kana }}</div>
                    <div class="col-auto my-box">{{ $result->hogosha_mei_kana }}</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">{{ $result->hogosha_sei_kanji }}</div>
                    <div class="col-auto my-box">{{ $result->hogosha_mei_kanji }}</div>
                    <div class="col-1"></div>
                    <div class="col-auto my-box">{{ $result->hogosha_zokugara }}</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">携帯：{{ $result->hogosha_keitai_tel }}</div>
                </div>
                <div class="row">

                    <div class="col-auto my-box">自宅：{{ $result->hogosha_jitaku_tel }}</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">〒{{ $result->hogosha_yubin }}</div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">
                        {{ $result->hogosha_address_kana_1 . '　' . $result->hogosha_address_kana_2 }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto my-box">
                        {{ $result->hogosha_address_1 . '　' . $result->hogosha_address_2 }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</body>
