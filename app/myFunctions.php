<?php

use App\Models\Stock_categories;
use App\Models\Stock;
use App\Models\Suppliers;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;


function get_category_name($categoryID)
{
    if ($categoryID != null) {
        $category = Stock_categories::whereCategory_id($categoryID)->first();
        return $category->category_name;
    }
}

function get_stock_name($stockID)
{
    if ($stockID != null) {
        $stock = Stock::whereId($stockID)->first();
        return $stock->name;
    }
}

function count_stocks_in_category($categoryID)
{
    if ($categoryID != null) {
        $category = Stock::whereCategory($categoryID)->get();
        return sizeOf($category);
    }
}

function get_supplier_name($supplierID)
{
    if ($supplierID != null) {
        $supplier = Suppliers::whereId($supplierID)->first();
        //dd($supplier);
        if($supplier != null){
            return $supplier->company_name;
        }
        else{
            return "Yok";
        }
        
    }
}

function stockLoging($id,$changeQuantity,$oldStockQuantity,$newStockQuantity)
{
    $log = "";
    if( $oldStockQuantity > $newStockQuantity){
        $log = Auth::user()->name." ".intval($changeQuantity)." adet ".get_stock_name($id)." kullandı.";
    }
    else{
        $log = Auth::user()->name." ".intval($changeQuantity)." adet ".get_stock_name($id)." ekledi.";
    }
    loging($log);
}


function stockNotification($id, $changeQuantity, $newStockQuantity){
    $stock = Stock::whereId($id)->first();
    if($stock->notification == true){

        $details = [
            'title' => 'Stocker - Stok Uyarı Maili',
            'body' => ''
        ];
       
        \Mail::to('eray5436@gmail.com')->send(new \App\Mail\MyMail($details));
        return true;
    }
    else{
        return false;
    }
}

function loging($log_info)
{
    $log = new Logs;
    $log->log_info = $log_info;
    $log->employee_id = Auth::user()->id;
    $log->save();

    return true;
}




?>