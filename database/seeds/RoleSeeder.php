<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = $this->getRoles();

        foreach ($roles as $role) {
            Role::create($role);
            echo $role['name'] . " eklendi \n";
        }

        $permissions = $this->getPermissions();
        $superAdmin  = Role::find(1);


        /*foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
            $superAdmin->attachPermission($permission['name']);

            echo "Super Admin " . $permission['name'] . " için yetkilendirildi \n";
        }*/
    }

    public function getRoles()
    {
        return [
            [
                'name'         => 'superadmin',
                'display_name' => 'Super Admin',
                'description'  => 'God View'
            ],
            [
                'name'         => 'personal',
                'display_name' => 'Stuff',
                'description'  => 'Modern Slave'
            ],
            [
                'name'         => 'employee',
                'display_name' => 'Employee',
                'description'  => 'Müşteri'
            ]
        ];
    }

    public function getPermissions()
    {
        return [
            [
                'name'         => 'personal',
                'display_name' => 'Personal Genel Erişim',
                'description'  => 'Personal Genel Erişim'
            ],
            [
                'name'         => 'personal.index',
                'display_name' => 'Personal Sayfası Listele',
                'description'  => 'Personal Sayfası Listele'
            ],
            [
                'name'         => 'personal.store',
                'display_name' => 'Personal Ekleyebilir',
                'description'  => 'Personal Ekleyebilir'
            ],
            [
                'name'         => 'personal.create',
                'display_name' => 'Personel Ekleme Sayfasını Görüntüyebilir',
                'description'  => 'Personel Ekleme Sayfasını Görüntüyebilir'
            ],
            [
                'name'         => 'personal.update',
                'display_name' => 'Personal Güncellenebilir',
                'description'  => 'Personal Güncellenebilir'
            ],
            [
                'name'         => 'personal.destroy',
                'display_name' => 'Personel Silinebilir',
                'description'  => 'Personel Silinebilir'
            ],
            [
                'name'         => 'personal.show',
                'display_name' => 'Personal Görüntülebilir',
                'description'  => 'Personal Görüntülebilir'
            ],
            [
                'name'         => 'personal.edit',
                'display_name' => 'Personal Düzenleme Sayfası Görüntüyebilir',
                'description'  => 'Personal Düzenleme Sayfası Görüntüyebilir'
            ]
        ];
    }
}
