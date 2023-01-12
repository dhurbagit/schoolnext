<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $online = Inquiery::where('type', 'online form')->count();
        $inquiry = Inquiery::where('type', 'inquiry')->count();
        $contact_us = Inquiery::where('type', 'contactus')->count();
        return view('admin.dashboard.index', compact('online', 'inquiry', 'contact_us'));
    }

    public function view()
    {
        $lists = Inquiery::where('type', 'online form')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.inquiry.index', compact('lists'));
    }

    public function view_inquiry_next()
    {
        $lists = Inquiery::where('type', 'inquiry')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.inquiry.inquiry', compact('lists'));
    }

}
