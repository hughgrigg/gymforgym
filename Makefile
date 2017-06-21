.PHONY: test
target test: install
	./vendor/squizlabs/php_codesniffer/scripts/phpcs -v --standard=./tests/analysis/phpcs.xml app
	./vendor/phpmd/phpmd/src/bin/phpmd --strict app text ./tests/analysis/phpmd.xml
	./vendor/bin/phan
	gulp scss-lint
	php artisan route:cache
	php artisan config:clear
	gulp test-database
	./vendor/phpunit/phpunit/phpunit --coverage-html build --coverage-clover build/clover.xml

.PHONY: install
target install: vendor node_modules
	bundler install

target vendor: composer.json composer.lock
	composer install

target node_modules: package.json yarn.lock
	npm install --no-progress
	npm install --no-progress -g gulp
	npm rebuild node-sass

SCSS = $(shell find resources/assets/sass -type f -name '*.scss')
target public/css/g4g.css: $(SCSS)
	gulp
.PHONY: style
target style: public/css/g4g.css
