<?php
namespace App\Controllers;
use App\Models\ProductModel;
class ProductController extends BaseController
{
    private ProductModel $products;
    public function __construct() { $this->products = new ProductModel(); }
    public function index() { return view('products/index', ['products' => $this->products->orderBy('name')->findAll()]); }
    public function new() { return view('products/form', ['product' => null]); }
    public function create()
    {
        $data = $this->request->getPost(['name', 'price', 'stock_quantity']);
        if ($image = $this->upload('image', 'products')) { $data['image'] = $image; }
        if (! $this->products->insert($data)) return redirect()->back()->withInput()->with('errors', $this->products->errors());
        return redirect()->to('/products')->with('message', 'Product added.');
    }
    public function edit($id) { return view('products/form', ['product' => $this->products->find($id)]); }
    public function update($id)
    {
        $data = $this->request->getPost(['name', 'price', 'stock_quantity']);
        if ($image = $this->upload('image', 'products')) { $data['image'] = $image; }
        if (! $this->products->update($id, $data)) return redirect()->back()->withInput()->with('errors', $this->products->errors());
        return redirect()->to('/products')->with('message', 'Product updated.');
    }
    public function delete($id) { $this->products->delete($id); return redirect()->to('/products')->with('message', 'Product archived.'); }
    private function upload(string $field, string $folder): ?string
    {
        $file = $this->request->getFile($field);
        if (! $file || $file->getError() === UPLOAD_ERR_NO_FILE) return null;
        if (! $file->isValid() || ! in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/webp'], true)) return null;
        $name = $file->getRandomName();
        $file->move(FCPATH . 'uploads/' . $folder, $name);
        return $name;
    }
}
