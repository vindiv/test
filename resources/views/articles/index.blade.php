@forelse ($articles as $item)
    <!--<a href="/articles/ {{ $item->id }}"><strong>{{ $item->title }}</strong></a> <br>-->
    <a href="/articles/ {{ $item->path() }}"><strong>{{ $item->title }}</strong></a> <br>
    <p>{{ $item->body }}</p>

    {!! $item->excerpt !!}

    <br><hr><br>
@empty
    <p>nessun articolo presente</p>
@endforelse