<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ComeMoney;


class MoneyComeController extends Controller
{
    
    //
    public function index(){
        $countmoney =ComeMoney::sum('money_no');
        $money=ComeMoney::paginate(5);
        return view('moneycome.index', compact('money','countmoney'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'money'=>'required|max:11',
                'explain'=>'required|max:255',
                'date'=>'required',
                'notice'=>'required|max:100',

            ],
            [
                'money.required'=>"ກະລຸນາປ້ອນຈຳນວນເງິນ!",
                'money.max' => "ຫ້າມປ້ອນເກິນ11ຕົວເນາະເຈົ້າບໍ່ມີເງິນຫຼາຍປານນັ້ນ",
                'explain.required'=>"ກະລຸນາປ້ອນຄຳອະທິບາຍ!",
                'explain.max' => "ຫ້າມປ້ອນເກິນ200ຕົວເນາະເຈົ້າບໍ່ມີເງິນຫຼາຍປານນັ້ນ",
                'date.required'=>"ກະລຸນາໃສ່ວັນທີດ້ວຍ!",
                'notice.required'=>"ກະລຸນາໃສ່ໝາຍເຫດດ້ວຍ!",
                'notice.max' => "ຫ້າມປ້ອນເກິນ100ຕົວເນາະເຈົ້າບໍ່ມີເງິນຫຼາຍປານນັ້ນ",

                
            ]
        );

        $moneyspend = new ComeMoney;
        $moneyspend->money_no = $request->money;
        $moneyspend->money_explain = $request->explain;
        $moneyspend->money_date = $request->date;
        $moneyspend->money_notice = $request->notice;
        $moneyspend->user_id = Auth::user()->id;
        $moneyspend->save();
        return redirect()->back()->with('success','ການບັນທືກສຳເລັດ!');
        
        
    }

    public function edit($id){
        $money = ComeMoney::find($id);
        return view('moneycome.edit', compact('money'));
    }

    public function update(Request $request , $id){
        //  
         $request->validate(
            [
                'money'=>'required|max:11',
                'explain'=>'required|max:255',
                'date'=>'required',
                'notice'=>'required|max:100',

            ],
            [
                'money.required'=>"ກະລຸນາປ້ອນຈຳນວນເງິນ!",
                'money.max' => "ຫ້າມປ້ອນເກິນ11ຕົວເນາະເຈົ້າບໍ່ມີເງິນຫຼາຍປານນັ້ນ",
                'explain.required'=>"ກະລຸນາປ້ອນຄຳອະທິບາຍ!",
                'explain.max' => "ຫ້າມປ້ອນເກິນ200ຕົວເນາະເຈົ້າບໍ່ມີເງິນຫຼາຍປານນັ້ນ",
                'date.required'=>"ກະລຸນາໃສ່ວັນທີດ້ວຍ!",
                'notice.required'=>"ກະລຸນາໃສ່ໝາຍເຫດດ້ວຍ!",
                'notice.max' => "ຫ້າມປ້ອນເກິນ100ຕົວເນາະເຈົ້າບໍ່ມີເງິນຫຼາຍປານນັ້ນ",

                
            ]
        );

        $update = ComeMoney::find($id)->update([
            'money_no' => $request->money,
            'money_explain' => $request->explain,
            'money_date' => $request->date,
            'money_notice' => $request->notice,
            'user_id' =>Auth::user()->id           
        ]);
        return redirect()->route('moneycome') ->with('success','ການແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

        public function delete(Request $request, $id){
            $delete = ComeMoney::find($id)->ForceDelete();
            return redirect()->back()->with('success', "ການລືບຂໍ້ມູນສຳເລັດ!");
        }
}
