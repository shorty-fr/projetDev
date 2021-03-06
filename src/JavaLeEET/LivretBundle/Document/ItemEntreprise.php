<?php

namespace JavaLeEET\LivretBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * JavaLeEET\LivretBundle\Document\ItemEntreprise
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class ItemEntreprise
{
    /**
     * @var MongoId $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $libelleActivite
     *
     * @ODM\Field(name="libelleActivite", type="string")
     */
    protected $libelleActivite;

    /**
     * @var string $descriptionActivite
     *
     * @ODM\Field(name="descriptionActivite", type="string")
     */
    protected $descriptionActivite;

    /**
     * @var string $savoirTheorique
     *
     * @ODM\Field(name="savoirTheorique", type="string")
     */
    protected $savoirTheorique;

    /**
     * @var string $aptitudeRelationnelle
     *
     * @ODM\Field(name="aptitudeRelationnelle", type="string")
     */
    protected $aptitudeRelationnelle;

    /**
     * @var collection $competencesUtil
     *
     * @ODM\EmbedMany(targetDocument="CompetenceUtil")
     */
    protected $competencesUtil;


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
     * Set libelleActivite
     *
     * @param string $libelleActivite
     * @return self
     */
    public function setLibelleActivite($libelleActivite)
    {
        $this->libelleActivite = $libelleActivite;
        return $this;
    }

    /**
     * Get libelleActivite
     *
     * @return string $libelleActivite
     */
    public function getLibelleActivite()
    {
        return $this->libelleActivite;
    }

    /**
     * Set descriptionActivite
     *
     * @param string $descriptionActivite
     * @return self
     */
    public function setDescriptionActivite($descriptionActivite)
    {
        $this->descriptionActivite = $descriptionActivite;
        return $this;
    }

    /**
     * Get descriptionActivite
     *
     * @return string $descriptionActivite
     */
    public function getDescriptionActivite()
    {
        return $this->descriptionActivite;
    }

    /**
     * Set savoirTheorique
     *
     * @param string $savoirTheorique
     * @return self
     */
    public function setSavoirTheorique($savoirTheorique)
    {
        $this->savoirTheorique = $savoirTheorique;
        return $this;
    }

    /**
     * Get savoirTheorique
     *
     * @return string $savoirTheorique
     */
    public function getSavoirTheorique()
    {
        return $this->savoirTheorique;
    }

    /**
     * Set aptitudeRelationnelle
     *
     * @param string $aptitudeRelationnelle
     * @return self
     */
    public function setAptitudeRelationnelle($aptitudeRelationnelle)
    {
        $this->aptitudeRelationnelle = $aptitudeRelationnelle;
        return $this;
    }

    /**
     * Get aptitudeRelationnelle
     *
     * @return string $aptitudeRelationnelle
     */
    public function getAptitudeRelationnelle()
    {
        return $this->aptitudeRelationnelle;
    }

    /**
     * Set competencesUtil
     *
     * @param collection $competencesUtil
     * @return self
     */
    public function setCompetencesUtil($competencesUtil)
    {
        $this->competencesUtil = $competencesUtil;
        return $this;
    }

    /**
     * Get competencesUtil
     *
     * @return collection $competencesUtil
     */
    public function getCompetencesUtil()
    {
        return $this->competencesUtil;
    }

    public function addCompetencesUtil(CompetenceUtil $c) {
        $this->competencesUtil[] = $c;
    }
    public function __construct()
    {
        $this->competencesUtil = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Remove competencesUtil
     *
     * @param JavaLeEET\LivretBundle\Document\CompetenceUtil $competencesUtil
     */
    public function removeCompetencesUtil(\JavaLeEET\LivretBundle\Document\CompetenceUtil $competencesUtil)
    {
        $this->competencesUtil->removeElement($competencesUtil);
    }
}
