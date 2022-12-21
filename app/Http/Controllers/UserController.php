<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $paginate = 5;

        $posts = User::paginate($paginate);
        $user = User::findOrFail(Auth::id());

        return view('dashboard.user.user', compact('user', 'posts'));
    }

    public function create()
    {
        $user = User::findOrFail(Auth::id());
        $post = Post::all();
        return view('dashboard.user.create', compact('post', 'user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/user')->with('success', 'Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $post = Post::all();
        return view('dashboard.user.edit', compact('post', 'user'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
        ];


        $validatedData = $request->validate($rules);

        $validatedData = User::find($id);
        $validatedData->update([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password),
    ]);

        return redirect('/user')->with('success', 'Berhasil Diedit');
    }

    public function destroy(User $user, $id)
    {
        $posts = User::find($id);
        $posts->delete();

        return redirect('/user')->with('success', 'Berhasil Dihapus');
    }
}
