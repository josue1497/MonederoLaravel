<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Movement;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Requests\MovementRequest;


class MovementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories=Category::orderBy('name')->pluck('name', 'id');

       return view('movements.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovementRequest $request)
    {
       $movement = new Movement();
       $movement->money=$request->get('money-decimal')*100;
       $movement->user_id=auth()->user()->id;

       $movement->category=Category::first($request->get('category_id'))->id;

       if($request->hasFile('image')){
           $image=$request->file('image');

           $file = $image ->store('images/movements');
           $movement->image=$file;
       }

       $movement->save();

       return redirect()->route('movement.show',$movement);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movement = Movement::where('user_id', auth()->user()->id)
                                ->where('id',$id)->first();

        return view('movements.show',compact('movement'));
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
