<?php
/**
 * Created by Eton Digital.
 * User: Djordje Bakic <djordje.bakic@etondigital.com>
 * Date: 10/19/16 1:52 PM
 */

namespace src\ED\UserConnectionsBundle\Model\User;


use Doctrine\ORM\Mapping as ORM;
use ED\UserConnectionsBundle\Model\User\ConnectableUserInterface;

/**
 * Class ConnectableUser
 *
 * @ORM\MappedSuperclass
 *
 * @package src\ED\UserConnectionsBundle\Model\User
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}