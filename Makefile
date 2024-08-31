install:
	composer install

valid:
	composer validate

dump:
	composer dump-autoload

lint:
	composer exec --verbose phpcs -- --standard=PSR12 --colors src bin

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 --colors src bin

analise:
	vendor/bin/phpstan

test:
	composer exec --verbose phpunit tests

test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover coverage/logs/clover.xml

test-coverage-text:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-text

test-coverage-html:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-html coverage/report/

diff-stylish:
	bin/gendiff --format stylish tests/fixtures/file1.json tests/fixtures/file2.json

diff-plain:
	bin/gendiff --format plain tests/fixtures/file1.json tests/fixtures/file2.json

diff-json:
	bin/gendiff --format json tests/fixtures/file1.json tests/fixtures/file2.json

