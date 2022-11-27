<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return $book;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->isbn = $request->input('isbn');
        $book->price = $request->input('price');
        $book->title = $request->input('title');
        $book->genre = $request->input('genre');
        $book->author = $request->input('author');
        $book->premis = $request->input('premis');
        $book->language = $request->input('language');
        $book->publisher = $request->input('publisher');
        $book->number_of_page = $request->input('number_of_page');
        $book->date_of_issue = $request->input('date_of_issue');
        $book->save();

        return response()->json([
            'success' => 201,
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = book::find($id);
        if ($book) {
            return response()->json([
                'status' => 200,
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . 'tidak ditemukan'   
            ], 404);
        }
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
        $book = book::find($id);
        if($book){
            $book->isbn = $request->isbn ? $request->isbn : $book->isbn;
            $book->price = $request->price ? $request->price : $book->price;
            $book->title = $request->title ? $request->title : $book->title;
            $book->genre = $request->genre ? $request->genre : $book->genre;
            $book->author = $request->author ? $request->author : $book->author;
            $book->premis = $request->premis ? $request->premis : $book->premis;
            $book->language = $request->language ? $request->language : $book->language;
            $book->publisher = $request->publisher ? $request->publisher : $book->publisher;
            $book->number_of_page = $request->number_of_page ? $request->number_of_page : $book->number_of_page;
            $book->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $book->date_of_issue;
            $book->save();
            return response()->json([
                'status' => 200,
                'data' => $book
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan' 
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = book::where('id', $id)->first();
        if($book){
            $book->delete();
            return response()->json([
                'status' => 200,
                'data' => $book
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan' 
            ],404);
        }
    }
}