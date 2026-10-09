<?php
namespace App\Controllers;
use App\Models\UserModel;
class StaffController extends BaseController
{
    private UserModel $users;
    public function __construct() { $this->users = new UserModel(); }
    public function index() { return view('staff/index', ['staff' => $this->users->orderBy('full_name')->findAll()]); }
    public function new() { return view('staff/form', ['user' => null]); }
    public function create()
    {
        $data = $this->request->getPost(['username', 'full_name']);
        $data['password'] = password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT);
        $this->users->insert($data);
        return redirect()->to('/staff');
    }
    public function edit($id) { return view('staff/form', ['user' => $this->users->find($id)]); }
    public function update($id)
    {
        $data = $this->request->getPost(['username', 'full_name']);
        if ($this->request->getPost('password')) $data['password'] = password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT);
        $this->users->update($id, $data);
        return redirect()->to('/staff');
    }
    public function delete($id) { $this->users->delete($id); return redirect()->to('/staff'); }
}
