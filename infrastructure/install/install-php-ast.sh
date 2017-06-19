#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

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
