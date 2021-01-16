<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Stock;
use App\Models\Stock_categories;
use App\Models\Suppliers;
use View;






class MainController extends Controller
{

    public function create(Request $request)
    {
        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));
        $users = User::get();
        return view('employees', compact('users'));
    }
    public function getAllEmployee()
    {
        $users = User::get();
        return view('employees', compact('users'));
    }
    public function EmployeeView($id)
    {
        $user = User::findOrFail($id);
        return view('employeeView', compact('user'));
    }
    public function EmployeeEdit($id)
    {
        $user = User::findOrFail($id);
        return view('EmployeeEdit', compact('user'));
    }
    public function EmployeeUpdate(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
        ]);
        return redirect()->route('employeeEdit', [$request->id]);
    }



    public function AllStockCategory(Request $request)
    {
        $categories = Stock_categories::get();
        return view('categoryStock', compact('categories'));
    }
    public function createCategory(Request $request)
    {
        $category = Stock_categories::create([
            'category_id' => rand(10000, 99999),
            'category_name' => $request->category_name,
        ]);
        $categories = Stock_categories::get();
        return redirect()->route('manage-stock-category', compact('categories'));
    }

    public function deleteStockCategory(Request $request)
    {
        $category = Stock_categories::findOrFail($request->id);
        $category->delete();
        $categories = Stock_categories::get();
        return redirect()->route('manage-stock-category', compact('categories'));
    }

    public function editStockCategory(Request $request)
    {
        $category = Stock_categories::findOrFail($request->id);
        $category->update([
            'category_name' => $request->category_name,
        ]);
        $categories = Stock_categories::get();
        return redirect()->route('manage-stock-category', compact('categories'));
    }

    public function getStocks(Request $request)
    {
        $categories = Stock_categories::get();
        $users = User::get();
        $stocks = Stock::get();
        $suppliers = Suppliers::get();
        return view('stock', compact('categories', 'users', 'stocks','suppliers'));
    }

    public function createStock(Request $request)
    {
        $notification = 0;
        $request->notification != null  ? $notification = 1 : $notification = 0;

        if ($request->action == 1) {
            $stock = Stock::findOrFail($request->id);
            $stock->update([
                'name' => $request->name,
                'stock_id' => $request->stockNo,
                'category' => $request->category,
                'supplier' => $request->supplier,
                'location' => $request->location,
                'notification' => $notification,
                'notificationUser' => $request->notificationPerson,
                'notificationQuantity' => $request->notificationQuantity,
            ]);
        } else {
            $stocks = Stock::create([
                'name' => $request->name,
                'stock_id' => $request->stockNo,
                'category' => $request->category,
                'supplier' => $request->supplier,
                'location' => $request->location,
                'quantity' => $request->quantity,
                'notification' => $notification,
                'notificationUser' => $request->notificationPerson,
                'notificationQuantity' => $request->notificationQuantity,
            ]);
        }


        return redirect()->route('stock');
    }
    public function deleteStock(Request $request)
    {
        $stock = Stock::findOrFail($request->id);
        $stock->delete();
        return redirect()->route('stock');
    }

    public function changeStock(Request $request)
    {
        //dd($request);
        $stock = Stock::findOrFail($request->id);
        $stock->update([
            'quantity' => $request->newStockQuantity,
        ]);
        $log = stockLoging($request->id, $request->changeQuantity, $request->oldStockQuantity, $request->newStockQuantity );
        $notification = stockNotification($request->id, $request->changeQuantity, $request->newStockQuantity);
        return redirect()->route('stock');
    }

    public function createSuppiler(Request $request)
    {
        if ($request->action == 1) {
            $suppliers = Suppliers::findOrFail($request->id);
            $suppliers->update([
                'company_name' => $request->company_name,
                'company_adress' => $request->company_adress,
                'company_tel' => $request->company_tel,
                'company_mail' => $request->company_mail,
                'contact_name' => $request->contact_name,
                'contact_tel' => $request->contact_tel,
                'contact_mail' => $request->contact_mail,
            ]);
        } else {
            $suppliers = Suppliers::create([
                'company_name' => $request->company_name,
                'company_adress' => $request->company_adress,
                'company_tel' => $request->company_tel,
                'company_mail' => $request->company_mail,
                'contact_name' => $request->contact_name,
                'contact_tel' => $request->contact_tel,
                'contact_mail' => $request->contact_mail,
            ]);
        }
        return redirect()->route('suppliers');
    }

    public function getSuppliers(Request $request)
    {
        $suppliers = Suppliers::get();
        return view('suppliers', compact('suppliers'));
    }

    public function deleteSupplier(Request $request)
    {
        $suppliers = Suppliers::findOrFail($request->id);
        $suppliers->delete();
        return redirect()->route('suppliers');
    }

    

    

    
}
