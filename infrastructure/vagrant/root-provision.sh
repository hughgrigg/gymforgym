#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

apt-get install -y ruby rubygems

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

git clone https://github.com/nikic/php-ast.git
cd php-ast
phpize
./configure
make install

gem install bundler
