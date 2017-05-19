<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use App\Models\Food;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->viewData['pageTitle'] = 'Yiyecek Yönetimi';
        $foods = Food::all();

        return view('admin.food.list', compact('foods'))->with($this->viewData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->viewData['pageTitle'] = 'Yiyecek Ekle';
        $this->viewData['item']      = null;

        return view('admin.food.create')->with($this->viewData());
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

        $food = Food::create($request->all());

        return redirect()->route('food.index');
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
     * @param Food $food
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @internal param PersonalRequest $request
     * @internal param User $user
     *
     * @internal param int $id
     */
    public function edit(Food $food)
    {
        $this->viewData['pageTitle'] = 'Personel Düzenle';
        $this->viewData['item']      = $food;

        return view('admin.food.edit')->with($this->viewData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Food $food
     * @param PersonalRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     * @internal param $id
     *
     * @internal param User $user
     *
     * @internal param int $id
     */
    public function update(Food $food, Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|integer'
        ];
        $this->validate($request, $rules);

        $food->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Food $food
     *
     * @return array
     * @throws \Exception
     * @internal param User $personal
     *
     * @internal param User $user
     *
     * @internal param int $id
     */
    public function destroy(Request $request, Food $food)
    {
        $food->delete();
        $successMessage = 'Personel başarıyla silindi';

        if ($request->ajax()) {
            return ['is_action_successful' => 1, 'message' => $successMessage];
        }

        return redirect()->back()->withSuccess($successMessage);
    }
}
