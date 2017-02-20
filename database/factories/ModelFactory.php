<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
	static $password;

	return [
		'name' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'password' => $password ?: $password = bcrypt('secret'),
		'remember_token' => str_random(10),
	];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Article::class, function (Faker\Generator $faker) {

	$numberOfUsers = 5;
	$startDate = \Carbon\Carbon::create(2016, 12, 6, 8, 56, 49, 'Asia/Novosibirsk');
	$endDate = \Carbon\Carbon::today();

	return [
		'user_id' => $faker->numberBetween(1,$numberOfUsers),
		'title' => $faker->sentence(),
		'body' => $faker->realText(500),
		'excerpt' => $faker->paragraph(),
		'published_at' => $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d'),
	];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
	$numberOfUsers = App\User::all()->count();
	$numberOfArticles = App\Article::all()->count();

	$thisArticleId = $faker->numberBetween(1,$numberOfArticles);

	$allCommentsToThisArticle = App\Comment::all()->where('article_id', '=', $thisArticleId);
	$chooseFromCommentsWithTheseIds = [0];   //...or comment for article directly

	//...but we will actually choose from all comments that are made to this article
	foreach ($allCommentsToThisArticle as $singleComment)
	{
		$chooseFromCommentsWithTheseIds[] = $singleComment->id;
	}

	return [
		'article_id' => $thisArticleId,
		'user_id' => $faker->numberBetween(1,$numberOfUsers),
		'parent_comment_id' => $faker->randomElement($chooseFromCommentsWithTheseIds),
		'body' => $faker->sentence($faker->numberBetween(3, 15)),
	];
});
