
# Nova HasMany relationship bug

This repository display the laravel nova bug when there is two HasMany relationships to the same model.

## Setup

```sh
composer install

vendor/bin/sail up -d

vendor/bin/sail artisan migrate:fresh --seed
```

## Login

Login with email `login@nova.com` and password `password` 

## Bug explanation

If you ran the seeder it should already have all data you need.

This repository contains of a user that can belong to many teams. The TeamUser pivot/model has a role which is used to filter between admins and members.

The Team model has two HasMany relationships to TeamUser `admins()` and `members()`, the difference is the filteration on the role column.

Now navigate to the teams resource and go to the detail page of the team.

Click on `Create Team User` for admins. You can see that the `Team` relationship is automatically filled with the correct team.

Now go back.

Click on `Create Team User` for members. You can see that the `Team` relationship is empty for some reason.

Now go to the file `app/Nova/Team.php` move the `members` relationship above the admin relationship, and repeat the steps above.

Then you will see the same result but flipped, so it seems like the autofill only works for the first relationship.
