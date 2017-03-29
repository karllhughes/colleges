# US Colleges API

This is an open API for accessing the names and locations of accredited colleges and universities in the United States.

## Local Installation

### Prerequisites

- PHP 7.0+ 
- Composer 1.0+
- Docker and Docker Compose

### Setup

- Clone this repository
- Install the composer packages: `composer install`
- Copy and cusotmize your .env file.
- Bring up the containers: `vendor/bin/shiphp up`
- Run the migrations: `vendor/bin/shiphp migrate:run`
- Run the seeder: `vendor/bin/shiphp seed:run`

## Usage

### API Documentation

- Once your web application is running, visit `localhost:32000/` to view the documentation.
- Examples:

#### Get the first 100 colleges sorted by name and transformed:

``` 
http://localhost:8080/api/colleges?order=name&page=1,100&transform=1
```

#### Get the second page of records for colleges in Memphis, TN:

``` 
http://localhost:8080/api/colleges?order=id&page=2,20&filter=location,eq,Memphis, TN
```

#### Get a single college by uuid
```
http://localhost:8080/api/colleges/a3379d4e-bc71-4a7d-b7d9-c954c8b1d300
```

Currently only GET requests are supported. POST, PUT, DELETE and others will be available with API key authorization in a later release. 

## Server Deployment

Follow the local installation instructions, but instead of running `vendor/bin/shiphp up` you should run `docker-compose -f docker-compose.prod.yml up -d` to use the prod docker-compose file.

To update the code, you can run `deploy.sh` via `ssh`, eg: `ssh YOURUSER@YOURIP -t 'cd colleges && sh deploy.sh'`.

## Technical Details

- The list of colleges is retrieved from [ope.ed.gov](https://ope.ed.gov/accreditation/GetDownloadFile.aspx), and the last update was in March 2016.
- I standardized fields based on [Schema.org's CollegeOrUniversity object](https://schema.org/CollegeOrUniversity). Not all fields are currently supported and I had to add a couple special ones, so check the migrations files for a list of supported fields.

