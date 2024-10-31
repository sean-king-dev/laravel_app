<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the About page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Display the Work page.
     */
    public function work()
    {
        return view('pages.work');
    }

    /**
     * Display the Services page.
     */
    public function services()
    {
        return view('pages.services');
    }

    /**
     * Display the FAQs page.
     */
    public function faqs()
    {
        return view('pages.faqs');
    }

    /**
     * Display the Contact page.
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
