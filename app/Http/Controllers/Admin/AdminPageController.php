<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    // About Page
    public function about() {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_about', compact('page_data'));
    }

    public function about_update(Request $request) {
        $request->validate([
            'about_title' => 'required',
            'about_detail' => 'required'
        ]);
        $page = Page::where('id', 1)->first();
        $page->about_title = $request->about_title;
        $page->about_excerpt = $request->about_excerpt;
        $page->about_detail = $request->about_detail;
        $page->about_status = $request->about_status;
        $page->update();
        return redirect()->route('admin_page_about')->with('success', 'Data is update succcessfully');
    }

    // FAQ Page
    public function faq() {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_faq', compact('page_data'));
    }

    public function faq_update(Request $request) {
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required'
        ]);
        $page = Page::where('id', 1)->first();
        $page->faq_title = $request->faq_title;
        $page->faq_excerpt = $request->faq_excerpt;
        $page->faq_detail = $request->faq_detail;
        $page->faq_status = $request->faq_status;
        $page->update();
        return redirect()->route('admin_faq_show')->with('success', 'Data is update succcessfully');
    }
    
    // Terms
    public function terms() {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_terms', compact('page_data'));
    }

    public function terms_update(Request $request) {
        $request->validate([
            'terms_title' => 'required',
            'terms_detail' => 'required'
        ]);
        $page = Page::where('id', 1)->first();
        $page->terms_title = $request->terms_title;
        $page->terms_excerpt = $request->terms_excerpt;
        $page->terms_detail = $request->terms_detail;
        $page->terms_status = $request->terms_status;
        $page->update();
        return redirect()->route('admin_terms_show')->with('success', 'Data is update succcessfully');
    }

    // Privacy
    public function privacy() {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_privacy', compact('page_data'));
    }

    public function privacy_update(Request $request) {
        $request->validate([
            'privacy_title' => 'required',
            'privacy_detail' => 'required'
        ]);
        $page = Page::where('id', 1)->first();
        $page->privacy_title = $request->privacy_title;
        $page->privacy_excerpt = $request->privacy_excerpt;
        $page->privacy_detail = $request->privacy_detail;
        $page->privacy_status = $request->privacy_status;
        $page->update();
        return redirect()->route('admin_privacy_show')->with('success', 'Data is update succcessfully');
    }

    // Privacy
    public function contact() {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page.page_contact', compact('page_data'));
    }

    public function contact_update(Request $request) {
        $request->validate([
            'contact_title' => 'required',
        ]);
        $page = Page::where('id', 1)->first();
        $page->contact_title = $request->contact_title;
        $page->contact_excerpt = $request->contact_excerpt;
        $page->contact_map = $request->contact_map;
        $page->contact_status = $request->contact_status; 
        $page->update();
        return redirect()->route('admin_contact_show')->with('success', 'Data is update succcessfully');
    }

}
