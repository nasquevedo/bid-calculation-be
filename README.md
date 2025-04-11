## The Bid Calculation

### requirements
- php8.3
- mysql8
- Composer2.8

### Setting up:

First, clone the repository

```sh
git clone https://github.com/nasquevedo/bid-calculation-be.git
```

Once the repository was cloned, run docker compose to create the image and container

```sh
docker-compose up -d --build
```

Then, create the database

```sh
docker exec symfony php bin/console doctrine:database:create
```

Finally, run the migrations

```sh
docker exec symfony php bin/console doctrine:migrations:migrate
```


### PHP commands
generate a new migration

```sh
docker exec symfony php bin/console doctrine:migrations:generate
```

generate a new entity
```sh
docker exec <container> php bin/console make:entity
```

generate a new controller
```sh
docker exec <container> php bin/console make:controller NameController
```

## Testing
