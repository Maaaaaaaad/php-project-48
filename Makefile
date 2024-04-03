install:
	composer install
validate:
	composer validate
dump:
	composer dump-autoloadmake
lint:
	composer exec --verbose phpcs -- --standard=PSR2 src bin
gendiff:
	./bin/gendiff
test:
	composer exec --verbose phpunit tests
test-coverage:
    XDE1BUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover tests/clover.xml