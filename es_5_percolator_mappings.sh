curl -XPUT 'localhost:9200/my-index?pretty' -H 'Content-Type: application/json' -d'
{
    "mappings": {
        "doctype": {
            "properties": {
                "message": {
                    "type": "text"
                }
            }
        },
        "percolator": {
            "properties": {
                "query": {
                    "type": "percolator"
                }
            }
        }
    }
}
'

