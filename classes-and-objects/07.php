<?php

declare(strict_types=1);

class Dog
{
    private string $name;
    private string $sex;
    private ?string $mother;
    private ?string $father;

    public function __construct(string $name, string $sex, string $mother = null, string $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function getParent(string $parent): string
    {
        return ($this->$parent) ?: 'Unknown';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function hasSameMotherAs(Dog $dog): bool
    {
        return ($this->mother === $dog->mother);
    }
}

class DogTest
{
    /**
     * @var Dog[]
     */
    private array $listOfDogs;

    public function __construct(array $list)
    {
        $this->listOfDogs = $list;
    }

    public function getDog(string $name): ?Dog
    {
        foreach ($this->listOfDogs as $dog) {
            if ($dog->getName() === $name) {
                return $dog;
            }
        }
        return null;
    }


}

$test = new DogTest([
    new Dog('Max', 'male', 'Lady', 'Rocky'),
    new Dog('Rocky', 'male', 'Molly', 'Sam'),
    new Dog('Sparky', 'male'),
    new Dog('Buster', 'male', 'Lady', 'Sparky'),
    new Dog('Sam', 'male'),
    new Dog('Lady', 'female'),
    new Dog('Molly', 'female'),
    new Dog('Coco', 'female', 'Molly', 'Buster')
]);
echo $test->getDog('Coco')->getParent('father') . PHP_EOL;
echo $test->getDog('Coco')->hasSameMotherAs($test->getDog('Rocky'));