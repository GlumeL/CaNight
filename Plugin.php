<?php
/**
 * <strong style="color:#9e5df3;">Handsome主题的夜间模式插件<br/>问题反馈：<a target="_blank" href="https://www.bsgun.cn/684">插件主页</a></strong>
 * @package CaNight
 * @author Catalpa 
 * @version 1.5
 * @link https://www.bsgun.cn/684
 * */
class CaNight_Plugin implements Typecho_Plugin_Interface {

    public static function activate() {
        Typecho_Plugin::factory('Widget_Archive')->header = array('CaNight_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('CaNight_Plugin', 'footer');
        return _t( '夜间模式已启用，如需帮助请前往 <a href="https:///www.bsgun.cn/684" target="_blank">CaNight插件发布页</a> 评论反馈' );
    }

    public static function deactivate()
    {
    	return '你终究还是抛弃了我!';
    }
    
	public static function config(Typecho_Widget_Helper_Form $form) {
	    //定义插件当前版本号
        $client_version = 202006290;
        //获取服务器上面的版本号
        $data = file_get_contents('https://api.bsgun.cn/AC.json');
        /*获取json数据*/
        $result = json_decode($data, true);
        /*获取输出类型*/
        $select = $result['select'];
        //最新版本号
        $server_version = $result['version'];
        //下载地址
        $url = $result['url'];
        //头部信息
        $title = $result['title'];
        //更新说明
        $tips = $result['tips'];
        $styleUrl = Helper::options()->pluginUrl . '/CaNight/style.css';
        echo '<link rel="stylesheet" href=" '. $styleUrl .'"/>';
        if ($client_version < $server_version) {
        	echo '<div class="container"><div class="inner"><span></span><h2 style="font-size: 1.5rem;color: #ff5555;text-align: center;">'. $title .'<p>'. $tips .'</p><p style="color: red;margin-left: 10px;">Guthub仓库：<a href="'. $url .'">'. $url .'</a></p></div></div>';
        }elseif($select == 2) {
        }
		$yejian = new Typecho_Widget_Helper_Form_Element_Text(
					'yejian', NULL, '22',
					_t('进入夜间模式时间：'),
					_t('默认为晚22点')
				);
		$form->addInput($yejian);
		$baitian = new Typecho_Widget_Helper_Form_Element_Text(
					'baitian', NULL, '6',
					_t('进入白天模式时间：'),
					_t('默认为早6点')
				);
		$form->addInput($baitian);
        $Yincang = new Typecho_Widget_Helper_Form_Element_Radio('Yincang',array(
					'0' => "是",
                    '1' => "否",
				),'0',"手机端切换按钮是否隐藏到搜索栏菜单内",("默认隐藏 如要开启侧边栏显示切换按钮请选择“是”"));
        $form->addInput($Yincang);
    }

	public static function personalConfig(Typecho_Widget_Helper_Form $form){
	}

    public static function header() {
		$Yincang = Helper::options()->plugin('CaNight')->Yincang;
		if($Yincang == 0) {
        }
        if($Yincang == 1) {
            echo <<<HTML
<style>#header>.navbar-header>button:nth-child(2){position:absolute;right:40px;top:0px;} @media (max-width: 767px) { .nav-switch-dark-mode.for-desktop { display: none!important; } }</style>
HTML;
        }
		$options = Helper::options();
		$suncolor = $options->plugin('CaNight')->suncolor;
		$mooncolor = $options->plugin('CaNight')->mooncolor;
		$cssUrl = $options->pluginUrl.'/CaNight/CaNight.css';
		echo <<<HTML
<style>.icon-dark-mode {position:relative; top:2px; color:$mooncolor!important;}.icon-light-mode {position:relative; top:2px; color:$suncolor!important;}</style><link rel="stylesheet"type="text/css"href="{$cssUrl}"/>
HTML;
    }

    public static function footer() {
		$Yincang = Helper::options()->plugin('CaNight')->Yincang;
		if($Yincang == 0) {
        }
        if($Yincang == 1) {
            echo <<<HTML
<script>var darkbtn2 = document.createElement('button');darkbtn2.classList = 'pull-right visible-xs';darkbtn2.innerHTML='<a class="nav-switch-dark-mode" href="javascript:"><span class="icon-light-mode" data-toggle="tooltip" data-placement="bottom" title=""><i data-feather="moon"></i></span><span class="icon-dark-mode" data-toggle="tooltip" data-placement="bottom" title=""><i data-feather="sun"></i></span></a>';var darkdiv2 = document.querySelectorAll('.navbar-header').item(0);darkdiv2.insertBefore(darkbtn2,darkdiv2.childNodes[2]);</script>
HTML;
        }
	    $settings = Helper::options()->plugin('CaNight');
        echo <<<HTML
<script>var darkbtn=document.createElement('li');darkbtn.innerHTML='<a class="nav-switch-dark-mode for-desktop" href="javascript:"><span class="icon-light-mode" data-toggle="tooltip" data-placement="bottom" title="" data-original-title=" 夜晚模式 "><i data-feather="moon"></i><span class="visible-xs-inline"></span></span><span class="icon-dark-mode" style="display: none;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title=" 日间模式 "><i data-feather="sun"></i><span class="visible-xs-inline"></span></span></a>';var darkdiv=document.getElementById('easyLogin').parentElement;darkdiv.insertBefore(darkbtn,document.getElementById('easyLogin'));</script>
<script>(function() {    if (new Date().getHours() >= $settings->yejian || new Date().getHours() < $settings->baitian) {      $('body').toggleClass('night');      $('html').toggleClass('night');      $('.icon-light-mode').css('display', 'none');      $('.icon-dark-mode').css('display', 'block');      document.cookie = "night=1;path=/";      console.log('夜间模式开启');    } else {      $('body').removeClass('night');      $('html').removeClass('night');      $('.icon-light-mode').css('display', 'block');      $('.icon-dark-mode').css('display', 'none');      document.cookie = "night=0;path=/";      console.log('夜间模式关闭');    }  })();  function switchNightMode() {    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';    if (night == '0') {      $('body').toggleClass('night');      $('html').toggleClass('night');      $('.icon-light-mode').css('display', 'none');      $('.icon-dark-mode').css('display', 'block');      document.cookie = "night=1;path=/";      console.log('夜间模式开启');    } else {      $('body').removeClass('night');      $('html').removeClass('night');      $('.icon-light-mode').css('display', 'block');      $('.icon-dark-mode').css('display', 'none');      document.cookie = "night=0;path=/";      console.log('夜间模式关闭');    }  }  $(document).on('click', '.nav-switch-dark-mode',  function(event) {    event.preventDefault();    switchNightMode();  });</script>
HTML;
    }
}