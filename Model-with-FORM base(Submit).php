application/index/view/user/create.html

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>创建用户</title>
<style>
body {
    font-family:"Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size:16px;
    padding:5px;
}
.form{
    padding: 15px;
    font-size: 16px;
}

.form .text {
    padding: 3px;
    margin:2px 10px;
    width: 240px;
    height: 24px;
    line-height: 28px;
    border: 1px solid #D4D4D4;
}
.form .btn{
    margin:6px;
    padding: 6px;
    width: 120px;

    font-size: 16px;
    border: 1px solid #D4D4D4;
    cursor: pointer;
    background:#eee;
}
a{
    color: #868686;
    cursor: pointer;
}
a:hover{
    text-decoration: underline;
}
h2{
    color: #4288ce;
    font-weight: 400;
    padding: 6px 0;
    margin: 6px 0 0;
    font-size: 28px;
    border-bottom: 1px solid #eee;
}
div{
    margin:8px;
}
.info{
    padding: 12px 0;
    border-bottom: 1px solid #eee;
}

.copyright{
    margin-top: 24px;
    padding: 12px 0;
  border-top: 1px solid #eee;
}
</style>
</head>
<body>
<h2>创建用户</h2>
<FORM method="post" class="form" action="{:url('index/user/add')}">
昵 称：<INPUT type="text" class="text" name="nickname"><br/>
邮 箱：<INPUT type="text" class="text" name="email"><br/>
生 日：<INPUT type="text" class="text" name="birthday"><br/>
<input type="hidden" name="__token__" value="{$Request.token}" />
<INPUT type="submit" class="btn" value=" 提交 ">
</FORM>
    <div class="copyright">
        <a title="官方网站" href="http://www.thinkphp.cn">ThinkPHP</a> 
        <span>V5</span> 
        <span>{ 十年磨一剑-为API开发设计的高性能框架 }</span>
    </div>
</body>
</html>


//User控制器增加新的操作方法create如下：
// 创建用户数据页面
public function create()
{
    return view();
}
//或者:
// 创建用户数据页面
public function create()
{
    return view('user/create');
}

//并且修改之前的add方法如下：
// 新增用户数据
public function add()
{
    $user = new UserModel;
    if ($user->allowField(true)->save(input('post.'))) {
        return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
    } else {
        return $user->getError();
    }
}
//这里使用allowField(true)是为了避免表单令牌验证的字段被写入数据表，如果你已经在模型里面定义了field属性的话，可以不需要。
