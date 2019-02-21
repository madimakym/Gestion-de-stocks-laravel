<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Persons;

class PersonsController extends Controller
{
   
    public function index()
    {
        $persons=Persons::all();
        return view('persons.index', compact('persons'));
    }
  
    public function create()
    {
        return view('persons.create');
    }

   
    public function store(Request $request)
    {
        $formInput=$request->except('image');
        // Validation 
        // $this->validate($request, [
        //     'name'=>'required',
        //     'size'=>'required',
        //     'image'=>'image|mines:png,jpg,jpeg|max:10000'
        // ]);

        // image upload
        $image=$request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }

        Persons::create($formInput);
        return redirect()->route('persons.index');
    }

   
    public function show($id)
    {
        $person = Persons::find($id);
        return view('persons.show', compact('person'));
    }

  
    public function edit($id)
    {
        $person = Persons::find($id);
        return view('persons.edit', compact('person'));
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        $person = Persons::find($id);
        $person->delete();
        return redirect()->route('persons.index');
    }
}
