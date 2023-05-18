<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin User - DogeShop';
        $viewData['users'] = User::all();
        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return back();
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['title'] = 'Admin User - DogeShop';
        $viewData['users'] = User::find($id);
        return view('admin.user.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->setName($request->name);
        $user->setEmail($request->email);
        $user->setPassword($request->password);
        $user->setRole($request->role);
        $user->save();
        return redirect()->route('admin.user.index');
    }
}
