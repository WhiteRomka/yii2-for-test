<?php

class InvoicesTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function test_customer_can_se_a_form_for_creating_new_invoice() {

       //$this->assertEquals(1, 1);
        /*$this->tester->amGoingTo('/super-pay/invoices/index');
        $this->tester->wantTo('Invo2ices');*/

        $I = new FunctionalTester();

        $I->amOnPage('super-pay/invoices/index');
        $I->see('Invo2ices', 'h1');
    }

    // tests
   /* public function testSomeFeature()
    {
        $this->assertEquals(1,1);
    }*/

}