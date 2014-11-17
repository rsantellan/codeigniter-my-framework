tinyMCEPopup.requireLangPack();

var jFileBrowserDialog = {
	init : function() {
		var f = document.forms[0];

		// Get the selected contents as text and place it in the input
		//f.someval.value = tinyMCEPopup.editor.selection.getContent({format : 'text'});
		//f.somearg.value = tinyMCEPopup.getWindowArg('some_custom_arg');
	},

	insert : function() {
		// Insert the contents from the input into the document
		var html,style,path,alt,title,ancho,alto,align,type,form,dir;
        form = document.forms['jfileImageForm'];
        type = form.type.value;
        dir = form.directorio.value;
        path = form.path.value;
        console.log(type);
		if(type == 1){
            title = form.title.value;
            alt = form.alt.value;
            ancho = form.ancho.value;
            alto = form.alto.value;
            for(i=0; i <form.align.length; i++){
                if(form.align[i].checked){
                  align = form.align[i].value;
                }
            }
            if(align == 'left'){
                style = 'style="float: left;"';
            }else if(align == 'center'){
                style = 'style="display: block; margin-left: auto; margin-right: auto;"';
            }else if(align == 'right'){
                style = 'style="float: right;"';
            }

            if(ancho != '' || alto != ''){
                if(isNaN(parseInt(alto)) || isNaN(parseInt(ancho))){
                    alert('Los valores para el alto y el ancho deben ser enteros');
                    return;
                }
                var url = site_get_url+'jfilebrowser/getUrl';
                //console.info(url);
                new Ajax.Request(url, {
                    method: 'post',
                    parameters: 'width=' + ancho + '&height=' + alto + '&directory=' + dir + '&name=' + title,
                    onSuccess: function (response){
                        console.info(response);
                        path = response.responseText;
                        console.info(path);
						html = '<img src="' + path +'" title="' + title +'" alt="' + alt +'" ' + style + ' height="' + alto +'" width="' + ancho +'" />';
						//console.info(html);
                        tinyMCEPopup.editor.execCommand('mceInsertContent', false, html);
						tinyMCEPopup.close();
                    }
                });

            }else{
                //path = path.replace("/backend.php", "").replace("/backend_dev.php", "");
                //html = '<span class="mceIcon mce_spellchecker"></span>';
                //console.info(path);
                html = '<img src="' + path +'" title="' + title +'" alt="' + alt +'" ' + style + ' />';
                //console.info(html);
                //console.info(tinyMCEPopup.editor);
                tinyMCEPopup.editor.execCommand('mceInsertContent', null, html);
                //tinyMCEPopup.editor.execCommand('mceInsertRawHTML', null, html);
                tinyMCEPopup.close();
            }

		}
		else {
			html = '<a href="' + path +'" title="' + title +'" >' + alt +'</a>';
            tinyMCEPopup.editor.execCommand('mceInsertContent', false, html);
            tinyMCEPopup.close();
		}
	},
	
	confirmar : function(m, d) {
		tinyMCEPopup.confirm(m, function(s) {
			if(s){
                borrar(document.forms['form_' + d]);
			}else {
				return false;
			}
		});
	}
};

tinyMCEPopup.onInit.add(jFileBrowserDialog.init, jFileBrowserDialog);
