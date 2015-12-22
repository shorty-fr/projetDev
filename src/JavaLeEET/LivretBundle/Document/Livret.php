<?php

namespace JavaLeEET\LivretBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use JavaLeEET\LivretBundle\Document\ItemLivret;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * JavaLeEET\LivretBundle\Document\Livret
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Livret
{
    /**
     * @var MongoId $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var object_id $apprenti
     *
     * @ODM\Field(name="apprenti", type="object_id")
     */
    protected $apprenti;

    /**
     * @var object_id $tuteur
     *
     * @ODM\Field(name="tuteur", type="object_id")
     */
    protected $tuteur;

    /**
     * @var collection $categorie
     *
     * @ODM\EmbedMany(targetDocument="Categorie")
     */
    protected $categorie;

    /**
     * @var collection $periodeFormation
     *
     * @ODM\EmbedMany(targetDocument="PeriodeFormation")
     */
    protected $periodeFormation;


    /**
     * Méthode qui génére le livret de suivi
     * @TODO : en dur pour le moment.
     */
    public function genererLivret($apprenti)
    {

        $p = new PeriodeFormation();
        $itemCour = new ItemCours();
        $itemCour->setModuleFormation("XML : partiel transformation xml->html");
        $itemCour->setDifficulte("aucune");
        $itemCour->setExperimentationEntreprise("xsl-fo pour génération pdf");
        $itemCour->setLiensEntreprise("projet entreprise");
        $itemCour2 = new ItemCours();
        $itemCour2->setModuleFormation("Droit : partiel droit commerce en ligne");
        $itemCour2->setDifficulte("aucune");
        $itemCour2->setExperimentationEntreprise("mentions legales");
        $itemCour2->setLiensEntreprise("projet entreprise");
        $a = array();
        $a[] = $itemCour;
        $a[] = $itemCour2;
        $p->setDateDebutF(new \MongoDate(strtotime("21-12-2015")));
        $p->setDateFinF(new \MongoDate(strtotime("21-12-2015")));
        $p->setItemCours($a);

        $itemEnt = new ItemEntreprise();
        $itemEnt->setLibelleActivite("Developpement");
        $itemEnt->setDescriptionActivite("Developpement du lot 1 du projet");
        $itemEnt->setSavoirTheorique("Gestion de projet");
        $itemEnt->setAptitudeRelationnelle("Communiquer avec son client");
        $itemEnt->setCompetencesUtil(array("C1-1", "C3-5"));
        $a = array();
        $a[] = $itemEnt;
        $p->setDateDebutE(new \MongoDate(strtotime("21-12-2015")));
        $p->setDateFinE(new \MongoDate(strtotime("21-12-2015")));
        $p->setItemEntreprise($a);

        $periodes = array();
        $periodes[] = $p;

        //ITEMS DU LIVRET
        $item1 = array();
        $i1 = new ItemLivret();
        $i1->setNom("L'apprenti");
        $i1->setTypeVariable("tableau");
        $a = array(
            "nom et prénom" => "",
            "Adresse personnelle" => "",
            "N° de téléphone fixe" => "",
            "N° de portable" => "",
            "Courriel" => "",
            "Courriel professionnel" => ""
        );
        $i1->setValeurVariable($a);
        $i2 = new ItemLivret();
        $i2->setNom("L'employeur");
        $i2->setTypeVariable("tableau");
        $a = array(
            "Nom de l'entreprise" => "",
            "Raison sociale" => "",
            "Adresse" => "",
            "N° de téléphone" => "",
            "Courriel" => "",
            "Code NAF / APE" => "",
            "N° de Siret" => "",
            "Nom du responsable de l'entreprise" => ""
        );
        $i2->setValeurVariable($a);
        $i3 = new ItemLivret();
        $i3->setNom("Le contrat");
        $i3->setTypeVariable("tableau");
        $a = array(
            "Date de signature" => "",
            "Durée : " => ""
        );
        $i3->setValeurVariable($a);
        $i4 = new ItemLivret();
        $i4->setNom("La formation");
        $i4->setTypeVariable("tableau");
        $a = array(
            "Métier" => "",
            "Diplôme préparé" => "",
            "Classe" => ""
        );
        $i4->setValeurVariable($a);
        $i5 = new ItemLivret();
        $i5->setNom("Les formateurs");
        $i5->setTypeVariable("tableau");
        $a = array(
            "Nom du MA" => "",
            "Fonction du MA" => "",
            "N° de téléphone MA" => "",
            "N° de fax MA" => "",
            "Courriel MA" => "",
            "Nom du responsable de dispositif" => "",
            "N° de téléphone" => "",
            "N° de fax" => "",
            "Courriel" => ""
        );
        $i5->setValeurVariable($a);
        $item1[] = $i1;
        $item1[] = $i2;
        $item1[] = $i3;
        $item1[] = $i4;
        $item1[] = $i5;

        $item2 = array();
        $i6 = new ItemLivret();
        $i6->setNom("Le contrat d'apprentissage");
        $i6->setTypeVariable("texte");
        $a = array("Est une forme de contrat blablabla");
        $i6->setValeurVariable($a);
        $i7 = new ItemLivret();
        $i7->setNom("Engagement de l'entreprise");
        $i7->setTypeVariable("texte");
        $a = array("Assurer au salarié blablabla");
        $i7->setValeurVariable($a);
        $i8 = new ItemLivret();
        $i8->setNom("Engagement du centre de formation");
        $i8->setTypeVariable("texte");
        $a = array("Elaborer le plan de formation");
        $i8->setValeurVariable($a);
        $i9 = new ItemLivret();
        $i9->setNom("Engagement de l'apprenti");
        $i9->setTypeVariable("texte");
        $a = array("Travailler pour son employeur");
        $i9->setValeurVariable($a);
        $i41 = new ItemLivret();
        $i41->setNom("Signature");
        $i41->setTypeVariable("tableau");
        $a = array(
            "Pour l'entreprise, le maître d'apprentissage" => "",
            "L'Apprenti" => "",
            "Pour le CFA, le responsable de dispositif" => "",
        );
        $i41->setValeurVariable($a);

        $item2[] = $i6;
        $item2[] = $i7;
        $item2[] = $i8;
        $item2[] = $i9;
        $item2[] = $i41;

        $item3 = array();
        $i10 = new ItemLivret();
        $i10->setNom("Insérer ci-après une photocpie du contrat,
         Veiller à ce qu'elle comporte le visa DDTE");
        $i10->setTypeVariable("fichier");
        $i10->setValeurVariable(array("Insérer le contrat" => ""));
        $item3[] = $i10;

        $item4 = array();
        $i11 = new ItemLivret();
        $i11->setNom("A inserer ici");
        $i11->setTypeVariable("fichier");
        $i11->setValeurVariable(array("Insérer le planning" => ""));
        $item4[] = $i11;

        $item5 = array();
        $i12 = new ItemLivret();
        $i12->setNom("Coordonnées");
        $i12->setTypeVariable("tableau");
        $a = array(
            "Nom et prénom" => "",
            "Adresse personnelle" => "",
            "N° de téléphone" => "",
            "Courriel" => "",
            "Date et lieu de naissance" => "",
            "Situation de famille" => "",
            "Numéro de sécurité sociale" => ""
        );
        $i12->setValeurVariable($a);
        $item5[] = $i12;

        $item6 = array();
        $i13 = new ItemLivret();
        $i13->setNom("A insérer ici");
        $i13->setTypeVariable("fichier");
        $i13->setValeurVariable(array("Insérer le CV" => ""));
        $item6[] = $i13;

        $item7 = array();
        $i14 = new ItemLivret();
        $i14->setNom("L'entreprise");
        $i14->setTypeVariable("tableau");
        $a = array(
            "Dénomination" => "",
            "Raison sociale" => "",
            "Adresse" => "",
            "Adresse du siège" => "",
            "N° de téléphone" => "",
            "N° de fax" => "",
            "E-mail" => "",
            "Structure Juridique" => "",
            "N° de Siret" => "",
            "Code APE" => "",
            "Secteur d'activité et produits/services" => "",
            "Nombre de salariés" => "",
            "Nom du directeur" => "",
            "Nom de maître d'apprentissage" => "",
            "Fonction dans l'entreprise" => "",
            "N° de téléphone MA" => "",
            "N° de Fax MA" => "",
            "Jour et heure de rendez-vous possible" => "",
        );
        $i14->setValeurVariable($a);
        $i15 = new ItemLivret();
        $i15->setNom("Réglement Intérieur de l'entreprise");
        $i15->setTypeVariable("fichier");
        $i15->setValeurVariable(array("Inserér ici" => ""));
        $i16 = new ItemLivret();
        $i16->setNom("Plan d'accès");
        $i16->setTypeVariable("fichier");
        $i16->setValeurVariable(array("Insérer ici" => ""));
        $item7[] = $i14;
        $item7[] = $i15;
        $item7[] = $i16;


        $item8 = array();
        $i17 = new ItemLivret();
        $i17->setNom("Le contexte historique de l'entreprise");
        $i17->setTypeVariable("tableau");
        $a = array(
            "L'historique de l'entreprise" => "",
            "L'historique des produits et services" => ""
        );
        $i17->setValeurVariable($a);
        $i18 = new ItemLivret();
        $i18->setNom("Le contexte commercial");
        $i18->setTypeVariable("tableau");
        $a = array(
            "Le chiffre d'affaire et l'analyse de son évolution" => "",
            "Les principaux clients" => "",
            "Les concurrents (rapport de force)" => "",
            "Les fournisseurs" => "",
            "Les produits concurrents ou de substitution" => "",
            "La politique à l'export" => "",
            "La démarche mercatique" => ""
        );
        $i18->setValeurVariable($a);
        $i19 = new ItemLivret();
        $i19->setNom("Le context organisationnel");
        $i19->setTypeVariable("tableau");
        $a = array(
            "Les différentes implantations géographiques (site, nombre, nature, effectif, lieux, organigramme...)" => "",
            "L'organigramme de l'entreprise d'accueil" => "",
            "Détail des produits et des services" => "",
            "Les moyens techniques mis à sa disposition" => "",
            "L'externalisation et la sous-traitance" => ""
        );
        $i19->setValeurVariable($a);
        $item8[] = $i17;
        $item8[] = $i18;
        $item8[] = $i19;

        $item9 = array();
        $i20 = new ItemLivret();
        $i20->setNom("L'histoire du système d'information");
        $i20->setTypeVariable("tableau");
        $a = array(
            "Comment s'est-il intégré dans l'entreprise ? Quels ont été ses grandes évolutions et leurs impacts sur l'entreprise" => "",
        );
        $i20->setValeurVariable($a);
        $i21 = new ItemLivret();
        $i21->setNom("Les acteurs du Système d'Information");
        $i21->setTypeVariable("tableau");
        $a = array(
            "Le rôle des acteurs et des entités et leurs fonctions au sein du SI (direction, chef de service)" => "",
            "Les principaux services du SI" => "",
            "Les compétences des acteurs du SI (homogène, hétérogène ?)" => "",
        );
        $i21->setValeurVariable($a);
        $i22 = new ItemLivret();
        $i22->setNom("Le Fonctionnement du service Informatique");
        $i22->setTypeVariable("tableau");
        $a = array(
            "Les activités et les responsabilits du service informatique" => "",
            "Le service informatique réalise des tâches n'ayant aucun rapport avec l'informatique ?" => "",
            "Le service informatique est-il directement en contact avec la clientèle ou un autre service permet-il de gérer ses rapports" => "",
            "Le service fait-il appel à une entreprise tierce ? Quelles sont les limites de l'externalisation" => "",
            "Lors de la réalisation des projets, le SI utilise-t-il une méthode stricte de réalisation ou s'adapte-t-il en fonction du projet à réaliser ?" => "",
            "Quelles sont les méthodes de veille technologique mises en place ?" => "",
        );
        $i22->setValeurVariable($a);
        $i23 = new ItemLivret();
        $i23->setNom("Description du Système d'Information");
        $i23->setTypeVariable("tableau");
        $a = array(
            "L’organisation du SI est-elle basée sur une centralisation des données interne ou externe, pourquoi ?" => "",
            "Le SI est-il composé de plusieurs sites et comment sont-ils reliés ? Est-il intégré à un WAN ?" => "",
            "Séparer et identifier les différents flux, notamment en matière de données et de traitements. " => "",
            "Une charte/documentation d'utilisation et de sécurité est-elle disponible ?" => "",
            "Quelle est la topologie du réseau (physique et logique) ?" => "",
            "Quel type de matériel est utilisé (le nombre de postes clients, serveurs…….) ?" => "",
            "Recensez et caractérisez les serveurs de données, et les serveurs d’application." => "",
            "Utilisez-vous la virtualisation ou l’hypervision, ?  Si oui dans quels buts et avec quels outils ?" => "",
            "Quels sont les différents logiciels utilisés (payant, open source ... ) ?" => "",
            "Quels sont les différents progiciels mis en œuvre (logiciels applicatifs, libres ou propriétaires…) ?" => "",
            "Y a- t-il un pôle développement ?  Quels sont les différents langages utilisés ? Pourquoi ce(s) choix ?" => "",
            "Quels types d’applications peut-on trouver ? (solutions intégrées, développement interne, applications métier, propriétaire ou open source ?)." => "",
            "Décrivez la politique de Sécurité des données et du réseau (solutions logicielles, matérielles, réplication des données ? P.R.A. ?" => "",
            "Quelles sont les personnes et les organisations concernées par l’utilisation des outils de Gestion de la Relation Client ?" => "",
            "Quelles sont les personnes et les organisations concernées par l’utilisation des outils de Gestion de la chaîne logistique ?" => "",
            "Quelles sont les fonctions de l’ERP de l’entreprise ? Quelles sont les fonctions des personnes concernées ?" => "",
        );
        $i23->setValeurVariable($a);
        $i24 = new ItemLivret();
        $i24->setNom("L'évolution future du SI");
        $i24->setTypeVariable("tableau");
        $a = array(
            "L’Evolution souhaitées ou imposées dans tous les domaines (organisation, sécurité….). " => "",
            "Quels sont les objectifs à court terme et à long terme et quelles stratégies et tactiques seront employées pour les atteindre." => ""
        );
        $i24->setValeurVariable($a);
        $item9[] = $i20;
        $item9[] = $i21;
        $item9[] = $i22;
        $item9[] = $i23;
        $item9[] = $i24;

        $item10 = array();
        $i25 = new ItemLivret();
        $i25->setNom("Le poste dans l'entreprise");
        $i25->setTypeVariable("tableau");
        $a = array(
            "Direction ou Service" => "",
            "Dépend hiérarchiquement de" => "",
            "Travaille avec" => "",
            "Polyvalence sur le poste avec" => "",
            "intitulé du poste" => "",
            "Niveau de responsabilité à atteindre" => "",
            "Compétences spécifiques au poste" => "",
        );
        $i25->setValeurVariable($a);
        $i26 = new ItemLivret();
        $i26->setNom("Le profil de l'apprenti");
        $i26->setTypeVariable("tableau");
        $a = array(
            "Comportement professionnel attendu" => "",
            "Qualités attendu" => "",
            "Conseils et commentaire du maître d'apprentissage pour aider le stagiaire à réussir à ce poste" => "",
        );
        $i26->setValeurVariable($a);
        $item10[] = $i25;
        $item10[] = $i26;

        // $item11 = array() --> previsionnel des missions à l'apprenti, à reflechir

        $item12 = array();
        $i27 = new ItemLivret();
        $i27->setNom("Formation Interne");
        $i27->setTypeVariable("tableau");
        $i27->setValeurVariable(array("Indiquer ici les objectifs, nombres d'heures..." => ""));
        $item12[] = $i27;

//        $item13 = array();
//        $i28 = new ItemLivret();
//        $i28->setNom("Activite 1 : Communiquer");
//        $i28->setTypeVariable("tableau");
//        $a = array();
//        $c1 = new Competence();
//        $c1->setDescriptif("Identifier les besoins et les contraintes (notamment en terme de gestion et de fonctionnement) d'une organisation");
//        $c1->setCode("C1-1");
//        $c2 = new Competence();
//        $c2->setDescriptif("Comprendre le rôle du SI dans le fonctionnement de l'entreprise et l'organisation du traitement de l'information");
//        $c2->setCode("C1-2");
//        $c3 = new Competence();
//        $c3->setDescriptif("Analyser une situation, la décliner et la simplifier");
//        $c3->setCode("C1-3");
//        $c4 = new Competence();
//        $c4->setDescriptif("Identifier un cadre légal ou réglementaire");
//        $c4->setCode("C1-4");
//        $c5 = new Competence();
//        $c5->setDescriptif("Rechercher des solutions à un problème d'informatisation. Proposer des solutions");
//        $c5->setCode("C1-5");
//        $c6 = new Competence();
//        $c6->setDescriptif("Communiquer ses réflexions en français, en anglais");
//        $c6->setCode("C1-6");
//        $c7 = new Competence();
//        $c7->setDescriptif("Identifier les acteurs (experts et utilisateurs) du SI");
//        $c7->setCode("C1-7");
//        $c8 = new Competence();
//        $c8->setDescriptif("Recenser les fonctionnalités attendues");
//        $c8->setCode("C1-8");
//        $a[] = $c1->getCode() . " - " . $c1->getDescriptif();
//        $a[] = $c2->getCode() . " - " . $c2->getDescriptif();
//        $a[] = $c3->getCode() . " - " . $c3->getDescriptif();
//        $a[] = $c4->getCode() . " - " . $c4->getDescriptif();
//        $a[] = $c5->getCode() . " - " . $c5->getDescriptif();
//        $a[] = $c6->getCode() . " - " . $c6->getDescriptif();
//        $a[] = $c7->getCode() . " - " . $c7->getDescriptif();
//        $a[] = $c8->getCode() . " - " . $c8->getDescriptif();
//        $i28->setValeurVariable($a);
//        $i29 = new ItemLivret();
//        $i29->setNom("Activite 2 :  Concevoir un système d'information");
//        $i29->setTypeVariable("tableau");
//        $a = array();
//        $c9 = new Competence();
//        $c9->setDescriptif("Représenter les flux caractérisant l'activité d'un système d'information");
//        $c9->setCode("C2-1");
//        $c10 = new Competence();
//        $c10->setDescriptif("Modéliser une structure SI et/ou synthétiser un domaine virtuel.");
//        $c10->setCode("C2-2");
//        $c11 = new Competence();
//        $c11->setDescriptif("Représenter les données et les traitements d'un système d'information.");
//        $c11->setCode("C2-3");
//        $c12 = new Competence();
//        $c12->setDescriptif("Représenter un système réparti.");
//        $c12->setCode("C2-4");
//        $c13 = new Competence();
//        $c13->setDescriptif("Faire preuve d'efficacité, de créativité.");
//        $c13->setCode("C2-5");
//        $c14 = new Competence();
//        $c14->setDescriptif("Connaître et respecter la propriété intellectuelle.");
//        $c14->setCode("C2-6");
//        $c15 = new Competence();
//        $c15->setDescriptif("Définir un mode opératoire technologique (matériel, logiciel) et organisationnel (procédure).");
//        $c15->setCode("C2-7");
//        $c16 = new Competence();
//        $c16->setDescriptif("Présenter l’offre de solutions techniques disponibles sur le marché, sélectionner le propositions les mieux adaptées.");
//        $c16->setCode("C2-8");
//        $a[] = $c9->getCode() . " - " . $c9->getDescriptif();
//        $a[] = $c10->getCode() . " - " . $c10->getDescriptif();
//        $a[] = $c11->getCode() . " - " . $c11->getDescriptif();
//        $a[] = $c12->getCode() . " - " . $c12->getDescriptif();
//        $a[] = $c13->getCode() . " - " . $c13->getDescriptif();
//        $a[] = $c14->getCode() . " - " . $c14->getDescriptif();
//        $a[] = $c15->getCode() . " - " . $c15->getDescriptif();
//        $a[] = $c16->getCode() . " - " . $c16->getDescriptif();
//        $i29->setValeurVariable($a);
//        $i30 = new ItemLivret();
//        $i30->setNom("Activite 3 : Anticiper la mise en oeuvre d'un Système d'Information");
//        $i30->setTypeVariable("tableau");
//        $a = array();
//        $c17 = new Competence();
//        $c17->setDescriptif("Exploiter les ressources et les potentialités d'un réseau étendu, en particulier en matière de services intranet, extranet, internet.");
//        $c17->setCode("C3-1");
//        $c18 = new Competence();
//        $c18->setDescriptif("Définir des besoins en ressources dans un environnement de réseau local.");
//        $c18->setCode("C3-2");
//        $c19 = new Competence();
//        $c19->setDescriptif("Déterminer les besoins, les contraintes liés à la sécurité.");
//        $c19->setCode("C3-3");
//        $c20 = new Competence();
//        $c20->setDescriptif("Déterminer les contraintes de confidentialité.");
//        $c20->setCode("C3-4");
//        $c21 = new Competence();
//        $c21->setDescriptif("Assurer l'interface avec les prestataires.");
//        $c21->setCode("C3-5");
//        $c22 = new Competence();
//        $c22->setDescriptif("S'adapter aux exigences de qualité.");
//        $c22->setCode("C3-6");
//        $c23 = new Competence();
//        $c23->setDescriptif("Rédiger un cahier des charges fonctionnel, une étude d'opportunité, un argumentaire technique.");
//        $c23->setCode("C3-7");
//        $c24 = new Competence();
//        $c24->setDescriptif("Inventorier les risques liés à un dysfonctionnement.");
//        $c24->setCode("C3-8");
//        $a[] = $c17->getCode() . " - " . $c17->getDescriptif();
//        $a[] = $c18->getCode() . " - " . $c18->getDescriptif();
//        $a[] = $c19->getCode() . " - " . $c19->getDescriptif();
//        $a[] = $c20->getCode() . " - " . $c20->getDescriptif();
//        $a[] = $c21->getCode() . " - " . $c21->getDescriptif();
//        $a[] = $c22->getCode() . " - " . $c22->getDescriptif();
//        $a[] = $c23->getCode() . " - " . $c23->getDescriptif();
//        $a[] = $c24->getCode() . " - " . $c24->getDescriptif();
//        $i30->setValeurVariable($a);
//        $i31 = new ItemLivret();
//        $i31->setNom("Activité 4 - Conduire un projet");
//        $i31->setTypeVariable("tableau");
//        $a = array();
//        $c25 = new Competence();
//        $c25->setDescriptif("Scinder le projet en étape.");
//        $c25->setCode("C4-1");
//        $c26 = new Competence();
//        $c26->setDescriptif("Estimer la charge d'un projet.");
//        $c26->setCode("C4-2");
//        $c27 = new Competence();
//        $c27->setDescriptif("Planifier. Gérer le capital temps/ressources.");
//        $c27->setCode("C4-3");
//        $c28 = new Competence();
//        $c28->setDescriptif("Organiser le travail en équipe Piloter le projet.");
//        $c28->setCode("C4-4");
//        $c29 = new Competence();
//        $c29->setDescriptif("Mettre en œuvre un plan qualité.");
//        $c29->setCode("C4-5");
//        $c30 = new Competence();
//        $c30->setDescriptif("Estimer le coût d’un projet.");
//        $c30->setCode("C4-6");
//        $a[] = $c25->getCode() . " - " . $c25->getDescriptif();
//        $a[] = $c26->getCode() . " - " . $c26->getDescriptif();;
//        $a[] = $c27->getCode() . " - " . $c27->getDescriptif();;
//        $a[] = $c28->getCode() . " - " . $c28->getDescriptif();;
//        $a[] = $c29->getCode() . " - " . $c29->getDescriptif();;
//        $a[] = $c30->getCode() . " - " . $c30->getDescriptif();;
//        $i31->setValeurVariable($a);
//        $i32 = new ItemLivret();
//        $i32->setNom("Activité 5 - Réaliser");
//        $i32->setTypeVariable("tableau");
//        $a = array();
//        $c31 = new Competence();
//        $c31->setDescriptif("Assurer le suivi  de développement logiciel et/ou réseau.");
//        $c31->setCode("C5-1");
//        $c32 = new Competence();
//        $c32->setDescriptif("Développer en utilisant un langage procédural, événementiel ou objet.");
//        $c32->setCode("C5-2");
//        $c33 = new Competence();
//        $c33->setDescriptif("Développer une application autour d'une base de données relationnelle et/ou objet.");
//        $c33->setCode("C5-3");
//        $c34 = new Competence();
//        $c34->setDescriptif("Développer des solutions en utilisant les technologies de l'internet : portail d'entreprise, intranet, extranet.");
//        $c34->setCode("C5-4");
//        $c35 = new Competence();
//        $c35->setDescriptif("Développer une application autour d'un réseau et/ou d’un système.");
//        $c35->setCode("C5-5");
//        $c36 = new Competence();
//        $c36->setDescriptif("Mettre au point et maintenir une application à ses différentes étapes de  réalisation.");
//        $c36->setCode("C5-6");
//        $c37 = new Competence();
//        $c37->setDescriptif("Concevoir des tests.");
//        $c37->setCode("C5-7");
//        $c38 = new Competence();
//        $c38->setDescriptif("Valider un système.");
//        $c38->setCode("C5-8");
//        $a[] = $c31;
//        $a[] = $c32;
//        $a[] = $c33;
//        $a[] = $c34;
//        $a[] = $c35;
//        $a[] = $c36;
//        $a[] = $c37;
//        $a[] = $c38;
//        $i32->setValeurVariable($a);
//        $i33 = new ItemLivret();
//        $i33->setNom("Activité 6 - Contrôler la mise en oeuvre");
//        $i33->setTypeVariable("tableau");
//        $a = array();
//        $c39 = new Competence();
//        $c39->setDescriptif("Assurer l'assistance de premier niveau.");
//        $c39->setCode("C6-1");
//        $c40 = new Competence();
//        $c40->setDescriptif("Mettre un logiciel à la disposition des utilisateurs.");
//        $c40->setCode("C6-2");
//        $c41 = new Competence();
//        $c41->setDescriptif("Créer une documentation technique en français ou en anglais.");
//        $c41->setCode("C6-3");
//        $c42 = new Competence();
//        $c42->setDescriptif("Former les utilisateurs.");
//        $c42->setCode("C6-4");
//        $c43 = new Competence();
//        $c43->setDescriptif("Rédiger une notice d'utilisation ou un mode opératoire d'installation.");
//        $c43->setCode("C6-5");
//        $a[] = $c39;
//        $a[] = $c40;
//        $a[] = $c41;
//        $a[] = $c42;
//        $a[] = $c43;
//        $i33->setValeurVariable($a);
//        $i34 = new ItemLivret();
//        $i34->setNom("Activité 7 - Pérenniser le Système d'Information");
//        $i34->setTypeVariable("tableau");
//        $a = array();
//        $c44 = new Competence();
//        $c44->setDescriptif("Assurer la sécurité du SI.");
//        $c44->setCode("C7-1");
//        $c45 = new Competence();
//        $c45->setDescriptif("Surveiller et optimiser le trafic sur le SI.");
//        $c45->setCode("C7-2");
//        $c46 = new Competence();
//        $c46->setDescriptif("Gérer l'hétérogénéité des technologies mises en œuvre à travers le SI.");
//        $c46->setCode("C7-3");
//        $c47 = new Competence();
//        $c47->setDescriptif("Sélectionner des sources d'information adaptées et actualisées en français/anglais.");
//        $c47->setCode("C7-4");
//        $c48 = new Competence();
//        $c48->setDescriptif("Identifier les évolutions technologiques ayant des conséquences pour l'entreprise.");
//        $c48->setCode("C7-5");
//        $c49 = new Competence();
//        $c49->setDescriptif("Constituer et mettre à jour la documentation technique en français/anglais.");
//        $c49->setCode("C7-6");
//        $c50 = new Competence();
//        $c50->setDescriptif("Rédiger un compte rendu d’incidents, un rapport d’expertise.");
//        $c50->setCode("C7-7");
//        $c51 = new Competence();
//        $c51->setDescriptif("Recenser les impacts techniques et organisationnels consécutif à une évolution du SI.");
//        $c51->setCode("C7-8");
//        $c52 = new Competence();
//        $c52->setDescriptif("Développer des tableaux de bord de performances du réseau.");
//        $c52->setCode("C7-9");
//        $a[] = $c44;
//        $a[] = $c45;
//        $a[] = $c46;
//        $a[] = $c47;
//        $a[] = $c48;
//        $a[] = $c49;
//        $a[] = $c50;
//        $a[] = $c51;
//        $a[] = $c52;
//        $i34->setValeurVariable($a);
//        $i35 = new ItemLivret();
//        $i35->setNom("Activité 8 - Management - \"Creation d'une manifestation de communication\"");
//        $i35->setTypeVariable("tableau");
//        $a = array();
//        $c53 = new Competence();
//        $c53->setDescriptif("Construire le plan de communication.");
//        $c53->setCode("C8-1");
//        $c54 = new Competence();
//        $c54->setDescriptif("Rechercher des financements. Chiffrer les dépenses et les recettes.");
//        $c54->setCode("C8-2");
//        $c55 = new Competence();
//        $c55->setDescriptif("Construire un budget prévisionnel. Déterminer le seuil de rentabilité.");
//        $c55->setCode("C8-3");
//        $c56 = new Competence();
//        $c56->setDescriptif("Evaluer la charge, construire un outil d’ordonnancement et de suivi.");
//        $c56->setCode("C8-4");
//        $c57 = new Competence();
//        $c57->setDescriptif("Vérifier la faisabilité du projet et le modifier éventuellement.");
//        $c57->setCode("C8-5");
//        $c58 = new Competence();
//        $c58->setDescriptif("Redéfinir les besoins, identifier de nouvelles contraintes.");
//        $c58->setCode("C8-6");
//        $c59 = new Competence();
//        $c59->setDescriptif("Rédiger un cahier des charges.");
//        $c59->setCode("C8-7");
//        $a[] = $c53;
//        $a[] = $c54;
//        $a[] = $c55;
//        $a[] = $c56;
//        $a[] = $c57;
//        $a[] = $c58;
//        $a[] = $c59;
//        $i35->setValeurVariable($a);
//        $i36 = new ItemLivret();
//        $i36->setNom('Activité 9 - Management - "creation d\'entreprise"');
//        $i36->setTypeVariable("tableau");
//        $a = array();
//        $c60 = new Competence();
//        $c60->setDescriptif("Savoir utiliser différentes méthodes d’animation de réunion.");
//        $c60->setCode("C9-1");
//        $c61 = new Competence();
//        $c61->setDescriptif("Rechercher des financements pour la gestion future de l'entreprise.");
//        $c61->setCode("C9-2");
//        $c62 = new Competence();
//        $c62->setDescriptif("Construire un budget prévisionnel. Déterminer le seuil de rentabilité.");
//        $c62->setCode("C9-3");
//        $c63 = new Competence();
//        $c63->setDescriptif("Evaluer la charge, construire un outil d’ordonnancement et de suivi.");
//        $c63->setCode("C9-4");
//        $c64 = new Competence();
//        $c64->setDescriptif("Vérifier la faisabilité du projet et le modifier éventuellement.");
//        $c64->setCode("C9-5");
//        $item13[] = $i29;
//        $item13[] = $i30;
//        $item13[] = $i31;
//        $item13[] = $i32;
//        $item13[] = $i33;
//        $item13[] = $i34;
//        $item13[] = $i35;


        $item16 = array();
        $i37 = new ItemLivret();
        $i37->setNom("Centre de Formation");
        $i37->setTypeVariable("tableau");
        $a = array(
            "Dénomination" => "",
            "Adresse" => "",
            "Adresse site de formation" => "",
            "Téléphone" => "",
            "Fax" => "",
            "Site Internet" => "",
            "Email" => "",
            "SIRET" => "",
            "Code APE" => "",
            "Directeur du site" => "",
            "Responsable de dispositif" => "",
            "Email RD" => "",
        );
        $i37->setValeurVariable($a);
        $i38 = new ItemLivret();
        $i38->setNom("Formateurs");
        $i38->setTypeVariable("tableau");
        $a = array();
        $i38->setValeurVariable($a);
        $item16[] = $i37;
        $item16[] = $i38;

        $item18 = array();
        $i39 = new ItemLivret();
        $i39->setNom("Réglement Intérieur du Lycée Pasteur Mont-Roland Enseignement Supérieur");
        $i39->setTypeVariable("fichier");
        $i39->setValeurVariable(array("Insérer ici" => ""));
        $item18[] = $i39;
        $item19 = array();
        $i40 = new ItemLivret();
        $i40->setNom("Plan de Formation");
        $i40->setValeurVariable(array("Insérer ici" => ""));
        $item19[] = $i40;


        // SECTIONS
        $section1 = array();
        $s1 = new Section();
        $s1->setNom("Présentation du contrat");
        $s1->setItemLivret($item1);
        $s2 = new Section();
        $s2->setNom("Engagement des acteurs");
        $s2->setItemLivret($item2);
        $s3 = new Section();
        $s3->setNom("Contrat d'apprentissage");
        $s3->setItemLivret($item3);
        $s4 = new Section();
        $s4->setNom("Planning de l'alternance");
        $s4->setItemLivret($item4);
        $section1[] = $s1;
        $section1[] = $s2;
        $section1[] = $s3;
        $section1[] = $s4;

        $section2 = array();
        $s5 = new Section();
        $s5->setNom("Présentation de l'apprenti");
        $s5->setItemLivret($item5);
        $s6 = new Section();
        $s6->setNom("CV");
        $s6->setItemLivret($item6);
        $section2[] = $s5;
        $section2[] = $s6;

        $section3 = array();
        $s7 = new Section();
        $s7->setNom("Présentation de l'entreprise");
        $s7->setItemLivret($item7);
        $s8 = new Section();
        $s8->setNom("Contexte organisationnel et commercial");
        $s8->setItemLivret($item8);
        $s9 = new Section();
        $s9->setNom("Système d'information de l'entreprise");
        $s9->setItemLivret($item9);
        $s10 = new Section();
        $s10->setNom("Poste et compétences requises");
        $s10->setItemLivret($item10);
        $s11 = new Section();
        $s11->setNom("Prévisionnel des missions confiées à l'apprenti");
        $s12 = new Section();
        $s12->setNom("Formation interne");
        $s12->setItemLivret($item12);
        $s13 = new Section();
        $s13->setNom("Référentiel d'activité et de compétences professionnelles");
//        $s13->setItemLivret($item13);
        $s14 = new Section();
        $s14->setNom("Activités réalisées en entreprise");
        $s15 = new Section();
        $s15->setNom("Evaluation ds activités par le MA");
        $section3[] = $s7;
        $section3[] = $s8;
        $section3[] = $s9;
        $section3[] = $s10;
        $section3[] = $s11;
        $section3[] = $s12;
        $section3[] = $s13;
        $section3[] = $s14;
        $section3[] = $s15;

        $section4 = array();
        $s16 = new Section();
        $s16->setNom("Cadre de la formation");
        $s16->setItemLivret($item16);
        $s17 = new Section();
        $s17->setNom("Module de formation");
        $s18 = new Section();
        $s18->setNom("Règlement Intérieur");
        $s18->setItemLivret($item18);
        $s19 = new Section();
        $s19->setNom("Plan de formation");
        $s19->setItemLivret($item19);
        $section4[] = $s16;
        $section4[] = $s17;
        $section4[] = $s18;
        $section4[] = $s19;

        // CATEGORIES
        $c1 = new Categorie();
        $c1->setNom("La formation");
        $c1->setSections($section4);

        $c2 = new Categorie();
        $c2->setNom("L'emploi");
        $c2->setSections($section3);

        $c3 = new Categorie();
        $c3->setNom("Le projet");
        $c3->setSections($section2);

        $c4 = new Categorie();
        $c4->setNom("Le contrat");
        $c4->setSections($section1);

        $categories = array();
        $categories[] = $c4;
        $categories[] = $c3;
        $categories[] = $c2;
        $categories[] = $c1;


        // LIVRET
        $this->setPeriodeFormation($periodes);
        $this->setCategorie($categories);
        $this->setApprenti($apprenti);
    }


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
     * Set apprenti
     *
     * @param object_id $apprenti
     * @return self
     */
    public function setApprenti($apprenti)
    {
        $this->apprenti = $apprenti;
        return $this;
    }

    /**
     * Get apprenti
     *
     * @return object_id $apprenti
     */
    public function getApprenti()
    {
        return $this->apprenti;
    }

    /**
     * Set tuteur
     *
     * @param object_id $tuteur
     * @return self
     */
    public function setTuteur($tuteur)
    {
        $this->tuteur = $tuteur;
        return $this;
    }

    /**
     * Get tuteur
     *
     * @return object_id $tuteur
     */
    public function getTuteur()
    {
        return $this->tuteur;
    }

    /**
     * Set categorie
     *
     * @param collection $categorie
     * @return self
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * Get categorie
     *
     * @return collection $categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set periodeFormation
     *
     * @param collection $periodeFormation
     * @return self
     */
    public function setPeriodeFormation($periodeFormation)
    {
        $this->periodeFormation = $periodeFormation;
        return $this;
    }

    /**
     * Get periodeFormation
     *
     * @return collection $periodeFormation
     */
    public function getPeriodeFormation()
    {
        return $this->periodeFormation;
    }

    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categorie
     *
     * @param JavaLeEET\LivretBundle\Document\Categorie $categorie
     */
    public function addCategorie(\JavaLeEET\LivretBundle\Document\Categorie $categorie)
    {
        $this->categorie[] = $categorie;
    }

    /**
     * Remove categorie
     *
     * @param JavaLeEET\LivretBundle\Document\Categorie $categorie
     */
    public function removeCategorie(\JavaLeEET\LivretBundle\Document\Categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
    }
}
