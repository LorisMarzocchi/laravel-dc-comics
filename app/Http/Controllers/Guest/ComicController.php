<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    private $validation = [
        'title' => 'required|string|max:150',
        'description' => 'required|string|max:2000',
        'thumb' => 'required|url|max:350',
        'price' => 'required|string|max:20',
        'series' => 'required|string|max:150',
        'sale_date' => 'required|date',
        'type' => 'required|string|max:50',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(6);
        // $comics = Comic::all();  // SELECT * FROM `comics`
        // dd($comics);

        return view('comics.index', compact('comics')); //necessaria la variabile
        // return view('comics.index',[
        //     'pasta'=> $pasta,
        //     'pasta'=> Comic::paginate(6),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validare i dati

        $request->validate($this->validation);

        $data = $request->all(); //estrae i dati inseriti nel form e li inserisce in un array associativo

        // salvare i dati nel database

        $newComic = new Comic();

        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];

        $newComic->save();

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //validare dati
        // $request-validate($this->validation);
        $request->validate($this->validation);

        $data = $request->all();


        //aggiornare i dati nel database

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];

        $comic->update();

        return to_route('comics.show', ['comic' => $comic->id]);
        // return redirect()->route('comics.show', ['comic' => $comic->id]); fanno la stessa cosa

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('delete_succes', $comic);
        // return 'delete';
    }

    public function restore()
    {
    }
}
