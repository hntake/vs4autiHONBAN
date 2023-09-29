<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use Illuminate\Pagination\Paginator;


class TaxController extends Controller
{
    public function tax(Request $request)
    {
        $validate = $request->validate(
            [
                'goods' => 'required|max:25',
                'price' => 'regex:/^[0-9]+$/',
              ]
        );
            $tax = new Tax;
            $tax->name = $request->name;
            $tax->goods = $request->goods;
            $tax->price = $request->price;
            $tax->save();

            $request->session()->regenerateToken();

            $counts = Tax::count();
            $total = Tax::sum('price');
            
            $taxes = Tax::orderBy('created_at', 'desc')->paginate(15);
            $date=now()->format('Y年m月d日');
            return view('tax/list', [
                'taxes' => $taxes,
                'counts' => $counts,
                'total'=> $total,
                'date'=>$date
            ]);
        
    }

    public function list(Request $request)
    {
        $counts = Tax::count();
        $total = Tax::sum('price');
        
        $taxes = Tax::orderBy('created_at', 'desc')->paginate(15);
        $date=now()->format('Y年m月d日');

        return view('tax/list', [
            'taxes' => $taxes,
            'counts' => $counts,
            'total'=> $total,
            'date'=>$date
        ]);
    }
}
