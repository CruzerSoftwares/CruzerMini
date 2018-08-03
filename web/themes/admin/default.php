<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <base href="<?php echo APP_URL;?>" target="_blank">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <meta name="keywords" content="<?php __(META_KEYWORDS);?>">
  <meta name="description" content="<?php __(META_DESCRIPTION);?>">
  <title> <?php __(isset($pageTitle) ? $pageTitle : APP_TITLE);?></title>
  <link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" type="text/css" rel="stylesheet"
    media="screen,projection" />
  <?php __css([
    APP_URL.THEME_DIR.'/admin/css/style.css?da=das',
  ],false);
  ?>  
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  
    <?php include_once('_header.php');?>
    <div id="pageContent">
      <?php echo $bodyContent;?>
      <?php require_once '_footer.php';?>
    </div>

  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <?php __js([
    APP_URL.THEME_DIR.'/admin/js/init.js',
    APP_URL.THEME_DIR.'/admin/plugins/tinymce/tinymce.min.js',
  ],false);
  ?> 
  <script type="text/javascript">
    jQuery('.iframe-btn').fancybox({	
        'width'		: 900,
        'height'	: 600,
        'type'		: 'iframe',
        'autoScale'    	: false
    });
    
    //image selected from file manager and show image from the path, callback
    function responsive_filemanager_callback(field_id) {
        var url = jQuery('#' + field_id).val();
    }

    tinymce.init({
    selector: '.html-editor',
    theme: 'modern',
    height: 300,
    plugins: [
      'advlist autolink autoresize autosave anchor link image imagetools lists charmap print preview hr  pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime  media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor colorpicker responsivefilemanager'//importcss
    ],
    link_list: [
        {title: 'My page 1', value: 'http://www.tinymce.com'},
        {title: 'My page 2', value: 'http://www.ephox.com'}
    ],
    target_list: [
        {title: 'None', value: ''},
        {title: 'Same page', value: '_self'},
        {title: 'New page', value: '_blank'},
        {title: 'Lightbox', value: '_lightbox'}
    ],
    rel_list: [
        {title: 'Lightbox', value: 'lightbox'},
        {title: 'Table of contents', value: 'toc'}
    ],
    autosave_interval: "2s",
    autosave_restore_when_empty: true,
    autosave_retention: "30m",
    // autosave_ask_before_unload: false,
    autoresize_max_height: 500,
    image_caption: true,
    image_advtab: true,
    image_title: true,
    image_prepend_url: "<?php echo APP_URL; ?>",
    image_list: [
        {title: 'Demo Image', value: 'https://cdn0.iconfinder.com/data/icons/new_zealand/128/Cricket.png'},
        {title: 'Logo', value: '<?php echo APP_URL;?>/logo.png'}
      ],
    image_class_list: [
        {title: 'None', value: ''},
        {title: 'Responsive', value: 'img-responsive'},
        {title: 'Animated ', value: 'animated '}
   ],
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  external_filemanager_path:"<?php echo APP_URL; ?>/filemanager/",
  filemanager_title:"File Manager" ,
  external_plugins: { "filemanager" : "<?php echo APP_URL.THEME_DIR; ?>/admin/plugins/tinymce/plugins/responsivefilemanager/plugin.min.js"},
  toolbar: 'insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink image anchor responsivefilemanager | print preview media fullpage code | forecolor backcolor emoticons addclasses ',
  setup: function(editor) {
    editor.addButton('addclasses', {
      type: 'menubutton',
      text: 'Add Class',
      icon: false,
      menu: [
       {text: 'fourty-space', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'fourty-space');}},
       {text: 'uppercase', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'uppercase');}},
       {text: 'dropcap', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'dropcap');}},
       {text: 'colored', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'colored');}},
       {text: 'arrow box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'arrow box');}},
       {text: 'triangle box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'triangle box');}},
       {text: 'circle box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'circle box');}},
       {text: 'check box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'check box');}},
       {text: 'chevron box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'chevron box');}},
       {text: 'arrow-square box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'arrow-square box');}},
       {text: 'check-circle box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'check-circle box');}},
       {text: 'check-square box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'check-square box');}},
       {text: 'upper-roman box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'upper-roman box');}},
       {text: 'lower-latin box', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'lower-latin box');}},
       {text: 'img-responsive', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'img-responsive');}},
       {text: 'img-responsive', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'img-responsive');}},
       {text: 'animated', onclick: function(){tinyMCE.activeEditor.dom.toggleClass(tinyMCE.activeEditor.selection.getNode(), 'animated');}},
      ]
    });
  },
  });
  </script>
  </body>
</html>
