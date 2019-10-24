<?php

namespace tests\api;

use Codeception\Util\HttpCode;

class UserCest
{
    //protected $getUser1url = 'https://yandex.ru/';
    protected $getUser1url = '/user/1';

   /* public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }*/

    // tests
    public function getUserApiTest(\AcceptanceTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendAjaxGetRequest($this->getUser1url);
        $I->seeResponseCodeIs(HttpCode::OK);
    }
}
