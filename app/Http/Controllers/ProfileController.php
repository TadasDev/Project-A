<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit($id): View
    {
        $user = User::find($id);

        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $this->authorize('update', $user);

        return redirect()->back()->with('message', 'Updated profile details successfully');
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->destroy($id);

        $this->authorize('delete', $user);

        return redirect()->back()->with('message', 'User Deleted!!');
    }

}
