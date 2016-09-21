# StanleyStella-php-api
PHP class for accessing Stanley &amp; Stella's API


## Requirements

- PHP 5.3 or higher
- cURL
- Registered Stanley & Stella app

## Usage

### Initialize the class

```php
$stst = new Stst([
	'apiKey' => 'YOUR PUBLIC API KEY',
	'apiSecret' => 'YOUR SECRET API KEY'
]);
```

## Available methods

### Get products offset 0 and limit 20

```php
$stst->search([], 0, 20);
```

### Get products by id offset 0 and limit 20

```php
$stst->searchById($id, 0, 20);
```

### Get products by Color for offset 0 and limit 20

```php
$stst->searchByColor($color, 0, 20);
```

- Colours are in the colour card. Available here : https://www.stanleystella.com/library/tools.html

### Get products by Color code for offset 0 and limit 20

```php
$stst->searchByColorCode($colorCode, 0, 20);
```

- Colours are in the colour card. Available here : https://www.stanleystella.com/library/tools.html

### Get products by Color type for offset 0 and limit 20

```php
$stst->searchByColorType($colorType, 0, 20);
```

- Colour type : Colors, Whites, Essential Heathers, Special Heathers

### Get products by Fit for offset 0 and limit 20

```php
$stst->searchByFit($fit, 0, 20);
```

- Available fit : Fitted, Medium Fit, Loose Fit, Oversized, Tailored Fit

### Get products by Gender for offset 0 and limit 20

```php
$stst->searchByGender($gender, 0, 20);
```

### Get products by Size for offset 0 and limit 20

```php
$stst->searchBySize($size, 0, 20);
```

- Sizes for adults : XS, S, M, L, XL, XXL, XXXL
- Sizes for kids : 3/4, 5/6, 7/8, 9/11, 12/14

### Get products by Range for offset 0 and limit 20

```php
$stst->searchByRange($range, 0, 20);
```

- Available fit : TEE, SWEAT, POLO, SHIRT

### Get products with multiple filters for offset 0 and limit 20

```php
$stst->search([ 'rangeName' => 'TEE', 'sizeName' => 'L' ], 0, 20);
```
