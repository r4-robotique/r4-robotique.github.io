
all:
	rm -rf web
	mkdir -p web
	cp -R css img js favicon.ico bootstrap web/
	php generate.php