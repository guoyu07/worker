NAME = tebe-worker
VERSION = 0.9.22

REGISTRY_VENDOR ?= vendor
REGISTRY_USER ?= myuser
REGISTRY_PASSWORD ?= mypassword

default: run

run: build
	docker run --rm --name $(NAME) $(NAME)

build: Dockerfile
	docker build -t $(NAME) --rm .

push: run
	docker login -u $(REGISTRY_USER) -p $(REGISTRY_PASSWORD)
	docker tag $(NAME) $(REGISTRY_VENDOR)/$(NAME)
	docker push $(REGISTRY_VENDOR)/$(NAME)
