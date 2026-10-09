<?php
namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\SaleModel;
class SaleController extends BaseController
{
    public function index() { return view('sales/index', ['sales' => (new SaleModel())->history()]); }
    public function new()
    {
        return view('sales/form', [
            'products' => (new ProductModel())->where('stock_quantity >', 0)->orderBy('name')->findAll(),
            'customers' => (new CustomerModel())->orderBy('full_name')->findAll(),
        ]);
    }
    public function create()
    {
        $productModel = new ProductModel();
        $saleModel = new SaleModel();
        $product = $productModel->find((int) $this->request->getPost('product_id'));
        $quantity = (int) $this->request->getPost('quantity');
        if (! $product || $quantity < 1 || $quantity > (int) $product['stock_quantity']) {
            return redirect()->back()->withInput()->with('error', 'Requested quantity exceeds available stock.');
        }
        $db = db_connect();
        $db->transStart();
        $saleModel->insert([
            'product_id' => $product['id'],
            'customer_id' => $this->request->getPost('customer_id') ?: null,
            'sold_by' => session('user_id'),
            'quantity' => $quantity,
            'total_price' => $quantity * (float) $product['price'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $productModel->update($product['id'], ['stock_quantity' => (int) $product['stock_quantity'] - $quantity]);
        $db->transComplete();
        return redirect()->to('/sales')->with('message', 'Sale recorded and stock updated.');
    }
}
