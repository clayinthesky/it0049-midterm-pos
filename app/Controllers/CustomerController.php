<?php
namespace App\Controllers;
use App\Models\CustomerModel;
class CustomerController extends BaseController
{
    private CustomerModel $customers;
    public function __construct() { $this->customers = new CustomerModel(); }
    public function index() { return view('customers/index', ['customers' => $this->customers->orderBy('full_name')->findAll()]); }
    public function new() { return view('customers/form', ['customer' => null]); }
    public function create() { if (! $this->customers->insert($this->request->getPost(['full_name', 'email', 'phone']))) return redirect()->back()->withInput()->with('errors', $this->customers->errors()); return redirect()->to('/customers'); }
    public function edit($id) { return view('customers/form', ['customer' => $this->customers->find($id)]); }
    public function update($id) { if (! $this->customers->update($id, $this->request->getPost(['full_name', 'email', 'phone']))) return redirect()->back()->withInput()->with('errors', $this->customers->errors()); return redirect()->to('/customers'); }
    public function delete($id) { $this->customers->delete($id); return redirect()->to('/customers'); }
}
