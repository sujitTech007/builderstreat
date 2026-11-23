<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class UpdateAdminPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-admin-password';

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
        $admin = Admin::where('email', 'superadmin@gmail.com')->first();
        if ($admin) {
            $admin->password = Hash::make('password');
            $admin->save();
            $this->info('Admin password updated successfully.');
        } else {
            $this->error('Admin with email superadmin@gmail.com not found.');
        }
        return 0;
    }
}
