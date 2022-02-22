<?php
use PHPUnit\Framework\TestCase;
use \Faker\Factory as Faker;
use Campus\UnitTest\Models\Room;

class RoomTest extends TestCase
{
    private \Faker\Generator $faker;
    private string $name;
    private string $description;
    private Room $room;

    public function setUp(): void
    {
        $this->faker = Faker::create('fr_FR');
    
        $this->name = $this->faker->name();
        $this->description = $this->faker->words(4, true);
        $this->room = new Room(
            $this->name,
            $this->description
        );
        
    }

    public function testCreateRoom()
    {   
        $this->assertEquals(ucfirst(strtolower($this->name)), $this->room->getName());
        $this->assertEquals($this->description, $this->room->getDescription());
        $this->assertEquals(60, $this->room->getDuration());
    }
    
    
    public function testHowManyEnigma()
    {
        $levels = [Room::EASY_LEVEL, Room::NORMAL_LEVEL, Room::DIFFICULT_LEVEL];

        #######
        foreach ($levels as $level) {
            $this->room->setLevel($level);
            $number_enigma = $this->room->getNbEnigma();
            if($this->room->getLevel() == Room::EASY_LEVEL) {
                $expected_enigma = 5;
            } else if($this->room->getLevel() == Room::NORMAL_LEVEL) {
                $expected_enigma = 10;
            } else if($this->room->getLevel() == Room::DIFFICULT_LEVEL) {
                $expected_enigma = 20;
            }
            
            $this->assertEquals($expected_enigma, $number_enigma);
        }
        #######
    }
}