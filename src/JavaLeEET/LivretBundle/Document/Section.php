<?php

namespace JavaLeEET\LivretBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * JavaLeEET\LivretBundle\Document\Section
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Section
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
     * @var collection $itemLivret
     *
     * @ODM\EmbedMany(targetDocument="ItemLivret")
     */
    protected $itemLivret;


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
     * Set itemLivret
     *
     * @param collection $itemLivret
     * @return self
     */
    public function setItemLivret($itemLivret)
    {
        $this->itemLivret = $itemLivret;
        return $this;
    }

    /**
     * Get itemLivret
     *
     * @return collection $itemLivret
     */
    public function getItemLivret()
    {
        return $this->itemLivret;
    }

    public function __construct()
    {
        $this->itemLivret = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add itemLivret
     *
     * @param JavaLeEET\LivretBundle\Document\ItemLivret $itemLivret
     */
    public function addItemLivret(\JavaLeEET\LivretBundle\Document\ItemLivret $itemLivret)
    {
        $this->itemLivret[] = $itemLivret;
    }

    /**
     * Replace itemLivret
     *
     * @param JavaLeEET\LivretBundle\Document\ItemLivret $itemLivret
     */
    public function replaceItemLivret(\JavaLeEET\LivretBundle\Document\ItemLivret $itemLivret)
    {
        $num = count($this->itemLivret);
        for ($i = 0; $i < $num; $i++) {
            if ($this->itemLivret[$i]->getId() == $itemLivret->getId()) {
                $this->itemLivret[$i] = $itemLivret;
            }
        }
    }

    /**
     * Remove itemLivret
     *
     * @param JavaLeEET\LivretBundle\Document\ItemLivret $itemLivret
     */
    public function removeItemLivret(\JavaLeEET\LivretBundle\Document\ItemLivret $itemLivret)
    {
        $this->itemLivret->removeElement($itemLivret);
    }
}
