Yii2 Entegra Integration
========================
Yii2 Entegra Integration

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require mhunesi/yii2-entegra "*"
```

or add

```
"mhunesi/yii2-entegra": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
    /** @var $entegra Entegra */
    $entegra = Yii::$app->entegra;
   
    
    $response = $entegra->productService()->all();
 ?>```