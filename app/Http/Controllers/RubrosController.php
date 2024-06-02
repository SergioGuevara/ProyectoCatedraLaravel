<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class RubrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewBag=array();
        $viewBag['rubros']=DB::table('rubros')->get();
        return view('Rubros.index',$viewBag);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $viewBag=array();

            $viewBag['rubros']=Rubro::all();
            return view('Rubros.create',$viewBag);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, )
    {
        $validator = Validator::make($request->all(), [
            'nombreRubro' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('rubros/create')->withErrors($validator)->withInput();

        } else {
            $nombreRubro = $request->input('nombreRubro');
            $existeRubro = Rubro::where('Rubro',$nombreRubro)->exists();

            if($existeRubro){
                $viewBag=array();
                $viewBag['rubros']=DB::table('rubros')->get();
                return view('Rubros.index',$viewBag);
            }
            else{
                $rubro = new Rubro();
                $rubro->Rubro = $request->input('nombreRubro');
                $rubro->save();

                // Redireccionar a una página de éxito o mostrar un mensaje de confirmación
                $viewBag=array();
                $viewBag['rubros']=DB::table('rubros')->get();
                return view('Rubros.index',$viewBag);
            }
        }

    }

    
    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombreRubro' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('rubros/create')->withErrors($validator)->withInput();

        } else {
            $rubro = Rubro::findOrFail($id);
            $nombreRubro = $request->input('nombreRubro');

            $existeRubro = Rubro::where('Rubro',$nombreRubro)->where('idrubro', '!=', $id)->exists();

            if($existeRubro){
                $viewBag=array();
                $viewBag['rubros']=DB::table('rubros')->get();
                return view('Rubros.index',$viewBag);
            }
            else{
                $rubro->Rubro = $nombreRubro;
                $rubro->save();

                $viewBag=array();
                $viewBag['rubros']=DB::table('rubros')->get();
                return view('Rubros.index',$viewBag);
            }
        }
    }

    public function destroy(string $idrubro)
    {
        Rubro::destroy($idrubro);
        //$this->resetAutoIncrement();

        $viewBag=array();
        $viewBag['rubros']=DB::table('rubros')->get();
        return view('Rubros.index',$viewBag);

    }

    /*
    public function resetAutoIncrement()
    {
        $tableName = 'rubros';
        $primaryKey = 'idrubro';

        DB::statement("ALTER TABLE {$tableName} AUTO_INCREMENT = 1;");
        DB::statement("SET @num := 0;");
        DB::statement("UPDATE {$tableName} SET {$primaryKey} = @num := (@num + 1);");
        DB::statement("ALTER TABLE {$tableName} AUTO_INCREMENT = 1;");
    }*/


}
