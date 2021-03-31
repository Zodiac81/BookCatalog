up:
	docker-compose up -d
build:
	docker-compose up --build -d
down:
	docker-compose down
postgres:
	docker exec -it pg_book_catalog psql -U root book_catalog
