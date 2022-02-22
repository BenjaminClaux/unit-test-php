<?php 

namespace Campus\UnitTest;

use \Faker\Factory as Faker;
use Campus\UnitTest\Models\Room;

require_once '../vendor/autoload.php';

$faker = Faker::create();

$room = new Room(
    $faker->name(),
    $faker->words(20, true)
);

echo $room;
echo 'toto';
?>
