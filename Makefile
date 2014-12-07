clean:
	rm -rf vendor/ composer.lock

setup:
	composer install --dev --prefer-dist

test: clean setup
	vendor/bin/phpunit
