# SSM Algorithm

The SSM Algorithm is a proposed algorithm to detect numbers between exchanging messages. 

## Installation. 

If you want to install SSM algorithm in your local machine, you need to have [git](https://git-scm.com/) and [composer](https://getcomposer.org/) in your computer. If you don't have composer in your machine, [check this](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos).

## Getting Started.
#### Step 1
Once you have git in your machine, run the following command in the terminal or command line
```
git clone https://github.com/tisuchi/ssm-algorithm.git
```

#### Step 2
It will generate a folder called __ssm-algorithm__ in your current directory. Then head over to the directory. Now run the following command in your terminal / command line.
```
composer update
```

#### Step 3
Finally run the following command.
```
composer dumpautoload
```

## Uses
You have done all the necessary installation. Now you need to run your project. 

#### Run server
To run your server, you need to run the following command. 
```
php artisan serve
```

It will provide you a accessible url to run your project. It might be like this `http://127.0.0.1:8000`.

Now copy this url and run in your browser. 

#### Access in the browser. 
In order to access the web interface in the browser, you need to run the following url. 
```
http://127.0.0.1:8000/add
```

You might able to see a web interface to input. Now you just input the message you want to check. 

For example, I want to check here-

__What is your whatsapp number__ 

Once I hit the __Check Now__ button, it will return either __1__ or __0__. In my case, it will return __1__ that means it has detect some suspected words. 


## Testing
PHP Unit test has been used. If you want to run testing, then run the following command. 

```
vendor/bin/phpunit
```
