validate:
	composer validate
install:
	composer install
brain-games:
	./bin/brain-games
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:
	./bin/brain-even
autoload:
	composer dump-autoload
