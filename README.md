# ProjetGSB_Greta92_PHP

Projet de fin d'année 2018 - 2019

Présentation du projet

GSB est issue de la fusion entre le géant américain Galaxy et le conglomérat européen Swiss Bourdin,
lui-même déjà union de trois petits laboratoires. Ils fournissent des produits et accessoires
indispensables aux pharmaciens et à leur métier de professionnel de santé.

Le suivi des frais des prestataires, appelé visiteurs médicaux est actuellement géré de plusieurs façons
selon le laboratoire d'origine des visiteurs. On souhaite uniformiser cette gestion à l’aide d’une
application web qui permettra, d’une part, aux visiteurs de communiquer leur fiche de frais comme les
frais de déplacement, de restauration et d’hébergement d’autre part l’application permettra aux
comptables de l’entreprise de vérifier, gérer et valider les fiches de frais entrées en base de données.

Technologies utilisées

Front End :

- HTML 
- CSS
- BOOTSTRAP
- JAVASCRIPT

Back End :

- MySql
- PHP

Methodologie de développement

- Création de la base donnée
- Création d’une interface statique et responsive
- Création du modèle MVC
- Test unitaire des classes et des fonctions
- Programmation en mode défensif

Éléments de sécurité

- Les requêtes préparées : Ce sont des requêtes dans lesquels les paramètres sont
interprétés indépendamment de la requête elle-même.De cette manière, il est impossible
d'effectuer des injections.
- htmlspecialchars va transformer les chevrons des balises HTML<>en&lt;et&gt. Cela
évite les injections de code HTML contenant du JavaScript dans vos pages pour le faire
exécuter à vos visiteurs.
- Le SHA - secure hash algorithm - est un algorithme de hachage utilisé par les autorités
de certification pour signer certificats et CRL (certificate revocation list). Introduit en
1993 par la NSA avec le SHA0, il est utilisé pour générer des condensats uniques (donc
pour "hacher") de fichiers.
- Les transactions : empêche l’insertion de donnée dans la base de donnée si toutes les
requêtes d’une methodes ne sont pas validées.
- Token
- Index dans chaques dossiers empêche la visualisation des dossiers en passant par url.
