<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('http://localhost:3000/api/person');
        $people = json_decode($response->body());
        return view('admin.pages.person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/api/person', $request->all());
        return redirect()->route('person.index')->with('success',"Pessoa adicionada com sucesso!");

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
    public function edit($id)
    {
        $response = Http::get('http://localhost:3000/api/person/'.$id);
        if($response->status() == 200) {
            $person = json_decode($response->body());
        } else {
            return redirect()->route('person.index')->with('error',"Pessoa não encontrada!");
        }

        return view('admin.pages.person.edit', compact('person'));
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
        $response = Http::get('http://localhost:3000/api/person/'.$id);
        if($response->status() == 200) {
            $person = json_decode($response->body());
            $result = Http::put('http://localhost:3000/api/person/'.$id, $request->all());
            return redirect()->route('person.index')->with('success',"Pessoa alterada com sucesso!");
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
    public function destroy($id)
    {
        $response = Http::get('http://localhost:3000/api/person/'.$id);
        if($response->status() == 200) {
            $response = Http::delete('http://localhost:3000/api/person/'.$id);
            return redirect()->route('person.index')->with('success',"Pessoa deletada com sucesso!");
        } else {
            return redirect()->route('person.index')->with('error',"Pessoa não encontrada!");
        }

    }
}
