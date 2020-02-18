<?php
    use \App\Models\User;
    use \PHPUnit\Framework\TestCase;
    class UserTest extends TestCase
    {
        public function setUp(): void{
            var_dump ('Hola');
        }
        public function testCalcular()
        {
            $this->assertEquals(7,User::getinstance()->nombre(2,5));
        }
    }
?>