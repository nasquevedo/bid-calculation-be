## The Bid Calculation

### requirements
- php8.3
- mysql8
- Composer2.8

### Setting up:

First, clone the repository:<br>
- <code>git clone https://github.com/nasquevedo/bid-calculation-be.git</code>

Once the repository was cloned, run docker compose to create the image and container:</br>
- <code>docker-compose up -d --build</code>

Then, create the database:<br>
- <code>docker exec symfony php bin/console doctrine:database:create</code>

Finally, run the migrations:<br>
- <code>docker exec symfony php bin/console doctrine:migrations:migrate</code>


### PHP commands
generate a new migration:<br>
- <code>docker exec symfony php bin/console doctrine:migrations:generate</code>

generate a new entity:<br>
- <code>docker exec <container> php bin/console make:entity</code>

generate a new controller:<br>
- <code>docker exec <container> php bin/console make:controller NameController</code>

## Testing
