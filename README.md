# Vermonster (PHP)

Vermonster is a way to consume the [Cheddar API](https://cheddarapp.com/developer).

**Want Ruby instead? Check out [vermonster](https://github.com/eturk/vermonster).**

**Want Python instead? Check out [vermonster-py](https://github.com/jpennell/vermonster-py).**

## Objective

*Obviously this isn't all implemented yet. But eventually...*

```ruby
Vermonster::setApiKeys(array("id" => "oauth-id", "secret" => "oauth-secret"));
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
$lists = Vermonster_Lists::all();

# Get a list called "Foobar" with an ID of 42.
$foobar = Vermonster_Lists::find(42);

# Get the tasks in that list.
$tasks = $foobar::tasks();
$tasks = Vermonster_Lists::find(42)::tasks();

# Update that list.
$foobar::update(array("title" => "Barfoo"));

# Make a new list called "Barfoo".
$barfoo = Vermonster_Lists::create(array("title" => "Barfoo"));

# Reorder your lists.
Vermonster_Lists::reorder(array(42, 12, 23));
```


### Tasks

```ruby
# Get one task.
$task = Vermonster_Tasks::find(42);

# Get tasks in a list
$tasks = Vermonster_Tasks::from_list(42);

# Update that task.
$task::update(array("text" => "Boom!"));

# Create a task in a list.
$foobar::tasks()::create(array("text" => "Be awesome!"));

# Reorder...
$foobar::tasks()::reorder(array(42, 12));

# Archive completed items
$foobar::tasks()::archive();
$foobar::tasks()::archive_completed();

# Archive all items!
$foobar::tasks()::archive_all();
```


### User

```ruby
# Get info about yourself.
$moi = Vermonster_User::info();
```

## Contributing

Vermonster (PHP) is under active development, and we would really appreciate you helping us out! Here's how.

1. Fork this repository.
2. Take a look [at the issues](https://github.com/johnathancroom/vermonster-php/issues). What needs to be done?
3. Make a topic branch for what you want to do. Bonus points for referencing an issue (like `2-authentication`).
4. Make your changes.
5. Create a Pull Request.
6. Celebrate!