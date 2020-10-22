# lumen-artisan-up

移植Laravel的 `php artisan up` [退出维护模式]指令到Lumen

# Usage

在 **'app/commands/kernel.php'** 中注册指令：

```
protected $commands = [
	\AdamTyn\Lumen\Artisan\UpCommand::class
];
```
