NAME = tebe/worker
VERSION = 0.9.22

default: run

run: build
	docker run --rm --name tebe-worker $(NAME)

build: Dockerfile
	docker build -t $(NAME) --rm .

