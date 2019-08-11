<?php
namespace frontend\tests\functional;
use common\essences\Film;
use common\essences\FilmPerson;
use common\fixtures\PersonFixture;
use frontend\tests\FunctionalTester;
use common\fixtures\CommentFixture;
use common\fixtures\FilmFixture;
use common\fixtures\FilmActorFixture;
use common\fixtures\FilmGenreFixture;
use common\fixtures\GenreFixture;
use common\fixtures\ActorFixture;
use common\fixtures\WorldRatingFixture;
use common\fixtures\UserFixture;
use common\fixtures\RejeserFixture;
class FilmCest
{
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ],
            'film' => [
                'class' => FilmFixture::class,
                'dataFile' => codecept_data_dir() . 'film.php'
            ],
            'comment' => [
                'class' => CommentFixture::class,
                'dataFile' => codecept_data_dir() . 'comment.php'
            ],
            'genre' => [
                'class' => GenreFixture\::class,
                'dataFile' => codecept_data_dir() . 'genre.php'
            ],
            'world_rating' => [
                'class' => RatingFixture::class,
                'dataFile' => codecept_data_dir() . 'world_rating.php'
            ],
            'film_actor' => [
                'class' => FilmPerson::class,
                'dataFile' => codecept_data_dir() . 'film_person.php'
            ],
            'film_genre' => [
                'class' => FilmGenre::class,
                'dataFile' => codecept_data_dir() . 'film_genre.php'
            ],
            'actor' => [
                'class' => PersonFixture::class,
                'dataFile' => codecept_data_dir() . 'person.php'
            ],
        ];
    }
    public function checkFilms(FunctionalTester $I)
    {
        $I->amOnPage('/film/');
        $I->see('Films');
        $I->see('Rating');
        $I->see('Country');
        $I->see($I->grabFixture('film', 0)['title']);
        $I->seeElement('td img');
        $I->seeElement('td a');
    }
    public function checkFilm(FunctionalTester $I)
    {
        $I->amOnPage('/film/');
        $I->click('td a');
        $I->see('Похожие фильмы:');
        $I->see($I->grabFixture('genre', 0)['description']);
        $I->see($I->grabFixture('genre', 1)['description']);
        $I->see($I->grabFixture('actor', 0)['name']);
        $I->see($I->grabFixture('actor', 1)['name']);
        $I->seeElement('td img'); //rating image
        $I->see($I->grabFixture('comment', 0)['text']);
    }
    public function checkComment(FunctionalTester $I)
    {
        $I->amOnPage('/film/');
        $I->click('td a');
        $I->see($I->grabFixture('user', 0)['username']);
        $I->seeElement('div div img'); //user avatar
        $I->see($I->grabFixture('comment', 0)['text']);
    }
}