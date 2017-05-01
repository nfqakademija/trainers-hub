<?php

namespace AppBundle\Repository;

/**
 * FeedbackRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FeedbackRepository extends \Doctrine\ORM\EntityRepository
{
    /**
    * Find feedbacks in trainer profile page
    * @param User $user
    * @return array
    */
    public function findFeedbackByTrainer($user)
    {
        return $this->createQueryBuilder('f')
            ->leftJoin('f.fosUserAuthor', 'u')
            ->addSelect('u')
            ->where('f.fosUserObject = :object_id')
            ->setParameter(':object_id', $user)->getQuery()->getArrayResult();
    }
    /**
    * Find feedbacks in client profile page
    * @param User $user
    * @return array
    */
    public function findFeedbackByClientAndTrainer($user)
    {
        return $this->createQueryBuilder('f')
            ->leftJoin('f.fosUserObject', 'u')
            ->addSelect('u')
            ->where('f.fosUserAuthor = :author')
            ->setParameter(':author', $user)->getQuery()->getArrayResult();
    }
}
