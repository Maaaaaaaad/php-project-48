install:
	composer install
validate:
	composer validate
dump:
	composer dump-autoloadmake
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
gendif:
	./bin/gendiff
