<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($person_id)
    {
        $response = Http::get('http://localhost:3000/api/person/'.$person_id);
        if($response->status() != 200) {
            return redirect()->route('person.index')->with('error',"Pessoa não encontrada! $person_id - ".$response->status());
        }
        $response = Http::get("http://localhost:3000/api/person/$person_id/contact");
        $contacts = json_decode($response->body());
        return view('admin.pages.contact.index', compact('contacts','person_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($person_id)
    {
        return view('admin.pages.contact.create', compact('person_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $person_id)
    {
        $response = Http::get('http://localhost:3000/api/person/'.$person_id);
        if($response->status() != 200) {
            return redirect()->route('person.index')->with('error',"Pessoa não encontrada!");
        }
        $response = Http::post("http://localhost:3000/api/person/$person_id/contact", $request->all());
        return redirect()->route('contact.index', ['person_id'=>$person_id])->with('success',"Contato adicionado com sucesso!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($person_id, $id)
    {
        $response = Http::get('http://localhost:3000/api/person/'.$person_id);
        if($response->status() != 200) {
            return redirect()->route('person.index')->with('error',"Pessoa não encontrada!");
        }
        $response = Http::get("http://localhost:3000/api/person/$person_id/contact/$id");
        if($response->status() == 200) {
            $contact = json_decode($response->body());
        } else {
            return redirect()->route('contact.index',['person_id'=>$person_id])->with('error',"Contato não encontrado!");
        }

        return view('admin.pages.contact.edit', compact('contact', 'person_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $person_id, $id)
    {
        $response = Http::get('http://localhost:3000/api/person/'.$person_id);
        if($response->status() != 200) {
            return redirect()->route('person.index')->with('error',"Pessoa não encontrada!");
        }

        $response = Http::get('http://localhost:3000/api/person/'.$person_id.'/contact/'.$id);
        if($response->status() == 200) {
            $contact = json_decode($response->body());
            $result = Http::put('http://localhost:3000/api/person/'.$person_id.'/contact/'.$id, $request->all());
            return redirect()->route('contact.index', ['person_id'=>$person_id])->with('success',"Contato alterado com sucesso!");
        } else {
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($person_id, $id)
    {
        $response = Http::get('http://localhost:3000/api/person/'.$person_id);
        if($response->status() != 200) {
            return redirect()->route('person.index')->with('error',"Pessoa não encontrada!");
        }
        $response = Http::get('http://localhost:3000/api/person/'.$person_id.'/contact/'.$id);
        if($response->status() == 200) {
            $response = Http::delete('http://localhost:3000/api/person/'.$person_id.'/contact/'.$id);
            return redirect()->route('contact.index', ['person_id'=>$person_id])->with('success',"Contato deletado com sucesso!");
        } else {
            return redirect()->route('contact.index', ['person_id'=>$person_id])->with('error',"Contato não encontrada!");
        }

    }

}
