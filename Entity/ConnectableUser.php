<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/18/16 2:50 PM
 */

namespace ED\UserConnectionsBundle\Entity;


use ED\UserConnectionsBundle\Model\User\ConnectableUserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ConnectableUser
 *
 * @ORM\Entity
 *
 * @package ED\UserConnectionsBundle\Entity
 */
class ConnectableUser implements ConnectableUserInterface
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var ConnectableUser[]
     *
     * @ORM\OneToMany(targetEntity="ED\UserConnectionsBundle\Entity\FollowConnection", mappedBy="follower")
     */
    private $followers;

    /**
     * @var ConnectableUser[]
     *
     * @ORM\OneToMany(targetEntity="ED\UserConnectionsBundle\Entity\FollowConnection", mappedBy="followee")
     */
    private $following;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ConnectableUser[]
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * @return ConnectableUser[]
     */
    public function getFollowing()
    {
        return $this->following;
    }
}