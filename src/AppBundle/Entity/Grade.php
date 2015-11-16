<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Grade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Student
     *
     * Ici nous avons "l'autre côté" - on rajoute bien "inversedBy"
     * @ORM\ManyToOne(targetEntity="AppBundle:Student", inversedBy="grades")
     */
    private $student;


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
     * Set student
     *
     * @param \AppBundle\Entity\AppBundle:Student $student
     *
     * @return Grade
     */
    public function setStudent(\AppBundle\Entity\AppBundle:Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \AppBundle\Entity\AppBundle:Student
     */
    public function getStudent()
    {
        return $this->student;
    }
}
