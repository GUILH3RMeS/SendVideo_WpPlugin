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
 <form action method="post" >
    <div class= "form-group" style="text-align: center;">
	<div class="rtcl-video-urls" style="border: 1px solid #ebebeb; border-radius:0.1rem; margin-bottom: 1rem">
		<p for="video_upload" style="box-sizing: border-box;    color: #b7b7b7;    font-size: 1.3em;    font-weight: 400;    margin: 20px 0px 15px 0px;    padding: 0;">Drop file here to add video.</p>
		<input type="file" id="video_upload" class="video" accept="video/*" hidden onchange="getVideo()" name="video_upload">
		<button id="button_getVideo" name="submitSendVideo" type="button" style="    width: auto;    height: 37px;    overflow: hidden;    z-index: 0; background-color:#FA8D9B; color:#fff;		font-size: 1rem;    line-height: 1.5;    border-radius: 0.25rem; border: 1px solid transparent;    padding: 0.375rem 0.75rem; margin-bottom:2rem;">			Browser Video ...
		</button>
		<p id="video_name"></p>
		<br/>
	</div>
	<div class="description alert alert-danger" style="    text-align: start;">
    <p>Recommended video size to (1280x720)</p>
    <p>video maximum size 248 MB.</p>
    <p>Allowed video type (mp4, wmv,avi , mov).</p>
  </div>
</div>
</form>
 <?php
 if($_POST["submitSendVideo"]){
  echo("dale")
 }
}
 add_shortcode('uploadVideo', "uploadVideo")
?>