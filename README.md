# DB writer adapter

This library contains a common interface for connecting to database and writing data to, various sources:
- It is intended for use with [db-writer-common](https://github.com/keboola/db-writer-common).
- It supports **PDO** and **ODBC** connections for now.
- The interfaces defined in this library can be easily used to support other methods, e.g. cli BCP tool.

## Main Classes

- **Interface [`Connection`](https://github.com/keboola/db-writer-adapter/blob/main/src/Connection/BaseConnection.php)** is an abstraction that represents a connection to the database.
    - Abstract class [`BaseConnection`](https://github.com/keboola/db-writer-adapter/blob/main/src/Connection/BaseDbConnection.php) contains common code and retry mechanisms.
    - Class [`PdoConnection`](https://github.com/keboola/db-writer-adapter/blob/main/src/PDO/PdoConnection.php) implements connection using PDO extension.
    - Class [`OdbcConnection`](https://github.com/keboola/db-writer-adapter/blob/main/src/ODBC/OdbcConnection.php) implements connection using ODBC extension.
- **Interface [`WriteAdapter`](https://github.com/keboola/db-writer-adapter/blob/main/src/WriteAdapter.php)**  is an abstraction which defines how the data is written.
    - Abstract class [`BaseWriteAdapter`](https://github.com/keboola/db-writer-adapter/blob/main/src/BaseWriteAdapter.php) contains common code.
    - Class [`PdoWriteAdapter`](https://github.com/keboola/db-writer-adapter/blob/main/src/PDO/PdoWriteAdapter.php) implements write for PDO connection.
    - Class [`OdbcWriteAdapter`](https://github.com/keboola/db-writer-adapter/blob/main/src/ODBC/OdbcWriteAdapter.php) implements write for ODBC connection.
- **Interface [`QueryBuilder`](https://github.com/keboola/db-writer-adapter/blob/main/src/Query/QueryBuilder.php)** used to generate SQL query for adapter.
    - Class [`DefaultQueryFactory`](https://github.com/keboola/db-writer-adapter/blob/main/src/Query/DefaultQueryFactory.php) is base implementation for MySQL/MariaDb compatible SQL dialects.

## Development

Clone this repository and init the workspace with following command:

```
git clone https://github.com/keboola/db-writer-adapter
cd db-writer-adapter
docker-compose build
docker-compose run --rm dev composer install --no-scripts
```

Run the test suite using this command:

```
docker-compose run --rm dev composer tests
```

## License

MIT licensed, see [LICENSE](./LICENSE) file.