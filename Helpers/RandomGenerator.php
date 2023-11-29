<?php
namespace Helpers;

use Faker\Factory;
use Models\User;
use Models\Employee;

class RandomGenerator {

    public static function user(): User {
        $faker = Factory::create();
        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    public static function employee(): Employee {
        $faker = Factory::create();
        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),
            $faker->randomElement(['manager', 'valet', 'cashier', 'chef']),
            $faker->numberBetween(1000, 5000),
            $faker->dateTimeThisCentury,
            $faker->randomElement(['employee of the month', 'best customer service']),
        );
    }

    public static function users(int $min, int $max): array {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);
        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }
        return $users;
    }

    public static function employees(int $min, int $max): array {
        $faker = Factory::create();
        $employees = [];
        $numOfUsers = $faker->numberBetween($min, $max);
        for ($i = 0; $i < $numOfUsers; $i++) {
            $employees[] = self::employee();
        }
        return $employees;
    }
}?>
