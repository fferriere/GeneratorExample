# GeneratorExample

This project is an example for my blog post on [generator presentation](http://blog.fferriere.fr/2016/01/21/presentation-des-generateurs/).

## Installation

Run composer :
```
$ composer install
```

## Use

You can run program with this command :
```
$ php command.php
Number of persons : 90 112
Memory peak after data loading : 13 850 736 B
Memory peak after export : 18 512 808 B
Memory used by export : 4 662 072 B
Time : 0.57722878456116 ms
```

This run use generator.

You can also run the program but with array :
```
$ php command.php array
Number of persons : 90 112
Memory peak after data loading : 13 851 152 B
Memory peak after export : 83 591 608 B
Memory used by export : 69 740 456 B
Time : 0.61213397979736 ms
```

Now you can compare both usage.

It's possible to run `chained_generators.php` to test usage of generator on chain.
