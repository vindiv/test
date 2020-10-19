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
                    <a href="#">{{ $tag->name }}</a>
                @endforeach
            </p>

        </div>
    </div>
</div>