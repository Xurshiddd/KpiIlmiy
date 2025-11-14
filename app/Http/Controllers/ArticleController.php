<?php

namespace App\Http\Controllers;

use App\Events\AttachmentEvent;
use App\Http\Requests\Article\ArticleStoreRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }
    public function store(ArticleStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['author_id'] = auth()->id();
        $article = Article::create(
            [
                'title' => $validated['title'],
                'content' => $validated['content'] ?? null,
                'author_id' => $validated['author_id'],
                'quarter' => $validated['quarter'],
            ]
        );
        event(new AttachmentEvent($validated['filesDoc'], $article->filesDoc(), 'articles'));
        if (isset($validated['filesImg'])) {
            event(new AttachmentEvent($validated['filesImg'], $article->filesImg(), 'articles'));
        }
        return back()->with('success', 'Maqola muvofaqiyatli yuklandi.');
    }
}
