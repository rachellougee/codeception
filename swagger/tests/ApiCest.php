<?php
class ApiCest 
{    
    protected $id = 0;
    public function getAllPets(ApiTester $I)
    {
        $I->sendGET('/pet/findByStatus', [
            'status' => 'available'
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function insertPet(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/pet', [
            'name' => 'dragon123',
            'category' => [
                'id' => 0,
                "name" => "string",
            ],
            'status' => 'available',
            'photoUrls' => [
                'https://pixabay.com/en/dragon-illusions-silhouette-fantasy-2794030/'
            ]
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'name' => 'dragon123',
            'status' => 'available',
        ]);
        $I->seeResponseMatchesJsonType([
            'name' => 'string',
            'status' => 'string',
            'id' => 'integer',
            'category' => 'array'
        ]);
        list($id) = $I->grabDataFromResponseByJsonPath('$..id');
        $I->sendGET('/pet/' . $id);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson([
            'name' => 'dragon123'
        ]);
        $this->id = $id;
    }

    public function updatePet(ApiTester $I)
    {
        codecept_debug($this->id);
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPUT('/pet',[
                'id' => $this->id,
                'name' => 'dragon',
                'status' => 'available'
          ]
        );

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

    }

    public function deletePet(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendDELETE('/pet/'.$this->id);
        $I->seeResponseCodeIs(200);
       // $I->seeResponseIsJson();
    }
}