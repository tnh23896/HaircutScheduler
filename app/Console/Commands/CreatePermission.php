<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-permission';

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
        $dataPermissions = config('permissions');
        $mergedArray = [];
        foreach ($dataPermissions as $permissions) {
            $mergedArray = array_merge($mergedArray, $permissions);
        }
        foreach ($mergedArray as $key => $value) {
            Permission::query()->updateOrCreate([
                'name' => $key,
                'guard_name' => 'admin'
            ]);
        }

        Permission::query()
            ->where('guard_name', 'admin')
            ->whereNotIn('name', array_keys($mergedArray))
            ->delete();


        $role = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }





}
