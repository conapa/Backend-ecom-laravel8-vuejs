<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use App\Models\Order;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth:admin')->except(['ShowAdminLogin','adminLogin']);
     }
     public function index()
     {
       return Inertia::render('admin/Dashboard',[
         'orders' => Order::get()
       ]);
     }
     public function addproduct()
     {
       return Inertia::render('admin/Addproduct');
     }


     public function ShowAdminLogin()
     {
       return Inertia::render('admin/Auth/Login');
     }


     public function adminLogin(Request $request)
     {
       $this->validate($request,[
         'email'=>'required|email',
         'password'=>'required|min:4'
       ]);
       if(auth()->guard('admin')->attempt([
         'email'=>$request->email,
         'password'=>$request->password
       ],$request->get('remember'))){
         return redirect::route('admin');
       }else {
         return redirect::route('adminLogin');
       }
     }
     public function adminLogout()
     {
       auth()->guard('admin')->logout();
       return redirect::route('adminLogin');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
