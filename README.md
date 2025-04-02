# MVC Simple en PHP - Gestion de tâches

## Architecture du projet

Création des dossiers et fichiers de base

```
/mvc-tasks
|- /controllers
   |- TaskController.php 
|- /lib
   |- database.php
|- /models
   |- /repositories
      |- TaskRepository.php
   |- Task.php
|- /views
   |- /templates
      |- footer.php
      |- header.php
   |- home.php
   |- view-tasks.php
|- index.php
|- README.md
```

## Création du modèle Task

- un modèle qui représente un enregistrement de la table `task`
- un repository qui permet d'accéder aux fonctions du CRUD
    - getTasks : la liste de toutes les tâches
    - getTask(id) : récupère une seule tâche
    - create
    - update
    - delete


Explication du bindParam
```php
/**
* 
* $task = {
*    id: 1
*    title: 'Suivre le cours'
*    description: 'Cours php mvc et dao'
*    status: 'Terminé'
* }
* $task->title ===>>>> 'Suivre le cours'
* 
* UPDATE 
*  tasks 
* SET 
*  title = :title, 
*  description = :description, 
*  status = :status 
* WHERE 
*  id = :id
* 
* bindParam(':title', $task->title);
* bindParam(':description', $task->description);
* 
* UPDATE 
*  tasks 
* SET 
*  title = 'Suivre le cours', 
*  description = 'Cours php mvc et dao', 
*  status = Terminé
* WHERE 
*  id = 1
* 
*/
```

- Ecrire les getters et les setters de la classe `Task`
   - passer les attributs de la classe en privé
   - créer les getters et setters de chaque attribut de la classe `Task`
   - dans le `TaskRepository`, modifier l'appel attributs pour passer aux getters et setters
   - dans les setters de `title`, `description` et `status`, mettre les `htmlspecialchars` pour sécuriser les données en paramètre
- Déplacer la classe `TaskRepository` dans son propre dossier (`models/repositories`)
   - nouveau fichier `models/repositories/TaskRepository.php`
- Créer la vue qui affiche toutes les tâches sur la page index.php.
   - nouveau fichier `views/home.php` qui boucle sur les `$tasks` de l'`index.php`
- Créer le `routeur` qui va permettre de se déplacer de page en page. 
   - Défini un paramètre d'URL ($_GET) `action` et qui a comme valeur `view` et paramètre `id`
- Créer la vue qui affiche une seule tâche
   - nouveau fichier `views/view-task.php` qui affiche le détail d'une tâche
- Ajouter un système de templates avec `header.php` et `footer.php`
- Ajouter la classe `TaskController` dans le dossier `controllers`
- Modifier le routeur pour le rendre disponible aux `action`
   - `view` affiche une tâche
   - `create` affiche le formulaire de création
   - `index` affiche la liste des tâches
   - `store` enregistre la tâche dans la base de données 