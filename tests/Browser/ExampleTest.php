<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testregister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/http://127.0.0.1:8000/register')
            ->value('#name','athar')
            ->value('#email','athar@mail.com')
            ->click('button[type="submit"]')
                  
        });
    }
}
