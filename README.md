# StanleyStella-php-api
PHP class for accessing Stanley &amp; Stella's API


## Requirements

- PHP 5.3 or higher
- cURL
- Registered Stanley & Stella app

## Usage

### Initialize the class

```php
$stanleystella = new stst(array(
	'apiKey'      => 'pk_905198710a957531d2a3fd739226d447',
	'apiSecret'   => 'sk_151f5ad54a7b385cb3755b11470f176e'
));

```
## Available methods

### Get product by Size

```php
searchBySize($size);

```

- Sizes for adults : XS, S, M, L, XL, XXL, XXXL
- Sizes for kids : 3/4, 5/6, 7/8, 9/11, 12/14