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
    protected $periodeFormation = array();

    /**
     * @var collection $activite
     *
     * @ODM\EmbedMany(targetDocument="Activite")
     */
    protected $activite;


    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->periodeFormation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activite = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Méthode qui génére le livret de suivi
     * @TODO : en dur pour le moment.
     */
    public function genererLivret($apprenti)
    {

//        $p = new PeriodeFormation();
//        $itemCour = new ItemCours();
//        $itemCour->setModuleFormation("XML : partiel transformation xml->html");
//        $itemCour->setDifficulte("aucune");
//        $itemCour->setExperimentationEntreprise("xsl-fo pour génération pdf");
//        $itemCour->setLiensEntreprise("projet entreprise");
//        $itemCour2 = new ItemCours();
//        $itemCour2->setModuleFormation("Droit : partiel droit commerce en ligne");
//        $itemCour2->setDifficulte("aucune");
//        $itemCour2->setExperimentationEntreprise("mentions legales");
//        $itemCour2->setLiensEntreprise("projet entreprise");
//        $a = array();
//        $a[] = $itemCour;
//        $a[] = $itemCour2;
//        $p->setDateDebutF(new \MongoDate(strtotime("21-12-2015")));
//        $p->setDateFinF(new \MongoDate(strtotime("21-12-2015")));
//        $p->setItemCours($a);
//
//        $itemEnt = new ItemEntreprise();
//        $itemEnt->setLibelleActivite("Developpement");
//        $itemEnt->setDescriptionActivite("Developpement du lot 1 du projet");
//        $itemEnt->setSavoirTheorique("Gestion de projet");
//        $itemEnt->setAptitudeRelationnelle("Communiquer avec son client");
//        $itemEnt->setCompetencesUtil(array("C1-1", "C3-5"));
//        $a = array();
//        $a[] = $itemEnt;
//        $p->setDateDebutE(new \MongoDate(strtotime("21-12-2015")));
//        $p->setDateFinE(new \MongoDate(strtotime("21-12-2015")));
//        $p->setItemEntreprise($a);
//
//        $periodes = array();
//        $periodes[] = $p;

        //ITEMS DU LIVRET
        $item1 = array();
        $i1 = new ItemLivret();
        $i1->setNom("L'apprenti");
        $i1->setTypeVariable("tableau");
        $a = array(
            "Nom et prénom" => "",
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
        $a = array("Est une forme de contrat qui a pour but de donner à un jeune entre 16 et 26 ans (ou un adulte demandeur d’emploi de plus de 26 ans), une formation en vue de l’obtention d’un diplôme, d’un titre homologué ou d’une qualification professionnelle.
<br /> Cette formation  est assurée en alternance:
<li>dans une Entreprise (agricole, artisanale, industrielle, commerciale)</li>
<li>dans une administration</li>
<li>dans un Centre de formation à l’Apprentissage</li>
La réussite de cette formation suppose donc qu’une coordination étroite soit établie entre le centre de formation et l’entreprise afin que le salarié puisse bénéficier d’une formation cohérente et efficace.
");
        $i6->setValeurVariable($a);
        $i7 = new ItemLivret();
        $i7->setNom("Engagement de l'entreprise");
        $i7->setTypeVariable("texte");
        $a = array("<li>Assurer au salarié une formation méthodique et complète, pour le métier prévu au contrat. Pour cela, le chef d’entreprise s’engage notamment à faire exécuter, sous sa responsabilité directe ou celle d’un salarié agréé comme tuteur, les travaux faisant partie de la progression arrêtée d’un commun accord avec le centre de formation.</li>
<li>Organiser le temps de travail en relation avec le plan de formation.</li>
<li>L’employer conformément à la législation en vigueur.</li>
<li>Lui faire suivre toutes les formations et activités pédagogiques du centre de formation.</li>
<li>Communiquer avec le centre de formation par le livret de suivi, et y porter les appréciations et remarques du tuteur.</li>
<li>Veiller à ce que l’apprenti(e) se présente à l’examen prévu, et lui apporter le concours nécessaire pour la réalisation de son mémoire.</li>
<li>Accompagner, évaluer les différentes activités.</li>
<li>Participer aux réunions pédagogiques organisées par le< centre de formation.</li>
<li>Informer le Centre de formation (le responsable de dispositif) de toute information susceptible de contribuer à la réussite de l’apprenti(e)</li>
");
        $i7->setValeurVariable($a);
        $i8 = new ItemLivret();
        $i8->setNom("Engagement du centre de formation");
        $i8->setTypeVariable("texte");
        $a = array("<li>Elaborer le plan de formation.</li>
<li>Assurer à l’apprenti(e) une formation générale et technique, correspondant au référentiel de l’examen ou de la qualification préparés.</li>
<li>Arrêter d’un commun accord avec l’entreprise et dans le cadre de ce référentiel, la progression de la formation dans l’entreprise.</li>
<li>Prendre les dispositions nécessaires pour assurer la coordination entre le responsable de dispositif et le maître d’apprentissage.</li>
<li>Diffuser à l’entreprise tous les documents pédagogiques pouvant aider celle-ci à assurer une bonne formation.</li>
<li>Fournir, notamment grâce au livret de suivi, tous les renseignements permettant à l’entreprise et à l’apprenti(e) de suivre l’assiduité, le travail et la progression des compétences.</li>
<li>Veiller à ce que l’apprenti(e) soit inscrit(e) à l’examen prévu en fin de contrat, et lui fournir les moyens nécessaires pour s’y préparer.</li>
");
        $i8->setValeurVariable($a);
        $i9 = new ItemLivret();
        $i9->setNom("Engagement de l'apprenti");
        $i9->setTypeVariable("texte");
        $a = array("<li>Travailler pour son employeur, et notamment, effectuer les travaux prévus dans la progression de la formation en vue d’obtenir la qualification professionnelle.</li>
<li>Poursuivre les objectifs du référentiel de l’examen en vue d’obtenir le diplôme ou la qualification visé</li>
<li>Respecter le règlement intérieur de l’entreprise et celui du centre de formation.</li>
<li>S’investir dans un travail régulier au centre de formation en respectant le calendrier et les échéances fixées.</li>
<li>Tenir à jour  le livret de suivi et veiller à ce qu’il soit rempli et visé régulièrement par les formateurs du centre de formation et son maître d’apprentissage.</li>
<li>Etre actif en entreprise et au centre de formation.</li>
<li>Réaliser les activités demandées soit par le responsable désigné dans l’entreprise, soit par le responsable de promotion au centre.</li>
");
        $i9->setValeurVariable($a);
        $i41 = new ItemLivret();
        $i41->setNom("Signature");
        $i41->setTypeVariable("tableau-signature");
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
        $i17->setTypeVariable("tableau-long");
        $a = array(
            "L'historique de l'entreprise" => "",
            "L'historique des produits et services" => ""
        );
        $i17->setValeurVariable($a);
        $i18 = new ItemLivret();
        $i18->setNom("Le contexte commercial");
        $i18->setTypeVariable("tableau-long");
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
        $i19->setTypeVariable("tableau-long");
        $a = array(
            "Les différentes implantations géographiques (site, nombre, nature, effectif, lieux, organigramme)" => "",
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
        $i20->setTypeVariable("tableau-long");
        $a = array(
            "Comment s'est-il intégré dans l'entreprise ? Quels ont été ses grandes évolutions et leurs impacts sur l'entreprise" => "",
        );
        $i20->setValeurVariable($a);
        $i21 = new ItemLivret();
        $i21->setNom("Les acteurs du Système d'Information");
        $i21->setTypeVariable("tableau-long");
        $a = array(
            "Le rôle des acteurs et des entités et leurs fonctions au sein du SI (direction, chef de service)" => "",
            "Les principaux services du SI" => "",
            "Les compétences des acteurs du SI (homogène, hétérogène ?)" => "",
        );
        $i21->setValeurVariable($a);
        $i22 = new ItemLivret();
        $i22->setNom("Le Fonctionnement du service Informatique");
        $i22->setTypeVariable("tableau-long");
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
        $i23->setTypeVariable("tableau-long");
        $a = array(
            "L’organisation du SI est-elle basée sur une centralisation des données interne ou externe, pourquoi ?" => "",
            "Le SI est-il composé de plusieurs sites et comment sont-ils reliés ? Est-il intégré à un WAN ?" => "",
            "Séparer et identifier les différents flux, notamment en matière de données et de traitements " => "",
            "Une charte/documentation d'utilisation et de sécurité est-elle disponible ?" => "",
            "Quelle est la topologie du réseau (physique et logique) ?" => "",
            "Quel type de matériel est utilisé (le nombre de postes clients, serveurs……) ?" => "",
            "Recensez et caractérisez les serveurs de données, et les serveurs d’application" => "",
            "Utilisez-vous la virtualisation ou l’hypervision, ?  Si oui dans quels buts et avec quels outils ?" => "",
            "Quels sont les différents logiciels utilisés (payant, open source, etc) ?" => "",
            "Quels sont les différents progiciels mis en œuvre (logiciels applicatifs, libres ou propriétaires…) ?" => "",
            "Y a- t-il un pôle développement ?  Quels sont les différents langages utilisés ? Pourquoi ce(s) choix ?" => "",
            "Quels types d’applications peut-on trouver ? (solutions intégrées, développement interne, applications métier, propriétaire ou open source ?)" => "",
            "Décrivez la politique de Sécurité des données et du réseau (solutions logicielles, matérielles, réplication des données ? PRA ?" => "",
            "Quelles sont les personnes et les organisations concernées par l’utilisation des outils de Gestion de la Relation Client ?" => "",
            "Quelles sont les personnes et les organisations concernées par l’utilisation des outils de Gestion de la chaîne logistique ?" => "",
            "Quelles sont les fonctions de l’ERP de l’entreprise ? Quelles sont les fonctions des personnes concernées ?" => "",
        );
        $i23->setValeurVariable($a);
        $i24 = new ItemLivret();
        $i24->setNom("L'évolution future du SI");
        $i24->setTypeVariable("tableau-long");
        $a = array(
            "L’Evolution souhaitées ou imposées dans tous les domaines (organisation, sécurité…) " => "",
            "Quels sont les objectifs à court terme et à long terme et quelles stratégies et tactiques seront employées pour les atteindre" => ""
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
        $i26->setTypeVariable("tableau-long");
        $a = array(
            "Comportement professionnel attendu" => "",
            "Qualités attendu" => "",
            "Conseils et commentaire du maître d'apprentissage pour aider le stagiaire à réussir à ce poste" => "",
        );
        $i26->setValeurVariable($a);
        $item10[] = $i25;
        $item10[] = $i26;

        $item11 = array();
        $i42 = new ItemLivret();
        $i42->setNom("Dans les 3 premiers mois");
        $i42->setTypeVariable("tableau-double");
        $i42->setValeurVariable(
            array("1 - " => "",
                "2 - " => "",
                "3 - " => "",
                "4 - " => "",
                "5 - " => "",
                "6 - " => "",)
        );
        $i43 = new ItemLivret();
        $i43->setNom("Dans les 9 mois qui suivent");
        $i43->setTypeVariable("tableau-double");
        $i43->setValeurVariable(
            array("1 - " => "",
                "2 - " => "",
                "3 - " => "",
                "4 - " => "",
                "5 - " => "",
                "6 - " => "",
                "7 - " => "",
                "8 - " => "",
                "9 - " => "",
                "10 - " => "",)
        );
        $i44 = new ItemLivret();
        $i44->setNom("Dans les 6 derniers mois");
        $i44->setTypeVariable("tableau-double");
        $i44->setValeurVariable(
            array("1 - " => "",
                "2 - " => "",
                "3 - " => "",
                "4 - " => "",
                "5 - " => "",
                "6 - " => "",)
        );
        $item11[] = $i42;
        $item11[] = $i43;
        $item11[] = $i44;

        $item12 = array();
        $i27 = new ItemLivret();
        $i27->setNom("Formation Interne");
        $i27->setTypeVariable("tableau");
        $i27->setValeurVariable(array("Indiquer ici les objectifs, nombres d'heures, etc" => ""));
        $item12[] = $i27;

        $item13 = array();

        $a1 = new Activite();
        $a1->setTitre("Activite 1 : Communiquer");
        $a1->setDescriptif(array("Obtenir les informations nécessaires à la conception et au développement",
            "Auditer l'existant",
            "Conduire un entretien",
            "Animer une réunion de réflexion",
            "Diffuser les conclusions et les décisions",
            "Analyser un schéma directeur",
            "Faire exprimer leur besoin à des utilisateurs",
            "Analyser un cahier des charges"));
        $a = array();
        $c1 = new Competence();
        $c1->setDescriptif("Identifier les besoins et les contraintes (notamment en terme de gestion et de fonctionnement) d'une organisation");
        $c1->setCode("C1-1");
        $c2 = new Competence();
        $c2->setDescriptif("Comprendre le rôle du SI dans le fonctionnement de l'entreprise et l'organisation du traitement de l'information");
        $c2->setCode("C1-2");
        $c3 = new Competence();
        $c3->setDescriptif("Analyser une situation, la décliner et la simplifier");
        $c3->setCode("C1-3");
        $c4 = new Competence();
        $c4->setDescriptif("Identifier un cadre légal ou réglementaire");
        $c4->setCode("C1-4");
        $c5 = new Competence();
        $c5->setDescriptif("Rechercher des solutions à un problème d'informatisation Proposer des solutions");
        $c5->setCode("C1-5");
        $c6 = new Competence();
        $c6->setDescriptif("Communiquer ses réflexions en français, en anglais");
        $c6->setCode("C1-6");
        $c7 = new Competence();
        $c7->setDescriptif("Identifier les acteurs (experts et utilisateurs) du SI");
        $c7->setCode("C1-7");
        $c8 = new Competence();
        $c8->setDescriptif("Recenser les fonctionnalités attendues");
        $c8->setCode("C1-8");
        $a[] = $c1;
        $a[] = $c2;
        $a[] = $c3;
        $a[] = $c4;
        $a[] = $c5;
        $a[] = $c6;
        $a[] = $c7;
        $a[] = $c8;
        $a1->setCompetences($a);

        $a2 = new Activite();
        $a2->setTitre("Activite 2 : Concevoir un système d'information");
        $a2->setDescriptif(array(
            "Modéliser une architecture",
            "Evaluer une faisabilité",
            "Respecter des contraintes",
            "Réaliser le contenu d'un dossier de spécifications",
            "Suivre les innovations concernant les technologies mises en place pour en proposer leur intégration"
        ));
        $a = array();
        $c9 = new Competence();
        $c9->setDescriptif("Représenter les flux caractérisant l'activité d'un système d'information");
        $c9->setCode("C2-1");
        $c10 = new Competence();
        $c10->setDescriptif("Modéliser une structure SI et/ou synthétiser un domaine virtuel");
        $c10->setCode("C2-2");
        $c11 = new Competence();
        $c11->setDescriptif("Représenter les données et les traitements d'un système d'information");
        $c11->setCode("C2-3");
        $c12 = new Competence();
        $c12->setDescriptif("Représenter un système réparti");
        $c12->setCode("C2-4");
        $c13 = new Competence();
        $c13->setDescriptif("Faire preuve d'efficacité, de créativité");
        $c13->setCode("C2-5");
        $c14 = new Competence();
        $c14->setDescriptif("Connaître et respecter la propriété intellectuelle");
        $c14->setCode("C2-6");
        $c15 = new Competence();
        $c15->setDescriptif("Définir un mode opératoire technologique (matériel, logiciel) et organisationnel (procédure)");
        $c15->setCode("C2-7");
        $c16 = new Competence();
        $c16->setDescriptif("Présenter l’offre de solutions techniques disponibles sur le marché, sélectionner le propositions les mieux adaptées");
        $c16->setCode("C2-8");
        $a[] = $c9;
        $a[] = $c10;
        $a[] = $c11;
        $a[] = $c12;
        $a[] = $c13;
        $a[] = $c14;
        $a[] = $c15;
        $a[] = $c16;
        $a2->setCompetences($a);

        $a3 = new Activite();
        $a3->setTitre("Activite 3 : Anticipier la mise en oeuvre d'un Système d'Information");
        $a3->setDescriptif(array(
            "Organiser la mise en place du SI",
            "Anticiper les besoins",
            "Garantir des conditions d'efficacité du développement",
            "Communiquer ses conclusions",
            "Faire une analyse organisationnelle",
            "Exécuter une analyse fonctionnelle",
            "Rédiger un dossier de choix de solution technique",
            "Soutenir les spécifications techniques d'une solution"
        ));
        $a = array();
        $c17 = new Competence();
        $c17->setDescriptif("Exploiter les ressources et les potentialités d'un réseau étendu, en particulier en matière de services intranet, extranet, internet");
        $c17->setCode("C3-1");
        $c18 = new Competence();
        $c18->setDescriptif("Définir des besoins en ressources dans un environnement de réseau local");
        $c18->setCode("C3-2");
        $c19 = new Competence();
        $c19->setDescriptif("Déterminer les besoins, les contraintes liés à la sécurité");
        $c19->setCode("C3-3");
        $c20 = new Competence();
        $c20->setDescriptif("Déterminer les contraintes de confidentialité");
        $c20->setCode("C3-4");
        $c21 = new Competence();
        $c21->setDescriptif("Assurer l'interface avec les prestataires");
        $c21->setCode("C3-5");
        $c22 = new Competence();
        $c22->setDescriptif("S'adapter aux exigences de qualité");
        $c22->setCode("C3-6");
        $c23 = new Competence();
        $c23->setDescriptif("Rédiger un cahier des charges fonctionnel, une étude d'opportunité, un argumentaire technique");
        $c23->setCode("C3-7");
        $c24 = new Competence();
        $c24->setDescriptif("Inventorier les risques liés à un dysfonctionnement");
        $c24->setCode("C3-8");
        $a[] = $c17;
        $a[] = $c18;
        $a[] = $c19;
        $a[] = $c20;
        $a[] = $c21;
        $a[] = $c22;
        $a[] = $c23;
        $a[] = $c24;
        $a3->setCompetences($a);

        $a4 = new Activite();
        $a4->setTitre("Activite 4 : Conduire un projet");
        $a4->setDescriptif(array(
            "Conduire un projet SI",
            "Gérer des ressources humaines",
            "Optimiser des matériels",
            "Maîtriser la consommation d'une enveloppe temps",
            "Créer et gérer un tableau de bord"
        ));
        $a = array();
        $c25 = new Competence();
        $c25->setDescriptif("Scinder le projet en étape");
        $c25->setCode("C4-1");
        $c26 = new Competence();
        $c26->setDescriptif("Estimer la charge d'un projet");
        $c26->setCode("C4-2");
        $c27 = new Competence();
        $c27->setDescriptif("Planifier Gérer le capital temps/ressources");
        $c27->setCode("C4-3");
        $c28 = new Competence();
        $c28->setDescriptif("Organiser le travail en équipe Piloter le projet");
        $c28->setCode("C4-4");
        $c29 = new Competence();
        $c29->setDescriptif("Mettre en œuvre un plan qualité");
        $c29->setCode("C4-5");
        $c30 = new Competence();
        $c30->setDescriptif("Estimer le coût d’un projet");
        $c30->setCode("C4-6");
        $a[] = $c25;
        $a[] = $c26;
        $a[] = $c27;
        $a[] = $c28;
        $a[] = $c29;
        $a[] = $c30;
        $a4->setCompetences($a);

        $a5 = new Activite();
        $a5->setTitre("Activite 5 : Réaliser");
        $a5->setDescriptif(array(
            "Décliner le cahier des charges fonctionnel en méthodes de développement (algo, MCD)",
            "Rédiger un cahier des charges réalisationnel",
            "Développer des applications dans un environnement matériel et logiciel répandu dans le milieu professionnel",
            "Mettre en oeuvre des normes",
            "Elaborer les cahier des tests"
        ));
        $a = array();
        $c31 = new Competence();
        $c31->setDescriptif("Assurer le suivi  de développement logiciel et/ou réseau");
        $c31->setCode("C5-1");
        $c32 = new Competence();
        $c32->setDescriptif("Développer en utilisant un langage procédural, événementiel ou objet");
        $c32->setCode("C5-2");
        $c33 = new Competence();
        $c33->setDescriptif("Développer une application autour d'une base de données relationnelle et/ou objet");
        $c33->setCode("C5-3");
        $c34 = new Competence();
        $c34->setDescriptif("Développer des solutions en utilisant les technologies de l'internet : portail d'entreprise, intranet, extranet");
        $c34->setCode("C5-4");
        $c35 = new Competence();
        $c35->setDescriptif("Développer une application autour d'un réseau et/ou d’un système");
        $c35->setCode("C5-5");
        $c36 = new Competence();
        $c36->setDescriptif("Mettre au point et maintenir une application à ses différentes étapes de  réalisation");
        $c36->setCode("C5-6");
        $c37 = new Competence();
        $c37->setDescriptif("Concevoir des tests");
        $c37->setCode("C5-7");
        $c38 = new Competence();
        $c38->setDescriptif("Valider un système");
        $c38->setCode("C5-8");
        $a[] = $c31;
        $a[] = $c32;
        $a[] = $c33;
        $a[] = $c34;
        $a[] = $c35;
        $a[] = $c36;
        $a[] = $c37;
        $a[] = $c38;
        $a5->setCompetences($a);

        $a6 = new Activite();
        $a6->setTitre("Activite 6 : Contrôler la mise en oeuvre");
        $a6->setDescriptif(array(
            "Administrer le système",
            "Effectuer la réception",
            "Valider la recette",
            "Participer à la prise en main du SI",
            "Déployer la solution",
            "Elaborer les cahiers de tests"
        ));
        $a = array();
        $c39 = new Competence();
        $c39->setDescriptif("Assurer l'assistance de premier niveau");
        $c39->setCode("C6-1");
        $c40 = new Competence();
        $c40->setDescriptif("Mettre un logiciel à la disposition des utilisateurs");
        $c40->setCode("C6-2");
        $c41 = new Competence();
        $c41->setDescriptif("Créer une documentation technique en français ou en anglais");
        $c41->setCode("C6-3");
        $c42 = new Competence();
        $c42->setDescriptif("Former les utilisateurs");
        $c42->setCode("C6-4");
        $c43 = new Competence();
        $c43->setDescriptif("Rédiger une notice d'utilisation ou un mode opératoire d'installation");
        $c43->setCode("C6-5");
        $a[] = $c39;
        $a[] = $c40;
        $a[] = $c41;
        $a[] = $c42;
        $a[] = $c43;
        $a6->setCompetences($a);

        $a7 = new Activite();
        $a7->setTitre("Activité 7 : Pérenniser le système d'information");
        $a7->setDescriptif(array(
            "Pérenniser",
            "Assurer la veille technologique",
            "Administrer le système",
            "Assurer la maintenance corrective et évolutive",
            "Effectuer le suivi des incidents",
            "Mettre en oeuvre des modifications sans interrompre le service",
            "Auditer la mise en oeuvre de procédures d'exploitations",
            "Effectuer la métrologie"
        ));
        $a = array();
        $c44 = new Competence();
        $c44->setDescriptif("Assurer la sécurité du SI");
        $c44->setCode("C7-1");
        $c45 = new Competence();
        $c45->setDescriptif("Surveiller et optimiser le trafic sur le SI");
        $c45->setCode("C7-2");
        $c46 = new Competence();
        $c46->setDescriptif("Gérer l'hétérogénéité des technologies mises en œuvre à travers le SI");
        $c46->setCode("C7-3");
        $c47 = new Competence();
        $c47->setDescriptif("Sélectionner des sources d'information adaptées et actualisées en français/anglais");
        $c47->setCode("C7-4");
        $c48 = new Competence();
        $c48->setDescriptif("Identifier les évolutions technologiques ayant des conséquences pour l'entreprise");
        $c48->setCode("C7-5");
        $c49 = new Competence();
        $c49->setDescriptif("Constituer et mettre à jour la documentation technique en français/anglais");
        $c49->setCode("C7-6");
        $c50 = new Competence();
        $c50->setDescriptif("Rédiger un compte rendu d’incidents, un rapport d’expertise");
        $c50->setCode("C7-7");
        $c51 = new Competence();
        $c51->setDescriptif("Recenser les impacts techniques et organisationnels consécutif à une évolution du SI");
        $c51->setCode("C7-8");
        $c52 = new Competence();
        $c52->setDescriptif("Développer des tableaux de bord de performances du réseau");
        $c52->setCode("C7-9");
        $a[] = $c44;
        $a[] = $c45;
        $a[] = $c46;
        $a[] = $c47;
        $a[] = $c48;
        $a[] = $c49;
        $a[] = $c50;
        $a[] = $c51;
        $a[] = $c52;
        $a7->setCompetences($a);

        $a8 = new Activite();
        $a8->setTitre("Activite 8 : Management 1");
        $a8->setDescriptif(array(
            "Rechercher des idées et des financements",
            "Communiquer et Ordonnancer",
            "Chiffrer et budgétiser",
            "Organiser et Finaliser",
            "Présenter le projet et recruter les ressources",
            "Présenter un dossier"
        ));
        $a = array();
        $c53 = new Competence();
        $c53->setDescriptif("Construire le plan de communication");
        $c53->setCode("C8-1");
        $c54 = new Competence();
        $c54->setDescriptif("Rechercher des financements Chiffrer les dépenses et les recettes");
        $c54->setCode("C8-2");
        $c55 = new Competence();
        $c55->setDescriptif("Construire un budget prévisionnel Déterminer le seuil de rentabilité");
        $c55->setCode("C8-3");
        $c56 = new Competence();
        $c56->setDescriptif("Evaluer la charge, construire un outil d’ordonnancement et de suivi");
        $c56->setCode("C8-4");
        $c57 = new Competence();
        $c57->setDescriptif("Vérifier la faisabilité du projet et le modifier éventuellement");
        $c57->setCode("C8-5");
        $c58 = new Competence();
        $c58->setDescriptif("Redéfinir les besoins, identifier de nouvelles contraintes");
        $c58->setCode("C8-6");
        $c59 = new Competence();
        $c59->setDescriptif("Rédiger un cahier des charges");
        $c59->setCode("C8-7");
        $a[] = $c53;
        $a[] = $c54;
        $a[] = $c55;
        $a[] = $c56;
        $a[] = $c57;
        $a[] = $c58;
        $a[] = $c59;
        $a8->setCompetences($a);

        $a9 = new Activite();
        $a9->setTitre("Activité 9 - Management 2");
        $a9->setDescriptif(array(
            "Par une méthode appropriée, trouver une idée de création d'entreprise",
            "Etudier la faisabilité commerciale",
            "Budgétiser et trouver des financements",
            "Choisir le statu juridique et assurer le suivi de l'entreprise",
            "Présenter le projet de création d'entreprise"
        ));
        $a = array();
        $c60 = new Competence();
        $c60->setDescriptif("Savoir utiliser différentes méthodes d’animation de réunion");
        $c60->setCode("C9-1");
        $c61 = new Competence();
        $c61->setDescriptif("Rechercher des financements pour la gestion future de l'entreprise");
        $c61->setCode("C9-2");
        $c62 = new Competence();
        $c62->setDescriptif("Construire un budget prévisionnel Déterminer le seuil de rentabilité");
        $c62->setCode("C9-3");
        $c63 = new Competence();
        $c63->setDescriptif("Evaluer la charge, construire un outil d’ordonnancement et de suivi");
        $c63->setCode("C9-4");
        $c64 = new Competence();
        $c64->setDescriptif("Vérifier la faisabilité du projet et le modifier éventuellement");
        $c64->setCode("C9-5");
        $a[] = $c60;
        $a[] = $c61;
        $a[] = $c62;
        $a[] = $c63;
        $a[] = $c64;
        $a9->setCompetences($a);

        $item13[] = $a1;
        $item13[] = $a2;
        $item13[] = $a3;
        $item13[] = $a4;
        $item13[] = $a5;
        $item13[] = $a6;
        $item13[] = $a7;
        $item13[] = $a8;
        $item13[] = $a9;

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
        $i38->setTypeVariable("tableau-double");
        $a = array(
            "1 - " => "",
            "2 - " => "",
            "3 - " => "",
            "4 - " => "",
            "5 - " => "",
            "6 - " => "",
            "7 - " => "",
            "8 - " => "",
            "9 - " => "",
            "10 - " => "",
        );
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
        $i40->setTypeVariable("fichier");
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
        $s11->setItemLivret($item11);
        $s12 = new Section();
        $s12->setNom("Formation interne");
        $s12->setItemLivret($item12);
        $s13 = new Section();
        $s13->setNom("Référentiel d'activité et de compétences professionnelles");
//        $s13->setItemLivret($item13);
        $section3[] = $s7;
        $section3[] = $s8;
        $section3[] = $s9;
        $section3[] = $s10;
        $section3[] = $s11;
        $section3[] = $s12;
        $section3[] = $s13;

        $section4 = array();
        $s16 = new Section();
        $s16->setNom("Cadre de la formation");
        $s16->setItemLivret($item16);
        $s18 = new Section();
        $s18->setNom("Règlement Intérieur");
        $s18->setItemLivret($item18);
        $s19 = new Section();
        $s19->setNom("Plan de formation");
        $s19->setItemLivret($item19);
        $section4[] = $s16;
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
        $this->setActivite($item13);
//        $this->setPeriodeFormation($periodes);
        $this->setCategorie($categories);
        $this->setApprenti($apprenti);

    }


    public function updateItem($data)
    {
        $livret = $data->data->livret;
        $categorie = $data->data->categorie;
        $section = $data->data->section;
        $item = $data->data->item;
        $key = $data->data->key;
        $value = $data->data->value;

        foreach ($this->getCategorie() as $c) {
            if ($c->getId() == new \MongoId($categorie)) {
                foreach ($c->getSections() as $s) {
                    if ($s->getId() == new \MongoId($section)) {
                        foreach ($s->getItemLivret() as $i) {
                            if ($i->getId() == new \MongoId($data->data->item)) {
                                // C'est bon on est dans le bon item
                                $a = $i->getValeurVariable();
                                $a[$key] = $value;
                                $i->setValeurVariable($a);

                                $s->replaceItemLivret($i);
                                $c->replaceSection($s);
                                $this->replaceCategorie($c);
                            }
                        }
                    }
                }
            }
        }
    }

    public function removeItemCours($idItem)
    {
        foreach ($this->getPeriodeFormation() as $p) {

            foreach ($p->getItemCours() as $i) {
                if ($i->getId() == $idItem) {
                    $p->removeItemCour($i);
                }

            }
        }
    }

    public function addItemCours($idPeriode, $itemCours)
    {
        foreach ($this->getPeriodeFormation() as $p) {
            if ($p->getId() == $idPeriode) {
                $p->addItemCour($itemCours);
            }
        }
    }

    public function removeItemEntreprise($idItem)
    {
        foreach ($this->getPeriodeFormation() as $p) {
            foreach ($p->getItemEntreprise() as $i) {
                if ($i->getId() == $idItem) {
                    $p->removeItemEntreprise($i);
                }

            }
        }
    }

    public function addItemEntreprise($idPeriode, $itemEntreprise)
    {
        foreach ($this->getPeriodeFormation() as $p) {
            if ($p->getId() == $idPeriode) {
                $p->addItemEntreprise($itemEntreprise);
            }
        }
    }

    public function noterCompetence($ids, $degreMaitrise)
    {
        foreach ($this->getPeriodeFormation() as $p) {
            if ($p->getId() == $ids["periode"]) {
                foreach ($p->getItemEntreprise() as $i) {
                    if ($i->getId() == $ids["itemEntreprise"]) {
                        foreach ($i->getCompetencesUtil() as $c) {
                            if ($c->getId() == $ids["competenceUtil"]) {
                                $c->setDegreMaitrise($degreMaitrise);
                            }
                        }
                    }
                }
            }
        }
    }

    public function addDescriptionCompetence($idPeriode, $idComp, $idItem, $desc)
    {
        foreach ($this->getPeriodeFormation() as $p) {
            if ($p->getId() == $idPeriode) {
                foreach ($p->getItemEntreprise() as $i) {
                    if ($i->getId() == $idItem) {
                        foreach ($i->getCompetencesUtil() as $c) {
                            if ($c->getId() == $idComp) {
                                $c->setDescription($desc);
                            }
                        }
                    }
                }
            }
        }
    }

    public
    function redigerConclusion($idPeriode, $conclusion)
    {
        foreach ($this->getPeriodeFormation() as $p) {
            if ($p->getId() == $idPeriode) {
                $p->setConclusion($conclusion);
            }
        }
    }


    public function getCompetenceValidee()
    {
        $arr = array();
        if (!empty($this->getPeriodeFormation())) {
            foreach ($this->getPeriodeFormation() as $p) {
                foreach ($p->getItemEntreprise() as $ie) {
                    foreach ($ie->getCompetencesUtil() as $cu) {
                        $arr[] = $cu->getCompetence()[0];
                    }
                }
            }
        }
        return $arr;
    }

    /**
     * @return collection
     */
    public
    function getActivite()
    {
        return $this->activite;
    }

    /**
     * @param collection $activite
     * @return self
     */
    public
    function setActivite($activite)
    {
        $this->activite = $activite;
        return $this;
    }


    /**
     * Get id
     *
     * @return id $id
     */
    public
    function getId()
    {
        return $this->id;
    }

    /**
     * Set apprenti
     *
     * @param object_id $apprenti
     * @return self
     */
    public
    function setApprenti($apprenti)
    {
        $this->apprenti = $apprenti;
        return $this;
    }

    /**
     * Get apprenti
     *
     * @return object_id $apprenti
     */
    public
    function getApprenti()
    {
        return $this->apprenti;
    }

    /**
     * Set tuteur
     *
     * @param object_id $tuteur
     * @return self
     */
    public
    function setTuteur($tuteur)
    {
        $this->tuteur = $tuteur;
        return $this;
    }

    /**
     * Get tuteur
     *
     * @return object_id $tuteur
     */
    public
    function getTuteur()
    {
        return $this->tuteur;
    }

    /**
     * Set categorie
     *
     * @param collection $categorie
     * @return self
     */
    public
    function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * Get categorie
     *
     * @return collection $categorie
     */
    public
    function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set periodeFormation
     *
     * @param collection $periodeFormation
     * @return self
     */
    public
    function setPeriodeFormation($periodeFormation)
    {
        $this->periodeFormation = $periodeFormation;
        return $this;
    }

    /**
     * Get periodeFormation
     *
     * @return collection $periodeFormation
     */
    public
    function getPeriodeFormation()
    {
        return $this->periodeFormation;
    }


    /**
     * Add categorie
     *
     * @param JavaLeEET\LivretBundle\Document\Categorie $categorie
     */
    public
    function addCategorie(\JavaLeEET\LivretBundle\Document\Categorie $categorie)
    {
        $this->categorie[] = $categorie;
    }

    public
    function replaceCategorie($categorie)
    {
        for ($i = 0; $i < count($this->categorie); $i++) {
            if ($this->categorie[$i]->getId() == $categorie->getId()) {
                $this->categorie[$i] = $categorie;
            }
        }
    }

    /**
     * Remove categorie
     *
     * @param JavaLeEET\LivretBundle\Document\Categorie $categorie
     */
    public
    function removeCategorie(\JavaLeEET\LivretBundle\Document\Categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Add periodeFormation
     *
     * $periodeFormation
     */
    public
    function addPeriodeFormation($periodeFormation)
    {
        $this->periodeFormation[] = $periodeFormation;
    }

    /**
     * Remove periodeFormation
     *
     * @param JavaLeEET\LivretBundle\Document\PeriodeFormation $periodeFormation
     */
    public
    function removePeriodeFormation(\JavaLeEET\LivretBundle\Document\PeriodeFormation $periodeFormation)
    {
        $this->periodeFormation->removeElement($periodeFormation);
    }

    /**
     * Add activite
     *
     * @param JavaLeEET\LivretBundle\Document\Activite $activite
     */
    public
    function addActivite(\JavaLeEET\LivretBundle\Document\Activite $activite)
    {
        $this->activites[] = $activite;
    }

    /**
     * Remove activite
     *
     * @param JavaLeEET\LivretBundle\Document\Activite $activite
     */
    public
    function removeActivite(\JavaLeEET\LivretBundle\Document\Activite $activite)
    {
        $this->activites->removeElement($activite);
    }


    /***
     * Correction bug periode formation
     *
     */

    public
    function cleanPeriode()
    {

    }

}
