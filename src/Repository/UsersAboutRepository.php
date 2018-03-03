<?php

namespace App\Repository;

use App\Entity\UsersAbout;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UsersAbout|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersAbout|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersAbout[]    findAll()
 * @method UsersAbout[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersAboutRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UsersAbout::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('u')
            ->where('u.something = :value')->setParameter('value', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
