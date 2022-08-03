<?php
require '../functions.php';
use PHPUnit\Framework\TestCase;
class testFunctions extends TestCase
{

    public function testCreateAllDisplayCardSuccess1()
    {
        $inputA = [['color' => 'MTG Card', 'title' => 'Centaur Courser', 'cardType' => 'Creature - Centaur Warrior', 'raritySet' => 'common']];

        $result = createAllDisplayCards($inputA);
        $this->assertIsString($result);

    }

    public function testCreateAllDisplayCardsSuccess2()
    {
        $inputA = [
            [
                'color' => 'Green',
                'title' => 'Centaur Courser',
                'cardType' => 'Creature - Centaur Warrior',
                'raritySet' => 'Common'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Centaur Courser</p><p>Card Type: Creature - Centaur Warrior</p><p>Card Color: Green</p><p>Rarity: Common</p></div>";
        $result = createAllDisplayCards($inputA);
        $this->assertEquals($expected, $result);
    }

    public function testCreateAllDisplayCardsSuccess3()
    {
        $inputA = [
            [
                'color' => 'blue',
                'title' => 'Amphin Pathmage',
                'cardType' => 'Creature - Salamander Wizard',
                'raritySet' => 'common'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Amphin Pathmage</p><p>Card Type: Creature - Salamander Wizard</p><p>Card Color: blue</p><p>Rarity: common</p></div>";
        $result = createAllDisplayCards($inputA);
        $this->assertEquals($expected, $result);
    }


    public function testCreateAllDisplayCardsSuccess4()
    {
        $inputA = [
            [
                'color' => 'White',
                'title' => 'Sungrace Pegasus',
                'cardType' => 'Creature - Pegasus',
                'raritySet' => 'Common'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Sungrace Pegasus</p><p>Card Type: Creature - Pegasus</p><p>Card Color: White</p><p>Rarity: Common</p></div>";
        $result = createAllDisplayCards($inputA);
        $this->assertEquals($expected, $result);
    }

    public function testCreateAllDisplayCardsMalformed1()
    {
        $inputA = 'I am a string!';
        $this->expectException(TypeError::class);
        $result = createAllDisplayCards($inputA);
    }

    public function testCreateAllDisplayCardsMalformed2()
    {
        $inputA = 1;
        $this->expectException(TypeError::class);
        $result = createAllDisplayCards($inputA);
    }

    public function testCreateAllDisplayCardsMalformed3()
    {
        $inputA = true;
        $this->expectException(TypeError::class);
        $result = createAllDisplayCards($inputA);
    }

    public function testCreateAllDisplayCardsFailure1()
    {
        $inputA = [
            [
                'color' => 'White',
                'title' => 'Sungrace Pegasus',
                'cardType' => 'Creature - Pegasus',
                'rarity' => 'notaSetRarity'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Sungrace Pegasus</p><p>Card Type: Creature - Pegasus</p><p>Card Color: White</p></div>";
        $result = createAllDisplayCards($inputA);
        $this->assertEquals($expected, $result);
    }

    public function testCreateAllDisplayCardsFailure2()
    {
        $inputA = [
            [
                'color' => 'white',
                'title' => 'Sungrace Pegasus',
                'cardType' => 'Creature - Pegasus',
                'raritySet' => 'common',
                'notAKey' => 'notavalue'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Sungrace Pegasus</p><p>Card Type: Creature - Pegasus</p><p>Card Color: White</p><p>Rarity: Common</p><form method='post'><button class='view-card-button' type='submit' value='Sungrace Pegasus' name='createCard'>View Card</button></form></div>";
        $result = createAllDisplayCards($inputA);
        $this->assertEquals($expected, $result);
    }

    public function testCreateAllDisplayCardsFailure3()
    {
        $inputA = [
            [
                'color' => 'white',
                'title' => 'Sungrace Pegasus',
                'cardType' => 'Creature - Pegasus',
                'raritySet' => 'common',
                'alsoNotAnExpectedKey' => 'theSpanishInquisition'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Sungrace Pegasus</p><p>Card Type: Creature - Pegasus</p><p>Card Color: White</p><p>Rarity: Common</p><form method='post'><button class='view-card-button' type='submit' value='Sungrace Pegasus' name='createCard'>View Card</button></form></div>";
        $result = createAllDisplayCards($inputA);
        $this->assertEquals($expected, $result);
    }

    public function testCreateAllDisplayCardsFailure4()
    {
        $inputA = [
            [
                'notAColor' => 'white',
                'title' => 'Sungrace Pegasus',
                'cardType' => 'Creature - Pegasus',
                'raritySet' => 'common',
                'alsoNotAnExpectedKey' => 'theSpanishInquisition'
            ]
        ];
        $expected = '';
        $result = createAllDisplayCards($inputA);
        $this->assertEquals($expected, $result);
    }

}