<?php

namespace App; 

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'name','brand','color','qty'
    ];

    protected $dates = ['deleted_at'];

    public function saveData($request, $id=false){

        $car = new Car;
        
      if($id) $car = $this->find($id);

        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->color = $request->color;
        $car->qty = $request->qty;
        $car->save();

    }

    public function getAll()
    {
        return self::select('*')->withTrashed()->get();
    }

    public function viewData($id){
        return self::find($id);
    }

   
}
