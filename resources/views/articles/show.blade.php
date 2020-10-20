<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">
                <h2>{{  $article->title }}</h2>
            </div>
            <p>

            </p>
            {!! $article->body !!}

            <p>
                @foreach ($article->tags as $tag)
                    <a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                @endforeach
            </p>

        </div>
    </div>
</div>