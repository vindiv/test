<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail();
        }
        $articles = Articles::latest()->get();
        
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //questo è il metodo standard. per eviare ripetizioni si può semplificare il tutto
/*        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = new Articles();
        $article->title = request('title');
        $article->excerpt = request(('excerpt'));
        $article->body = request('body');
        $article->save();
*/

        //forma contratta. per poterla usare nel model bisogna dichiarare i campi fillable
        /*$article = Articles::create(request()->validate([
                'title' => 'required',
                'excerpt' => 'required',
                'body' => 'required'
        ]));*/ 

        //creazione con metodo validate:
        $this->validateArticle();  //valido a parte invece che in new Articles perchè tags 
        //non fa parte della tabella articles, dopo lo inserisco a parte con l'attach

        $article = new Articles(request(['title', 'excerpt', 'body']));
        //per aggiungere l'id dell'utente che lo ha creato
        $article->user_id = 1; //ci andrebbe auth()>id();
        $article->save(); 

        $article->tags()->attach(request('tags'));
        
        

        return redirect(route('articles.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
        //$article = Articles::find($id);

        //return $article;

        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $articles)
    {
        return view('articles.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {
        $articles->update($this->validateArtice());

        return redirect($articles->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {
        //
    }

    public function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags, id'
        ]);
    }
}
