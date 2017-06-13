<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Approvalitem;
use App\Approval;

class ApprovalitemController extends Controller
{
    public function insertDataApproval(Request $req)
    {
    	$id_approval = $req->input('id_approval');
    	$amount = $req->input('amount');
    	$keterangan = $req->input('keterangan');
    	$attachment = $req->input('attachment');
    	$image = $req->input('image');
    	$col_c = $req->input('col_c');
    	$col_d = $req->input('col_d');
    	$note = $req->input('note');
    	$status = 0;

    	$check = Approval::where('id', $id_approval)->count();

    	if($check!=0){	
	    	$insertDataApproval = new Approvalitem();

	    	$insertDataApproval->id_approval = $id_approval;
	    	$insertDataApproval->amount = $amount;
	    	$insertDataApproval->keterangan = $keterangan;
	    	$insertDataApproval->attachment = $attachment;
	    	$insertDataApproval->image = $image;
	    	$insertDataApproval->col_c = $col_c;
	    	$insertDataApproval->col_d = $col_d;
	    	$insertDataApproval->note = $note;
	    	$insertDataApproval->status = $status;

	    	$insertDataApproval->save();

	    	return response()->json(['success'=>true, 'message'=>'Insert Item successfull!']);
    	}
    	else
    	{
    		return response()->json(['success'=>false, 'message'=>'Invalid id_approval !']);
    	}

    }

    public function listItemApproval(Request $req){
    	$id = $req->input('id_approval');
    	$data_item = Approvalitem::where('id_approval',$id)->get();

    	return $data_item;
    }

    public function approve(Request $req)
    {
    	$id = $req->input('id');
    	if(Approvalitem::where('id', $id)->update(['status'=>1]))
    	{
    		return response()->json(['success'=>true, 'message'=>'Success approve item']);
    	}
    	else
    	{
    		return response()->json(['success'=>false, 'message'=>'Not found approvion !']);
    	}

    }

    public function reject(Request $req)
    {
    	$id = $req->input('id');
    	if(Approvalitem::where('id', $id)->update(['status'=>2]))
    	{
    		return response()->json(['success'=>true, 'message'=>'Success reject item']);
    	}
    	else
    	{
    		return response()->json(['success'=>false, 'message'=>'Not found rejection !']);
    	}
    }
}
