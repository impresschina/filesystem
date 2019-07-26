使用方法
--------
~~~
include_once './vendor/autoload.php';

$adapter = new \Dovelet\LocalAdapter(__DIR__, true, 0777);
$filesystem = new \Dovelet\FileSystem($adapter);

$path = $filesystem->path('1.txt');
for($i=0;$i<10;$i++){
    $path->append("this is test\n");
}
~~~