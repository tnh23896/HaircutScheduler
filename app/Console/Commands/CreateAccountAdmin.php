<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateAccountAdmin extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = 'admin@gmail.com';
        $phone = '0339770803';
        $password = 123456;
        $username = 'Admin';
        $avatar = '';
        $description = '';

        $admin = Admin::create([
            'username' => $username,
            'avatar' => $avatar,
            'phone' => $phone,
            'email' => $email,
            'password' => bcrypt($password),
            'description' => $description,
        ]);

        $role = Role::where('name', 'super-admin')->first();
        $admin->assignRole($role);

        $this->info('Admin account created successfully.');
    }

}
