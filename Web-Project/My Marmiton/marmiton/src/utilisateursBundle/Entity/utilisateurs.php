<?php 
namespace utilisateursBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 */
class utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", nullable=true)
     */
    protected $facebookId;
    /**
     * @var string
     *
     * @ORM\Column(name="facebookAccessToken", type="string", nullable=true)
     */
    protected $facebookAccessToken;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
     /**
     * Set facebookId
     *
     * @param int $facebookId
     *
     * @return utilisateurs
     */
     public function setFacebookId($facebookId)
     {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return int
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }
     /**
     * Set facebookAccessToken
     *
     * @param int $facebookAccessToken
     *
     * @return utilisateurs
     */
     public function setfacebookAccessToken($facebookAccessToken)
     {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return int
     */
    public function getfacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }
}
