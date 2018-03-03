<?php

namespace App\DataFixtures;

use App\Entity\UsersAbout;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class N2UserAboutFixture extends Fixture
{
    const CHARACTERS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const CHARACTERS_LENGTH = 61;

    public static function generateRandomString($length = 10)
    {
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= self::CHARACTERS[rand(0, self::CHARACTERS_LENGTH)];
        }
        return $randomString;
    }

    public function load(ObjectManager $manager)
    {
        $users = $manager->getRepository("App\Entity\Users")->findAll();
        foreach ($users as $user) {
            foreach (['country', 'firstname', 'state'] as $item) {
                $user_about = new UsersAbout();
                $user_about->setUser($user);
                $user_about->setItem($item);
                $user_about->setValue(self::generateRandomString());
                $user_about->setUpDate(date('Y-m-d H:i:s'));
                $manager->persist($user_about);
            }
        }
        $manager->flush();
    }
}