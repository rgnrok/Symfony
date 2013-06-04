<?php

namespace Acme\SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_start", type="integer", columnDefinition="integer unsigned not null")
     */
    private $time_start;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_end", type="integer", columnDefinition="integer unsigned not null")
     */
    private $time_end;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
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
}
