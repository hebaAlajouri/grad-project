<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
public function create()
{
    return view('admin.users.create');
}

public function store(Request $request)
{
    $data = $request->all();
    $data['password'] = Hash::make($request->password);

    User::create($data);

    return redirect()->route('users.index');
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $data = $request->all();

    if ($request->password) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('users.index');
}
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }
}