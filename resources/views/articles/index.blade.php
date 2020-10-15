@foreach($articles as $item)
    <a href="/articles/ {{ $item->id }}"><strong>{{ $item->title }}</strong></a> <br>
    <p>{{ $item->body }}</p>

@endforeach