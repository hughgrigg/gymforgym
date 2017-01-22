<?php

namespace GymForGym\Http\Controllers;

class StaticController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexAction()
    {
        return view('welcome');
    }
}
