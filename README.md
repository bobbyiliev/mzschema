# Materialize Schema Migration Tool

Laravel Zero app to help you manage your Materialize migrations.

### Prerequisites

As of the time being, this tool requires the following:

- PHP 8.0 or higher
- [Materialize installation](https://materialize.com/docs/install/)

### Installation

Download the latest release:

```
wget https://github.com/bobbyiliev/mzschema/raw/main/builds/mzschema
```

Make the file executable:

```
chmod +x mzschema
```

Run the installer:

```
./mzschema install
```

### Running the demo migration

First create a new migration directory:

```
mkdir migrations
```

And add the following code to the `migrations/2022_03_06_155051_demo.php` file:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection('materialize')->statement(
            "CREATE TABLE demo (id int, name text)"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection('materialize')->statement(
            "DROP TABLE IF EXISTS demo"
        );
    }
};
```

Finally, run the migration:

```
./mzschema migrate --path=./migrations/ --realpath
```

Output:

```
 Do you really wish to run this command? (yes/no) [no]:
 > yes

Migrating: 2022_03_06_155051_demo
Migrated:  2022_03_06_155051_demo (8.97ms)
```

### Environment Variables

If your Materialize installation is not running on `localhost`, you can set the following environment variables in a `.env` file in the same directory as `mzschema`:

```
DB_CONNECTION=materialize
MZ_HOST=127.0.0.1
MZ_PORT=6875
MZ_DATABASE=materialize
MZ_USERNAME=materialize
MZ_PASSWORD=materialize
```

Change the environment variables according to your Materialize instance.

### Demo

![Materialize Schema Migration](https://user-images.githubusercontent.com/21223421/157834798-94926576-dff5-41ed-87ad-73c8b78d4416.gif)