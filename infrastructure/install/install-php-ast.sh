#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

cd
if [ -d "php-ast" ]; then
    cd php-ast
    git pull
else
    git clone https://github.com/nikic/php-ast.git
    cd php-ast
fi
phpize
./configure
make install

if hash phpenv 2>/dev/null; then
    echo "php-ast installed, adding extension to php.ini"
    ls ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
    echo "extension=ast.so" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
fi
