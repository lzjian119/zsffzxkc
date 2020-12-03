<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/www/wwwroot/test1.sxjiangyan.com/public/../application/admin/view/course/add_course.html";i:1606658626;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>基础表单</title>
    <link rel="stylesheet" href="/static/assets/libs/layui/css/layui.css" />
    <link rel="stylesheet" href="/static/assets/module/admin.css?v=317" />
    <link rel="stylesheet" href="/static/admin/js/plugins/wx-audio/wx-audio.css" ><!--音频播放器组件-->
    <link rel="stylesheet" href="/static/admin/js/plugins/webuploader/webuploader.css?v=1.0.1" ><!--webUploader上传组件-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #formBasForm {
           max-width: 800px;
            margin: 30px 200px 50px;
        }

        .layui-form-item {
            display: flex ;
        }

        .layui-form-label {
            flex: 3;
        }

        .layui-input-block {
            flex: 14;
        }

        .layui-input-block {
            margin-left: 20px !important;
            min-height: 36px;
        }

        #formBasForm .layui-form-item {
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <!-- 加载动画 -->
    <div class="page-loading">
        <div class="ball-loader">
            <span></span><span></span><span></span><span></span>
        </div>
    </div>
    <!-- 正文开始 -->
    <div class="layui-fluid">
        <div class="layui-card">
            <ul class="layui-tab-title" style="margin-bottom: 20px;">
                <li><a ew-href="<?php echo url('index'); ?>" ew-title="课程管理">课程管理</a></li>
                <li><a ew-href="<?php echo url('add_menu'); ?>" ew-title="添加目录">添加目录</a></li>
                <li  class="layui-this"><a href="javascript:location.reload();">添加课程</a></li>
<!--                <li><a ew-href="<?php echo url('menu_orderlist'); ?>" ew-title="单目录购买记录">购买记录</a></li>-->
            </ul>
            <div class="layui-card-body">
                <!-- 表单开始 -->
                <form class="layui-form" id="formBasForm" lay-filter="formBasForm">
                    <input type="hidden" name="id" value="<?php echo !empty($item['id'])?$item['id']:''; ?>">
                    <input type="hidden" name="menumedia" value="<?php echo !empty($menuinfo['media'])?$menuinfo['media']:''; ?>">
