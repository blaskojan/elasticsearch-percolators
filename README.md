# elasticsearch-percolators
Elasticsearch percolators helpers for ROCdevs #2 event.

You can use Elasticsearch, Kibana for experimenting purposes. You can create index with dummy products and users.

Inspiration from https://github.com/yannart/docker-cerebro

# Prerequsities
[Docker](https://docs.docker.com/engine/installation/#platform-support-matrix)

[Docker Compose](https://docs.docker.com/compose/install/)

# Usage
Run command `docker-compose up --build` and you have environment Elasticsearch, Kibana and Cerebro.

Elasticsearch http://localhost:9200

Kibana http://localhost:5602

Cerebro http://localhost:9001 - host http://elasticsearch:9200 with default username and password (elastic and changeme)

# Data sets
`products.json` - dummy products for Bulk API

`users_data_set.json` - dummy users

# Generate structure from JSONs into Bulk API format
`php generate_bulk_data.php` with one param that is filename contains JSONs.

`php generate_bulk_data.php products.json` - generates file output_es_bulk.json with Bulk API format

# Filling data to Elasticsearch
`curl -H "Content-Type: application/json" -XPOST 'elastic:changeme@localhost:9200/eshop/users/_bulk?pretty&refresh' --data-binary "@users_dataset.json"`

`curl -H "Content-Type: application/json" -XPOST 'elastic:changeme@localhost:9200/eshop/products/_bulk?pretty&refresh' --data-binary "@output_es_bulk.json"`
