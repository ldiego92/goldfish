<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<< HEAD
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use App\BibliographicMaterial;
use App\Loanable;
use APP\LoanCategory;
=======
use App\Book;
use App\Http\Requests;
use App\Http\Controllers\Controller;
>>>>>>> SERGIOSU-master

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        return Book::all();
=======
        /*$book = new Book();
        $book->title = "Cuentos de mi tia panchita";
        $book->bacorde = "AU0218";
        $book->author = "Carm";
        $book->save();*/
        $books = Book::all();
        return $books;
>>>>>>> SERGIOSU-master
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
      //
=======
        //
>>>>>>> SERGIOSU-master
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $book = new Book();
        $bibliographicMateial = new BibliographicMaterial();
        $loanable = new Loanable();
                
        $loanable->barcode = $request->barcode;
        $loanable->note = $request->note;
        $loanable->state_id = $request->state_id;
        $loanable->loan_category_id = $loan_category->id;
        $loanable->save();

        $bibliographicMateial->year = $request->year;
        $bibliographicMateial->signature = $request->signature;
        $bibliographicMateial->publication_place = $request->publication_place;
        $bibliographicMateial->editorial_id = $request->editorial_id;
        $bibliographicMateial->loanable_id = $loanable->id;
        $bibliographicMateial->save(); 

        $book->bibliographic_materials_id = $bibliographicMateial->id;
        $book->save();
        return $book;
=======
        //
>>>>>>> SERGIOSU-master
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $book = Book::find($id);
        $bibliographicMaterial = BibliographicMaterial::find($book->bibliographic_materials_id);
        $loanable = Loanable::find($bibliographicMaterial->loanable_id);

        $loanable->barcode = $request->barcode;
        $loanable->note = $request->note;
        $loanable->state_id = $request->state_id;
        $loanable->loan_category_id = $loan_category->id;
        $loanable->save();

        $bibliographicMaterial->year = $request->year;
        $bibliographicMaterial->signature = $request->signature;
        $bibliographicMaterial->publication_place = $request->publication_place;
        $bibliographicMaterial->editorial_id = $request->editorial_id;
        $bibliographicMaterial->loanable_id = $loanable->id;
        $bibliographicMaterial->save(); 

        $book->bibliographic_materials_id = $bibliographicMaterial->id;
        $book->save();
        return $book;
=======
        //
>>>>>>> SERGIOSU-master
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        $book = Book::find($id);

        $id_BibliographicMaterial = $book->bibliographic_materials_id;
        $bibliographicMateial = BibliographicMaterial::find($id_BibliographicMaterial);
        $id_loanable = $bibliographicMateial->loanable_id;

        Book::destroy($id);
        BibliographicMaterial::destroy($id_BibliographicMaterial);
        Loanable::destroy($id_loanable);

        return 1;
    }
        
=======
        //
    }
>>>>>>> SERGIOSU-master
}
