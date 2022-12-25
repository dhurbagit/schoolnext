<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Setting;
use App\Models\Inquiery;
use App\Models\EmailMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
        $input['p_school_name'] = $request->p_school_name;
        $input['p_address'] = $request->p_address;
        $input['p_grade'] = $request->p_grade;
        $input['p_description'] = $request->p_description;

        Inquiery::create($input);
        return view('frontend.messagetemplate');
    }

    public function save_inquiry_next(Request $request)
    {
        // dd($request->all());
        try{
            $request->validate([
                'student_name' => 'required',
                's_email' => 'required',
                's_address' => 'required',
                's_phone' => 'required',
                'p_description' => 'required',

            ]);
            $inquiry = 'inquiry';
            $input['type'] = $inquiry;
            $input['student_name'] = $request->student_name;
            $input['s_email'] = $request->s_email;
            $input['s_address'] = $request->s_address;
            $input['s_phone'] = $request->s_phone;
            $input['p_description'] = $request->p_description;

            Inquiery::create($input);
            return view('frontend.messagetemplate');
        }
        catch (Exception $e){
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
        ]);
        $contact_us = 'contactus';
        $input['type'] = $contact_us;
        $input['student_name'] = $request->student_name;
        $input['s_email'] = $request->s_email;
        $input['s_phone'] = $request->s_phone;
        $input['s_address'] = $request->s_address;
        $input['p_description'] = $request->p_description;
        Inquiery::create($input);
        return view('frontend.messagetemplate');
    }

    public function contactUs_view()
    {
        $contactus = Inquiery::where('type', 'contactus')->get();
        return view('admin.inquiry.contactus', compact('contactus'));
    }

    public function delete_contactUs($id)
    {

        $delete = Inquiery::find($id);
        $delete->delete();
        return redirect()->back()->with('message', 'Successfully deleted');
    }

    // email_reply

    public function email_reply(Request $request, $id)
    {
        // dd($request->all());

        $input['inquieries_id'] = $id;
        $input['message'] = $request->email_message;
        EmailMessage::create($input);
        $setting = Setting::first()->toArray();
        $data1 = Inquiery::find($id)->toArray();
        $data = array_merge($setting, $data1);
        $data['email_message'] = $request->email_message;
        // dd($data);
        $user['to'] = $data1['s_email'];
        Mail::send('admin.sendMail.contactusEmail', $data, function ($message) use ($user) {

            $message->from('dhurba179@gmail.com', 'John Doe');
            $message->to($user['to']);
            $message->subject('Subject');
        });
        return redirect()->back();
    }
}
