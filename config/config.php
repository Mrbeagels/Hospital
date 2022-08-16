<?php

define('REGEX_NO_NUMBER',"^[A-Za-zéèêëàâäôöûüç' \-]+$");
define('REGEX_ZIPCODE','^[0-9]{5}$');
define('REGEX_LINKEDIN','^(https:\/\/)?((www\.|fr\.)?([a-zA-Z0-9\.\/=\?\-]*))$');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_TEXTAREA','^[a-zA-Z0-9 ,.\'-]');
define('REGEX_PASSWORD', '^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}');
define('REGEX_AGE', '^[0-9]{1,3}');
define('REGEX_PHONE','^[0-9]{10}');


define('CIVILITY', ['HOMME', 'FEMME', 'AUTRE']);
define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);
define('ARRAY_COUNTRIES', ['France', 'Suisse', 'Allemagne', 'Italie']);