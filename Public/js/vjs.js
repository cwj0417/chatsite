$(function(){
  $("#username").blur(function(){
    var root=$('#root').val();
    var um=$(this).val();
    $.post(root+"checkname",{username:um},function(data){

      if(data==1){alert('您的用户名已被注册请更换一个吧！')}
    })
  })
    $("#nickname").blur(function(){
    var root=$('#root').val();
    var nm=$(this).val();
    $.post(root+"nickname",{username:nm},function(data){

      if(data==1){alert('已经有人叫这个昵称了换一个吧~')}
    })
  })
})
$(function(){
  $('#reg').validate({
                 rules:{
               username:{
                    required: true,
                    rangelength: [ 5, 20 ]
                },
                nickname:{
                    required:true,
                    rangelength: [ 2 , 10 ]
                },
                password:{
                    required: true,
                    minlength: 5
                },
                confirm: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                gender: {
                    required: true
                },
             
                email: {
                    required: true,
                    email: true
                },
                phone:{
                    required: true,
                    digits:true,
                    minlength:11
                }
            
            },
            //校验提示信息
            messages: {
                username: {
                required: "不填用户名你tm逗我",
                rangelength: "用户名长度必须为5到20个字符或汉字"
            },
            nickname:{
              required:"写一些昵称吧",
              rangelength:"昵称在2到10个字符内会比较好"
            },
            password: {
                required: "密码都不打？",
                minlength: "密码那么短几个意思？"
            },
            confirm: {
                required: "请确认一下",
                minlength: "那么短几个意思？",
                equalTo: "两次密码不一样搞什么啊"
            },
            email: "请输入正确的邮箱",
            phone:{
                required: "请填写电话号码",
                digits: "请填写正确电话号码" ,
                minlength:"请正确电话号码"
            }

           
    }
})
})