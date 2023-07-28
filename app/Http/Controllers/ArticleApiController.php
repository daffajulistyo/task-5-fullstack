<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ArticleApiController extends Controller
{
    public function index(Request $request)
    {
        // Validasi query parameter jika diberikan
        $validator = Validator::make($request->all(), [
            'page' => 'integer|min:1',
            'per_page' => 'integer|min:1|max:50',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // Dapatkan query parameter page dan per_page
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 10);

        // Ambil data artikel menggunakan pagination
        $articles = Article::paginate($perPage);

        return response()->json($articles);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = Article::create($validatedData);

        return response()->json($article, 201);
    }

    public function show($id)
    {
        try {
            $article = Article::findOrFail($id);
            return response()->json($article);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Data Not Found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validatedData);

        return response()->json($article);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'Article deleted']);
    }
}
