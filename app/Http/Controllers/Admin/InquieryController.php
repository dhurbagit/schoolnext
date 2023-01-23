<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailMessage;
use App\Models\Inquiery;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class InquieryController extends Controller
{



    //frontend online form view
    public function inquiry_formShow(Request $request)
    {

        return view('frontend.inquiry');
    }
    //frotend online form save
    public function save_inquiry(Request $request)
    {
        // dd($request->all());


        $request->validate([
            'student_name' => 'required',
            's_applied_grade' => 'required',
            's_current_grade' => 'required',
            's_address' => 'required',
            's_phone' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = Setting::get()->first()->security_key;
                $response = $value;
                $userIp = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIp";
                $response = \file_get_contents($url);
                $response = json_decode($response);

                if (!$response->success) {
                    Session::flash('g-recaptcha-response', 'Please check recaptcha');
                    Session::flash('alert-class', 'alert-danger');
                    $fail($attribute, 'google reCaptcha failed');
                }
            },
        ], [
            'student_name.required' => 'Student Name is required',
            's_applied_grade.required' => 'Applied grade is required',
            's_current_grade.required' => 'Current Grade is required',
            's_address.required' => 'Student Address is required',
            's_phone.required' => 'Student Phone is required',
            'f_name.required' => 'Father Name is required',
            'm_name.required' => 'Mother Name is required',

        ]);
        $online_form = 'online form';
        $input['type'] = $online_form;
        $input['student_name'] = $request->student_name;
        $input['s_applied_grade'] = $request->s_applied_grade;
        $input['s_current_grade'] = $request->s_current_grade;
        $input['gender'] = $request->gender;
        $input['s_nationality'] = $request->s_nationality;
        $input['s_email'] = $request->s_email;
        $input['s_date_of_birth_bs'] = $request->s_date_of_birth_bs;
        $input['s_date_of_birth_ad'] = $request->s_date_of_birth_ad;
        $input['s_age'] = $request->s_age;
        $input['s_address'] = $request->s_address;
        $input['s_phone'] = $request->s_phone;
        $input['f_name'] = $request->f_name;
        $input['f_mobile_no'] = $request->f_mobile_no;
        $input['f_email'] = $request->f_email;
        $input['f_occupation'] = $request->f_occupation;
        $input['m_name'] = $request->m_name;
        $input['m_mobile_no'] = $request->m_mobile_no;
        $input['m_email'] = $request->m_email;
        $input['m_occupation'] = $request->m_occupation;
        $input['l_local_guardian'] = $request->l_local_guardian;
        $input['l_mobile_no'] = $request->l_mobile_no;
        $input['l_email'] = $request->l_email;
        $input['l_occupation'] = $request->l_occupation;
        $input['p_school_name'] = $request->p_school_name;
        $input['p_address'] = $request->p_address;
        $input['p_grade'] = $request->p_grade;
        $input['p_description'] = $request->p_description;

        if ($request->hasFile('s_image')) {
            $input['s_image'] = $request->file('s_image')->store('onlineform', 'uploads');
        }

        Inquiery::create($input);

        $test = request()->all();
        $setting = Setting::first()->toArray();
        $data1 = $test;
        $data = array_merge($setting, $data1);

        $user['to'] = $request->s_email;
        Mail::send('admin.sendMail.contactusEmail', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject('Subject');
        });

        return view('frontend.messagetemplate');
    }

    public function save_inquiry_next(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'student_name' => 'required',
                's_email' => 'required',
                's_address' => 'required',
                's_phone' => 'required',
                'p_description' => 'required',
                'g-recaptcha-response' => function ($attribute, $value, $fail) {
                    $secretKey = Setting::get()->first()->security_key;
                    $response = $value;
                    $userIp = $_SERVER['REMOTE_ADDR'];
                    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIp";
                    $response = \file_get_contents($url);
                    $response = json_decode($response);

                    if (!$response->success) {
                        Session::flash('g-recaptcha-response', 'Please check recaptcha');
                        Session::flash('alert-class', 'alert-danger');
                        $fail($attribute, 'google reCaptcha failed');
                    }
                },

            ]);
            $inquiry = 'inquiry';
            $input['type'] = $inquiry;
            $input['student_name'] = $request->student_name;
            $input['s_email'] = $request->s_email;
            $input['s_address'] = $request->s_address;
            $input['s_phone'] = $request->s_phone;
            $input['p_description'] = $request->p_description;

            Inquiery::create($input);

            $test = request()->all();
            $setting = Setting::first()->toArray();
            $data1 = $test;
            $data = array_merge($setting, $data1);

            $user['to'] = $request->s_email;
            Mail::send('admin.sendMail.contactusEmail', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject('Subject');
            });

            return view('frontend.messagetemplate');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('message', $message);
        }

    }

    public function delete_inquiry_next($id)
    {
        $delete = Inquiery::find($id);
        $delete->delete();
        return redirect()->back()->with('message', 'Message deleted successfully.');
    }

    public function save_contactus(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'student_name' => 'required',
            's_email' => 'required',
            's_phone' => 'required',
            's_address' => 'required',
            'p_description' => 'required',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = Setting::get()->first()->security_key;
                $response = $value;
                $userIp = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIp";
                $response = \file_get_contents($url);
                $response = json_decode($response);

                if (!$response->success) {
                    Session::flash('g-recaptcha-response', 'Please check recaptcha');
                    Session::flash('alert-class', 'alert-danger');
                    $fail($attribute, 'google reCaptcha failed');
                }
            },
        ], [
            'student_name.required' => 'Student Name is required',
            's_email.required' => 'Email is required',
            's_phone.required' => 'Phone is required',
            's_address.required' => 'Address is required',
            'p_description.required' => 'Message is required',
        ]);
        $contact_us = 'contactus';
        $input['type'] = $contact_us;
        $input['student_name'] = $request->student_name;
        $input['s_email'] = $request->s_email;
        $input['s_phone'] = $request->s_phone;
        $input['s_address'] = $request->s_address;
        $input['p_description'] = $request->p_description;
        Inquiery::create($input);

        $test = request()->all();
        $setting = Setting::first()->toArray();
        $data1 = $test;
        $data = array_merge($setting, $data1);

        $user['to'] = $request->s_email;
        Mail::send('admin.sendMail.contactusEmail', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject('Subject');
        });

        return view('frontend.messagetemplate');
    }

    public function contactUs_view()
    {
        $contactus = Inquiery::where('type', 'contactus')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.inquiry.contactus', compact('contactus'));
    }

    public function delete_contactUs($id)
    {

        $delete = Inquiery::find($id);
        $delete->delete();
        return redirect()->back()->with('message', 'Successfully deleted');
    }




    public function studentDetail($id)
    {
        $std_detail = Inquiery::where('type', 'online form')->find($id);
        // dd($std_detail);
        return view('admin.inquiry.student_form_detail', compact('std_detail'));
    }

    public function delete_record($id)
    {
        $delete_record = Inquiery::find($id);
        $delete_record->delete();

        return redirect()->back()->with('message', 'Record Deleted successfully!');
    }

}
