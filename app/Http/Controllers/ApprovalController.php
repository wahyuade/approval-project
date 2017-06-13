<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Approval;

class ApprovalController extends Controller
{
    public function insertApproval(Request $req)
    {
        $name = $req->input('name');
        $insert_data = new Approval();
        $insert_data->name = $name;
        $insert_data->save();

        return response()->json(['success'=>true, 'message'=>'Success add Approval object']);
    }

    public function listApproval()
    {
        $data_approval = Approval::get();

        return $data_approval;
    }
}
