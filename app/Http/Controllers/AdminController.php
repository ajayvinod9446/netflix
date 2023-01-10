<?php

namespace App\Http\Controllers;
use App\Models\languages;
use App\Models\genres;
use App\Models\movies;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function IndexLanguage()
    {
        return view('admin.addLanguage');
    }
    public function store(Request $request)
    {  
        Validator::make($request->all(), [
            'language' => [
                'required',
                'string',
                'min:3',
            ],  
        ], [
            'language.required' => 'language field is requied',
        ])->validateWithBag('post');

        $data = new languages();
        $data->language = $request->input('language');
        $data->save();
        return response()->json(['message' => 'success']);
    }

    public function IndexGenres()
    {
        return view('admin.addGenres');
    }

    public function storeGeners(Request $request)
    {  
        Validator::make($request->all(), [
            'genres' => [
                'required',
                'string',
                'min:3',
            ],  
        ], [
            'genres.required' => 'language field is requied',
        ])->validateWithBag('post');

        $data = new genres();
        $data->genre = $request->input('genres');
        $data->save();
        return response()->json(['message' => 'success']);
    }
    public function addMoviesIndex()
    {
        $languages = languages::all();
        $genres = genres::all();
        return view('admin.uploadMovie',compact('languages','genres'));
    }

    public function storeMovie(Request $request)
    {  
        $data = new movies();
        $data->moviename = $request->input('name');
        $data->language = $request->input('language');
        $data->genre = $request->input('genre');
        $data->description = $request->input('des');
        if($request->file('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $location = 'files';
            $file->move($location,$filename);
            $filepath = url('files/'.$filename);
            $data->movie = $filepath;
        }
        $data->save();
        return response()->json(['message' => 'success']);

    }

}
