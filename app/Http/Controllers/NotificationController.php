<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {

      $title = "Notificações";

      $message = "Em desenvolvimento...";

      return view('notifications.index',compact('title','message'));
    }

    public function create()
    {
      //
    }

    public function store(Request $request)
    {
      $notification = $request->all();
      $insert = Notification::create($notification);
  
      session()->flash('message', 'Registro inserido com sucesso.');
  
      if ($insert)
        return redirect()->back();
      //return redirect()->route('companies.show', $insert->id);
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
