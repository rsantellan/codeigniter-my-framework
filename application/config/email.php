<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**  
 * desc: The "user agent".
 * opciones: None
 * */
$config['useragent'] = 'useragent';
/**  
 * desc: The mail sending protocol.
 * opciones: mail, sendmail, or smtp
 * 
 * 
 */
$config['protocol'] = 'mail'; 

/**  
 * El mismo si lo comentas te toma el por defecto de php.
 * desc: The server path to Sendmail.
 * opciones: None
 * */
//$config['mailpath'] = '/usr/sbin/sendmail'; 
/**  
 * desc: SMTP Server Address.
 * opciones: None
 * */
$config['smtp_host'] = 'No Default'; 
/**  
 * desc: SMTP Username.
 * opciones: None
 * */
$config['smtp_user'] = 'No Default'; 
/**  
 * desc: SMTP Password.
 * opciones: None
 * */
$config['smtp_pass'] = 'No Default'; 
/**  
 * desc: SMTP Port.
 * opciones: None
 * */
$config['smtp_port'] = '25'; 
/**  
 * desc: SMTP Timeout (in seconds).
 * opciones: None
 * */
$config['smtp_timeout'] = '5'; 
/**  
 * desc: Enable word-wrap.
 * opciones: TRUE or FALSE (boolean)
 * */
$config['wordwrap'] = 'TRUE'; 
/**  
 * desc: Character count to wrap at.
 * opciones: 
 * */
$config['wrapchars'] = '76'; 
/**  
 * desc: Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don't have any relative links or relative image paths otherwise they will not work.
 * opciones: text or html
 * */
$config['mailtype'] = 'html'; 
/**  
 * desc: Character set (utf-8, iso-8859-1, etc.).
 * opciones: 
 * */
$config['charset'] = 'utf-8'; 
/**  
 * desc: Whether to validate the email address.
 * opciones: TRUE or FALSE (boolean)
 * */
$config['validate'] = 'FALSE'; 
/**  
 * desc: Email Priority. 1 = highest. 5 = lowest. 3 = normal.
 * opciones: 1, 2, 3, 4, 5
 * */
$config['priority'] = '3';
/**  
 * desc: Newline character. (Use "\r\n" to comply with RFC 822).
 * opciones: "\r\n" or "\n" or "\r"
 * */
$config['crlf'] = '\n';
/**  
 * desc: Newline character. (Use "\r\n" to comply with RFC 822).
 * opciones: "\r\n" or "\n" or "\r"
 * */
$config['newline'] = '\n';
/**  
 * desc: Enable BCC Batch Mode.
 * opciones: TRUE or FALSE (boolean)
 * */
$config['bcc_batch_mode'] = 'FALSE';
/**  
 * desc: Number of emails in each BCC batch.
 * opciones: None
 * */
$config['bcc_batch_size'] = '200';
