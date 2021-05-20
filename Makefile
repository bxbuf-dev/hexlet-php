install:
	composer install
validate:
	composer validate
autoload:
	composer dump-autoload
lint:
	composer run-script phpcs -- --standard=PSR12 src bin
fu-test:
	php bin/fu-test
su-test:
	php bin/su-test