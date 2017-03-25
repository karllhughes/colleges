# US Colleges API

This is an open API for accessing the names and locations of accredited colleges and universities in the United States.

## Installation

### Prerequisites

- PHP 7.0+ 
- Composer 1.0+
- Docker and Docker Compose

### Setup

- Clone this repository
- Install the composer packages
- Bring up the containers: `vendor/bin/shiphp up`
- Run the migrations: `vendor/bin/shiphp migrate:run`
- Run the seeder: `vendor/bin/shiphp seed:run`

## Usage

### API Documentation

- Once your web application is running, visit `/api` to view the documentation.

### Technical Details

- The list of colleges is retrieved from [ope.ed.gov](https://ope.ed.gov/accreditation/GetDownloadFile.aspx), and the last update was in March 2016.
- I standardized fields based on [Schema.org's CollegeOrUniversity object](https://schema.org/CollegeOrUniversity). Not all fields are currently supported and I had to add a couple special ones, so check the migrations files for a list of supported fields.

