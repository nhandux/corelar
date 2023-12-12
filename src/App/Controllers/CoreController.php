<?php

namespace Nhanduc\Core\App\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CoreController extends Controller 
{    
    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        return view('admin.auth.login');
    }
    
    /**
     * dashboard
     *
     * @param  mixed $request
     * @return void
     */
    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }
    
    /**
     * userIndex
     *
     * @return void
     */
    public function userIndex()
    {
        return view('admin.auth.user.index');
    }
    
    /**
     * adminIndex
     *
     * @return void
     */
    public function adminIndex()
    {
        return view('admin.auth.admin.index');
    }
    
    /**
     * adminCreate
     *
     * @return void
     */
    public function adminCreate()
    {
        return view('admin.auth.admin.create');
    }
    
    /**
     * noticeIndex
     *
     * @return void
     */
    public function noticeIndex()
    {
        return view('admin.notice.index');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        return $request->all();
    }
}
