<!DOCTYPE html>
<html lang="ja">
  <head>
    @include('includeHead')
    <script type="text/javascript" src="{{asset('/js/edit_applicant_info.js')}}"> </script>
  </head>
  <body>
    @include('nav')
    <header>
      <div class="title mb-4">
        <h1>登録情報修正</h1>
      </div>
    </header>
    
    <div class="main-contents">
      <div class="alert alert-success" id="success-message" role="alert" style="display:none">
        正常に更新されました
      </div>
      <div class="alert alert-danger" id="error-message" role="alert" style="display:none">
        志望理由が入力されていません
      </div>
      <form method="POST" action="/updateApplicantInfo">
        @csrf
        <div class="row mb-4">
          <div class="col-10 col-sm-10 mx-auto">
            @if($daigakin_flg->daigakin_flg == 0)
              <div class="accordion mb-4" id="accordionExample">
                @foreach($shibo_riyus as $shibo_riyu)
                  <div class="accordion-item">
                    <div class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button"
                          data-bs-toggle="collapse" data-bs-target="#gakka_cd_{{ $shibo_riyu->gakka_cd }}"
                          aria-expanded="false" aria-controls="{{ $shibo_riyu->gakka_cd }}">
                          【{{ $shibo_riyu->gakka_name }}】志望理由
                      </button>
                    </div>
                    <div id="gakka_cd_{{ $shibo_riyu->gakka_cd }}" class="accordion-collapse collapse"
                        aria-labelledby="headingOne" data-bs-parent="accordionExample">
                      <div class="accordion-body">
                        <label class="form-label">学部　志望理由</label>
                        <textarea class="form-control mb-4" name="gakubu_shiboriyu[]" id="{{ $shibo_riyu->gakka_cd }}" data-gakka="{{ $shibo_riyu->gakka_cd }}" rows="20" placeholder="私は〇〇への入学を志望します。">{{ $shibo_riyu->shibo_riyu }}</textarea>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              @if($katsudo_hokoku != null)
                <label class="form-label">活動報告</label>
                <p>
                  1.あなたがこれまでに体験した活動等について記入してください。（該当がない項目は記入不要）。<br>
                  ※箇条書きが望ましい。
                </p>
                <label class="form-label">(1)生徒会、部活動、ボランティア活動、海外経験等</label>
                <textarea class="form-control mb-2" name="katsudo_hokoku_1_1" id="katsudo_hokoku_1_1" rows="5" placeholder="・生徒会会長">{{ $katsudo_hokoku->katsudo_hokoku_1_1 }}</textarea>
                <label class="form-label">(2)取得資格・検定等</label>
                <textarea class="form-control mb-2" name="katsudo_hokoku_1_2" id="katsudo_hokoku_1_2" rows="5" placeholder="・英語検定3級">{{ $katsudo_hokoku->katsudo_hokoku_1_2 }}</textarea>
                <label class="form-label">(3)表彰・顕彰等</label>
                <textarea class="form-control mb-2" name="katsudo_hokoku_1_3" id="katsudo_hokoku_1_3" rows="5" placeholder="・県大会ベスト16">{{ $katsudo_hokoku->katsudo_hokoku_1_3 }}</textarea>
                <label class="form-label">(4)日常生活における自己の健康管理</label>
                <textarea class="form-control mb-2" name="katsudo_hokoku_1_4" id="katsudo_hokoku_1_4" rows="5" placeholder="・運動習慣">{{ $katsudo_hokoku->katsudo_hokoku_1_4 }}</textarea>
                
                <label class="form-label">
                  2.あなたのこれまでの体験の中から、①主体的に取り組んだこと、②他者と協調して取り組んだこと<br>
                  ③取り組みをとおして学んだこと　などを400字程度にまとめてください。
                </label>
                <textarea class="form-control mb-4" name="katsudo_hokoku_2" id="katsudo_hokoku_2" rows="10">{{ $katsudo_hokoku->katsudo_hokoku_2 }}</textarea>
              @elseif($shibo_riyus != null)
                <div class="alert alert-danger" id="error-message" role="alert">
                  修正できる登録情報はありません。
                </div>
              @endif
              
            @else
              @foreach($shibo_riyus as $shibo_riyu)
                <label class="form-label">大学院　志望理由</label>
                <small class="form-text text-muted"></small>
                <textarea class="form-control mb-4" name="daigakuin_shiboriyu[]" id="{{ $shibo_riyu->gakka_cd }}" rows="50" placeholder="私は〇〇への入学を志望します。">{{ $shibo_riyu->shibo_riyu }}</textarea>
              @endforeach
              @if($shibo_riyus == null)
                <div class="alert alert-danger" id="error-message" role="alert">
                  修正できる登録情報はありません。
                </div>
              @endif
            @endif
            <div class="w-100 mb-4"></div>
          </div>
        </div>
        @if($shibo_riyus->count() > 0 || $katsudo_hokoku != null)
          <div class="row">
            <a id="update" class="btn button col-6 col-sm-4 mx-auto submit-color">更新</a>
          </div>   
        @endif
      </form>
    </div>
  </body>
</html>
  
