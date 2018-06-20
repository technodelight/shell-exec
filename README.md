# shell-exec
Assemble commands and execute in shell with PHP easier

# Install

Via composer.
```
composer require technodelight/shell-exec
```

# Usage

```php
<?php

use Technodelight\ShellExec\Command;
use Technodelight\ShellExec\Exec;

$shell = new Exec('which');
$output = $shell->exec(
    Command::create()
        ->withArgument('php')
        ->withStdErrToStdOut()
        ->withStdOutTo('/dev/null') // command will be assembled as 'which php 2>'
);

var_dump($output); // will be ["/usr/bin/php"]
```
When an exception happens, an instance of `ShellCommandException` would be thrown.
`ShellCommandException` will still have the command result:
```php
<?php

use Technodelight\ShellExec\Command;
use Technodelight\ShellExec\Exec;
use Technodelight\ShellExec\ShellCommandException;

try {
    $shell = new Exec;
    $shell->exec(
        Command::create('which')
            ->withArgument('nope') // command will be assembled as 'which nope'
    );
} catch(ShellCommandException $e) {
    // $e->getCode() will be the shell return code for the executed command.
    var_dump($e->getResult());
}
```
There are multiple drivers available

- `Exec`
- `Passthru`

And a special one:

- `TestShell`, which can be used for behavioural testing. For behat please refer to `ShellExec\FixtureContext`.

# License
The MIT License (MIT)

Copyright (c) 2015-2018 Zsolt Gál

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.⏎