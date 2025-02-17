# Turkey Race Simulator

This project is a turkey racing simulator built with Laravel. Turkeys have different abilities and attributes that affect their performance in the race.

## Requirements

- PHP 8+
- Composer
- Laravel 10+

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/FBouzas93/turkey-app.git
   cd turkey-app
   ```

2. Install PHP dependencies:
   ```sh
   composer install
   ```

3. Copy and configure the environment file:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

4. Run migrations and seeders:
   ```sh
   php artisan migrate --seed
   ```

5. Start the development server:
   ```sh
   php artisan serve
   ```

## Usage

### Main page

To go the main page following route:
```
http://127.0.0.1:8000/race/start
```

### Race Logic

- Dead Turkeys: Dead turkeys cannot race :(
- Injured Turkeys: Injured turkeys race 10% slower
- Healthy Turkeys: Healthy turkeys race at normal speed
- Big Turkeys: Turkeys with more than 5kg starts to run slower at each kg
- Boost Speed: The turkey is 20% faster
- Mecha Accessories: The turkey is 30% faster but weighs 30% more
- Mutated Turkeys: Mutated turkeys race 50% faster, but they may go crazy and not race at all
- Zombie Turkeys: Zombie turkeys race at a random speed (50%-150% of normal speed)

## Testing

Run tests with:
```sh
php artisan test
```