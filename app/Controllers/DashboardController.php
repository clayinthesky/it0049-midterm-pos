<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\SaleModel;
class DashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard/index', [
            'productCount' => (new ProductModel())->countAllResults(),
            'saleCount' => (new SaleModel())->countAllResults(),
        ]);
    }
}
