<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name','brand','color','qty'
    ];

    public function saveData($request){

        $car = new Car;
        
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->color = $request->color;
        $car->qty = $request->qty;
        $car->save();

    }

    public function getAll()
    {
        return self::select('*')->get();
    }
}
