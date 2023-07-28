<?php

namespace Tests\Feature;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testCategoryCreation()
    {
        // Create a user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // Acting as the user
        $this->actingAs($user);

        // Data for category creation
        $data = [
            'name' => 'Test Category',
        ];

        // Submit the category creation form
        $response = $this->post(route('categories.store'), $data);

        // Check if the category was created successfully
        $response->assertRedirect(route('categories.index'))
                 ->assertSessionHas('success', 'Category created successfully.');

        // Ensure the category is in the database
        $this->assertDatabaseHas('categories', [
            'name' => $data['name'],
            'user_id' => $user->id,
        ]);
    }

    public function testCategoryUpdate()
    {
        // Create a user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // Acting as the user
        $this->actingAs($user);

        // Create a category
        $category = Category::create([
            'name' => 'Test Category',
            'user_id' => $user->id,
        ]);

        // Data for category update
        $data = [
            'name' => 'Updated Category',
        ];

        // Submit the category update form
        $response = $this->put(route('categories.update', $category->id), $data);

        // Check if the category was updated successfully
        $response->assertRedirect(route('categories.index'))
                 ->assertSessionHas('success', 'Category updated successfully.');

        // Ensure the category is updated in the database
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => $data['name'],
            'user_id' => $user->id,
        ]);
    }

    public function testCategoryDeletion()
    {
        // Create a user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // Acting as the user
        $this->actingAs($user);

        // Create a category
        $category = Category::create([
            'name' => 'Test Category',
            'user_id' => $user->id,
        ]);

        // Ensure the category is in the database
        $this->assertDatabaseHas('categories', ['id' => $category->id]);

        // Submit the category deletion form
        $response = $this->delete(route('categories.destroy', $category->id));

        // Check if the category was deleted successfully
        $response->assertRedirect(route('categories.index'))
                 ->assertSessionHas('success', 'Category deleted successfully.');

        // Ensure the category is no longer in the database
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
