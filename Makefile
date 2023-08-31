copy-env-file:
	cp .env.example .env

create-env:
	python3 -m venv venv
	if [ ! -f ".env" ]; then \
		make copy-env-file; \
	fi

install:
	if [ ! -d "venv" ]; then \
		make create-env; \
	fi
	venv/bin/pip install -r requirements.txt

start:
	venv/bin/python3 main.py

lint:
	venv/bin/pylint --rcfile=.pylintrc main.py src

clean:
	rm -rf venv
