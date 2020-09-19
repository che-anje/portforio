<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Enums\Gender;

class GenderTest extends TestCase
{
    protected $gender;
    protected function setUp(): void
    {
        $this->array = array("未設定","男性","女性");
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testGenderDescription() {
        foreach($this->array as $index => $value) {
            $description = Gender::getDescription($index);
            $this->assertSame($value, $description);
        }
    }

    public function testGenderValue() {
        foreach($this->array as $index => $value) {
            $genderValue = Gender::getValue($value);
            $this->assertSame($index, $genderValue);
        }
    }
}
