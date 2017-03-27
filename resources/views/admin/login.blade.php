<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"/>
 <title>后台登录</title>
 <meta name="author" content="DeathGhost" />
 <link rel="stylesheet" type="text/css" href="{{asset('admincss/login/css/style.css')}}" />
 <style>
  body{height:100%;background:#16a085;overflow:hidden;}
  canvas{z-index:-1;position:absolute;}
 </style>
 <script src="{{asset('admincss/login/js/jquery-1.8.3.min.js')}}"></script>
 <script src="{{asset('admincss/login/js/verificationNumbers.js')}}"></script>
 <script src="{{asset('admincss/login/js/Particleground.js')}}"></script>
 <script>
     $(document).ready(function() {
         //粒子背景特效
         $('body').particleground({
             dotColor: '#5cbdaa',
             lineColor: '#5cbdaa'
         });
     });
 </script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
 <dd class="user_icon">
  <form action="{{url('/admin/validate')}}" method="post">

    {{ csrf_field() }}

     <input type="text" placeholder="账号" class="login_txtbx" name="username"/>
    </dd>
     <dd class="pwd_icon">
      <input type="password" placeholder="密码" class="login_txtbx" name="password"/>
     </dd>
     <dd class="val_icon">
      <input type="submit" value="立即登陆" class="submit_btn"/>
     </dd>
    <dd>
  </from>
  <p>© 2015-2016 DeathGhost 版权所有</p>
  <p>www.diyunkeji</p>
 </dd>
</dl>
</body>
</html>
