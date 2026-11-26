<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\CreateAdminUserSeeder;
use Database\Seeders\PermissionTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpgradeSmokeTest extends TestCase
{
    use RefreshDatabase;

    public function test_pages_render_for_admin(): void
    {
        $this->seed(PermissionTableSeeder::class);
        $this->seed(CreateAdminUserSeeder::class);
        $admin = User::where('email', 'admin@gmail.com')->firstOrFail();

        $this->get('/')->assertRedirect('/login');
        $this->get('/login')->assertOk();

        $this->post('/post-login', ['email' => 'admin@gmail.com', 'password' => '123456'])->assertRedirect();
        $this->assertAuthenticatedAs($admin);

        foreach (['/', '/users', '/users/create', "/users/{$admin->id}/edit", '/roles', '/roles/create', '/roles/1/edit',
                  '/qr', '/qr_create', '/pc_sale', '/pc_sale/create', '/categories', '/categories/create', '/logo', '/logo/create'] as $uri) {
            $res = $this->get($uri);
            $this->assertTrue($res->isOk(), "$uri => {$res->status()} ".($res->exception?->getMessage() ?? ""));
        }

        $this->post('/roles', ['name' => 'Staff', 'permission' => [1, 2]])->assertRedirect();
        $this->assertDatabaseHas('roles', ['name' => 'Staff']);

        $this->post('/qr_export', [])->assertOk()->assertDownload('qr_list.xlsx');
        $this->post('/pc_sale/export', [])->assertOk()->assertDownload('pc_sale.xlsx');
    }
}
