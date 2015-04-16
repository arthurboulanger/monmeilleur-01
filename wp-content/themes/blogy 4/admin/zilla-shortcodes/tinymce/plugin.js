(function($) {
"use strict";   
 


 			//Shortcodes
            tinymce.PluginManager.add( 'zillaShortcodes', function( editor, url ) {

				editor.addCommand("zillaPopup", function ( a, params )
				{
					var popup = params.identifier;
					tb_show("Insert Zilla Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
				});
     
                editor.addButton( 'zilla_button', {
                    type: 'splitbutton',                
                    icon: 'icon mce-i-bell',
					title:  'Zilla Shortcodes',
					onclick : function(e) {},
					menu: [

					{text: 'Container',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[container] <br> Put Your Content! <br> [/container]')
					}},

					{text: '- One Half (1/2)',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[one_half] <br> Put Your Content! <br> [/one_half]')
					}},

					{text: '- One Third Column (1/3)',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[one_third] <br> Put Your Content! <br> [/one_third]')
					}},					

					{text: '- Two Thirds Column (2/3)',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[two_third] <br> Put Your Content! <br> [/two_third]')
					}},

					{text: '- One Fourth Column (1/4) ',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[one_fourth] <br> Put Your Content! <br> [/one_fourth]')
					}},

					{text: '- Three Fourths Column (3/4) ',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[three_fourths] <br> Put Your Content! <br> [/three_fourths]')
					}},

					{text: '- One Sixth Column (1/6) ',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[one_sixth] <br> Put Your Content! <br> [/one_sixth]')
					}},

					{text: '- Five Sixths Column (5/6) ',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[five_sixths] <br> Put Your Content! <br> [/five_sixths]')
					}},

					{text: '- One Whole Column (1/1) ',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[one_whole] <br> Put Your Content! <br>[/one_whole]')
					}},

					{text: '- Full Width Div ',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[fullwidth_div] <br> Put Your Content! <br>[/fullwidth_div]')
					}},
		
					{text: 'Button',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Theme2035_button',identifier: 'Theme2035_button'})
					}},
				
					{text: 'Flex Slider',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[slider] <br> Put Your Content! <br>[/slider]')
					}},

					{text: '- Add Slider Item ',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[slider_item] <br> Put Your Image! <br>[/slider_item]')
					}},

					{text: 'Background Color',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Theme2035_b_color',identifier: 'Theme2035_b_color'})
					}},	

					{text: 'Margin & Padding',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Theme2035_space',identifier: 'Theme2035_space'})
					}},		

					{text: 'Skill Bar Item',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Theme2035_skill_bar',identifier: 'Theme2035_skill_bar'})
					}},	

					{text: 'Parallax',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Theme2035_parallax',identifier: 'Theme2035_parallax'})
					}},	

					{text: 'Spoiler Alert',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Theme2035_spoiler',identifier: 'Theme2035_spoiler'})
					}},						
							
					{text: 'Accordion',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[accordion] <br> Put Your Content! <br>[/accordion]')
					}},	

					{text: '- Accordion Item',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Theme2035_accordion_item',identifier: 'Theme2035_accordion_item'})
					}},	
							
					{text: 'Dropcap',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[dropcap] <br> Put Your Content! <br>[/dropcap]')
					}},		

					{text: 'Tabs',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[tab] Add Tab Item [/tab]')
					}},	

					{text: '- Tabs Item',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Theme2035_tab_item',identifier: 'Theme2035_tab_item'})
					}},	

					{text: 'Source Url ',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[sources] <br> Put Your Content! <br>[/sources]')
					}},

					{text: 'Add Code Block',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '')
					}},	

					{text: '- Html',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[html] Add Code! [/html]')
					}},	

					{text: '- Css',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[css] Add Code! [/css]')
					}},	

					{text: '- Javascript',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[javascript] Add Code! [/javascript]')
					}},	

					{text: '- Php',onclick:function(){
					    editor.execCommand("mceInsertContent", false, '[php] Add Code! [/php]')
					}},	



					]

                
        	  });
         
          });
         

 
})(jQuery);