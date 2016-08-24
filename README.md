# Team Attachable - Project "Peg"

Aka as the PEG Project, in which we will try to maximise the value of the PSA.

## Requirements

* Docker
* Docker Compose

## Install

1. Clone this repository on your machine
2. Build the docker containers and run the initial setup: `make setup`
3. Start the docker containers: `make run`
4. Add the `app.dev` hostname to your `/etc/hosts` file
5. Enjoy: http://app.dev:8080/app_dev.php
6. Stop the docker containers: `make stop`
7. Maybe clean everything up: `make clean`
