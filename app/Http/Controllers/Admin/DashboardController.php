<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Return the dashboard page.
     * 
     * @return view
     */
    public function dashboard()
    {   
        return view('admin.dashboard');
    }

    /**
     * Return the books page.
     * 
     * @return view
     */
    public function books()
    {   
        return view('admin.pages.books');
    }

    /**
     * Return the members page.
     * 
     * @return view
     */
    public function members()
    {   
        return view('admin.pages.members');
    }

    /**
     * Return the circulations page.
     * 
     * @return view
     */
    public function circulations()
    {   
        return view('admin.pages.circulations');
    }

    /**
     * Return the users page.
     * 
     * @return view
     */
    public function users()
    {   
        return view('admin.pages.users');
    }
}
