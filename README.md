# Vermonster (PHP)

Vermonster is a way to consume the [Cheddar API](https://cheddarapp.com/developer).

**Want Ruby instead? Check out [vermonster](https://github.com/eturk/vermonster).**

**Want Python instead? Check out [vermonster-py](https://github.com/jpennell/vermonster-py).**

## Objective

*Obviously this isn't all implemented yet. But eventually...*

```ruby
require_once("path/to/lib/vermonster.php");

Vermonster::setApiKeys(array("id" => "oauth-id", "secret" => "oauth-secret"));

$cheddar = new Vermonster;
```


### Authentication

```ruby
# Get the URL for the user to authorize the application.
$url = Vermonster_Authentication::url();

# Do whatever to send the user to that URL...
# It redirects back to whatever you sent as callback URL.

# In your controller (or wherever the callback URL is)...
Vermonster_Authentication::token("code"); # Returns true on success, false on failure

# You are now authorized!
Vermonster_Authentication::is_authorized(); # Returns true/false
```


### Lists

```ruby
# Get all of your lists.
$lists = $cheddar->lists->all();

# Get a list called "Foobar" with an ID of 42.
$foobar = $cheddar->lists->find(42);

# Get the tasks in that list.
$tasks = $foobar->tasks;
$tasks = $cheddar->lists->find(42)->tasks();

# Update that list.
$foobar->update(array("title" => "Barfoo"));

# Make a new list called "Barfoo".
$barfoo = $cheddar->lists->create(array("title" => "Barfoo"));

# Reorder your lists.
$cheddar->lists->reorder(array(42, 12, 23));
```


### Tasks

```ruby
# Get one task.
$task = $cheddar->tasks->find(42);

# Get tasks in a list
$tasks = $cheddar->tasks->from_list(42);

# Update that task.
$task->update(array("text" => "Boom!"));

# Create a task in a list.
$foobar->tasks->create(array("text" => "Be awesome!"));

# Reorder...
$foobar->tasks->reorder(array(42, 12));

# Archive completed items
$foobar->tasks->archive_completed();

# Archive all items!
$foobar->tasks->archive_all();
```


### User

```ruby
# Get info about yourself.
$moi = $cheddar->me;
```

## Contributing

Vermonster (PHP) is under active development, and we would really appreciate you helping us out! Here's how.

1. Fork this repository.
2. Take a look [at the issues](https://github.com/johnathancroom/vermonster-php/issues). What needs to be done?
3. Make a topic branch for what you want to do. Bonus points for referencing an issue (like `2-authentication`).
4. Make your changes.
5. Create a Pull Request.
6. Celebrate!