<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        /**
	 * @var array the informations for the site.
	 */        
        public $informations = array();
        
        /*
         * language path
         */
        public $language_path;
        
        
        
        public function init()
	{
            // TODO: filter by store
            $criteria = new CDbCriteria;
            $criteria->condition = 'bottom=1 AND status=1'; // only active and bottom informations
            $criteria->order = 'sort_order ASC'; 
            $this->informations = Information::model()->findAll($criteria);
	}
	
	/*
         * get language 
         * example to use:
         * <pre>
         * $this->language_path = 'product/index';
         * $this->pageTitle = $this->t('heading_title');
         * </pre>
         */
        public function t($message){
            return Yii::t($this->language_path, $message);            
        }
        
}
