<?php

namespace Lostdocs\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lostdocs\UserBundle\Entity\User;
use Lostdocs\MainBundle\Entity\Photo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Announcement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lostdocs\UserBundle\Entity\AnnouncementRepository")
 */
class Announcement
{
    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;
    
    /**
     * @var string
     * @ORM\Column(name="announcement_type", type="string", length=255, nullable=true)
     */
    private $announcement_type;
    
    /**
     * @var float
     * @ORM\Column(name="lat", type="float", nullable=true)
     */
    private $lat;
    
    /**
     * @var float
     * @ORM\Column(name="long", type="float", nullable=true)
     */
    private $long;
    
    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=10000, nullable=true)
     */
    private $description;
    
    /**
     * @var Collection
     * @ORM\ManyToOne(targetEntity="Lostdocs\UserBundle\Entity\User", inversedBy="Announcements")
     * 
     */
    private $user;

    /**
     * @var boolean
     * @ORM\Column(name="active", type="boolean", nullable=true, options={"default" = true})
     */
    private $active;
    
    /**
     * @var string
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;
    
    /**
     * @var string
     * @ORM\Column(name="build", type="string", length=50, nullable=true)
     */    
    private $build;
    
    /**
     * @var string
     * @ORM\Column(name="document_type", type="string", length=255, nullable=true)
     */
    private $document_type;
    

    /**
     * @ORM\ManyToMany(targetEntity="Photo", inversedBy="announcements")
     * @ORM\JoinTable(name="Announcemet_photos")
     */
    private $photos;




   /**
     * Set title
     *
     * @param string $title
     * @return Announcement
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
     * Set announcement_type
     *
     * @param string $announcementType
     * @return Announcement
     */
    public function setAnnouncementType($announcementType)
    {
        $this->announcement_type = $announcementType;
    
        return $this;
    }

    /**
     * Get announcement_type
     *
     * @return string 
     */
    public function getAnnouncementType()
    {
        return $this->announcement_type;
    }

    /**
     * Set lat
     *
     * @param float $lat
     * @return Announcement
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    
        return $this;
    }

    /**
     * Get lat
     *
     * @return float 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set long
     *
     * @param float $long
     * @return Announcement
     */
    public function setLong($long)
    {
        $this->long = $long;
    
        return $this;
    }

    /**
     * Get long
     *
     * @return float 
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Announcement
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Announcement
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Announcement
     */
    public function setStreet($street)
    {
        $this->street = $street;
    
        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set build
     *
     * @param string $build
     * @return Announcement
     */
    public function setBuild($build)
    {
        $this->build = $build;
    
        return $this;
    }

    /**
     * Get build
     *
     * @return string 
     */
    public function getBuild()
    {
        return $this->build;
    }

    /**
     * Set document_type
     *
     * @param string $documentType
     * @return Announcement
     */
    public function setDocumentType($documentType)
    {
        $this->document_type = $documentType;
    
        return $this;
    }

    /**
     * Get document_type
     *
     * @return string 
     */
    public function getDocumentType()
    {
        return $this->document_type;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Announcement
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return User 
     */
    public function getUser()
    {
        return $this->user;
    }

    
        
    /**
     * Add photos
     *
     * @param Photo $photos
     * @return Announcement
     */
    public function addPhoto(Photo $photos)
    {
        $this->photos[] = $photos;
    
        return $this;
    }

    /**
     * Remove photos
     *
     * @param Photo $photos
     */
    public function removePhoto(Photo $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return ArrayCollection
     */
    public function getPhotos()
    {
        return $this->photos;
    }
}