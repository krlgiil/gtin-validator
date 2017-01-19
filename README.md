# GTIN Validator

This PHP application allows you to test wether a GTIN code is valid or not. The algorithm automates the manual calculation method that you can find on gs1.org website.

Basically, the method applied here, is to extract the last number of a GTIN code as the check digit and then proceed some calculation on the other digits.
The code is valid when the result of the calculation and the check digit are equals.
more information on the website http://www.gs1.org/how-calculate-check-digit-manually

# Usage
```php
$gtin = new Gtin('4210201128885');
echo $gin->isValid() ? 'gtin is valid' : 'gtin is invalid';
```
Examples :
```sh
$ php examples/CheckGtin.php
```
will display :
```sh
4210201128885 is a valid GTIN.
5053460595406 is a valid GTIN.
012345678 is not a valid GTIN.
```
# Tests

```sh
$ phpunit tests/
```

