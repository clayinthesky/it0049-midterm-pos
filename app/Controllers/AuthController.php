<?php
namespace App\Controllers;
use App\Models\UserModel;
class AuthController extends BaseController
{
    public function login() { return view('auth/login', ['title' => 'Login']); }
    public function attempt()
    {
        $user = (new UserModel())->where('username', $this->request->getPost('username'))->first();
        if (! $user || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }
        session()->set(['user_id' => $user['id'], 'full_name' => $user['full_name'], 'is_logged_in' => true]);
        return redirect()->to('/products');
    }
    public function logout() { session()->destroy(); return redirect()->to('/login'); }
}
