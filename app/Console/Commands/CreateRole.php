<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;
use DB;
use App\Contracts\Role as RoleContract;
class CreateRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create-role 
                            {name}
                            {guard?}
                            {permissions?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a role';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->truncateTable();
        $roleClass = app(RoleContract::class);
        $role = $roleClass::findOrCreate([
            'name' => $this->argument('name'),
            'guard_name' => $this->argument('guard')
        ]);
        $permissions = $this->makePermissions($this->argument('permissions'))->pluck('id')->toArray();

        $role->permissions()->sync($permissions,false);

    }

    public function makePermissions(string $permissions){

        if(empty($permissions)){
            return;
        }

        //$arrPermission = explode('|',$permissions);

        return Permission::createPermission($permissions,$this->argument('guard'));
        
    }

    public function truncateTable(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('role_permission')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
