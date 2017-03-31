<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;








class feedbackController extends Controller
{

	//意见反馈
    public function getFeedbackList(Request $request)
    {
        return view('admin.feedback.feedback-list');
    }

}