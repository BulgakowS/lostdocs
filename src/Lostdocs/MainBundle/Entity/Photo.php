<?php

namespace Lostdocs\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lostdocs\UserBundle\Entity\User;
use Lostdocs\MainBundle\Entity\Announcement;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Photo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lostdocs\MainBundle\Entity\PhotoRepository")
 */
class Photo
{
    
    public function __construct()
    {
        $this->announcements = new ArrayCollection();
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
     * @var string
     * @ORM\Column(name="url", type="string", length=500, nullable=false)
     */ 
    private $url;
    
    /**
     * @var string
     * @ORM\Column(name="mime", type="string", length=255, nullable=true)
     */ 
    private $mime;
    
    /**
     * @var Collection
     * @ORM\ManyToOne(targetEntity="Lostdocs\UserBundle\Entity\User", inversedBy="Photos")
     * 
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="Announcement", mappedBy="photos")
     */
    private $announcements;


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
     * Set url
     *
     * @param string $url
     * @return Photo
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set mime
     *
     * @param string $mime
     * @return Photo
     */
    public function setMime($mime)
    {
        $this->mime = $mime;
    
        return $this;
    }

    /**
     * Get mime
     *
     * @return string 
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Photo
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
     * Add announcements
     *
     * @param Announcement $announcements
     * @return Photo
     */
    public function addAnnouncement(\Lostdocs\MainBundle\Entity\Announcement $announcements)
    {
        $this->announcements[] = $announcements;
    
        return $this;
    }

    /**
     * Remove announcements
     *
     * @param Announcement $announcements
     */
    public function removeAnnouncement(Announcement $announcements)
    {
        $this->announcements->removeElement($announcements);
    }

    /**
     * Get announcements
     *
     * @return ArrayCollection 
     */
    public function getAnnouncements()
    {
        return $this->announcements;
    }
}