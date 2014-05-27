<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link type="text/css" rel="stylesheet" href="uploadify/uploadify.css" />
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script language="javascript" type="text/javascript" src="uploadify/swfobject.js"></script>
<script language="javascript" type="text/javascript" src="scrollbar.js"></script>
<script language="javascript" type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script language="javascript" type="text/javascript">
	$(function() {
                $("#comecar-upload").click(function(){
			$("#file_upload").uploadifyUpload();
		});
		
		$('#file_upload').uploadify({
				'uploader'        : 'uploadify/uploadify.swf',
				'script'          : 'uploadify/uploadify.php',
				'cancelImg'       : 'uploadify/cancel.png',
				'buttonImg' 	  : 'uploadify/download.png',
				'folder'          : 'uploads',
				//'buttonText'      : 'Escolha o Arquivo',
				'multi'           : true,
                                'auto'            : false,
                                'fileExt'         : '*.jpg;*.jpeg;*.png;*.gif',
			 	'fileDesc'        : 'Image Files (.JPG, .GIF, .PNG)',
                                'queueID'         : 'custom-queue',
				'height'          : 50,
				'width'	          : 100,
			        'simUploadLimit'  : 3,
			        'removeCompleted' : false,
				'onCancel'        : function(event,ID,fileObj,data) {
                                    if( parseInt($('#status-message').children().eq(0).text(),10) > 1){
                                        $('#status-message').children().eq(0).text(parseInt($('#status-message').children().eq(0).text(),10)-1);
                                        $('#status-message').children().eq(1).text(' Arquivos foram selecionados!');
                                    }else{
                                        $('#status-message').children().eq(0).text("");
                                        $('#status-message').children().eq(1).text('Selecione o(s) arquivo(s) que deseja enviar:');
                                    }
				    		
				},
				'onSelectOnce'    : function(event,data) {
                                        //$('#status-message').text(data.filesSelected + ' item(s) foram adicionado(s) na lista.');
                                        $('#status-message').children().eq(0).text(data.filesSelected);
                                        $('#status-message').children().eq(1).text(' Arquivos foram selecionados!');
				},
				'onComplete'  : function(event, queueID, fileObj, response, data) {
							var vetor = new Array();
								vetor[0] = fileObj.name;
								vetor[1] = response;
								vetor[2] = queueID;
								alert(vetor)			  
				},	
				'onAllComplete'  : function(event,data) {
                                    //$('#status-message').children().eq(0).text(data.filesUploaded);
                                    //$('#status-message').children().eq(1).text(' Arquivos enviados, ' + data.errors + ' Erros.');					  
				}
		});//fim do file_upload
    });
</script>
<style type="text/css">
    #file_upload buttonImg{
		height:100px;
	}
	
	
	
	.demo-box{
	    width:375px;
	}
	
	.demo-box a{
		padding-top:10px;
		float:right;
	}
</style>
</head>
    <body>
        <div id="upload" class="demo">
            <div class="demo-box">
                <div id="status-message"><span></span><span>Selecione o(s) arquivo(s) que deseja enviar:</span></div>
                <div id="custom-queue"></div>
                <input id="file_upload" type="file" name="Filedata"/> 
                <a id="comecar-upload">Começar Upload</a>
            </div><!-- Termina demo-box-->
         </div><!-- Termina custom-demo --> 
    </body>
</html>