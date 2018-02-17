<?php
/**
 * 页面左右下角出现拉姆和雷姆，点击就会触发至顶和至底功能
 *
 * @package TopLamuLeimu
 * @author Syc
 * @version 1.0.1
 * @link https://www.mfeng.cc/?plugin=Typecho-Top-LamuLeimu
 */

class TopLamuLeimu_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate() {
        Typecho_Plugin::factory('Widget_Archive')->header = array('TopLamuLeimu_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('TopLamuLeimu_Plugin', 'footer');
    }

   /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate() {

    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form) {
        $jquery = new Typecho_Widget_Helper_Form_Element_Checkbox('jquery', array('jquery' => '禁止加载jQuery'), null, _t('Js设置'), _t('插件需要加载jQuery，如果主题模板已经引用加载JQuery，则可以勾选。'));
        $form->addInput($jquery);
    }

    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form) {

    }

    /**
     * 页头出相关代码
     *
     * @access public
     * @param unknown header
     * @return unknown
     */
    public static function header() {
        $Path = Helper::options()->pluginUrl . '/TopLamuLeimu/';
        echo '<link rel="stylesheet" type="text/css" href="' . $Path . 'static/top.css" />';
    }

    /**
     * 页脚输出相关代码
     *
     * @access public
     * @param unknown footer
     * @return unknown
     */
    public static function footer() {
        $Options = Helper::options()->plugin('TopLamuLeimu');
        $Path = Helper::options()->pluginUrl . '/TopLamuLeimu/';
        echo '<div id="updown"><div class="sidebar_wo" id="leimu">
        <img src="' . $Path . 'img/leimuA.png" alt="雷姆" onmouseover="this.src=\'' . $Path . 'img/leimuB.png\'" onmouseout="this.src=\'' . $Path . 'img/leimuA.png\'" id="audioBtn"></div>
        <div class="sidebar_wo" id="lamu"><img src="' . $Path . 'img/lamuA.png" alt="雷姆" onmouseover="this.src=\'' . $Path . 'img/lamuB.png\'" onmouseout="this.src=\'' . $Path . 'img/lamuA.png\'" id="audioBtn"></div>';
        if (!$Options->jquery && !in_array('jquery', $Options->jquery)) {
            echo '<script type="text/javascript" src="' . $Path . 'static/jquery.min.js"></script>';
        }
        echo '<script type="text/javascript" src="' . $Path . 'static/top.js"></script>';
    }
}