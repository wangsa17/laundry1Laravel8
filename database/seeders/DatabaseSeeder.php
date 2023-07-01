<?php

namespace Database\Seeders;

use App\Models\member;
use App\Models\outlet;
use App\Models\paket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        outlet::create([
            'nama' => 'Utama',
            'alamat' => 'Prajuritkulon, Mojokerto',
            'tlp' => '0895635645611',
           ]);
        User::create([
            'nama' => 'admin',
            'username' => 'admin',
            'email'=>'admin@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('admin'),
            'outlet_id' => '1',
        ]);
        User::create([
            'nama' => 'kasir',
            'username' => 'kasir',
            'email'=>'kasir@gmail.com',
            'role' => 'Kasir',
            'password' => bcrypt('kasir'),
            'outlet_id' => '1',
        ]);
        User::create([
            'nama' => 'owner',
            'username' => 'owner',
            'email'=>'owner@gmail.com',
            'role' => 'Owner',
            'password' => bcrypt('owner'),
            'outlet_id' => '1',
           ]);
        member::create([
            'nama' => 'member',
            'username' => 'member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('member'),
            'alamat' => 'Pulo',
            'jenis_kelamin' => 'Laki-laki',
            'tlp' => '0895635645611',
            'role' => 'Member',
           ]);
        paket::create([
            'nama_paket' => 'Paket Cuci Kering',
            'harga' => '5000',
            'deskripsi' => 'Cuci sampai kering',
           ]);
    }
}
