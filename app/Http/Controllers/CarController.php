<?php

namespace App\Http\Controllers;
use App\Car;
use App\Http\Requests\saveCarRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;

class CarController extends Controller
{
   

     public function __construct(Car $car)
     {
         $this->car = $car;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('pages.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveCarRequest $request)
    {
       $this->car->saveData($request);

    }

    public function getData()
    {
        $get = $this->car->getAll();
        return DataTables::of($get)->addColumn('action', function($get){
            return '<a href="'.route('viewData',['id'=> $get->id]).'" class="btn btn-sm btn-outline-warning" title="Show Car">View</a>
            <a href="'.route('editData',['id'=> $get->id]).'" class="btn btn-sm btn-outline-info" title="Edit Car">Edit</a>
            <a href="#" class="btn btn-sm btn-outline-danger delete" id="'.$get->id.'" title="Delete Car">Delete</a>';
            })->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = $this->car->viewData($id);
        return view('pages.view',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = $this->car->viewData($id);
        return view('pages.edit',compact('car'));
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
       $this->car->saveData($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($this->car->viewData($request->input('id'))->delete()){
            return 'Data Deleted';
        }
    }
}
