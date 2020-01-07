<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Проверить существование главной страницы и ссылка ни login');

$I->amOnPage('/');
$I->see('Congratulations! You have successfully  created your Yii-powered application.');

$I->seeLink('Login', '/site/login');
