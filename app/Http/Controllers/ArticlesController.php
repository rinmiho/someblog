<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ArticlesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['only' => ['create','edit', 'destroy']]);
	}

	/**
	 * Show all articles.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latest('published_at')->published()->get();
		return view('articles.index', compact('articles'));
	}

	/**
	 * Show a single article.
	 *
	 * @param Article $article
	 * @return Response
	 */
	public function show(Article $article)
	{
		$threads = $article->comments;
		return view('articles.show', compact('article', 'threads'));
	}

	/**
	 * Show the page to create a new article.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('articles.create');
	}

	/**
	 * Save a new article.
	 *
	 * @return Response
	 */

	public function store(ArticleRequest $request)
	{
		\Auth::user()->articles()->create($request->all());
		flash()->success('Your article has been created!');
		//flash()->overlay('Your article has been successfully created!', 'Good Job');
		return redirect('articles');
	}

	/**
	 * Edit an existing article.
	 *
	 * @param Article $article
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(Article $article)
	{
		return view('articles.edit', compact('article'));
	}

	/**
	 * Update an existing article.
	 *
	 * @param Article $article
	 * @param ArticleRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Article $article, ArticleRequest $request)
	{
		$article->update($request->all());
		flash()->success('Your article has been successfully updated!');
		return redirect('articles/'.$article->id);
	}

	/**
	 * Delete an existing article.
	 *
	 * @param Article $article
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function destroy(Article $article)
	{
		$article->delete();
		flash()->success('Your article has been deleted!');
		return redirect('articles');
	}
}
