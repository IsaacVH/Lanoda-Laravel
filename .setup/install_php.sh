brew tap homebrew/dupes
brew tap homebrew/versions
brew tap homebrew/homebrew-php
brew install php56

# Fix PEAR permissions
chmod -R ug+w `brew --prefix php56`/lib/php
pear config-set php_ini /usr/local/etc/php/5.6/php.ini

# Fix PEAR config and upgrade
pear config-set auto_discover 1
pear update-channels
pear upgrade

# Install PHP extensions
# You might want some more. Use `brew search php56` to see what's available.
brew install php56-mongo php56-memcache

# You'll want Composer
brew install composer

# Install some important Composer packages globally
composer global require phpunit/phpunit:~4.2
composer global require squizlabs/php_codesniffer:~1.5
composer global require fabpot/php-cs-fixer:~0.5
composer global require psy/psysh:~0.1

# Make sure to add Composer's `bin` directory to your $PATH
# … or none of these will work.

# Set "PSR-2" as your default coding standard
phpcs --config-set default_standard PSR2