<?php

namespace Tests\Unit;
use App\Models\User;
use App\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_user()
    {
        // Створюємо роль для тесту
        $role = Role::factory()->create([
            'name' => 'User',
        ]);

        // Створюємо користувача
        $user = User::factory()->create([
            'name' => 'John',
            'surname' => 'Doe',
            'username' => 'asfafas',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'role_id' => $role->id,
        ]);

        // Перевірка, чи користувач створений
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John', $user->name);
        $this->assertEquals('Doe', $user->surname);
        $this->assertEquals('asfafas', $user->username);
        $this->assertEquals('johndoe@example.com', $user->email);
        $this->assertEquals('1234567890', $user->phone);
        $this->assertEquals($role->id, $user->role_id);
    }
    /** @test */
    public function it_has_correct_properties()
    {
        // Створюємо роль для тесту
        $role = Role::factory()->create([
            'name' => 'Admin',
        ]);

        // Створюємо користувача
        $user = User::factory()->create([
            'name' => 'Jane',
            'surname' => 'Doe',
            'email' => 'janedoe@example.com',
            'phone' => '9876543210',
            'role_id' => $role->id,
        ]);

        // Перевірка властивостей користувача
        $this->assertEquals('Jane', $user->name);
        $this->assertEquals('Doe', $user->surname);
        $this->assertEquals('janedoe@example.com', $user->email);
        $this->assertEquals('9876543210', $user->phone);
        $this->assertEquals($role->id, $user->role_id);
    }
    /** @test */
    public function it_belongs_to_role()
    {
        // Створюємо роль для тесту
        $role = Role::factory()->create([
            'name' => 'Manager',
        ]);

        // Створюємо користувача з відповідною роллю
        $user = User::factory()->create([
            'role_id' => $role->id,
        ]);

        // Перевірка відношення користувача до ролі
        $this->assertInstanceOf(Role::class, $user->role);
        $this->assertEquals('Manager', $user->role->name);
    }
}
