<x-layout>
    <div class="w-75">
        <h1>合格発表</h1>
        @if ($results->isEmpty())
            <details>
                <summary>該当する結果はありません。</summary>
            </details>
        @else
            <h2></h2>

            <form action="/examresult" method="POST">
                @csrf
                @foreach ($results as $index => $result)
                    <div class="row">
                        <button type="submit" name="submit" value="{{ $result->nys_sbt_cd }}" {!! empty($result->gohi_sbt_name) || $result->gohi_date > NOW()
                            ? "class='btn btn-secondary disabled'"
                            : "class='btn btn-primary'" !!}>
                            {{ $result->nys_sbt_name }}
                        </button>
                    </div>
                    <br>
                @endforeach
            </form>
        @endif
    </div>
</x-layout>
