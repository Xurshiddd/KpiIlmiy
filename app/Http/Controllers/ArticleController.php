<?php

namespace App\Http\Controllers;

use App\Events\AttachmentEvent;
use App\Http\Requests\Article\ArticleStoreRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Models\Article;
use App\Services\AttachmentService;

class ArticleController extends Controller
{
    public function __construct(protected AttachmentService $service){}
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
        event(new AttachmentEvent($validated['filesDoc'], $article->filesDoc(), 'articles', 'document'));
        if (isset($validated['filesImg'])) {
            event(new AttachmentEvent($validated['filesImg'], $article->filesImg(), 'articles', 'image'));
        }
        return back()->with('success', 'Maqola muvofaqiyatli yuklandi.');
    }
    public function update(ArticleUpdateRequest $request, Article $article)
    {
        $validated = $request->validated();
        $article->update(
            [
                'title' => $validated['title'],
                'content' => $validated['content'] ?? null,
                'quarter' => $validated['quarter'],
            ]
        );
        if (isset($validated['filesDoc'])) {
            $this->service->destroy($article->filesDoc);
            event(new AttachmentEvent($validated['filesDoc'], $article->filesDoc(), 'articles', 'document'));
        }
        if (isset($validated['filesImg'])) {
            if ($article->filesImg) {
                $this->service->destroy($article->filesImg);
            }
            event(new AttachmentEvent($validated['filesImg'], $article->filesImg(), 'articles', 'image'));
        }
        return back()->with('success', 'Maqola muvofaqiyatli yangilandi.');
    }
    public function uploadPatent()
    {
        request()->validate([
            'patent' => 'required|file|mimes:pdf|max:10240',
            'article_id' => 'required|exists:articles,id',
        ]);
        $article = Article::findOrFail(request()->input('article_id'));
        if ($article->patent) {
            $this->service->destroy($article->patent);
        }
        event(new AttachmentEvent(request()->file('patent'), $article->patent(), 'patents', 'patent'));
        return back()->with('success', 'Patent fayli muvofaqiyatli yuklandi.');
    }
    public function getPatentStatus(Article $article)
    {
        if ($article->patent) {
            return response()->json(['status' => 'uploaded', 'patent_url' => $article->patent->path]);
        } else {
            return response()->json(['status' => 'not_uploaded']);
        }
    }
}
