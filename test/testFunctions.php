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
                'color' => 'green',
                'title' => 'Centaur Courser',
                'cardType' => 'Creature - Centaur Warrior',
                'raritySet' => 'common'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Centaur Courser</p><p>Card Type: Creature - Centaur Warrior</p><p>Card Color: Green</p><p>Rarity: Common</p><form method='post'><button class='view-card-button' type='submit' value='Centaur Courser' name='createCard'>View Card</button></form></div>";
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
        $expected = "<div class='display-card'><p>Card Title: Amphin Pathmage</p><p>Card Type: Creature - Salamander Wizard</p><p>Card Color: Blue</p><p>Rarity: Common</p><form method='post'><button class='view-card-button' type='submit' value='Amphin Pathmage' name='createCard'>View Card</button></form></div>";
        $result = createAllDisplayCards($inputA);
        $this->assertEquals($expected, $result);
    }


    public function testCreateAllDisplayCardsSuccess4()
    {
        $inputA = [
            [
                'color' => 'white',
                'title' => 'Sungrace Pegasus',
                'cardType' => 'Creature - Pegasus',
                'raritySet' => 'common'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Sungrace Pegasus</p><p>Card Type: Creature - Pegasus</p><p>Card Color: White</p><p>Rarity: Common</p><form method='post'><button class='view-card-button' type='submit' value='Sungrace Pegasus' name='createCard'>View Card</button></form></div>";
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
                'color' => 'white',
                'title' => 'Sungrace Pegasus',
                'cardType' => 'Creature - Pegasus',
                'raritySet' => 'notaSetRarity'
            ]
        ];
        $expected = "<div class='display-card'><p>Card Title: Sungrace Pegasus</p><p>Card Type: Creature - Pegasus</p><p>Card Color: White</p><form method='post'><button class='view-card-button' type='submit' value='Sungrace Pegasus' name='createCard'>View Card</button></form></div>";
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

    public function testCreateMTGCardSuccess1()
    {
        $inputA = [
                'color' => 'white',
                'title' => 'Sungrace Pegasus',
                'genericCost' => 1,
                'greenCost' => null,
                'blackCost' => null,
                'blueCost' => null,
                'redCost' => null,
                'whiteCost' => 1,
                'cardArt' => 'sungracePegasus.jpeg',
                'cardType' => 'Creature - Pegasus',
                'setType' => 'M15',
                'raritySet' => 'common',
                'abilityCostGeneric' => null,
                'abilityCostGreen' => null,
                'abilityCostRed' => null,
                'abilityCostBlue' => null,
                'abilityCostBlack' => null,
                'abilityCostWhite' => null,
                'abilityTap' => 0,
                'description' => "Flying (This creature can't be blocked except by creatures with flying or reach.)
Lifelink (Damage dealt by this creature also causes you to gain that much life.)",
                'designerFlavourText' => 'The sacred feathers of the pegasus are said to have healing powers.',
                'power' => 3,
                'toughness' => 3
            ];

        $result = createMTGCard($inputA);
        $this->assertIsString($result);
    }

    public function testCreateMTGCardSuccess2()
    {
        $inputA = [
            'color' => 'white',
            'title' => 'Sungrace Pegasus',
            'genericCost' => 1,
            'greenCost' => null,
            'blackCost' => null,
            'blueCost' => null,
            'redCost' => null,
            'whiteCost' => 1,
            'cardArt' => 'sungracePegasus.jpeg',
            'cardType' => 'Creature - Pegasus',
            'setType' => 'M15',
            'raritySet' => 'common',
            'abilityCostGeneric' => null,
            'abilityCostGreen' => null,
            'abilityCostRed' => null,
            'abilityCostBlue' => null,
            'abilityCostBlack' => null,
            'abilityCostWhite' => null,
            'abilityTap' => 0,
            'description' => "Flying (This creature can't be blocked except by creatures with flying or reach.) Lifelink (Damage dealt by this creature also causes you to gain that much life.)",
            'designerFlavourText' => 'The sacred feathers of the pegasus are said to have healing powers.',
            'power' => 3,
            'toughness' => 3
        ];

        $result = createMTGCard($inputA);
        $expected = "<div class='card-back-white'><div class='card-top-container'><div class='card-title-container'><p>Sungrace Pegasus</p></div><div class='mana-cost-container'><div class='mana-cost-display-container'><div class='mana-neutral-container'><img class='mana-neutral' src='./imgs/manaCosts/mana_circle.png' alt='neutral mana'><p class='mana-neutral-cost'>1</p></div><img class='mana-cost-color' src='./imgs/manaCosts/mana_w.png' alt='white mana'></div></div></div><div class='card-art-container''><img class='card-art' src='./imgs/cardArt/sungracePegasus.jpeg' alt='Sungrace Pegasus' ></div><div class='card-type-container'><div class='card-type-title-container'><p class='card-type-text'>Creature - Pegasus</p></div><div class='card-type-setLogo-container'><img class='card-set-logo-image' src='./imgs/M15_setIcons/m15_setIcon_common.jpeg' alt='M15 common' ></div></div><div class='description-container'><span class='ability-cost-container'></span><div class='description-contents-container'><p>Flying (This creature can't be blocked except by creatures with flying or reach.) Lifelink (Damage dealt by this creature also causes you to gain that much life.)</p><p class='designer-text'>The sacred feathers of the pegasus are said to have healing powers.</p></div></div><div class='powerandtough-container'><p class='powerandtough'>3/3</p></div></div>";
        $this->assertEquals($expected, $result);
    }
    public function testCreateMTGCardSuccess3()
    {
        $inputA = [
            'color' => 'green',
            'title' => 'Yisan, the Wanderer Bard',
            'genericCost' => 2,
            'greenCost' => 1,
            'blackCost' => null,
            'blueCost' => null,
            'redCost' => null,
            'whiteCost' => null,
            'cardArt' => 'yisanTheWandererBard.jpeg',
            'cardType' => 'Legendary Creature - Human Rogue',
            'setType' => 'M15',
            'raritySet' => 'rare',
            'abilityCostGeneric' => 2,
            'abilityCostGreen' => 1,
            'abilityCostRed' => null,
            'abilityCostBlue' => null,
            'abilityCostBlack' => null,
            'abilityCostWhite' => null,
            'abilityTap' => 1,
            'description' => "Put a verse counter on Yisan, the Wanderer Bard: Search your library for a creature card with mana value equal to the number of verse counters on Yisan, put it onto the battlefield, then shuffle.",
            'designerFlavourText' => 'Designed by Brian Fargo',
            'power' => 2,
            'toughness' => 3
        ];

        $result = createMTGCard($inputA);
        $expected = "<div class='card-back-green'><div class='card-top-container'><div class='card-title-container'><p>Yisan, the Wanderer Bard</p></div><div class='mana-cost-container'><div class='mana-cost-display-container'><div class='mana-neutral-container'><img class='mana-neutral' src='./imgs/manaCosts/mana_circle.png' alt='neutral mana'><p class='mana-neutral-cost'>2</p></div><img class='mana-cost-color' src='./imgs/manaCosts/mana_g.png' alt='green mana'></div></div></div><div class='card-art-container''><img class='card-art' src='./imgs/cardArt/yisanTheWandererBard.jpeg' alt='Yisan, the Wanderer Bard' ></div><div class='card-type-container'><div class='card-type-title-container'><p class='card-type-text'>Legendary Creature - Human Rogue</p></div><div class='card-type-setLogo-container'><img class='card-set-logo-image' src='./imgs/M15_setIcons/m15_setIcon_rare.jpeg' alt='M15 rare' ></div></div><div class='description-container'><span class='ability-cost-container'><img class='ability-cost ability-neutral' src='./imgs/manaCosts/mana_circle.png' alt='ability mana cost'><p class='ability-neutral-cost'>2</p><img class='ability-cost' src='./imgs/manaCosts/mana_g.png' alt='green ability mana cost'>, <img class='ability-cost' src='./imgs/manaCosts/mana_t.png' alt='tap-icon'>, </span><div class='description-contents-container'><p>Put a verse counter on Yisan, the Wanderer Bard: Search your library for a creature card with mana value equal to the number of verse counters on Yisan, put it onto the battlefield, then shuffle.</p><p class='designer-text'>Designed by Brian Fargo</p></div></div><div class='powerandtough-container'><p class='powerandtough'>2/3</p></div></div>";
        $this->assertEquals($expected, $result);
    }

    public function testCreateMTGCardSuccess4()
    {
        $inputA = [
            'color' => 'white',
            'title' => 'Battle Mastery',
            'genericCost' => 2,
            'greenCost' => null,
            'blackCost' => null,
            'blueCost' => null,
            'redCost' => null,
            'whiteCost' => 1,
            'cardArt' => 'battleMastery.jpeg',
            'cardType' => 'Enchantment - Aura',
            'setType' => 'M15',
            'raritySet' => 'uncommon',
            'abilityCostGeneric' => null,
            'abilityCostGreen' => null,
            'abilityCostRed' => null,
            'abilityCostBlue' => null,
            'abilityCostBlack' => null,
            'abilityCostWhite' => null,
            'abilityTap' => 0,
            'description' => "Enchant creature - Enchanted creature has double strike. (It deals both first-strike and regular combat damage.)",
            'designerFlavourText' => '"Boom! Boom! Boots the size of oxcarts, then an axe like a falling sun. Elves scattered. Trees scattered. Even the hills ran for the hills!" - Clachan Tales',
            'power' => null,
            'toughness' => null
        ];

        $result = createMTGCard($inputA);
        $expected = "<div class='card-back-white'><div class='card-top-container'><div class='card-title-container'><p>Battle Mastery</p></div><div class='mana-cost-container'><div class='mana-cost-display-container'><div class='mana-neutral-container'><img class='mana-neutral' src='./imgs/manaCosts/mana_circle.png' alt='neutral mana'><p class='mana-neutral-cost'>2</p></div><img class='mana-cost-color' src='./imgs/manaCosts/mana_w.png' alt='white mana'></div></div></div><div class='card-art-container''><img class='card-art' src='./imgs/cardArt/battleMastery.jpeg' alt='Battle Mastery' ></div><div class='card-type-container'><div class='card-type-title-container'><p class='card-type-text'>Enchantment - Aura</p></div><div class='card-type-setLogo-container'><img class='card-set-logo-image' src='./imgs/M15_setIcons/m15_setIcon_uncommon.jpeg' alt='M15 uncommon' ></div></div><div class='description-container'><span class='ability-cost-container'></span><div class='description-contents-container'><p>Enchant creature - Enchanted creature has double strike. (It deals both first-strike and regular combat damage.)</p><p class='designer-text'>". '"Boom! Boom! Boots the size of oxcarts, then an axe like a falling sun. Elves scattered. Trees scattered. Even the hills ran for the hills!" - Clachan Tales</p></div></div><div class=' . "'powerandtough-container'></div></div>";
        $this->assertEquals($expected, $result);
    }

    public function testCreateMTGCardMalformed1()
    {
        $inputA = 'I am a string!';
        $this->expectException(TypeError::class);
        $result = createMTGCard($inputA);
    }

    public function testCreateMTGCardMalformed2()
    {
        $inputA = 1;
        $this->expectException(TypeError::class);
        $result = createMTGCard($inputA);
    }

    public function testCreateMTGCardFailure1()
    {
        $inputA = [
            'NotAKey' => 'Not a Value',
            'AlsoNotAKey' => 'Also Not a Value'
        ];
        $expected = '';
        $result = createMTGCard($inputA);
        $this->assertEquals($expected, $result);
    }
}