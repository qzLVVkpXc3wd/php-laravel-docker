<x-layout>
    <div class="w-75">
        <h1>入力内容の確認</h1>
        @if ($results->isEmpty())
            <details>
                <summary>該当する結果はありません。</summary>
            </details>
        @else
            <h2>選抜状況</h2>
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
                        <div id={{ $result->nys_sbt_name }} class="accordion-collapse collapse" data-bs-parent="#status">
                            <div class="accordion-body">
                                <p>志望学科{{ $result->gakka_cd_1 }}</p>
                                <p>試験会場{{ $result->kaijo_cd }}</p>
                                <p>決済ステータス{{ $result->res_result }}</p>
                                <p>支払日時{{ $result->shiharai_date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <h2>本人情報</h2>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-1 my-box">{{ $result->shigansya_sei_kana }}</div>
                    <div class="col-1 my-box">{{ $result->shigansya_mei_kana }}</div>
                    <div class="col-3 my-box">{{ $result->honnin_birthday }}生</div>
                    <div class="col-3 my-box">本人携帯電話番号：{{ $result->honnin_keitai_tel }}</div>
                </div>
                <div class="row">
                    <div class="col-1 my-box">{{ $result->shigansya_sei_kanji }}</div>
                    <div class="col-1 my-box">{{ $result->shigansya_mei_kanji }}</div>
                    <div class="col-3 my-box">{{ $result->honnin_mailaddress }}</div>
                    <div class="col-3 my-box">自宅携帯電話番号：{{ $result->honnin_jitaku_tel }}</div>
                </div>
                <div class="row">
                    <div class="col-2 my-box">〒{{ $result->honnin_yubin }}</div>
                </div>
                <div class="row">
                    <div class="col-3 my-box">{{ $result->honnin_address_kana_1 }}</div>
                    <div class="col-3 my-box">{{ $result->honnin_address_kana_2 }}</div>
                </div>
                <div class="row">
                    <div class="col-3 my-box">{{ $result->honnin_address_1 }}</div>
                    <div class="col-3 my-box">{{ $result->honnin_address_2 }}</div>
                </div>
            </div>
            <h2>出身校情報</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 my-box">{{ $result->shushinko_address }} {{ $result->shushinko_name }}
                        {{ $result->shushinko_katei }} {{ $result->shushinko_gakka }}</div>
                    <div class="col-1 my-box">{{ $result->shushinko_bunri }}</div>
                    <div class="col-2 my-box">
                        {{ $result->shushinko_nyugak_nengetu }}　～　{{ $result->shushinko_sotugyo_nengetu }}</div>
                </div>
            </div>
            <h2>保護者情報</h2>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-1 my-box">{{ $result->hogosha_sei_kana }}</div>
                    <div class="col-1 my-box">{{ $result->hogosha_mei_kana }}</div>
                    <div class="col-3 my-box"></div>
                    <div class="col-3 my-box">保護者自宅電話番号：{{ $result->hogosha_jitaku_tel }}</div>
                </div>
                <div class="row">
                    <div class="col-1 my-box">{{ $result->hogosha_sei_kanji }}</div>
                    <div class="col-1 my-box">{{ $result->hogosha_mei_kanji }}</div>
                    <div class="col-3 my-box">{{ $result->hogosha_zokugara }}</div>
                    <div class="col-3 my-box">保護者携帯電話番号：{{ $result->hogosha_keitai_tel }}</div>
                </div>
                <div class="row">
                    <div class="col-2 my-box">〒{{ $result->hogosha_yubin }}</div>
                </div>
                <div class="row">
                    <div class="col-3 my-box">{{ $result->hogosha_address_kana_1 }}</div>
                    <div class="col-3 my-box">{{ $result->hogosha_address_kana_2 }}</div>
                </div>
                <div class="row">
                    <div class="col-3 my-box">{{ $result->hogosha_address_1 }}</div>
                    <div class="col-3 my-box">{{ $result->hogosha_address_2 }}</div>
                </div>
            </div>
        @endif
    </div>
</x-layout>
