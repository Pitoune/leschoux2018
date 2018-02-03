<?php

namespace App\DataFixtures;

use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class NewsFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $news = $this->createNews('Lancement du site leschoux2018.fr', 'Enfin ! Le site de notre mariage est lancé !');
        $manager->persist($news);

        $news = $this->createNews('La date est tombée !', 'Notre mariage est prévu pour le vendredi 2 novembre.');
        $manager->persist($news);

        $manager->flush();
    }

    /**
     * @param string $title
     * @param string $message
     *
     * @return News
     */
    protected function createNews(string $title, string $message): News
    {
        $news = new News();
        $news->setTitle($title);
        $news->setMessage($message);

        return $news;
    }

}