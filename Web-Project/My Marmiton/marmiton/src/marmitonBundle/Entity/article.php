<?php

namespace marmitonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * article
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="marmitonBundle\Repository\articleRepository")
 */
class article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     * 
     * @ORM\COlumn(name="date_creation",type="datetime", nullable=true) 
     */
    private $dateCreation;

    /**
     * @var \DateTime
     * 
     * @ORM\COlumn(name="date_modification",type="datetime", nullable=true) 
     */
    private $dateModification;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=1500)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="article")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $categoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="estimed_time_dish", type="string", length=255)
     */
    private $estimedTimeDish;

    /**
     * @ORM\ManyToOne(targetEntity="Picture", inversedBy="article")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    private $imageId;

    /**
    * @ORM\ManyToMany(targetEntity="comments", cascade={"persist"})
    */
    private $comments;
    
    /**
    * @ORM\ManyToMany(targetEntity="Ratings", cascade={"persist"})
    */
    private $ratings;
    /**
     * Get id
     *
     * @return int
     */
    /**
     * @ORM\ManyToOne(targetEntity="Ingredient", inversedBy="article")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productId;

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return article
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return article
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return article
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return article
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set categoryId
     *
     * @param string $categoryId
     *
     * @return int
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set estimedTimeDish
     *
     * @param string $estimedTimeDish
     *
     * @return article
     */
    public function setEstimedTimeDish($estimedTimeDish)
    {
        $this->estimedTimeDish = $estimedTimeDish;

        return $this;
    }

    /**
     * Get estimedTimeDish
     *
     * @return string
     */
    public function getEstimedTimeDish()
    {
        return $this->estimedTimeDish;
    }


    public function getImageId()
    {
        return $this->imageId;
    }

    public function setImageId($imageId)
    {
        $this->imageId = $imageId;

        return $this;
    }
    public function addComments(comments $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    public function removeComment(comments $comment)
    {
        $this->comments->removeElement($comment);
    }

    public function getComments()
    {
        return $this->comments;
    }


    public function addRating(ratings $rating)
    {
        $this->ratings[] = $rating;

        return $this;
    }

    public function removeRating(ratings $rating)
    {
        $this->ratings->removeElement($rating);
    }

    public function getRatings()
    {
        return $this->ratings;
    }


    /**
     * Set productId
     *
     * @param string $productId
     *
     * @return int
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }


}

