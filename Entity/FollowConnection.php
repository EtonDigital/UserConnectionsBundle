<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/17/16 9:35 AM
 */

namespace ED\UserConnectionsBundle\Entity;


use ED\UserConnectionsBundle\Model\FollowConnection\FollowConnection as BaseFollowConnection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class FollowConnection
 *
 * @ORM\Entity(repositoryClass="ED\UserConnectionsBundle\Repository\FollowConnectionRepository")
 *
 * @package ED\UserConnectionsBundle\Entity
 */
class FollowConnection extends BaseFollowConnection
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}