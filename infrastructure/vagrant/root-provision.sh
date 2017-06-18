#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

apt-get install -y ruby rubygems

git clone https://github.com/nikic/php-ast.git
cd php-ast
phpize
./configure
make install

gem install bundler
