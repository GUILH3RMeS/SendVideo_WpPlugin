<?php
/**
 * Plugin Name: SendVideo
 * Plugin URI: https://github.com/GUILH3RMeS/SendVideo_WpPlugin
 * Description: Plugin feito para enviar videos para o banco de dados conforme pedido do cliente
 * Version: 1.0
 * Author: Saladdinha
 * Author URI: https://github.com/GUILH3RMeS/
 */

 function uploadVideo(){?>
 <form method="post" enctype="multipart/form-data">
    <div class= "form-group" style="text-align: center;" >
	<div class="rtcl-video-urls" style="border: 1px solid #ebebeb; border-radius:0.1rem; margin-bottom: 1rem">
		<p for="video_upload" style="box-sizing: border-box;    color: #b7b7b7;    font-size: 1.3em;    font-weight: 400;    margin: 20px 0px 15px 0px;    padding: 0;">Drop file here to add video.</p>
		<input type="file" id="video_send" class="video" accept="video/*" hidden="hidden" onchange="getVideo()" name="video_upload">
		<button id="button_getVideo" type="button" style="    width: auto;    height: 37px;    overflow: hidden;    z-index: 0; background-color:#FA8D9B; color:#fff;		font-size: 1rem;    line-height: 1.5;    border-radius: 0.25rem; border: 1px solid transparent;    padding: 0.375rem 0.75rem; margin-bottom:2rem;">			Browser Video ...
		</button>
		<p id="video_name"></p>
    <p class="errSendVideo successSendVideo"></p>
		<br/>
	</div>
	<div class="description alert alert-danger" style="    text-align: start;">
    <p>Recommended video quality to (720p / 480p)</p>
    <p>video maximum size 80 MB.</p>
    <p>Allowed video type (mp4, wmv,avi , mov).</p>
  </div>
  <button type="submit" name="submitSendVideo">Send video</button>
</div>
</form>
<script>
		var button_getVideo = document.getElementById("button_getVideo")
		button_getVideo.addEventListener("click", ()=>{
			document.getElementById("video_send").click()
		})
        function getVideo(){
			document.getElementById("video_name").innerText = document.getElementById("video_send").files[0].name
		}
    </script>
 <?php
 if(isset($_POST['submitSendVideo'])){
     require_once( ABSPATH . 'wp-admin/includes/image.php');
     require_once( ABSPATH . 'wp-admin/includes/file.php');
     require_once( ABSPATH . 'wp-admin/includes/media.php');
     if($_FILES["video_upload"]["type"] != "video/mp4" && $_FILES["video_upload"]["type"] != "video/wmv" && $_FILES["video_upload"]["type"] != "video/avi" && $_FILES["video_upload"]["type"] != "video/mov"){
      echo("<script>document.getElementsByClassName('errSendVideo')[0].innerHTML = 'erro, tipo de arquivo nao permitido'</script>");
     }else{
      if($_FILES["video_upload"]["size"] > 83886080){
        echo("<script>document.getElementsByClassName('errSendVideo')[0].innerHTML = 'erro, tamanho excede 80mb'</script>"); 
      }else{
        $attachment_id = media_handle_upload('video_upload', 0);
        echo("<script>document.getElementsByClassName('successSendVideo')[0].innerHTML ='Video adicionado a biblioteca'</script>");
      }
     }
 }else{
     echo("<script>document.getElementsByClassName('errSendVideo')[0].innerHTML = 'Selecione um arquivo'</script>");
 }
}
 add_shortcode('uploadVideo', "uploadVideo");
?>