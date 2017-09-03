<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class Users extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<5; $i++){
            $user = new User();
            $user->setName($this->getName());
            $user->setAge(rand(18, 100));

            $manager->persist($user);
        }

        $manager->flush();
    }

    private function getName()
    {
        $mens = array(
            'Antonio', 'José', 'Manuel', 'Francisco', 'Juan', 'David',
            'José Antonio', 'José Luis', 'Jesús', 'Javier', 'Francisco Javier',
            'Carlos', 'Daniel', 'Miguel', 'Rafael', 'Pedro', 'José Manuel',
            'Ángel', 'Alejandro', 'Miguel Ángel', 'José María', 'Fernando',
            'Luis', 'Sergio', 'Pablo', 'Jorge', 'Alberto'
        );
        $womens = array(
            'María Carmen', 'María', 'Carmen', 'Josefa', 'Isabel', 'Ana María',
            'María Dolores', 'María Pilar', 'María Teresa', 'Ana', 'Francisca',
            'Laura', 'Antonia', 'Dolores', 'María Angeles', 'Cristina', 'Marta',
            'María José', 'María Isabel', 'Pilar', 'María Luisa', 'Concepción',
            'Lucía', 'Mercedes', 'Manuela', 'Elena', 'Rosa María'
        );

        if (rand() % 2) {
            return $mens[array_rand($mens)];
        } else {
            return $womens[array_rand($womens)];
        }
    }

}