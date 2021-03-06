<?php

namespace Volcano\VideoStatusBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Volcano\VideoStatusBundle\Entity\Tag;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Clip
 *
 * @ORM\Table(name="clip", indexes={
 *  @ORM\Index(name="clip_url_idx",columns={"url"})
 * })
 * @ORM\Entity
 */
class Clip
{
    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="clips")
     * @ORM\JoinTable(name="clips_tags")
     **/
    private $tags;

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
     * @ORM\Column(name="url", type="string", length=255)
     *
     * @Assert\NotBlank(message="Enter URL")
     * @Assert\Url(message="Enter valid URL", protocols={"http", "https"})
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_start", type="integer", columnDefinition="integer unsigned not null")
     * @Assert\NotBlank(message="Enter Start Time")
     * @Assert\Type(type="integer")
     */
    private $time_start;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_end", type="integer", columnDefinition="integer unsigned not null")
     * * @Assert\NotBlank(message="Enter Start Time")
     * @Assert\Type(type="integer")
     */
    private $time_end;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     *
     */
    private $description;


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
     * @return Clip
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
     * Set time_start
     *
     * @param integer $timeStart
     * @return Clip
     */
    public function setTimeStart($timeStart)
    {
        $this->time_start = $timeStart;

        return $this;
    }

    /**
     * Get time_start
     *
     * @return integer 
     */
    public function getTimeStart()
    {
        return $this->time_start;
    }

    /**
     * Set time_end
     *
     * @param integer $timeEnd
     * @return Clip
     */
    public function setTimeEnd($timeEnd)
    {
        $this->time_end = $timeEnd;

        return $this;
    }

    /**
     * Get time_end
     *
     * @return integer 
     */
    public function getTimeEnd()
    {
        return $this->time_end;
    }

    /**
     * Set Tags
     *
     * @param ArrayCollection|Tag $tags
     * @return Clip
     * @throws \Exception
     */
    public function setTags( $tags)
    {
        if (!is_object($tags)) {
            throw new \Exception('Tags must by Object');
        }
        switch (get_class($tags)) {
            case 'Volcano\VideoStatusBundle\Entity\Tag':
                $this->tags = new ArrayCollection(array($tags));
                break;
            case 'Doctrine\Common\Collections\ArrayCollection':
                $this->tags = $tags;
                break;
            default:
                throw new \Exception('Invalid tags Class');
        }

        return $this;
    }

    /**
     * Add tags
     *
     * @param \Volcano\VideoStatusBundle\Entity\Tag $tags
     * @return Clip
     */
    public function addTag(Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Volcano\VideoStatusBundle\Entity\Tag $tags
     */
    public function removeTag(Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function getTagsName()
    {
        $arrNames = array();
        foreach ($this->tags as $objTag) {
            $arrNames[] = $objTag->getName();
        }
        return $arrNames;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Clip
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
}