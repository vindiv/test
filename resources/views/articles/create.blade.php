<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
</head>
<body>


<!-- Default form contact -->
<form class="border border-light p-5" method="POST" action="/articles">
    @csrf
    <p class="h4 mb-4">Inserisci Articolo</p>

    <!-- Name -->
    <label>title</label>
    <input type="text" id="defaultContactFormName" {{ $errors->has('title') ? 'style=border-color:red' : '' }} class="form-control mb-4"  name="title" value="{{ old('title') }}">
    @if ($errors->has('title'))
    <div class="alert alert-danger">{{ $errors->first('title') }}</div>
    @endif

    <!-- ecerpt -->
    <label>Excerpt</label>
    <input type="text" id="defaultContactFormEmail" @error('excerpt') style=border-color:red @enderror class="form-control mb-4"  name="excerpt">
    @error('excerpt')
    <div class="alert alert-danger">{{ $errors->first('excerpt') }}</div>
    @enderror
 

    <!-- body -->
    <label>Body</label>
    <div class="form-group">
        <textarea class="form-control rounded-0" @error('body') style=border-color:red @enderror id="exampleFormControlTextarea2" rows="3"  name="body"></textarea>
    </div>
    @error('body')
    <div class="alert alert-danger">{{ $errors->first('body') }}</div>
    @enderror

    <label for="tags">tags</label>
    <div class="form-group">
    <select name="tags[]">
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach

    </select>
    </div>
    @error('tags')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
 

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit">Inserisci</button>

</form>
<!-- Default form contact -->
    

     <!-- bootstrap js cdn -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   


</body>
</html>