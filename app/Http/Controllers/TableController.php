<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->viewData['pageTitle'] = 'Masa Yönetimi';
        $tables                      = Table::all();

        return view('admin.table.list', compact('tables'))->with($this->viewData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->viewData['pageTitle'] = 'Masa Ekle';
        $this->viewData['item']      = null;

        return view('admin.table.create')->with($this->viewData());
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $salad = Table::create();

        return redirect()->route('table.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Dessert $dessert
     *
     * @return array
     * @internal param Drink $drink
     *
     * @internal param Food $food
     */
    public function destroy(Request $request, Table $table)
    {
        $table->delete();
        $successMessage = 'Masa başarıyla silindi';

        if ($request->ajax()) {
            return ['is_action_successful' => 1, 'message' => $successMessage];
        }

        return redirect()->back()->withSuccess($successMessage);
    }
}
