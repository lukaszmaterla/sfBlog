<?php
/**
 * Created by PhpStorm.
 * User: lukasz
 * Date: 07.05.17
 * Time: 17:38
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPostData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <=1000; $i++){

            $post = new Post();
            $post->setTitle($faker->sentence(3));
            $post->setLead($faker->text(300));
            $post->setContent($faker->text(700));
            $post->setCreatedAt($faker->dateTimeThisMonth);

            $manager->persist($post);

        }

        $manager->flush();

    }
}