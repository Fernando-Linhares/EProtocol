<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Historic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($success=null)
    { 
        $id = Auth::user()->id;
        $documents = Document::all()->where('user_id','=',$id)->where('acept','=',true);
        return view('home')->with('documents',$documents)->with('sended',$success);
    }

    public function input()
    {
        $id = Auth::user()->id;
        $documents = Document::all()->where('user_id','=',$id)->where('acept','=',false);
        return view('input')->with('documents',$documents);
    }

    public function acept($id)
    {
        $doc = Document::find($id);
        $doc->acept = true;
        $doc->save();
        return redirect('/input');
    }

    public function output($id)
    {
        return view("senddocument")->with('id', $id);
    }

    public function change(Request $request)
    {
        $name = $request->name;
        $user  = User::all()->where('name','=',$name);

        foreach($user as $u){
            $id = $u->id;
        }

        $doc = Document::find($request->id);
        $doc->user_id = $id;
        $doc->acept = false;
        
        $doc->save();

        $id_doc = $doc->id;
        $id_user = $id;

        $historic = new Historic;
        $historic->user_id = $id_user;
        $historic->document_id = $id_doc;
        $historic->save();

        return redirect()->route('home',['sucess'=>true]);
    }

    public function historic(int $id)
    {
        $historic = Historic::all()->where("document_id",'=',$id);
        $all = array();
        foreach($historic as $his)
        {
            $all[] = User::find($his->user_id)->name;
        }
        return view('info')->with('all',$all);
    }

    public function search(Request $document)
    {
       $doc = Document::all()->where('number',"=",$document->number);


        foreach($doc as $value){
            $id = $value->id;
        }
        $historic = Historic::all()->where("document_id",'=',$id);

        $all = array();

        foreach($historic as $his)
        {
            $all[] = User::find($his->user_id)->name;
        }

        return view('info')->with('all',$all);
    }
}
