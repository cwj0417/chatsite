<?php
/*
全局配置项
*/
return array(
	//'配置项'=>'配置值'
	'APP_GROUP_LIST' => 'Home,Admin', //项目分组设定
	'DEFAULT_GROUP'  => 'Home', //默认分组
	'TMPL_L_DELIM'=>'<{',
	'TMPL_R_DELIM'=>'}>',
	'URL_HTML_SUFFIX'=>'',
	'SHOW_PAGE_TRACE' =>false,
	'SHOW_ERROR_MSG'=>false,
	'URL_MODEL'=>2,
	//'TMPL_CACHE_ON'=>true,
	 'DB_SQL_LOG'=> true, // SQL执行日志记录
	 'LOG_RECORD'            => true,   // 默认不记录日志
    'LOG_TYPE'              => 3, // 日志记录类型 0 系统 1 邮件 3 文件 4 SAPI 默认为文件方式
	//'URL_CASE_INSENSITIVE'  => true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
	'VAR_FILTERS'           =>  'filter_exp',     // 全局系统变量的默认过滤方法 多个用逗号分割
	'DB_PREFIX'=>'',
	'DB_DSN'=>'mysql://root:111111@localhost:3306/sug',
	'LOG_RECORD'            => true,
	'TMPL_CACHE_ON'=>false,
	'TMPL_PARSE_STRING'=>array(
		//公用的静态路径
		'__GCSS__'=>__ROOT__.'/Public/Global/Css',
		'__GIMG__'=>__ROOT__.'/Public/Global/Img',
		'__GJS__'=>__ROOT__.'/Public/Global/Js',
		//前台的静态路径
		'__HCSS__'=>__ROOT__.'/Public/Home/Css',
		'__HIMG__'=>__ROOT__.'/Public/Home/Img',
		'__HJS__'=>__ROOT__.'/Public/Home/Js',
		//后台的静态路径
		'__ACSS__'=>__ROOT__.'/Public/Admin/Css',
		'__AIMG__'=>__ROOT__.'/Public/Admin/Img',
		'__AJS__'=>__ROOT__.'/Public/Admin/Js',
		),

);
?>