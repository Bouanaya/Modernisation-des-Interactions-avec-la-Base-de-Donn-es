 
## Database Setup

1. Ensure you have MySQL installed and running.
2. Import the database schema from `db/base_donne.sql`:
    ```sh
    mysql -u root -p < db/base_donne.sql
    ```

## Usage

1. Ensure you have PHP installed and a web server like XAMPP or WAMP running.
2. Place the project files in the web server's root directory (e.g., `c:/xampp/htdocs/Modernisation-des-Interactions-avec-la-Base-de-Donn-es`).
3. Open a web browser and navigate to `http://localhost/Modernisation-des-Interactions-avec-la-Base-de-Donn-es/index.php`.

## Classes

### Players

The `Players` class in [classes/Player.php](classes/Player.php) handles the database operations.

- **Constructor**: Connects to the database.
- **insert**: Inserts a new record into the specified table.
- **select**: Selects records from the specified table.
- **update**: Updates records in the specified table.
- **delete**: Deletes records from the specified table.

## Example

Here is an example of how to use the `Players` class in [index.php](index.php):

```php
<?php
require_once 'classes/Player.php';
$db = new Players('localhost', 'players_db', 'root', '');

// Insert a player
$db->insert('players', [
    'name' => 'Lionel Messi',
    'age' => 34,
    'team' => 'team',
    'position' => 'RW',
    'club' => 'Inter Miami',
    'nationality' => 'Argentina'
]);

// Select players
$players = $db->select('players');
echo '<pre>';
print_r($players);
echo '</pre>';

// Update a player
$db->update('players', [
    'name' => 'Cristiano Ronaldo',
    'age' => 40,
    'team' => 'team',
    'position' => 'ST',
    'club' => 'Al Nassr',
    'nationality' => 'Portugal'
], "id=37");

// Delete a player
$db->delete('players', "id=35");
?>

```php
// Fetch a single player by ID
$player = $db->select('players', '*', "id=1");
echo '<pre>';
print_r($player);
echo '</pre>';
```
