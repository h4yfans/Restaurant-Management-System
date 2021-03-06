<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use App\Models\Dessert;
use Illuminate\Http\Request;

class DessertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->viewData['pageTitle'] = 'Tatlı Yönetimi';
        $desserts = Dessert::all();

        return view('admin.dessert.list', compact('desserts'))->with($this->viewData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->viewData['pageTitle'] = 'Tatlı Ekle';
        $this->viewData['item']      = null;

        return view('admin.dessert.create')->with($this->viewData());
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
            'name' => 'required',
            'price' => 'required|integer'
        ];

        $this->validate($request, $rules);

        $drink = Dessert::create($request->all());

        return redirect()->route('dessert.index');
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
     * @param Dessert $dessert
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Drink $drink
     *
     * @internal param Food $food
     */
    public function edit(Dessert $dessert)
    {
        $this->viewData['pageTitle'] = 'Tatlı Düzenle';
        $this->viewData['item']      = $dessert;

        return view('admin.dessert.edit')->with($this->viewData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Dessert $dessert
     * @param PersonalRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Dessert $dessert, Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|integer'
        ];
        $this->validate($request, $rules);

        $dessert->update($request->all());

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
    public function destroy(Request $request, Dessert $dessert)
    {
        $dessert->delete();
        $successMessage = 'Tatlı başarıyla silindi';

        if ($request->ajax()) {
            return ['is_action_successful' => 1, 'message' => $successMessage];
        }

        return redirect()->back()->withSuccess($successMessage);
    }
}
