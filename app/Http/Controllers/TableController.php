<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use App\Models\Dessert;
use App\Models\Salad;
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
        $this->viewData['pageTitle'] = 'Salata Yönetimi';
        $salads                      = Salad::all();

        return view('admin.salad.list', compact('salads'))->with($this->viewData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->viewData['pageTitle'] = 'Salata Ekle';
        $this->viewData['item']      = null;

        return view('admin.salad.create')->with($this->viewData());
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
        $rules = [
            'name'  => 'required',
            'price' => 'required|integer'
        ];

        $this->validate($request, $rules);

        $salad = Salad::create($request->all());

        return redirect()->route('salad.index');
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
     *
     * @param Salad $salad
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Dessert $dessert
     *
     * @internal param Drink $drink
     *
     * @internal param Food $food
     */
    public function edit(Salad $salad)
    {
        $this->viewData['pageTitle'] = 'Salata Düzenle';
        $this->viewData['item']      = $salad;

        return view('admin.salad.edit')->with($this->viewData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Dessert $dessert
     * @param PersonalRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Salad $salad, Request $request)
    {
        $rules = [
            'name'  => 'required',
            'price' => 'required|integer'
        ];
        $this->validate($request, $rules);

        $salad->update($request->all());

        return redirect()->back();
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
    public function destroy(Request $request, Salad $salad)
    {
        $salad->delete();
        $successMessage = 'Salata başarıyla silindi';

        if ($request->ajax()) {
            return ['is_action_successful' => 1, 'message' => $successMessage];
        }

        return redirect()->back()->withSuccess($successMessage);
    }
}
