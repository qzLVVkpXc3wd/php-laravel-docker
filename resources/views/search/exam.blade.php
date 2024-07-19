<head>
    @include('includeHead')
</head>

<body>
    <div class="container bg-primary-subtle">
        <h1>
            受験票
        </h1>
    </div>

    <div class="container">
        @if ($results->isEmpty())
            <details>
                <summary>該当する結果はありません。</summary>
            </details>
        @else
            <div class="container-fluid">
                <h2>選抜状況</h2>
                <div class="row">
                    <ul class="nav nav-pills nav-fill">
                        @foreach ($results as $index => $result)
                            <li class="nav-item">
                                <button class="nav-link{{ $index == 0 ? ' active' : '' }}" data-bs-toggle="tab"
                                    data-bs-target="{{ '#' . $result->nys_sbt_name }}" type="button">
                                    {{ $result->nys_sbt_name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="row">
                    <div class="tab-content">
                        @foreach ($results as $index => $result)
                            <div id="{{ $result->nys_sbt_name }}" class="tab-pane{{ $index == 0 ? ' active' : '' }}">
                                <p class="text-sm-start">{!! nl2br(e($result->schedulemessage)) !!}</p>
                                <h5>受験用バーコード</h5>
                                <p>会場へ入場する際に提示してください。</p>
                                @if (empty($result->juken_cd))
                                    <p>受験番号が発番されると表示されます</p>
                                @else
                                    <img
                                        src="{{ 'https://barcode.design/barcode.asp?bc1=' . $result->juken_cd . '&bc2=8&bc3=4.5&bc4=2&bc5=1&bc6=1&bc7=Arial&bc8=15&bc9=2' }}">
                                    </img>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</body>
