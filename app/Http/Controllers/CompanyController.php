<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  public function index()
  {
    $companies = Company::orderBy('empresa')->get();

    $title = "Empresas";

    return view('company.index', compact('companies', 'title'));
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    $company = $request->all();
    $insert = Company::create($company);

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
