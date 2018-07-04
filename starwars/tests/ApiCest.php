<?php
class ApiCest
{
    public function tryApi(ApiTester $I)
    {

        // Luke Skywalker films
        $films = [
            "The Empire Strikes Back",
            "Revenge of the Sith",
            "A New Hope",
            "Return of the Jedi",
            "The Force Awakens"
        ];



        $I->sendGET('/people/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'name' => 'Luke Skywalker'
        ]);
        $films = $I->grabDataFromResponseByJsonPath('$..films');

        $actualFilmTitles = [];

        list($urls) = $films;
        $I->assertCount(5, $urls);
        codecept_debug($films);
        foreach ($urls as $url) {
            $I->sendGET($url);
            $I->seeResponseCodeIs(200);
            list($title) = $I->grabDataFromResponseByJsonPath('$.title');
            $actualFilmTitles[] = $title;
            //error_log(var_export($arr));
        }
        codecept_debug($actualFilmTitles);

        $I->assertEquals(sort($films), sort($actualFilmTitles));
    }


}