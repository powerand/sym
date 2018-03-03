<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class N1UserFixture extends Fixture
{
    const USERS_COUNT = 1000;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::USERS_COUNT; $i++) {
            $user = new Users();
            $user->setEmail('email'.$i.'@mail.m');
            $user->setPassword('password'.rand(0, self::USERS_COUNT));
            $user->setRole('role'.$i);
            $user->setRegDate(date('Y-m-d H:i:s', strtotime(" -$i day")));
            $manager->persist($user);
        }
        $manager->flush();
    }
}