<!--                    <input type="hidden" name="select_media" value="<?php echo !empty($menuinfo['select_media'])?$menuinfo['select_media']:''; ?>">-->
                    <input type="hidden" name="menuid" value="<?php echo !empty($menuinfo['id'])?$menuinfo['id']:''; ?>">
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-form-required">课程名称:</label>
                        <div class="layui-input-block">
                            <input name="coursename" class="layui-input" value="<?php echo !empty($item['coursename'])?$item['coursename']:''; ?>"/>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-form-required">选择目录:</label>
                        <div class="layui-input-block">
                            <select name="menuid" lay-verify="" lay-filter="selectmenu" lay-skin="select">
                                <option value="">请选择课程目录</option>
                                <?php if($menuinfo): if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): if( count($menus)==0 ) : echo "" ;else: foreach($menus as $key=>$vo): ?>
                                <option value="<?php echo $vo['id']; ?>" <?php echo $vo['id']==$menuinfo['id']?'selected':''; ?>><?php echo $vo['menuname']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): if( count($menus)==0 ) : echo "" ;else: foreach($menus as $key=>$vo): ?>
                                <option value="<?php echo $vo['id']; ?>" ><?php echo $vo['menuname']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </select>
                        </div>
                    </div>
                    <?php if($menuinfo): if($menuinfo['media']=='all'): ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-form-required">课程类型:</label>
                        <div class="layui-input-block">
                            <select name="media" lay-verify="" lay-filter="selectmedia" lay-skin="select">
                                <option value="">请选择课程类型</option>
                                <?php if($item): if(is_array($medias) || $medias instanceof \think\Collection || $medias instanceof \think\Paginator): if( count($medias)==0 ) : echo "" ;else: foreach($medias as $key=>$vo): ?>
                                <option value="<?php echo $vo['val']; ?>" <?php echo $vo['val']==$item['media']?'selected':''; ?>><?php echo $vo['medianame']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($medias) || $medias instanceof \think\Collection || $medias instanceof \think\Paginator): if( count($medias)==0 ) : echo "" ;else: foreach($medias as $key=>$vo): ?>
                                <option value="<?php echo $vo['val']; ?>"><?php echo $vo['medianame']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </select>
                        </div>
                    </div>
                    <?php endif; endif; ?>
                    <div class="layui-form-item audio-upload" style="display: none;">
                        <label class="layui-form-label layui-form-required">上传音频：</label>
                        <input type="hidden" name="audio_src" id="lay-music" lay-verify="music" >
                        <div class="layui-upload layui-input-block">
                            <div id="lay-music-upload"><i class="layui-icon">&#xe6fc;</i> 上传音频</div>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                预览音频：
                                <div class="layui-upload-list" id="lay-music-list">
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="layui-form-item video-upload" style="display: none;">
                        <label class="layui-form-label layui-form-required">上传视频：</label>
                        <input type="hidden" name="video_src" id="lay-video" lay-verify="video">
                        <div class="layui-upload layui-input-block">
                            <div id="lay-upload2"><i class="layui-icon">&#xe6ed;</i> 上传视频</div>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                预览视频：
                                <div class="layui-upload-list" id="lay-video-list">
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-form-required">单课程价格: </label>
                        <div class="layui-input-block">
                            <input name="price" class="layui-input inline-block" style="width: 160px;" value="<?php echo !empty($item['price'])?$item['price']:''; ?>" /><span>&nbsp;&nbsp;元</span>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否支持试看:</label>
                        <div class="layui-input-block">
                            <?php if($item): ?>
                            <input type="checkbox" <?php if($item['is_sk']==1): ?>checked<?php endif; ?> name="is_sk" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
                            <?php else: ?>
                            <input type="checkbox" name="is_sk" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="layui-form-item freetime" style="display: none;">
                        <label class="layui-form-label layui-form-required">试看时长: </label>
                        <div class="layui-input-block">
                            <input name="freesecond" class="layui-input inline-block" style="width: 160px;" value="<?php echo !empty($item['freesecond'])?$item['freesecond']:''; ?>"/><span>&nbsp;&nbsp;秒</span>
                        </div>
                    </div>
                    <div class="layui-form-item tuwen-detail" style="display: none;">
                        <label class="layui-form-label layui-form-required">图文详情: </label>
                        <div class="layui-input-block">
                            <textarea id="demoEditor"><?php echo !empty($item['introduce'])?$item['introduce']:''; ?></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block" style="display: flex;
                    justify-content: space-around;
                ">
                            <button id="btnDemoEdtGetContent" class="layui-btn" lay-filter="formBasSubmit" lay-submit>&emsp;提交&emsp;</button>
                            <button type="reset" class="layui-btn layui-btn-primary">&emsp;重置&emsp;</button>
                        </div>
                    </div>
                </form>
                <!-- //表单结束 -->
            </div>
        </div>
    </div>

    <!-- js部分 -->
    <script type="text/javascript" src="/static/assets/libs/layui/layui.js"></script>
    <script type="text/javascript" src="/static/assets/js/common.js?v=317"></script>
    <script type="text/javascript" src="/static/assets/libs/tinymce/tinymce.min.js"></script>
    <script src="/static/assets/libs/jquery/jquery-3.2.1.min.js"></script>
    <script src="/static/admin/js/plugins/wx-audio/wx-audio.js" ></script><!--音频播放器组件-->
    <script src="/static/admin/js/plugins/webuploader/webuploader.js"></script><!--webUploader上传组件-->
    <script>
        layui.use(['layer', 'form', 'laydate','jquery','cascader','upload','admin','element'], function () {
            var $ = layui.jquery;
            var layer = layui.layer;
            var form = layui.form;
            var laydate = layui.laydate;
            var cascader = layui.cascader;
            var upload = layui.upload;
            var admin = layui.admin;
            var element = layui.element

            $(function(){
                let media=$("input[name='menumedia']").val();
                // let select_media=$("input[name='select_media']").val();
                //let media=select_media?select_media:menumedia;
                console.log(media);
                if(media=='video'){
                    $(".video-upload").show();
                    $(".audio-upload").hide();
                    $(".tuwen-detail").hide();
                }else if(media=='audio'){
                    $(".video-upload").hide();
                    $(".audio-upload").show();
                    $(".tuwen-detail").hide();
                }else if(media=='tuwen'){
                    $(".video-upload").hide();
                    $(".audio-upload").hide();
                    $(".tuwen-detail").show();
                }
            });
            /*音频上传*/
            var uploaderMusic = WebUploader.create({
                auto: true,// 选完文件后，是否自动上传。
                server: "<?php echo url('admin/upload/upload'); ?>",// 文件接收服务端。
                duplicate :true,// 重复上传文件，true为可重复false为不可重复
                pick: {
                    id: "#lay-music-upload",// 选择文件的按钮
                    multiple: false,//true多文件上传 false单文件上传
                },
                fileSingleSizeLimit: 200*1024*1024, //限制上传单个文件大小，单位是B，1M=1024000B
                accept: {
                    title: 'Audio',
                    extensions: 'mp3',
                    mimeTypes: '.mp3'
                },
                //上传成功
                'onUploadSuccess': function(file, data, response) {
                    $("#lay-music").val("<?php echo config('qiniu.domain'); ?>"+data._raw);
                    $("#" + file.id).show();
                    /**************音频播放器***************/
                    var wxAudio = new WxAudio({
                        ele: '#'+ file.id,//dom元素
                        title: file.name,//文件名
                        disc: '',//描述
                        src: "<?php echo config('qiniu.domain'); ?>"+data._raw,//音频地址
                        width: '320px',//进度条
                        loop: false,//循环播放 bool值
                        currentTime:0,//从多少秒开始播放
                        ended: function () {}//播放完执行，loop为true不执行
                    });
                    /**************音频播放器***************/
                    $( '#'+file.id ).next('p').html('<span style="color: #009688;">上传成功!</span>');
                },
                //上传失败
                'uploadError':function(file){
                    $( '#'+file.id ).next('p').html('<span style="color: #FF5722;">上传失败!</span>');
                }
            });
            // //上传进度
            // uploaderMusic.on( 'uploadProgress' ,function(file,percentage){
            //     element.progress('lay-music', Math.round(100 * percentage)+'%');
            // });
            //音频加入队列
            uploaderMusic.on( 'fileQueued', function( file ) {
                $('#lay-music-list').html('<div id="' + file.id + '" style="margin: 0 10px 10px 0;display:none;"></div><p id="lay-msg">正在上传... <i class="layui-icon layui-icon-loading-1 layui-icon layui-anim layui-anim-rotate layui-anim-loop"></i></p>')
            });
            //错误信息提示
            uploaderMusic.on('error', function (code) {
                switch (code) {
                    case 'F_EXCEED_SIZE':
                        layer.msg('音频大小不得超过'+  uploaderMusic.options.fileSingleSizeLimit/1024/1024 + 'MB',{icon:2,time:1500,shade:0.1});
                        break;
                    case 'Q_TYPE_DENIED':
                        layer.msg('请上传正确的音频格式',{icon:2,time:1500,shade:0.1});
                        break;
                    default:
                        layer.msg('上传错误，请刷新',{icon:2,time:1500,shade:0.1});
                        break;
                }
            });
            //上传视频
            var uploader = WebUploader.create({
                auto: true,// 选完文件后，是否自动上传。
                server: "<?php echo url('admin/upload/layUploadVideo'); ?>",// 文件接收服务端。
                duplicate :true,// 重复上传文件，true为可重复false为不可重复
                chunked: true,// 分片上传大文件
                pick: {
                    id: "#lay-upload2",// 选择文件的按钮
                    multiple: false,//true多文件上传 false单文件上传
                },
                fileSingleSizeLimit: 1000*1024*1024, //限制上传单个文件大小，单位是B，1M=1024000B
                accept: {
                    title: 'Video',
                    extensions: 'mp4',
                    mimeTypes: '.mp4'
                },
                //上传成功
                'onUploadSuccess': function(file, data, response) {
                    $("#lay-video").val("<?php echo config('qiniu.domain'); ?>"+data._raw);
                    layui.config({
                        base: '/src/' //静态资源所在路径
                    }).extend({
                        ckplayer: 'modules/ckplayer'
                    }).use(['ckplayer'], function() {
                        var ckplayer = layui.ckplayer
                        var videoObject = {
                            container: '#' + file.id,
                            loop: false,
                            autoplay: false,
                            video: [
                                ["<?php echo config('qiniu.domain'); ?>"+data._raw, 'video/mp4']
                            ]
                        };
                        var player = new ckplayer(videoObject);
                    })
                    $( '#'+file.id ).show();
                    $( '#'+file.id ).next('div').hide();
                    $( '#'+file.id ).next().next('p').html('<span style="color: #009688;">上传成功!</span>');
                },
                //上传失败
                'uploadError':function(file){
                    $( '#'+file.id ).next('div').hide();
                    $( '#'+file.id ).next().next('p').html('<span style="color: #FF5722;">上传失败!</span>');
                }
            });

            //上传进度
            uploader.on( 'uploadProgress' ,function(file,percentage){
                element.progress('lay-video', Math.round(100 * percentage)+'%');
            });
            //视频加入队列
            uploader.on( 'fileQueued', function( file ) {
                $('#lay-video-list').html('<div id="' + file.id + '" style="width: 80%;height: auto;display:none;"></div><div class="layui-progress layui-progress-big" lay-showpercent="true" lay-filter="lay-video"><div class="layui-progress-bar" lay-percent="0%"></div></div><p id="lay-msg">正在上传... <i class="layui-icon layui-icon-loading-1 layui-icon layui-anim layui-anim-rotate layui-anim-loop"></i></p>')
            });


            //错误信息提示
            uploader.on('error', function (code) {
                switch (code) {
                    case 'F_EXCEED_SIZE':
                        layer.msg('视频大小不得超过'+  uploader.options.fileSingleSizeLimit/1024/1024 + 'MB',{icon:2,time:1500,shade:0.1});
                        break;
                    case 'Q_TYPE_DENIED':
                        layer.msg('请上传正确的视频格式',{icon:2,time:1500,shade:0.1});
                        break;
                    default:
                        layer.msg('上传错误，请刷新',{icon:2,time:1500,shade:0.1});
                        break;
                }
            });

            // 渲染富文本编辑器
            tinymce.init({
                selector: '#demoEditor',
                height: 525,
                branding: false,
                language: 'zh_CN',
                plugins: 'code print preview fullscreen paste searchreplace save autosave link autolink image imagetools media table codesample lists advlist hr charmap emoticons anchor directionality pagebreak quickbars nonbreaking visualblocks visualchars wordcount',
                toolbar: 'fullscreen preview code | undo redo | forecolor backcolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | formatselect fontselect fontsizeselect | link image media emoticons charmap anchor pagebreak codesample | ltr rtl',
                toolbar_drawer: 'sliding',
                images_upload_url: '../../../json/tinymce-upload-ok.json',
                file_picker_types: 'media',
                file_picker_callback: function (callback, value, meta) {
                    layer.msg('演示环境不允许上传', { anim: 6 });
                }
            });
            //监听指定开关
            form.on('switch(switchTest)', function(data){
                if(this.checked){
                    $(this).val(1);
                    $(".freetime").show();
                }else{
                    $(this).val(0);
                    $(".freetime").hide();
                }
            });
            form.on('select(selectmenu)', function(res){
                console.log(res)
                let menuid=res.value;
                window.open("<?php echo url('add_course'); ?>?menuid="+menuid,'_self');
            });
            form.on('select(selectmedia)', function(res){
                let media=res.value;
                var menumedia=$("input[name='menumedia']").val();
                var menuid=$("input[name='menuid']").val();
                if(menumedia=='all'){
                    window.open("<?php echo url('add_course'); ?>?menuid="+menuid+'&media='+media,'_self');
                }else{
                    if(media=='video'){
                        $(".video-upload").show();
                        $(".audio-upload").hide();
                        $(".tuwen-detail").hide();
                    }else if(media=='audio'){
                        $(".video-upload").hide();
                        $(".audio-upload").show();
                        $(".tuwen-detail").hide();
                    }else if(media=='tuwen'){
                        $(".video-upload").hide();
                        $(".audio-upload").hide();
                        $(".tuwen-detail").show();
                    }
                }
            });
            /* 监听表单提交 */
            form.on('submit(formBasSubmit)', function (data) {
                $('.layui-btn').addClass('layui-disabled').attr('disabled','disabled');
                var content = tinymce.get('demoEditor').getContent();
                data.field['introduce']=content
                $.ajax({
                    url:"<?php echo url('add_course'); ?>",
                    type:'post',
                    dataType:'json',
                    data:data.field,
                    success:function(res){
                        //console.log(res)
                        if (res.code == 0) {
                            layer.msg(res.msg,{icon:1,time:1500,shade:0.1})
                            setTimeout(function () {
                                admin.closeThisTabs();
                            }, 1000);
                        } else {
                            $(".layui-btn").removeClass('layui-disabled').removeAttr('disabled');
                            wk.error(res.msg);
                            return false;
                        }
                    }
                })
            });

        });
    </script>
</body>

</html>