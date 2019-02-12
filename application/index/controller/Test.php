<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-12-02
 * Time: 13:10
 */

namespace app\index\controller;
use think\Controller;
use think\response;
/**
 * tp5.1中 小结:
初始化方法从原来的`_initialize`方法更改为`initialize`
https://blog.csdn.net/duringnone/article/details/79106683


http://www.thinkphp.cn/code/367.html
initialize()函数是在任何方法执行之前，都要执行的，当然也包括_ _construct构造函数
 *
（2）如果父子类均有initialize()函数，则子类覆盖了父类的，如果子类没有而父类有，则子类继承父类的。
      在调用子类对象的initialize()时，不会导致自动调用父类的initialize()。
（3）默认情况下，子类的构造函数也不会自动调用父类的构造函数，
      这一点与Java不同。实际编写子类的构造函数时，一般都要加上父类构造函数的主动调用parent::_ _construct()，
      否则会导致子类对象空指针的异常，
      如Call to a member function assign() on a non-object。
（4）initialize()函数是在“任何”方法调用之前都要调用的，也就是说如果存在initialize()函数，调用对象的任何方法都会导致_initialize()函数的自动调用，
      而_ _construct构造函数仅仅在创建对象的时候调用一次，跟其它方法调用没有关系。
 */
class Test extends Controller
{
/**
  前置操作 beforeActionList
 */
/*    protected $beforeActionList = [
        'first',                                //在执行所有方法前都会执行first方法
        'second' =>  ['except'=>'hello'],       //除hello方法外的 方法 执行前  都要  先执行second方法
        'three'  =>  ['only'=>'hello,data'],    //在 hello、data方法执行前先执行three方法
    ];*/

    public function __construct() {
       // $this->_initialize();
        parent::__construct();
       // self::b();
        echo '我是构造<br />';

    }
    public function initialize() {
        echo 'initialize<br />';
        // parent::_initialize();
    }
    public function index(){
        echo "index<br/>";
    }
    public function index2(){
        echo "index2<br/>";
    }




    public function b() {
        echo 'bbbb<br />';
    }


    protected function first()
    {
        echo 'first<br/>';
    }

    protected function second()
    {
        echo 'second<br/>';
    }

    protected function three()
    {
        echo 'three<br/>';
    }

    public function hello()
    {
        return 'hello';
    }

    public function data()
    {
        return 'data';
    }

        public function getParam()
    {

        $data = $this->request->param();
         $array = array('code'=>201,'data'=>'data');
        return json_encode($array);
    }

}
