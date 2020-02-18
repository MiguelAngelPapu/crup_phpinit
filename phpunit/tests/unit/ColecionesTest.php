<?php
use \App\Support\Coleciones;
use \PHPUnit\Framework\TestCase;

class ColecionesTest extends TestCase
{
    /** @test */
    public function empty_Colecion(){
        $this->assertEmpty(Coleciones::getinstance()->get());
    }
    /** @test */
    public function items_Colecion(){
        Coleciones::getinstance()->insert(['uno','dos','tres']);
        $this->assertEquals(3,Coleciones::getinstance()->count());
    }
}

?>