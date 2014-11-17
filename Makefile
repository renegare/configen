clean:
	rm -rf vendor/

test: clean
	composer install --dev --prefer-dist
	vendor/bin/phpunit

test-dev:
	vendor/bin/phpunit

docker-test:
	fig build
	docker run --rm=true -v $(PWD):/app -t configgen_app make -C /app test

docker-run:
	fig build
	fig up -d

docker-stop:
	fig stop
	fig rm --force

docker-test-dev:
	docker run --rm=true -v $(PWD):/app -t configgen_app make -C /app test-dev
