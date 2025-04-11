## The Bid Calculation

This project is a Rest API to calculate the total price of a vehicle, it contains two routes to get the price and vehicle type, designed with an architecture with layers such as clean architecture and onion architecture, following the SOLID and clean code principles.

It contains two routes:.\
`` api/v1/vehicle/type ``.\
Get the vehicle types to be shown on the select

``/api/v1/price?price=&type=``.\
Get a summary of the values to determine the total price

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

Now, it could be testing via postman, using the next url and the endpoins mentioned in the description
[HTTP://localhost](HTTP://localhost)

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
