<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Catecgory;
use Illuminate\Http\Request;

class CatecgoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postcrud = Catecgory::all();
        return view('admin/Catecgory/Catecgory')->with('postcrud',$postcrud);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/Catecgory/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        // $this->validate($request,[
        //     'name' => 'required|unique:catecgory'
        // ]);

        $postcruds = new Catecgory([
            'name' => $request->get('name'),]);
        $postcruds->save();
        return redirect('/admin/dashboard/Catecgory/catecgory')->with('flash_message', 'Added data sucesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Catecgory::destroy($id);
        return redirect('admin/dashboard/Catecgory/catecgory')->with('flash_message', 'Data Deleted!');
    }
}
