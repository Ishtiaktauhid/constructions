<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\PurchaseMaterial;
use App\Models\Backend\PurchaseMaterialDetail;
use App\Models\Backend\Supplier;
use App\Models\Backend\Material;
use App\Models\Backend\Stock;
use Illuminate\Http\Request;
use DB;

class PurchaseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $row = (int) request('row',10);
        if($row<1 || $row>100){
            abort(400,'The per-page parameter must be integer between 1 to 100.');
        }
        $purchasematerial=PurchaseMaterial::paginate($row);
        return view('backend.purchase.index',compact('purchasematerial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier=Supplier::get();
        return view('backend.purchase.create',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_search(Request $request)
    {
        if($request->name){
            $materials=Material::select('id','product_name as value','product_code as label')->where(function($query) use ($request) {
                        $query->where('product_name','like', '%' . $request->name . '%')->orWhere('product_code','like', '%' . $request->name . '%');
                        })->get();
                      print_r(json_encode($materials));  
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_search_data(Request $request)
    {
        if($request->item_id){
            $materials=Material::where('id',$request->item_id)->first();
            $data='<tr class="text-center">';
            $data.='<td class="p-2">'.$materials->product_name.'<input name="product_id[]" type="hidden" value="'.$materials->id.'"></td>';
            
            $data.='<td class="p-2"><input onkeyup="get_cal(this)" name="qty[]" type="text" class="form-control qty" value="0"></td>';
            $data.='<td class="p-2"><input onkeyup="get_cal(this)" name="price[]" type="text" class="form-control price" value="0"></td>';
            $data.='<td class="p-2"><input onkeyup="get_cal(this)" name="tax[]" type="text" class="form-control tax" value=""></td>';
            $data.='<td class="p-2">
                        <select onchange="get_cal(this)" class="form-control form-select discount_type" name="discount_type[]">
                            <option value="0">%</option>
                            <option value="1">Fixed</option>
                        </select>
                    </td>';
            $data.='<td class="p-2"><input onkeyup="get_cal(this)" name="discount[]" type="text" class="form-control discount" value="0"></td>';
            $data.='<td class="p-2"><input name="unit_cost[]" readonly type="text" class="form-control unit_cost" value="0"></td>';
            $data.='<td class="p-2"><input name="subtotal[]" readonly type="text" class="form-control subtotal" value="0"></td>';
            $data.='<td class="p-2 text-danger"><i style="font-size:1.7rem" onclick="removerow(this)" class="fa fa-dash-circle-fill"></i></td>';
            $data.='</tr>';
            
            print_r(json_encode($data));  
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $pur= new PurchaseMaterial;
            $pur->supplier_id=$request->supplierName;
            $pur->purchase_date = $request->purchase_date;
            $pur->reference_no=$request->reference_no;
            $pur->total_quantity=$request->total_qty;
            $pur->sub_amount=$request->tsubtotal;
            $pur->discount_type=$request->discount_all_type;
            $pur->discount=$request->discount_all;
            $pur->other_charge=$request->tother_charge;
            $pur->round_of=$request->troundof;
            $pur->grand_total=$request->tgrandtotal;
            $pur->note=$request->note;
            $pur->created_by=currentUserId();

            $pur->payment_status=0;
            $pur->status=1;
            if($pur->save()){
                if($request->product_id){
                    foreach($request->product_id as $i=>$product_id){
                        $pd=new PurchaseMaterialDetail;
                        $pd->purchase_id=$pur->id;
                        $pd->product_id=$product_id;
                        $pd->quantity=$request->qty[$i];
                        $pd->unit_price=$request->price[$i];
                        $pd->tax=$request->tax[$i]>0?$request->tax[$i]:0;
                        $pd->discount_type=$request->discount_type[$i];
                        $pd->discount=$request->discount[$i];
                        $pd->sub_amount=$request->unit_cost[$i];
                        $pd->total_amount=$request->subtotal[$i];
                        if($pd->save()){
                            $stock=new Stock;
                            $stock->purchase_id=$pur->id;
                            $stock->product_id=$product_id;
                            $stock->quantity=$pd->quantity;
                            $stock->unit_price=($pd->total_amount / $pd->quantity);
                            $stock->tax=$pd->tax;
                            $stock->discount=$pd->discount;
                            $stock->save();

                            DB::commit();
                        }
                    }
                }
                \Toastr::success('Create Successfully!');
                return redirect()->route('backend.purchase.index');
            }
        }catch(Exception $e){
            DB::rollback();
            dd($e);
            \Toastr::warning('Please try again!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $purchasematerial=PurchaseMaterial::find($id);
        return view('backend.purchase.edit',compact('purchasematerial'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $purchasematerial=PurchaseMaterial::find($id);
            $purchasematerial->purchase_date=$request->purchaseDate;
            $purchasematerial->supplier_id=$request->supplierId;
            $purchasematerial->purchase_no=$request-> purchaseNo;
            $purchasematerial->purchase_status=$request->status;
            $purchasematerial->sub_amount=$request->subAmount;
            $purchasematerial->discount=$request->discount;
            $purchasematerial->total_amount=$request->total;
            $purchasematerial->updated_by=currentUserId();
            $purchasematerial->save();
            $this->notice::success('Data successfully updated');
            return redirect('backend.purchase.index');

        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchasematerial=PurchaseMaterial::find($id);
        PurchaseMaterialDetail::where('purchase_id',$id)->delete();
        Stock::where('purchase_id',$id)->delete();
        $purchasematerial->delete();
        $this->notice::success('Data successfully deleted');
        return redirect()->back();
    }
}