<?php

namespace JavaLeEET\LivretBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * JavaLeEET\LivretBundle\Document\Categorie
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Categorie
{
    /**
     * @var MongoId $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $nom
     *
     * @ODM\Field(name="nom", type="string")
     */
    protected $nom;

    /**
     * @var collection $sections
     *
     * @ODM\EmbedMany(targetDocument="Section")
     */
    protected $sections;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get nom
     *
     * @return string $nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set sections
     *
     * @param collection $sections
     * @return self
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
        return $this;
    }

    /**
     * Get sections
     *
     * @return collection $sections
     */
    public function getSections()
    {
        return $this->sections;
    }

    public function __construct()
    {
        $this->sections = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add section
     *
     * @param JavaLeEET\LivretBundle\Document\Section $section
     */
    public function addSection(\JavaLeEET\LivretBundle\Document\Section $section)
    {
        $this->sections[] = $section;
    }

    public function replaceSection($section) {
        for ($i = 0; $i < count($this->sections); $i++) {
            if ($this->sections[$i]->getId() == $section->getId()) {
                $this->sections[$i] = $section;
            }
        }
    }

    /**
     * Remove section
     *
     * @param JavaLeEET\LivretBundle\Document\Section $section
     */
    public function removeSection(\JavaLeEET\LivretBundle\Document\Section $section)
    {
        $this->sections->removeElement($section);
    }
}
