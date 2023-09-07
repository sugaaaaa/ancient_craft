<?php

namespace App\Http\Controllers;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use Session;
use Illuminate\Http\RedirectResponse;



class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Session::put('page','admin/pages/cms_pages');
        $CmsPages = CmsPage::get()->toArray();
        // dd($CmsPages);
        return view('admin/pages/cms_pages')->with(compact('CmsPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    public function ShowAllData(){   
        return view('layouts.master',["data"=>CmsPage::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id=null)
    {
        // Session::put('page','admin/pages/cms_pages');
        if($id==""){
            $title = "Add CMS page";
            $cmspage= new CmsPage;
            $messange= "CMS Page added successfuly";
        }else{
            $title = "Edit CMS Page";
            $cmspage= CmsPage::find($id);
            $messange= "CMS Page UPDATE successfuly";
        }

        if($request->isMethod('post')){
            $data = $request ->all();
            // echo "<pre>"; print_r($data); die;

            //cms validation
            $rules = [
                'title' => 'required',
                'url' => 'required',
                'description' => 'required',
            ];
            $customMessages = [
                'title.reqyuired' => ' Page Title is required',
                'url.required'=>' Page URL is required',
                'description.required' => 'Page Description is required',
            ];
            $this -> validate($request,$rules,$customMessages);

            $cmspage->title = $data['title'];
            $cmspage->url =$data['url'];
            $cmspage->description=$data['description'];
            $cmspage->meta_title=$data['meta_title'];
            $cmspage->meta_description =$data['meta_description'];
            $cmspage->meta_keywords= $data['meta_keywords'];
            $cmspage->status=1;
            $cmspage->save();
            return redirect('admin/dashboard/pages/cms_pages')->with('success_message', $messange);

        }
        return view('admin/pages/add_edit_cmspage')->with(compact('title', 'cmspage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CmsPage $cmsPage)
    {
        // \Session::put('page','admin/pages/cms_pages');
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            CmsPage::where('id',$data['page_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'page_id'=>$data['page_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       CmsPage::where('id',$id)->delete();
       return redirect()->back()>with('success_message', 'CMS Page Delete Successfuly');

    }
    
}
