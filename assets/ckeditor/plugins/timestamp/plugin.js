CKEDITOR.plugins.add( 'timestamp',
{
	init: function( editor )
	{
		//Plugin logic goes here.
        editor.addCommand( 'insertTimestamp',
        {
            exec : function( editor )
            {    
                var timestamp = new Date();
                editor.insertHtml( 'The current date and time is: <em>' + timestamp.toString() + '</em>' );
            }
        });
        
        editor.ui.addButton( 'Timestamp',
        {
            label: 'Insert Timestamp',
            command: 'insertTimestamp',
            icon: this.path + 'images/timestamp.png'
        } );
	}
} );