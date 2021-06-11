<?php

namespace App\Http\Controllers;

use App\Models\Cotacoes;
use App\Models\ItensCotacoes;
use Illuminate\Http\Request;

class ItensCotacoesController extends Controller
{
    public function create(Cotacoes $lista)
    {
        return view('cotacao.itens_cotacao.new', compact('lista'));
    }

    public function store(Request $request)
    {
        $item = new ItensCotacoes;
        $item = $item->create($request->except('_token'));    
        
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
