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
	'apiKey'      => 'YOUR PUBLIC API',
	'apiSecret'   => 'YOUR SECRET API'
));

```
## Available methods

### Get products by Size

```php
searchBySize($size);

```

- Sizes for adults : XS, S, M, L, XL, XXL, XXXL
- Sizes for kids : 3/4, 5/6, 7/8, 9/11, 12/14

### Get products by Color

```php
searchByColor($color);

```

- Available colours are available in the colour card. Available here : https://www.stanleystella.com/library/tools.html

### Get products by Color code

```php
searchByColorCode($color);

```

- Available colours are available in the colour card. Available here : https://www.stanleystella.com/library/tools.html

### Get products by Color type

```php
searchByColorType($colorType);

```

- Colour type : Colors, Whites, Essential Heathers, Special Heathers

### Get products by Fit

```php
searchByColorType($fit);

```

- Available fit : Fitted, Medium Fit, Loose Fit, Oversized, Tailored Fit

### Get products by Range

```php
searchByRange($range);

```

- Available fit : TEE, SWEAT, POLO, SHIRT