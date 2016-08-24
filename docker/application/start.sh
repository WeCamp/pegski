#!/bin/bash

setfacl -R -m u:"www-data":rwX -m u:`whoami`:rwX /var/www/var/
setfacl -dR -m u:"www-data":rwX -m u:`whoami`:rwX /var/www/var/

exec "$@"
