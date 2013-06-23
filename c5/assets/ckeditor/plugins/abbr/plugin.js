





CKEDITOR.plugins.add( 'abbr',
{


	init: function( editor )
	{
		// Plugin logic goes here...

		editor.addCommand( 'abbrDialog',new CKEDITOR.dialogCommand( 'abbrDialog' ) );
        
        editor.ui.addButton( 'Abbr',
        {
            

			label: 'Insert Abbreviation',

            command: 'abbrDialog',

            icon: this.path + 'images/icon.png'
        } );
        

        CKEDITOR.dialog.add( 'abbrDialog', function ( editor )
        {
          return {
     


	        title : 'Abbreviation Properties',
            minWidth : 400,
            minHeight : 200,
            
            
			

			contents :
            [
                {
                    id : 'tab1',
                    label : 'Basic Settings',
                    elements :
                    [
                        {
                            type : 'text',
                            id : 'abbr',
                            label : 'Abbreviation',
                            validate : CKEDITOR.dialog.validate.notEmpty( "Abbreviation field cannot be empty" )
                        },
                        {
                            type : 'text',
                            id : 'title',
                            label : 'Explanation',
                            validate : CKEDITOR.dialog.validate.notEmpty( "Explanation field cannot be empty" )
                        }
                    ]
                },
                {
                    id : 'tab2',
                    label : 'Advanced Settings',
                    elements :
                    [
                        
                          {
                              type : 'text',
                              id : 'id',
                              label : 'Id'
                          }
                    ]
                }
            ],
            
            onOK: function()
            {
              /*
              // A dialog window object.
              // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dialog.html 
              var dialog = this;
              // Create a new abbreviation element and an object that will hold the data entered in the dialog window.
              // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dom.document.html#createElement
              var abbr = editor.document.createElement( 'abbr' );

              // Retrieve the value of the "title" field from the "tab1" dialog window tab.
              // Send it to the created element as the "title" attribute.
              // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dom.element.html#setAttribute
              abbr.setAttribute( 'title', dialog.getValueOf( 'tab1', 'title' ) );
              // Set the element's text content to the value of the "abbr" dialog window field.
              // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dom.element.html#setText
              abbr.setText( dialog.getValueOf( 'tab1', 'abbr' ) );

              // Retrieve the value of the "id" field from the "tab2" dialog window tab.
              // If it is not empty, send it to the created abbreviation element. 
              // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.dialog.html#getValueOf
              var id = dialog.getValueOf( 'tab2', 'id' );
              if ( id )
                  abbr.setAttribute( 'id', id );

              // Insert the newly created abbreviation into the cursor position in the document.					
              // http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.editor.html#insertElement
              editor.insertElement( abbr );
              */
              
              var dialog = this;
              var abbr = editor.document.createElement('abbr');
              abbr.setAttribute( 'title', dialog.getValueOf( 'tab1', 'title' ) );
              abbr.setText( dialog.getValueOf( 'tab1', 'abbr' ) );
              var id = dialog.getValueOf( 'tab2', 'id' );
              if ( id )
                  abbr.setAttribute( 'id', id );
              editor.insertElement( abbr );
              
            }
              
          };
          
          
        });
        
	}
} );