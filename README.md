sfBlog
======

Symfony simple blog project
 
### Used technologies:

- PHP:
    - Symfony
        - Doctrine
        - Twig
        - FOSUserBundle
        - EasyAdmin Bundle
        - KnpPaginatorBundle
        - DoctrineFixturesBundle
        - Faker
- Bootstrap

### Possible Operation:  
- implemented entities and relation between them:
    - user
    - post
    - comment
- to add new post, user must to register
- logged in user can:
    - add new post, also edit and delete
    - edit profile and add new personal information
- add comments to the post
- admin can manage entities by admin panel

### Routing:
- /  - all user
- /admin - only user has ROLE_ADMIN
- /profile - only logged in users
- /offer/new - only logged in users
- /offer/{id} - all users
- /profile/offer/ - only logged in users
- /category/{id} - all users
- /category/new - only admin
### Author

* **Łukasz Materla** - [Profile](https://github.com/lukaszmaterla)