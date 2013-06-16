<?php

namespace Acme\SearchBundle\Entity;

use Acme\SearchBundle\Entity\Clip;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
{

    /**
     * @ORM\ManyToMany(targetEntity="Clip", mappedBy="tags")
     */
    private $clips;


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
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->clips = new ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add clips
     *
     * @param \Acme\SearchBundle\Entity\Clip $clips
     * @return Tag
     */
    public function addClip(Clip $clips)
    {
        $this->clips[] = $clips;

        return $this;
    }

    /**
     * Remove clips
     *
     * @param \Acme\SearchBundle\Entity\Clip $clips
     */
    public function removeClip(Clip $clips)
    {
        $this->clips->removeElement($clips);
    }

    /**
     * Get clips
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClips()
    {
        return $this->clips;
    }
}
