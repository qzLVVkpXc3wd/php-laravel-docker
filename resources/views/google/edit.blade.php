<!DOCTYPE html>
<html lang="ja">
  <head>
    @include('includeHead')
    <script type="text/javascript" src="{{asset('/js/applicant_input.js')}}"> </script>
  </head>
  <body>
    @include('nav')
    <header>
      <div class="title">
        <h1>志願者情報修正</h1>
      </div>
      
    </header>
    <div class="main-contents">
      @isset($error_msg)
        <div class="alert alert-danger" id="error-message" role="alert">
          存在しないメールアドレスです
        </div>
      @endisset
      <form method="POST" action="/edit">
        @csrf
        <p>a@gmail.com：学部</p>
        <p>b@gmail.com：大学院</p>
        <p>kitagas_kanri1_test@tenshi.ac.jp：学部で志望理由の提出の必要がない人</p>
        <p>nasi@gmail.com：大学院で志望理由の提出の必要がない人</p>
        <label for="google_account" class="form-label">Googleアカウント</label>
        <input type="text" id="google_account" name="google_account" value="b@gmail.com">
        <input type="submit" class="btn button submit-color" value="呼び出し">
      </form>
    </div>
  </body>
</html>
  