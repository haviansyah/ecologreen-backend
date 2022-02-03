<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\InstansiDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Services\DataTable;

class BaseAdminController extends Controller
{
    protected $model;
    protected $view;
    protected $rule;
    protected $unique;
    protected $route;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.$this->view.input");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rule);
        $data = new $this->model($request->all());
        $data->save();
        return redirect(route("$this->route.index"))->with('message','Success create new record');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $model_data = $this->model::findOrFail($id);

        if($request->isJson()){
            return response()->json($model_data);
        }
        return view("admin.$this->view.input",compact("model_data"));
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
        $rule = $this->rule;
        if($this->unique){
            if(is_array($this->unique)){
                foreach($this->unique as $uq){
                $rule[$uq] = $rule[$uq].",$id";

                }
            }else{
                $rule[$this->unique] = $rule[$this->unique].",$id";
            }
        }
        $request->validate($rule);
        $data = $this->model::findOrFail($id);
        $data->update($request->except(['_method','_token']));
        return redirect(route("$this->route.index"))->with('message','Success updating data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect(route("$this->route.index"))->with('message','Success remove data');;
    }

    public function import($id){
        
    }
}
