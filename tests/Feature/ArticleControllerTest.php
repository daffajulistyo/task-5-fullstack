<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Sequence; // Import class Sequence
use Illuminate\Database\Eloquent\Factories\Factory as EloquentFactory; // Import class EloquentFactory

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testArticleCreation()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $category = Category::create([
            'name' => 'Category Name',
            'user_id' => $user->id,
        ]);

        $data = [
            'title' => 'Test Article',
            'content' => 'This is a test article content.',
            'category_id' => $category->id,
        ];

        $response = $this->post(route('articles.store'), $data);

        $response->assertRedirect(route('articles.index'))
                 ->assertSessionHas('success', 'Article created successfully.');

        $this->assertDatabaseHas('articles', [
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'user_id' => $user->id,
        ]);
    
    }

    public function testArticleUpdate()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $category = Category::create([
            'name' => 'Category Name',
            'user_id' => $user->id,
        ]);

        $article = Article::create([
            'title' => 'Test Article',
            'content' => 'This is a test article content.',
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

        $data = [
            'title' => 'Updated Article',
            'content' => 'This is an updated article content.',
            'category_id' => $category->id,
        ];

        $response = $this->put(route('articles.update', $article->id), $data);

        $response->assertRedirect(route('articles.index'))
                 ->assertSessionHas('success', 'Article updated successfully.');

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'user_id' => $user->id,
        ]);
    }

    public function testArticleDeletion()
    {
        
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        
        $category = Category::create([
            'name' => 'Category Name',
            'user_id' => $user->id,
        ]);

        $article = Article::create([
            'title' => 'Test Article',
            'content' => 'This is a test article content.',
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);


        $this->assertDatabaseHas('articles', ['id' => $article->id]);

        $this->actingAs($user);

      
        $response = $this->delete(route('articles.destroy', $article->id));

     
        $response->assertRedirect(route('articles.index'))
                 ->assertSessionHas('success', 'Article deleted successfully.');

        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    
    }
}
