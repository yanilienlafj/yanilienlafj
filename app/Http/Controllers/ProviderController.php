<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;

class ProviderController extends Controller
{
    public function index(){

        $providers=Provider::get();
        return view('admin.provider.index',compact('providers'));
    }  

    public function create(){

        return view('admin.provider.create');

    }
    public function store(StoreRequest $request,Provider $provider){

       
        $provider->my_story($request);
        return redirect()->route('provider.index');
    }


    public function show(Provider $category){
        return view('admin.provider.show',compact('provider'));
    }

    public function edit(){

        return view('admin.provider.edit',compact('provider'));

    }

    public function update(StoreRequest $request,Provider $provider){

        $provider->my_update($request);
        return redirect()->route('provider.index');
    }

    public function destroy(Provider $provider){
        $provider->delete();
        return redirect()->route('provider.index');

    }
}
