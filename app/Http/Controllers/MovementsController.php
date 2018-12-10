<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Movement;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Requests\MovementRequest;


class MovementsController extends Controller
{

    public function __contructor(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title='Movimientos';

        $movements = Movement::where('user_id', auth()->user()->id);

        if($request->has('type')){
            $movements = $movements->where('type', $request->get('type'));
            $title ='Movimientos de '. $request->get('type');
        }

        $movements = $movements->orderBy('movement_date', 'desc')->paginate(2);

        return view('movements.index', compact('movements', 'title'));
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
       $validated = $request->validated();
       $movement = new Movement($validated);
       $money=$request->money_decimal*100;
       $movement->money=$money;
       $movement->user_id=auth()->user()->id;

       $movement->category_id=Category::find($request->get('category_id'))->id;

       if($request->hasFile('image')){
           $image=$request->file('image');

           $file = $image ->store('images/movements');
           $movement->image=$file;
       }

       $movement->save();

       return redirect()->route('movements.show',$movement);

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
        $categories = Category::orderBy('name')->pluck('name', 'id');
        $movement = Movement::where('user_id', auth()->user()->id)
        ->where('id',$id)
        ->first();

        return view('movements.edit', compact('categories', 'movement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovementRequest $request, $id)
    {
        $movement = Movement::where('user_id', auth()->user()->id)
        ->where('id',$id)
        ->first();

        $movement->type=$request->type;
        $movement->movement_date=$request->movement_date;
        $movement->money = $request->money_decimal*100;
        $movement->description=$request->description;

        $movement->category_id=Category::find($request->get('category_id'))->id;

        if($request->hasFile('image')){
            $image=$request->file('image');

            $file = $image ->store('images/movements');
            $movement->image=$file;
        }

        $movement->save();

        return redirect()->route('movements.show',$movement);


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
