<?php
    namespace Nhanduc\Core\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;

    class ContactController extends Controller 
    {
        public function index(Request $request)
        {
            return view('nhan::master');
        }

        public function store(Request $request)
        {
            return $request->all();
        }
    }
