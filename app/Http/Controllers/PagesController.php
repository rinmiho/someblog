<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;


class PagesController extends Controller
{
	public function about()
	{
		$people = [
			'Elle Woods', 'Tyrion', 'Snow White'
		];
		return view('pages.about', compact('people'));
	}

	public function contact()
	{
		return view('pages.contact');
	}
}
