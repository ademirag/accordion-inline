(function($) {
    tinymce.PluginManager.add( 'acc_inline', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('acc_inline', {
            title: 'Insert Accordion Paragraph',
            cmd: 'acc_inline',
            image: url + '/icon.png',
        });

        // Add Command when Button Clicked
        editor.addCommand('acc_inline', function() {
          $("#acc_inline-modal-window-handler").click();
          // Insert selected text back into editor, wrapping it in an anchor tag
        });

        function onSubmit(){
          var title = $("#acc_inline-title").val();
          var content = $("#acc_inline-content").val();
          var shortCode = '[acc_inline][acc_inline_title]'+title+'[/acc_inline_title][acc_inline_content]'+content+'[/acc_inline_content][/acc_inline]';
          editor.execCommand('mceReplaceContent', false, shortCode);
          tb_remove();
        }

        $(document).on("click","#acc_inline-submit",onSubmit);

        $("body").append('<div id="acc_inline-modal-window" style="display:none;"><p>Başlık</p><p><input type="text" id="acc_inline-title" style="width:100%"></p><hr><p>İçerik</p><p><textarea id="acc_inline-content" style="width:100%; height:200px"></textarea></p><p><button id="acc_inline-submit" class="primary">Ekle</button></div>');
        $("body").append('<a id="acc_inline-modal-window-handler" style="display:none;" href="#TB_inline?width=600&height=550&inlineId=acc_inline-modal-window" class="thickbox"></a>');
    });
})(jQuery);
