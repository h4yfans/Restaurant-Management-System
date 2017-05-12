<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->viewData['pageTitle'] = 'Personal Yönetimi';
        $personals                   = User::personal()->get();

        return view('admin.personal.list', compact('personals'))->with($this->viewData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->viewData['pageTitle'] = 'Personal Ekle';
        $this->viewData['item']      = null;

        return view('admin.personal.create')->with($this->viewData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonalRequest|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PersonalRequest $request)
    {
        $this->validate($request, $request->rules());
        $request['password'] = bcrypt($request->password);

        $personal = User::create($request->all());
        $personal->attachRole(Role::find(2));

        return redirect()->route('personal.index');
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
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param PersonalRequest $request
     * @internal param User $user
     *
     * @internal param int $id
     */
    public function edit($id)
    {
        $user                        = User::find($id);
        $this->viewData['pageTitle'] = 'Personel Düzenle';
        $this->viewData['item']      = $user;

        return view('admin.personal.edit')->with($this->viewData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonalRequest|Request $request
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @internal param User $user
     *
     * @internal param int $id
     */
    public function update(PersonalRequest $request,$id)
    {
        if (empty($request['password'])) {
            array_pull($request, 'password');
        } else {
            $request['password'] = bcrypt($request->password);
        }
        $this->validate($request, $request->rules());
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param User $personal
     *
     * @return array
     * @internal param User $user
     *
     * @internal param int $id
     */
    public function destroy(Request $request, User $personal)
    {
        $personal->delete();
        $successMessage = 'Personel başarıyla silindi';

        if ($request->ajax()) {
            return ['is_action_successful' => 1, 'message' => $successMessage];
        }

        return redirect()->back()->withSuccess($successMessage);
    }
}
