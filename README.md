# Description

---

This project takes currency data from different providers and saves it to the database and saves the last retrieved data to redis. On the homepage, it reads the last data from redis and prints the lowest one to the screen.

--- 

## Requirements

- A server with Docker installed

## Installation 

- Clone this project
- Open in the terminal 
- Run this command 'docker compose build'
- Run this command 'docker compose up -d'
- Connect to the container terminal named with web and app and run this command 'php artisan migrate'

## Usage

- Connect to the container terminal named with web and app and run this command 'php artisan app:fetch-currency-data'


