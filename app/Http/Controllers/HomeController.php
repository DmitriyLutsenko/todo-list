<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function profiles()
    {
        $users = User::select('id', 'name', 'created_at')->paginate(8);
        return view('users.profiles', [ 'users' => $users ]);
    }

    public function profile($user_id = null)
    {
        if ($user_id == null)
        {
            if (\Auth::check())
            {
                $user_id = \Auth::user()->id;
            }
            else
            {
                return redirect()->route('login');
            }
        }

        $userTasks = Task::select('id', 'title', 'description')->where(['user_id' => $user_id])->paginate(8);

        $userInfo  = User::select('id', 'name')->where(['id' => $user_id])->first();

        return view('users.profile', [
            'userTasks' => $userTasks,
            'userInfo'  => $userInfo,
        ]);

    }
}
