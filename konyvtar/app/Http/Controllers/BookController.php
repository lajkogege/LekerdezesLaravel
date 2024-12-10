<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function booksWithCopies()
    {
        //$user = Auth::user();	//bejelentkezett felhasználó
        //copies: fg neve!!!
        return Book::with('copies')
            //->where('user_id','=', $user->id)
            ->get();
    }

    //laarvel-es változatú lekérdezés
    public function authorWithTitles()
    {
        $authors = DB::table('books')
            ->selectRaw('author, COUNT(*) db')
            ->groupBy('author')
            ->havingRaw('db > 1')
            ->get();

        return $authors;
    }

    public function authorWithTitlesKetto($konyvekszama)
    {
        $authors = DB::table('books')
            ->selectRaw('author, COUNT(*) db')
            ->groupBy('author')
            ->havingRaw('db > ?', [$konyvekszama])
            ->get();

        return $authors;
    }
}
