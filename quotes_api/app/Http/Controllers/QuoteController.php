<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {

     $quotes = Quote::all();

     return response()->json($quotes);

    }

     public function create(Request $request)
     {
        $quote = new Quote;

       $quote->text= $request->text;
       $quote->author = $request->author;

       $quote->save();

       return response()->json($quote);
     }

     public function show($id)
     {
        $quote = Quote::find($id);

        return response()->json($quote);
     }

     public function update(Request $request, $id)
     {
        $quote= Quote::find($id);

        $quote->text = $request->input('text');
        $quote->author = $request->input('author');

        $quote->save();
        return response()->json($quote);
     }

     public function delete($id)
     {
        $quote = Quote::find($id);

        $quote->delete();
        //response()->json($id);
         return response()->json('The quote was removed successfully');
     }


    }
