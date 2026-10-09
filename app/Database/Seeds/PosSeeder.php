<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class PosSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        $this->db->table('users')->insert([
            'username' => 'admin',
            'full_name' => 'POS Administrator',
            'password' => password_hash('Admin123!', PASSWORD_DEFAULT),
            'avatar' => null,
            'created_at' => $now,
        ]);
        $this->db->table('products')->insertBatch([
            ['name' => 'Notebook', 'price' => 35.00, 'stock_quantity' => 50, 'image' => null, 'created_at' => $now],
            ['name' => 'Ballpen', 'price' => 12.00, 'stock_quantity' => 100, 'image' => null, 'created_at' => $now],
            ['name' => 'Folder', 'price' => 18.00, 'stock_quantity' => 24, 'image' => null, 'created_at' => $now],
        ]);
        $this->db->table('customers')->insert([
            'full_name' => 'Juan Cruz',
            'email' => 'juan@example.test',
            'phone' => '09170000000',
            'created_at' => $now,
        ]);
    }
}
