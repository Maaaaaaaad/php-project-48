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
