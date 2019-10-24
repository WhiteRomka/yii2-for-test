<?php

namespace auth;
use AcceptanceTester;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function tryToLoginCorrectData(AcceptanceTester $I)
    {
        $I->amOnPage('/site/login');
        $I->see('Please fill out the following fields to login:');
        $I->fillField('#loginform-email', 'ttt@t.t');
        $I->fillField('#loginform-password', 'ttt');

        $I->click('button.btn-primary');
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->see('Congratulations!');
    }

    public function tryToLoginIncorrectData(AcceptanceTester $I)
    {
        $I->amOnPage('/site/login');
        $I->see('Please fill out the following fields to login:');
        $I->fillField('#loginform-email', 'ttt@t.t1');
        $I->fillField('#loginform-password', 'ttt1');

        $I->click('button.btn-primary');
        $I->see('Не верное имя или пароль');
    }

    /*public function tryToLoginIncorrectData2(AcceptanceTester $I)
    {
        $I->amOnPage('/site/login');
        $I->see('Please fill out the following fields to login:');
        $I->fillField('#loginform-email', 'ttt@t.t1');
        $I->fillField('#loginform-password', 'ttt1');

        $I->click('button.btn-primary');
        $I->see('1Не верное имя или пароль');
    }*/


}
