<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use App\Models\Drink;
use App\Models\Food;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->viewData['pageTitle'] = 'İçeçek Yönetimi';
        $drinks = Drink::all();

        return view('admin.drink.list', compact('drinks'))->with($this->viewData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->viewData['pageTitle'] = 'İçeçek Ekle';
        $this->viewData['item']      = null;

        return view('admin.drink.create')->with($this->viewData());
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

        $drink = Drink::create($request->all());

        return redirect()->route('drink.index');
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
     * @param Drink $drink
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Food $food
     */
    public function edit(Drink $drink)
    {
        $this->viewData['pageTitle'] = 'İçeçek Düzenle';
        $this->viewData['item']      = $drink;

        return view('admin.drink.edit')->with($this->viewData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Drink $drink
     * @param PersonalRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Drink $drink, Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|integer'
        ];
        $this->validate($request, $rules);

        $drink->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Drink $drink
     *
     * @return array
     * @internal param Food $food
     */
    public function destroy(Request $request, Drink $drink)
    {
        $drink->delete();
        $successMessage = 'İçeçek başarıyla silindi';

        if ($request->ajax()) {
            return ['is_action_successful' => 1, 'message' => $successMessage];
        }

        return redirect()->back()->withSuccess($successMessage);
    }
}
