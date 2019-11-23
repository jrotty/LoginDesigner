<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * Login Designer博客登录/注册页面美化插件，提供多种美化样式
 * 
 * @package Login Designer
 * @author 泽泽社长
 * @version 1.2.0
 * @link https://qqdie.com/archives/typecho-LoginDesigner-plugin.html
 */
class LoginDesigner_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('admin/header.php')->header = array('LoginDesigner_Plugin', 'render');
        Typecho_Plugin::factory('admin/footer.php')->end = array('LoginDesigner_Plugin', 'footerjs');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
 
?>
<link rel="stylesheet" href="<?php Helper::options()->pluginUrl(); ?>/LoginDesigner/style.css?20191123">
<?php
$url=Helper::options()->pluginUrl.'/LoginDesigner/';
$zz1='<div class="zz">素雅<br>作者：<a href="http://qqdie.com" target="_blank">泽泽社长</a></div>';
$zz2='<div class="zz">黑色<br>作者：<a href="http://qqdie.com" target="_blank">泽泽社长</a></div>';
$zz3='<div class="zz">白色<br>作者：<a href="http://qqdie.com" target="_blank">泽泽社长</a></div>';
$zz4='<div class="zz">纯白<br>作者：<a href="http://qqdie.com" target="_blank">泽泽社长</a></div>';
$zz5='<div class="zz">纯黑<br>作者：<a href="http://qqdie.com" target="_blank">泽泽社长</a></div>';
$zz6='<div class="zz">黑客帝国<br>作者：<a href="http://qqdie.com" target="_blank">泽泽社长</a></div>';
$zz7='<div class="zz">高斯模糊<br>作者：<a href="http://qqdie.com" target="_blank">泽泽社长</a></div>'; 
$zz8='<div class="zz">方绿<br>作者：<a href="http://qqdie.com" target="_blank">泽泽社长</a></div>';  
      
 $bgfengge = new Typecho_Widget_Helper_Form_Element_Radio(
'bgfengge', array(
  'suya' => _t('<div class="kuai"><img src="'.$url.'/images/suya.jpg" loading="lazy">'.$zz1.'</div>'),
  'black' => _t('<div class="kuai"><img src="'.$url.'/images/black.jpg" loading="lazy" loading="lazy">'.$zz2.'</div>'),
  'white' => _t('<div class="kuai"><img src="'.$url.'/images/white.jpg" loading="lazy">'.$zz3.'</div>'),
  'bai' => _t('<div class="kuai"><img src="'.$url.'/images/bai.jpg" loading="lazy">'.$zz4.'</div>'),
  'hei' => _t('<div class="kuai"><img src="'.$url.'/images/hei.jpg" loading="lazy">'.$zz5.'</div>'),
  'heike' => _t('<div class="kuai tags"><img src="'.$url.'/images/heike.jpg" loading="lazy">'.$zz6.'</div>'),
  'mohu' => _t('<div class="kuai"><img src="'.$url.'/images/mohu.jpg" loading="lazy">'.$zz7.'</div>'),
  'lv' => _t('<div class="kuai tags"><img src="'.$url.'/images/lv.jpg" loading="lazy">'.$zz8.'</div>'),
    ), 'suya', _t('登陆/注册页面样式'), _t('')); $bgfengge->setAttribute('id', 'yangshi');
    $form->addInput($bgfengge); 
      
    $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', NULL, NULL, _t('自定义背景图'), _t('选中上方的基础样式后，可以在这里填写图片地址自定义背景图；<b>注意</b>：带有【动态】标识的风格不支持自定义背景图。
    <p class="dalao"><b>Logo重新设计</b>：<a href="http://siitake.cn/" target="_blank">香菇社长</a></p><p class="dalao">
    <b>资金赞助者</b>：<br>御坂_20001，上善若水μn，gary，腾讯云渠道代理商，汉熙秦家官方号，<a href="http://www.xinyouqu.com/" target="_blank">晴栀</a>，小火龙，管理喜欢玩3P，<a href="https://9sb.org/" target="_blank">王忘杰</a></p>'));
    $form->addInput($bgUrl);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render($hed)
    {
if (!Typecho_Widget::widget('Widget_User')->hasLogin()){
$url=Helper::options()->pluginUrl.'/LoginDesigner/';
$skin=Typecho_Widget::widget('Widget_Options')->plugin('LoginDesigner')->bgfengge;
  

if($skin=='heike'){
$hed=$hed. '<link rel="stylesheet" href="'.$url.'skin/'.$skin.'.css?20191123">';


}else{
$bgUrl=Typecho_Widget::widget('Widget_Options')->plugin('LoginDesigner')->bgUrl;
$zidingyi="";
if($bgUrl){
  $zidingyi="<style>body,body::before{background-image: url(".$bgUrl.")}</style>";
}
$hed=$hed. '<link rel="stylesheet" href="'.$url.'skin/'.$skin.'.css?20191123">'.$zidingyi;
}

}
        return $hed;
    }
  
    public static function footerjs()
    {  
  if (!Typecho_Widget::widget('Widget_User')->hasLogin()){
$url=Helper::options()->pluginUrl.'/LoginDesigner/';
$skin=Typecho_Widget::widget('Widget_Options')->plugin('LoginDesigner')->bgfengge;
$ft='';
if($skin=='heike'){
$ft='<canvas id="canvas"></canvas><script type="text/javascript">window.onload=function(){var canvas=document.getElementById("canvas");var context=canvas.getContext("2d");var W=window.innerWidth;var H=window.innerHeight;canvas.width=W;canvas.height=H;var fontSize=16;var colunms=Math.floor(W/fontSize);var drops=[];for(var i=0;i<colunms;i++){drops.push(0)}var str="001";function draw(){context.fillStyle="rgba(0,0,0,0.05)";context.fillRect(0,0,W,H);context.font="700 "+fontSize+"px  微软雅黑";context.fillStyle="#00cc33";for(var i=0;i<colunms;i++){var index=Math.floor(Math.random()*str.length);var x=i*fontSize;var y=drops[i]*fontSize;context.fillText(str[index],x,y);if(y>=canvas.height&&Math.random()>0.99){drops[i]=0}drops[i]++}}function randColor(){var r=Math.floor(Math.random()*256);var g=Math.floor(Math.random()*256);var b=Math.floor(Math.random()*256);return"rgb("+r+","+g+","+b+")"}draw();setInterval(draw,30)};</script>';
}
if($skin=='lv'){
$ft='<ul class="bg-bubbles"><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul>';
} 
echo $ft;
  }  }
  
  
  
  
  
}
