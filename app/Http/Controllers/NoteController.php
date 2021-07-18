<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {

      $title = "Notificações";

      $message = "Em desenvolvimento...";

      return view('notes.index',compact('title','message'));
    }

    public function create()
    {
      //
    }

    public function createPublic()
    {
      $title = "Notificação de Eventos Adversos, Queixas Técnicas e Incidentes Transfusionais.";
      $products = Product::orderBy('descricao')->get();

      return view('notes.createPublic', [
        'products' => $products,
        'title' => $title
      ]);
    }

    public function store(Request $request)
    {
      $note = $request->all();
      $insert = Note::create($note);
  
      session()->flash('message', 'Registro inserido com sucesso.');
  
      if ($insert)
        return redirect()->back();
      //return redirect()->route('companies.show', $insert->id);
      else {
        return redirect()->back();
      }
    }

    public function storePublic(Request $request)
    {
      $note = $request->all();
      $insert = Note::create($note);
  
      session()->flash('message', 'Registro inserido com sucesso.');
  
      if ($insert)
        return redirect()->away('https://mesm.uncisal.edu.br');
      else {
        return redirect()->back();
      }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
