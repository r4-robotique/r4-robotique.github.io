
all:
	rm -rf web
	mkdir -p web
	cp -R css img js files favicon.ico bootstrap web/
	php generate.php