# Unofficial StockX API by Raqo

Welcome to the Unofficial StockX API, developed by Raqo! This API provides access to a wealth of data on shoes listed on StockX. With two endpoints available, you can easily retrieve the information you need.

## Endpoints

1. **api/shoe/generic-shoe/proxy-api-key**: This endpoint provides raw data
2. **api/shoeclean/generic-shoe/proxy-api-key**: We highly recommend using this endpoint as it returns well-formatted data.

## Getting Started

To set up and use this API, you'll need the following tools:

- PHP
- Composer
- Laravel
- Proxy API Key (Get it for free [here](https://fas.st/t/f8U46NrZ))

Follow these steps to get started:

1. Run the following command to install dependencies:
   ```
   composer install
   ```
2. Duplicate the .env.example file and rename it to .env
   ```
   cp .env.example .env
   ```

3. Launch the application using the following command:
   ```
   php artisan serve
   ```

You will receive information about the IP and port where the application is running. You can access a web-based UI to test the API and see the data it returns. The API endpoints mentioned above can be accessed to retrieve the data you need.

Feel free to explore, experiment, and integrate this API into your projects. If you have any questions or need assistance, please don't hesitate to contact Raqo.

Happy coding! 🚀



