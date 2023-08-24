# SimplePHPConsole
Features : 
- Custom commands
- Handle parameters
- Custom help / welcome message

## How to use
Once cloned, you can test the console with the following command : 
```bash
php console example:hello
```
Should display : 
```bash
$ php console example:hello
  Welcome to the console !
  Hello World !
```
## Customization
You can customize the console by editing the following files :
- `console.php` : change the console the welcome message and the help message

## Create your own commands
To create a new command, you have to create a new class in the `Controllers` folder based on the `Example.php` file. That class will be the command group and the methods will be the commands.
Your new class must extends the `Controller` class.

Here is an example of a new class and a new command :
```php
<?php
namespace Controllers\Custom;

use Controllers\Controller;

class MyNewCommandGroup extends Controller
{
    protected static function myNewCommand(array $args) : void{
        if(isset($args['name'])){
            self::logMessage('Hi '.$args['name'].' !');
        }else{
            self::logMessage('Hi my friend!');
        }
        self::logMessage('This is a new command !');
    }
}
```

You can now use your new command with the following command : 
```bash
php console myNewCommandGroup:myNewCommand --name=John
```
Should display : 
```bash
$ php console myNewCommandGroup:myNewCommand --name=John
  Hi John !
  This is a new command !
```