<?php

use App\Models\Stock_categories;
use App\Models\Stock;
use App\Models\Suppliers;


function get_category_name($categoryID)
{
    if ($categoryID != null) {
        $category = Stock_categories::whereCategory_id($categoryID)->first();
        return $category->category_name;
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



?>