# ci-helper-calendar

## Description
Ce repository contient le helper pour générer un fichier .cal pour l'importation dans google calendar, ou outlook.


* `validationEngine` pour la gestion des erreurs
* `plupload` pour la gestion des uploads
* `twitter bootsrap` pour la gestion de la barre de progression
* Validation à l'aide de validationEngine
* Affichage des erreurs plupload dans les éléments de validation de validationEngine
* Instaciantion automatique ou non du template
* Multi instances
* Upload multiple
* Supression dans la queue d'upload
* Upload simple
* Uniformise les instantiations



## Installation

Pou l'installer il vous suffit de copier coller le helper dans le répertoire correspondant dans codeigniter `application/helpers/calendar_helper.php`.


Une fois fait vous devais le charger avant de l'utiliser à l'aide de

```php
    $this->load->helper('calendar_helper');
```

### Exemple de téléchargement du fichier .cal

```php
    $this->load->helper('calendar_helper');
    date_default_timezone_set('America/New_York');
    download_ics(date('Y:m:d H:i:s'), 'Titre', 'contenue', '13', '15');
```

### Exemple de génération du contenue du fichier

```php
    $this->load->helper('calendar_helper');
    date_default_timezone_set('America/New_York');
    echo generate_ics(date('Y:m:d H:i:s'), 'contenue', '13', '15');
```