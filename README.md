# thor

Thor is a Laravel + Octane powered backend api application to manage assets and vulnerabilities.

It was developed so that the clients of `[redacted]` company could have more control over their assets. Having all the expected functionalities of an application like this, create, update, read and delete, as well as, third party integration with NVD api to enrich the database with vulnerability information for risk calculation of assets.

### running the application

Prior to running the application, an .env file should be created in the [root](./) of the repository. This is made easy with the following composer command:

```sh
composer setup
```

This will create an .env file, as well as set up the environment with some required groundwork to run the application. But cloning manually the [.env.example](./.env.example) file is also an option.

After the envfile is created, some information needs to be filled before kicking off the backend application but most of it is already filled for this test's example scenario.

> [!IMPORTANT]
> To take the application for a spin you can fill DB_PASSWORD=postgres and USER_PASSWORD=password

There are two ways of running the application, either locally by running the following command:

```sh
composer thor-api
```

> [!IMPORTANT]
> If running locally, the postgres environment variables should be updated accordingly.

Or you can run the application with docker by using the commands below:

```sh
docker network create asgard
docker compose up
```

> [!TIP]
> For more information about why the network is needed, see [the organization page](https://github.com/technical-test-energy-company).

### endpoints

The library [Scramble](https://scramble.dedoc.co/) gives the application access to a Swagger style endpoint documentation, which can be acesses via ${api_url}/docs/api.

The page contains information about the expected payloads, headers and responses for each public endpoint.

There is also the possibility of getting an OpenAPI JSON from the docs page, simply by accessing ${api_url}/docs/api.json.

### documentation

To see more information about the technical choices made in this project, as well as, what I would do if I had more, please read [this document](https://github.com/technical-test-energy-company/.github/blob/master/documents/technical-report.pdf).
