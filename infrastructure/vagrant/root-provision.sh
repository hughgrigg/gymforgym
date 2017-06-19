#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

apt-get install -y ruby rubygems

gem install bundler
