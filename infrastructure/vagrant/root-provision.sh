#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

apt-get install -y ruby rubygems

../install/install-php-ast.sh

gem install bundler
