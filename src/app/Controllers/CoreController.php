<?php
    namespace Nhanduc\Core\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;

    class CoreController extends Controller 
    {
        public function login(Request $request)
        {
            return view('admin.auth.login');
        }

        public function dashboard(Request $request)
        {
            return view('admin.dashboard');
        }

        public function userIndex()
        {
            return view('admin.auth.user.index');
        }

        public function adminIndex()
        {
            return view('admin.auth.admin.index');
        }

        public function noticeIndex()
        {
            return view('admin.notice.index');
        }

        public function store(Request $request)
        {
            return $request->all();
        }
    }
